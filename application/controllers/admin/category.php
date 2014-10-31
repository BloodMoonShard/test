<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id()){
            redirect('/login');
        }
        $this->load->model('category_model');
    }

    public function index()
    {
        $data['data'] = $this->category_model->get_element();
        $this->render_adm('admin/category', $data);
    }

    public function position_category()
    {
        $data['data'] = $this->category_model->get_element();
        $this->render_adm('admin/category_change_position', $data, array('custom.css'));
    }

    public function add_category($id = false){
        $data = array();
        if(sizeof($_POST) > 0){
            if($id){
                if($this->category_model->edit_element($id, $this->input->post())){
                    $this->status = 'success';
                    $this->msg = 'Категория упешно обновлена';
                }else{
                    $this->status = 'error';
                    $this->msg = 'Что-то пошло не так...';
                }
            }else{
                if($this->category_model->set_element($this->input->post())){
                    $this->status = 'success';
                    $this->msg = 'Категория упешно добавлена';
                }else{
                    $this->status = 'error';
                    $this->msg = 'Что-то пошло не так...';
                }
            }
        }
        if($id){
            $data = $this->category_model->get_element($id);
        }
        $data['status_notif'] = $this->status;
        $data['msg_notif'] = $this->msg;
        $this->render_adm('admin/add_category', $data);
    }

    public function rm_category($id){
        if($this->category_model->delete_element($id)){
            $this->status = 'success';
            $this->msg = 'Категория упешно удалена';
        }else{
            $this->status = 'error';
            $this->msg = 'Что-то пошло не так...';
        }
        $this->render_adm('admin/notification', array('status_notif'=>$this->status, 'msg_notif'=>$this->msg, 'back_link' => '/admin/category'));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */