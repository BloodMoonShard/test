<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_category_value extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('subcategory_value_model');
    }

    public function index()
    {
        $data['data'] = $this->subcategory_value_model->get_list_sub_category_value();
        $this->render_adm('admin/sub_category_value', $data);
    }

    public function position_category()
    {
        $data['data'] = $this->subcategory_value_model->get_element();
        $this->render_adm('admin/subcategory_change_position', $data, array('custom.css'));
    }

    public function add_category($id = false){
        $this->load->model('subcategory_model');
        $data = array();
        if(sizeof($_POST) > 0){
            if($id){
                if($this->subcategory_value_model->edit_element($id, $this->input->post())){
                    $this->status = 'success';
                    $this->msg = 'Значение упешно обновлено';
                }else{
                    $this->status = 'error';
                    $this->msg = 'Что-то пошло не так...';
                }
            }else{
                if($this->subcategory_value_model->set_element($this->input->post())){
                    $this->status = 'success';
                    $this->msg = 'Значение упешно добавлено';
                }else{
                    $this->status = 'error';
                    $this->msg = 'Что-то пошло не так...';
                }
            }
        }
        if($id){
            $data = $this->subcategory_value_model->get_element($id);
            $data['parent'] = $this->subcategory_model->get_element($data['id_subcategory']);
        }
        $data['list'] = $this->subcategory_model->get_element();
        $data['status_notif'] = $this->status;
        $data['msg_notif'] = $this->msg;
        $this->render_adm('admin/add_subcategory_value', $data);
    }

    public function rm_category($id){
        if($this->subcategory_value_model->delete_element($id)){
            $this->status = 'success';
            $this->msg = 'Значение упешно удалено';
        }else{
            $this->status = 'error';
            $this->msg = 'Что-то пошло не так...';
        }
        $this->render_adm('admin/notification', array('status_notif'=>$this->status, 'msg_notif'=>$this->msg));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */