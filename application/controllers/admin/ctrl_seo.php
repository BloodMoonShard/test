<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_seo extends My_Controller {

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
        $this->load->model('seo_model');
    }

    public function index() {
        $option['data'] =  $this->seo_model->seoGetAll();
        $this->render_adm('admin/seo_view.php', $option);
    }

    public function edit_seo($id) {
        $option['data'] = $this->seo_model->oneSeoGet($id);
        $post = $this->input->post();
        if ($post) {
            $this->seo_model->seoUpdate($id, $post);
            redirect('/admin/ctrl_seo');
        }

        $this->render_adm('/admin/seo_edit' ,$option);
    }
}