<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_search extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id()){
            redirect('/login');
        }
        if($this->auth->get_user_role() != 1) {
            redirect('/admin');
        }
        $this->load->model('search_model');
        $this->load->library('upload_ram');
    }

    public function index() {
        var_dump($this->input->post());

    }
}