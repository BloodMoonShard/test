<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->data['get_per_page'] = $this->get_per_page();
    }

    function render($tpl_name, $data){
        $this->load->library('seo');
        $url = $this->uri->uri_string();
        switch ($this->uri->segment(1)) {
            default:
                $data['seodata'] = $this->seo->get_static_seo($url);
        }
        $this->load->view('/web/header', $data);
        $this->load->view($tpl_name, $data);
        $this->load->view('/web/footer', $data);
    }

    function render_adm($tpl_name, $data, $styles = false){
        if($styles){
            $data['styles'] = $styles;
        }
        $this->load->view('/admin/header', $data);
        $this->load->view($tpl_name, $data);
        $this->load->view('/admin/footer', $data);
    }

    function render_common($tpl_name, $data, $styles = false){
        if($styles){
            $data['styles'] = $styles;
        }
        $this->load->view('/common/header', $data);
        $this->load->view($tpl_name, $data);
        $this->load->view('/common/footer', $data);
    }

    function generate_highway_direction($id = false){
        $this->load->model('highway_direction_model');
        $data['highway_direction'] = '<div class="form-group"><label>Выберите направление</label><select id="list_highway_direction" class="form-control" name="highway_direction"><option value=0>Направление</option>';
        if($id){
            $highway_direction = $this->highway_direction_model->get_result(array('id_city'=>$id));
            if($highway_direction){
                foreach($highway_direction as $value){
                    $data['highway_direction'] .= '<option value="'.$value['id_highway_direction'].'">'.$value['name'].'</option>';
                }
            }
        }
        $data['highway_direction'] .= '</select></div>';
        return $data['highway_direction'];
    }

    function generate_highway($id = false, $ids = false){
        $this->load->model('highway_model');
        $data['highway'] = '<div class="form-group"><label>Шоссе</label><select id="highway_list" class="form-control" name="highway_list"><option value=0>Направление</option>';
        if($id && $ids){
            $highway_direction = $this->highway_model->get_result(array('id_city'=>$id));
            if($highway_direction){
                foreach($highway_direction as $value){
                    if($value['id_highway'] == $ids){
                        $data['highway'] .= '<option selected=selected value="'.$value['id_highway'].'">'.$value['name'].'</option>';
                    }else{
                        $data['highway'] .= '<option value="'.$value['id_highway'].'">'.$value['name'].'</option>';
                    }
                }
            }
        }
        $data['highway'] .= '</select>
                                <a class="btn btn-primary right" id="add_highway" data-toggle="modal" data-target="#myModal2">Добавить шоссе</a>
</div>';
        return $data['highway'];
    }

    function generate_region($id = false, $ids = false){
        $this->load->model('region_city_model');
        $data['highway'] = '<div class="form-group"><label>Выберите округ</label><select id="region_list" class="form-control" name="region_list"><option value=0>Направление</option>';
        if($id && $ids){
            $highway_direction = $this->region_city_model->get_result(array('id_city'=>$id));
            if($highway_direction){
                foreach($highway_direction as $value){
                    if($value['id_region_city'] == $ids){
                        $data['highway'] .= '<option selected=selected value="'.$value['id_region_city'].'">'.$value['name'].'</option>';
                    }else{
                        $data['highway'] .= '<option value="'.$value['id_region_city'].'">'.$value['name'].'</option>';
                    }
                }
            }
        }
        $data['highway'] .= '</select>
                                <a class="btn btn-primary right" id="add_region" data-toggle="modal" data-target="#myModal">Добавить округ</a>
</div>';
        return $data['highway'];
    }

    function get_per_page(){
        if($dt = $this->session->userdata('per_page')){
            $selected = $dt;
        }else{
            $this->session->set_userdata('per_page', 2);
            $selected = 2;
        }
//        $selected = 2;
//        $this->session->set_userdata('per_page', 2);

        return $this->load->view('common/per_page', array('selected'=>$selected), TRUE);
    }



}