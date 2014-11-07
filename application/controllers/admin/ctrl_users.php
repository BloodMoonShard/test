<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_users extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id()){
            redirect('/login');
        }
        if($this->auth->get_user_role() == 3) {
            redirect('/admin');
        }
        $this->load->model('users_model');
    }

    public function index() {
        $option['users'] = $this->users_model->getAllUsers();
        foreach ($option['users'] as $key=>$value) {
            if ($option['users'][$key]['user_role'] == 4) {
                $option['users'][$key]['count_agents'] = $this->users_model->getCountAgentsOnManager($option['users'][$key]['id_users']);
            }
        }
        if ($this->auth->get_user_role() == 4) {
            $agents_id = '';
            $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
            foreach ($agents_list as $a) {
                $agents_id[] = $a['id_agent'];
            }
            $agents_id[] = $this->auth->get_user_id();
            $option['manager_vision'] = $agents_id;
        }
        $this->render_adm('admin/users_view.php', $option);
    }

    public function add_user() {

        $option['roles'] = $this->users_model->getRoles();
        $post = $this->input->post();
        if($post) {
            if ($this->auth->get_user_role() == 4) {
                $post['user_role'] = 3;
                $id_agent = $this->auth->registration($post);
                $this->users_model->setAgentToManager($this->auth->get_user_id(), $id_agent);
             } else {
                $this->auth->registration($post);
            }
            redirect('/admin/ctrl_users', 'refresh');
        }
        $this->render_adm('admin/user_add.php', $option);
    }

    public function edit_user($id_users) {
        $agents_id = '';
        $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
        foreach ($agents_list as $a) {
            $agents_id[] = $a['id_agent'];
        }
        $agents_id[] = $this->auth->get_user_id();

        if($this->auth->get_user_id()!=1) {
            if ((($this->auth->get_user_role() != 1)&&($id_users==1))||(!in_array($id_users, $agents_id))) {
                redirect('/admin/ctrl_users', 'refresh');
            }
        }



        $option['roles'] = $this->users_model->getRoles();
        $option['userinfo'] = $this->users_model->getUser($id_users);
        $post = $this->input->post();
        if($post) {
            $this->auth->update_user_info($id_users, $post);
            redirect('/admin/ctrl_users', 'refresh');
        }
        $this->render_adm('admin/user_edit.php', $option);
    }

    public function remove_user($id_users) {
        $agents_id = '';
        $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
        foreach ($agents_list as $a) {
            $agents_id[] = $a['id_agent'];
        }
        $agents_id[] = $this->auth->get_user_id();
        if($this->auth->get_user_id()!=1) {
            if ((($this->auth->get_user_role() != 1)&&($id_users==1))||(!in_array($id_users, $agents_id))) {
                redirect('/admin/ctrl_users', 'refresh');
            }
        }

        $this->auth->remove_user($id_users);
        redirect('/admin/ctrl_users', 'refresh');

    }

    public function manager_agents($id_manager) {
        if(($this->auth->get_user_id() != $id_manager)&&($this->auth->get_user_role() != 1)) {
            redirect('/admin/ctrl_users');
        }
        $username = $this->users_model->getUser($id_manager);
        $option['username'] = $username['username'];
        $option['id_manager'] = $id_manager;
        $agents_list = $this->users_model->getMyAgents($id_manager);
        $agents = array();
        foreach ($agents_list as $a) {
            $agents[] = $this->users_model->getUser($a['id_agent']);
        }
        $option['agents'] = $agents;
        $this->render_adm('admin/manager_agents.php', $option);
    }

    public function add_agent_to_manager($id_manager) {
        if(($this->auth->get_user_id() != $id_manager)&&($this->auth->get_user_role() != 1)) {
            redirect('/admin/ctrl_users');
        }
        $option = '';
        $option['id_manager'] = $id_manager;
        $option['free_agents'] = $this->users_model->getFreeAgents();
        $post = $this->input->post();
        if($post) {
            $agents_id = $post['agents_id'];
            foreach ($agents_id as $a) {
                if ($this->users_model->setAgentToManager($id_manager, $a)) {
                    $this->users_model->setUnfreeAgent($a);
                };
            }
            redirect('/admin/ctrl_users/manager_agents/'.$id_manager, 'refresh');
        }

        $this->render_adm('admin/add_agent_to_manager.php', $option);
    }

    public function setAgentFree($id_agent) {
        $id_manager = $this->users_model->getManagerId($id_agent);
        $id_manager = $id_manager['id_manager'];
        if(($this->auth->get_user_id() != $id_manager)&&($this->auth->get_user_role() != 1)) {
            redirect('/admin/ctrl_users');
        }
        $this->users_model->setFreeAgent($id_agent);
        $this->users_model->unsetAgentToManager($id_agent);
        redirect('/admin/ctrl_users/manager_agents/'.$id_manager, 'refresh');
    }
}