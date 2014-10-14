<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_resume extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('resume_model');
        $this->load->library('upload_ram');
    }

    public function index() {
        $option['data'] =  $this->resume_model->resumeGet();
        $this->render_adm('admin/resume_view.php', $option);
    }

    public function delete_resume($id) {
        $resume = $this->resume_model->oneResumeGet($id);
        $this->resume_model->resumeDelete($id);
        unlink($_SERVER['DOCUMENT_ROOT'] . '/upload_files/resume/' . $resume['file_resume']);
        redirect('/admin/ctrl_resume');
    }
}