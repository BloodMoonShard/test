<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Objects extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id()){
            redirect('/login');
        }

        $this->load->model('object_model');
        $this->load->model('users_model');
        $this->load->helper('date');
    }

    public function index()
    {
        $data['data'] = '';
        $result_visible_manager = array();
        $role_id = $this->auth->get_user_role();
        $cur_user_id = $this->auth->get_user_id();
        $result_visible_manager[] = $cur_user_id;
        if ($role_id == 4) {
            $managers_agents = $this->users_model->getMyAgents($cur_user_id);
            foreach ($managers_agents as $m) {
                $result_visible_manager[] = $m['id_agent'];
            }
            $data['data'] = $this->object_model->get_element(false, $result_visible_manager);
        } elseif ($role_id == 3) {
            $data['data'] = $this->object_model->get_element(false, $cur_user_id);
        }
        if ($role_id == 1) {
            $data['data'] = $this->object_model->get_element();
        }
        foreach ($data['data'] as $key => $value) {
            if ($data['data'][$key]['status_obj']) {
                $data['data'][$key]['status_obj'] = $this->users_model->getStatusName($data['data'][$key]['status_obj']);
                $data['data'][$key]['status_obj'] = $data['data'][$key]['status_obj']['status'];
            }
            $data['data'][$key]['username'] = $this->object_model->getUsername($data['data'][$key]['id_users']);
            $data['data'][$key]['username'] = $data['data'][$key]['username']['username'];
        }

        $this->render_adm('admin/objects', $data);
    }

    public function position_category()
    {
        $this->load->model('category_model');
        $data['list_category'] = $this->category_model->get_element();
//        $data['data'] = $this->subcategory_model->get_element();
        $this->render_adm('admin/subcategory_change_position', $data, array('custom.css'));
    }

    public function add_object(){
        $this->load->library('upload_ram');
        $this->load->model('common_model');
        $this->load->model('category_model');
        $this->load->model('object_type_model');
        $this->load->model('subcategory_value_model');
        $this->load->model('subcategory_model');
        $this->load->model('object_options_model');
        $countries = $this->db->order_by('country_id')->get('countries')->result_array();
        $content = "";
        $data['status_options'] = $this->object_model->get_status_options();
        $list_category = $this->category_model->get_element();
        if($this->input->post()){
            if (!isset($_POST['status_obj'])) {
                $_POST['status_obj'] = 1; /* 1 - на модерации */
            }
            $data_post = array();
            foreach($_POST as $key=>$value){
                if(strpos($key, 'gdata_') !== false){
                    $name = explode('gdata_', $key);
                    if(strpos($name[1], 'input_') !== false){
                        $name_sub = explode('_', $name[1]);
                        $data_post[] = array('id_subcategory'=>$name_sub[1], 'id_subcategory_value'=>$name_sub[2], 'id_subcategory_value_input'=>$value);
                    }else{
                        if(sizeof($value) > 1){
                            foreach($value as $v){
                                $data_post[] = array('id_subcategory'=>$name[1], 'id_subcategory_value'=>$v);
                            }
                        }else{
                            if(is_array($value)){
                                $data_post[] = array('id_subcategory'=>$name[1], 'id_subcategory_value'=>$value[0]);
                            }else{
                                $data_post[] = array('id_subcategory'=>$name[1], 'id_subcategory_value'=>$value);
                            }
                        }
                    }
                    unset($_POST[$key]);
                }else{

                }
            }
            unset($_POST['file']);
            $_POST['id_users'] = $this->auth->get_user_id();
            $id_objects = $this->object_model->set_element($_POST);
            if(strlen($_FILES['file']['name'][0])>0) {
                $WhereAndWhat = 'objects_img'; /*в какую папку сохраняем изображение*/
                $upload_data = $this->upload_ram->multiupload_image($WhereAndWhat);
                foreach ($upload_data as $u) {
                    $this->common_model->objectsImgAdd($id_objects, $u['data']);
                }
            }

            foreach($data_post as $value){
                if($value['id_subcategory_value'] == ''){
                    continue;
                }
                $this->object_options_model->set_element(array_merge($value, array('id_objects'=>$id_objects)));
            }
            $this->status = "success";
            $this->msg = "Объект успешно добавлен";
            $this->render_adm('admin/notification', array('status_notif'=>$this->status, 'msg_notif'=>$this->msg, 'back_link' => '/admin/objects'));
        }
        foreach($list_category as $lc){
            $content .= "<h4>".$lc['name']."</h4>";
            if($subcategory = $this->subcategory_model->get_result(array('parent'=>$lc['id_category']))){
                foreach($subcategory as $ls){
                    $content .= "<label>".$ls['name']."</label>";
                    switch($ls['format']){
                        case 'select':
                            $content .= generate_select($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])));
                            break;
                        case 'textarea':
                            $content .= generate_textarea($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])));
                            break;
                        case 'radio':
                            $content .= generate_radio($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])));
                            break;
                        case 'checkbox':
                            $content .= generate_checkbox($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])));
                            break;
                        case 'input':
                            $content .= generate_input($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])));
                            break;
                    }
                }
            }
        }
        $data['highway_direction']=$this->generate_highway_direction();
        $data['underground']=$this->generate_underground();
        $data['region_list'] = $this->generate_region();
        $data['highway'] = $this->generate_highway();
        $data['type_estate'] = $this->object_type_model->get_element();
        $data['status_notif'] = $this->status;
        $data['msg_notif'] = $this->msg;
        $data['content'] = $content;
        $data['countries'] = $countries;
