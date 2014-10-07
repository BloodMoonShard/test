<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_callback extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('callback_model');
    }

    function index() {
        $option['data'] =  $this->callback_model->callbacksGet();
        $this->render_adm('admin/callback_view', $option);
    }


    function submit_callback($id) {
        $this->callback_model->submitCallback($id);
        redirect('/admin/ctrl_callback', 'refresh');
    }

    function delete_callback($id) {
        $this->callback_model->сallbackDelete($id);
        redirect('/admin/ctrl_callback', 'refresh');
    }

    function clear(){
        $this->callback_model->сallbacksClear();
        redirect('/admin/ctrl_callback', 'refresh');
    }
}