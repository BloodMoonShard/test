<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller{

    function save_category_sort(){
        $this->load->model('category_model');
        if(sizeof($this->input->post('ids')) > 0){
            $array_ids = explode(',',$this->input->post('ids'));
            foreach($array_ids as $key=>$value){
                $this->category_model->edit_element($value, array('sortable'=>$key+1));
            }
        }
        echo json_encode(array('status'=>true));
    }

    function save_sub_category_sort(){
        $this->load->model('subcategory_model');
        if(sizeof($this->input->post('ids')) > 0){
            $array_ids = explode(',',$this->input->post('ids'));
            foreach($array_ids as $key=>$value){
                $this->subcategory_model->edit_element($value, array('sortable'=>$key+1));
            }
        }
        echo json_encode(array('status'=>true));
    }

    function get_list_subcategory(){
        $this->load->model('subcategory_model');
        $content = "";
        if($this->input->post('idc') && ($this->input->post('idc') != 0)){
            if($data = $this->subcategory_model->get_result(array('parent'=>$this->input->post('idc')))){
                foreach($data as $k){
                    $content .= "<li data-id=\"".$k['id_subcategory']."\">".$k['name']."</li>";
                }
            }
        }
        echo json_encode(array('status'=>true, 'content'=>$content));
    }

    function get_list_highway(){
        $city = $_POST['id_city'];
        $this->load->model('highway_model');
        echo json_encode(array('status'=>true, 'content'=>$this->highway_model->get_result(array('id_city'=>$city))));
    }

    function add_highway(){
        $city = $_POST['id_city'];
        $name = $_POST['name'];
        $id_direction = $_POST['id_highway_direction'];
        $data = array('id_city'=>$city, 'name'=>$name, 'id_highway_direction'=>$id_direction);
        $this->load->model('highway_model');
        echo json_encode(array('status'=>true, 'content'=>$this->highway_model->set_element($data)));
    }

    function get_list_region_city(){
        $city = $_POST['id_city'];
        $this->load->model('region_city_model');
        echo json_encode(array('status'=>true, 'content'=>$this->region_city_model->get_result(array('id_city'=>$city))));
    }

    function add_region_city(){
        $city = $_POST['id_city'];
        $name = $_POST['name'];
        $data = array('id_city'=>$city, 'name'=>$name);
        $this->load->model('region_city_model');
        echo json_encode(array('status'=>true, 'content'=>$this->region_city_model->set_element($data)));
    }

    function get_list_highway_direction(){
        $city = $_POST['id_city'];
        $this->load->model('highway_direction_model');
        echo json_encode(array('status'=>true, 'content'=>$this->highway_direction_model->get_result(array('id_city'=>$city))));
    }

    function add_highway_direction(){
        $city = $_POST['id_city'];
        $name = $_POST['name'];
        $data = array('id_city'=>$city, 'name'=>$name);
        $this->load->model('highway_direction_model');
        echo json_encode(array('status'=>true, 'content'=>$this->highway_direction_model->set_element($data)));
    }

    function callback()
    {
        $this->load->model('common_model');
        $post = $this->input->post();
        if ($this->input->post()) {
            $this->common_model->insertCallback($post);
        } else {
            return false;
        }

    }

}