//        $this->load->model('highway_direction_model');
//        $data['highway_direction'] = "";
//        $highway_direction = $this->highway_direction_model->get_element();
//        if($highway_direction){
//            $data['highway_direction'] = '<div class="form-group"><label></label><select name="highway_direction">';
//            foreach($highway_direction as $value){
//                $data['highway_direction'] .= '<option value="'.$value['id_highway_direction'].'"></option>';
//            }
//            $data['highway_direction'] .= '</select></div>';
//        }
        $this->render_adm('admin/add_objects', $data);
    }

    public function edit_object($id){
        $this->load->library('upload_ram');
        $this->load->model('common_model');
        $this->load->model('category_model');
        $this->load->model('object_type_model');
        $this->load->model('subcategory_value_model');
        $this->load->model('subcategory_model');
        $this->load->model('object_options_model');
        $countries = $this->db->order_by('country_id')->get('countries')->result_array();
        $content = "";
        $list_category = $this->category_model->get_element();
        if($this->input->post()){
            if(strlen($_FILES['file']['name'][0])>0) {
                $WhereAndWhat = 'objects_img'; /*в какую папку сохраняем изображение*/
                $upload_data = $this->upload_ram->multiupload_image($WhereAndWhat);
                foreach ($upload_data as $u) {
                    $this->common_model->objectsImgAdd($id, $u['data']);
                }
            }
            $data_post = array();
            foreach($_POST as $key=>$value){
                if(strpos($key, 'gdata_') !== false){
                    $name = explode('gdata_', $key);
                    if(strpos($name[1], 'input_') !== false){
                        $name_sub = explode('_', $name[1]);
                        $data_post[] = array('id_subcategory'=>$name_sub[1], 'id_subcategory_value'=>$name_sub[2], 'id_subcategory_value_input'=>$value);
                    }else{
                        if(sizeof($value) > 1){
                            foreach($value as $v){
                                $data_post[] = array('id_subcategory'=>$name[1], 'id_subcategory_value'=>$v);
                            }
                        }else{
                            if(is_array($value)){
                                $data_post[] = array('id_subcategory'=>$name[1], 'id_subcategory_value'=>$value[0]);
                            }else{
                                $data_post[] = array('id_subcategory'=>$name[1], 'id_subcategory_value'=>$value);
                            }
                        }
                    }
                    unset($_POST[$key]);
                }else{

                }
            }
            $this->object_model->edit_element($id, $_POST);
            $this->object_options_model->object_value_rm_all($id);
            foreach($data_post as $value){
                if($value['id_subcategory_value'] == ''){
                    continue;
                }
                $this->object_options_model->set_element(array_merge($value, array('id_objects'=>$id)));
            }
            $this->status = "success";
            $this->msg = "Объект успешно обновлен";
        }
        if($id){
            $data = $this->object_model->get_element($id);
            $data_value = $this->object_options_model->object_value($id);
            $data_value_parsed = array();
            foreach($data_value as $val){
                if(($val['format'] != 'input') && ($val['format'] != 'textarea')){
                    $data_value_parsed[$val['id_subcategory']][$val['id_subcategory_value']] = (string)$val['id_subcategory_value'];
                }else{
                    $data_value_parsed[$val['id_subcategory']][$val['id_subcategory_value']] = $val['id_subcategory_value'];
                    $data_value_parsed[$val['id_subcategory']]['value'] = $val['id_subcategory_value_input'];

                }
            }
            $data['highway_direction']=$this->generate_highway_direction($data['city_id']);
            $data['region_list'] = $this->generate_region($data['city_id'], $data['region_list']);
            $data['highway'] = $this->generate_highway($data['city_id'], $data['highway_list']);
            $data['underground']=$this->generate_underground($data['city_id'], $data['underground']);

        }else{
            $data['highway_direction']=$this->generate_highway_direction();
            $data['region_list'] = $this->generate_region();
            $data['highway'] = $this->generate_highway();
            $data['underground']=$this->generate_underground();

        }
        foreach($list_category as $lc){
            $content .= "<h4>".$lc['name']."</h4>";
            if($subcategory = $this->subcategory_model->get_result(array('parent'=>$lc['id_category']))){
                foreach($subcategory as $ls){
                    $content .= "<label>".$ls['name']."</label>";
                    switch($ls['format']){
                        case 'select':
                            $content .= generate_select($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])), $data_value_parsed);
                            break;
                        case 'textarea':
                            $content .= generate_textarea($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])), $data_value_parsed);
                            break;
                        case 'radio':
                            $content .= generate_radio($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])), $data_value_parsed);
                            break;
                        case 'checkbox':
                            $content .= generate_checkbox($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])), $data_value_parsed);
                            break;
                        case 'input':
                            $content .= generate_input($this->subcategory_value_model->get_result(array('id_subcategory'=>$ls['id_subcategory'])), $data_value_parsed);
                            break;
                    }
                }
            }
        }
        $data['status_options'] = $this->object_model->get_status_options();
        $data['images'] = $this->common_model->objectsImgGet($id);
        $data['type_estate'] = $this->object_type_model->get_element();
        $data['status_notif'] = $this->status;
        $data['msg_notif'] = $this->msg;
        $data['content'] = $content;
        $data['countries'] = $countries;
        $this->render_adm('admin/add_objects', $data);
    }

    public function rm_object($id){
        if($this->object_model->delete_object($id)){
            $this->status = 'success';
            $this->msg = 'Объект упешно удален';
        }else{
            $this->status = 'error';
            $this->msg = 'Что-то пошло не так...';
        }
        $this->render_adm('admin/notification', array('status_notif'=>$this->status, 'msg_notif'=>$this->msg, 'back_link' => '/admin/objects'));
    }

    public function control_order($id_object) {
        if (!$id_object) {
            redirect('admin/objects', 'refresh');
        }
        $data['status_options'] = $this->object_model->get_status_options();
        $data['obj'] = $this->object_model->get_one_object($id_object);
        $post = $this->input->post();

        if ($post) {
            $this->object_model->update_object_order($id_object, $post);
            redirect('admin/objects/control_order/'.$id_object, 'refresh');
        }

        $this->render_adm('admin/order_view', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */