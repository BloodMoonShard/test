<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_seo extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('seo_model');
    }

    public function index() {
        $option['data'] =  $this->seo_model->seoGetAll();
        $this->render_adm('admin/seo_view.php', $option);
    }

//    public function add_vacancy() {
//        $post=$this->input->post();
//        if ($post) {
//            $this->vacancy_model->vacancyAdd($post);
//            redirect('/admin/ctrl_vacancy');
//        }
//        $this->render_adm('/admin/add_vacancy', false);
//    }
//
//    public function edit_vacancy($id) {
//        $option['data'] = $this->vacancy_model->oneVacancyGet($id);
//        $post = $this->input->post();
//        if ($post) {
//            if (!isset($post['display'])) {
//                $post['display'] = 0;
//            }
//            $this->vacancy_model->vacancyUpdate($id, $post);
//            redirect('/admin/ctrl_vacancy');
//        }
//
//        $this->render_adm('/admin/edit_vacancy' ,$option);
//    }
//
//    public function delete_vacancy($id) {
//        $this->vacancy_model->vacancyDelete($id);
//        redirect('/admin/ctrl_vacancy');
//    }
}