<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_search extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('search_model');
        $this->load->library('upload_ram');
    }

    public function index() {
        var_dump($this->input->post());

    }
}