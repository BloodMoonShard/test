<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_building extends My_Controller {

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
        $this->load->model('building_model');
        $this->load->library('upload_ram');
    }

    public function index() {
        $data = $this->building_model->buildingGet();
        foreach ($data as $key=>$value) {
            $data[$key]['images'] = $this->building_model->buildingImgGet($data[$key]['id']);
        }
        $option['data'] = $data;
        $this->render_adm('admin/building_view.php', $option);
    }

    public function add_building() {
        $post=$this->input->post();
        if ($post) {
            $id_building = $this->building_model->buildingAdd($post);
            if(sizeof($_FILES['file']['name'])>0) {
                $WhereAndWhat = 'building_img'; /*в какую папку сохраняем изображение*/
                $upload_data = $this->upload_ram->multiupload_image($WhereAndWhat);
                foreach ($upload_data as $u) {
                    $this->building_model->buildingImgAdd($id_building, $u['data']);
                }
            }
            redirect('/admin/ctrl_building');
        }
        $this->render_adm('/admin/building_add', false);
    }

    public function edit_building($id) {
        $data = $this->building_model->oneBuildingGet($id);
        $data['images'] = $this->building_model->buildingImgGet($data['id']);
        $option['data'] = $data;
        $post = $this->input->post();
        if ($post) {
            if(strlen($_FILES['file']['name'][0])>0) {
                $WhereAndWhat = 'building_img'; /*в какую папку сохраняем изображение*/
                $upload_data = $this->upload_ram->multiupload_image($WhereAndWhat);
                foreach ($upload_data as $u) {
                    $this->building_model->buildingImgAdd($data['id'], $u['data']);
                }
            }
            $this->building_model->oneBuildingUpdate($id, $post);
            redirect('/admin/ctrl_building');
        }
        $this->render_adm('/admin/building_edit' ,$option);
    }

    public function delete_building($id) {
        $data['images'] = $this->building_model->buildingImgGet($id);
        foreach ($data['images'] as $im) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/upload_files/building_img/' . $im['img_name']);
        }
        $this->building_model->buildingDelete($id);
        $this->building_model->buildingImgDelete($id);
        redirect('/admin/ctrl_building');
    }
}