<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_partners extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('partners_model');
        $this->load->library('upload_ram');
    }

    public function index() {
        $option['data'] =  $this->partners_model->partnerGet();
        $this->render_adm('admin/view_partners.php', $option);
    }

    public function add_partner() {
        if (!empty($_FILES['img']['name']))
        {
            $post=$this->input->post();
            if(strlen($_FILES['img']['name'])>0) {
                $WhereAndWhat = 'partners_img'; /*в какую папку сохраняем изображение*/
                $upload_data = $this->upload_ram->upload_image_partner($WhereAndWhat);
                $post['img'] =  $upload_data['file_name'];
            }
            $this->partners_model->partnerAdd($post);
            redirect('/admin/ctrl_partners');
        }

        $this->render_adm('/admin/add_partner', false);
    }

    public function edit_partner($id) {
        $option['data'] = $this->partners_model->onePartnerGet($id);
        $post = $this->input->post();
        if ($post) {
            if(strlen($_FILES['img']['name'])>0) {
                $WhereAndWhat = 'partners_img'; /*в какую папку сохраняем изображение*/
                $upload_data = $this->upload_ram->upload_image_partner($WhereAndWhat);
                $post['img'] =  $upload_data['file_name'];

                unlink($_SERVER['DOCUMENT_ROOT'] . '/upload_files/partners_img/' . $option['data']['img']);
                $this->partners_model->partnerImgDelete($option['data']['id']);
            }
            $this->partners_model->partnerUpdate($id, $post);
            redirect('/admin/ctrl_partners');
        }

        $this->render_adm('/admin/edit_partner' ,$option);
    }

    public function delete_partner($id) {
        $partner = $this->partners_model->onePartnerGet($id);
        $this->partners_model->partnerDelete($id);
        unlink($_SERVER['DOCUMENT_ROOT'] . '/upload_files/partners_img/' . $partner['img']);
        redirect('/admin/ctrl_partners');
    }
}