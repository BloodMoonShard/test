<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comparison extends My_Controller {
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->model('type_model');
        $this->load->model('object_model');
        $this->load->model('comparison_model');
        $this->load->model('common_model');
    }

    public function index()
    {
        $session_comparison = $this->session->userdata('comparison');


        foreach ($session_comparison as $s) {
            $objects[] = $this->comparison_model->getObject($s);
        }
        $hand_array = array(
            'article' => 'Лот №',
            'country' => 'Страна',
            'region' => 'Область',
            'city' => 'Город',
            'district' => 'Район'
        );

        $cat_name_id = array();
        $cat_name = array();
        foreach ($objects as $k => $o) {
            $objects_option = $this->type_model->get_objects_option($o['id_objects']);
            if ($objects_option) {
                foreach ($objects_option as $v) {
                    if ($v['id_subcategory']!=31) {
                        if (!in_array($v['id_subcategory'], $cat_name_id)) {
                            $cat_name_id[] = $v['id_subcategory'];
                            $cat_name[$v['id_subcategory']] = $v['name'];
                        }
                    }
                    if (strlen($v['id_subcategory_value_input']) > 0) {
                        $objects[$k][$v['id_subcategory']] = $v['id_subcategory_value_input'];
                    } else {
                        if (isset($objects[$k][$v['id_subcategory']])) {
                            $objects[$k][$v['id_subcategory']] = ', ' . $v['value'];
                        } else {
                            $objects[$k][$v['id_subcategory']] = $v['value'];
                        }
                    }

                }
            }
            $objects[$k]['ob_images'] = $this->common_model->objectsImgGet($objects[$k]['id_objects']);
        }
        foreach ($cat_name as $key=>$value) {
            $hand_array[$key] = $value;
        }

        $data['objects'] = $objects;
        $data['cat_name'] = $hand_array;


        $this->render('web/comparison', $data);
    }
}