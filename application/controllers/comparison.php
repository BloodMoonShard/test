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
        $final_result= array();
        foreach ($session_comparison as $s) {
            $result = $this->object_model->get_one_object($s);
            $content = '<div class="row clearfix">';
            $info = array();
            $counts = 1;
            if ($data = $this->object_model->get_details($s)) {
                $old_category = "";
                foreach ($this->object_model->get_details($s) as $v) {
                    if (($v['name'] != $old_category) && ($old_category != "")) {
                        if ($counts % 2) {
                            $content .= '</div><div class="row clearfix">';
                        }
                        $content .= $this->load->view('common/item_card_item', array_merge($info, array('count_category' => $counts)), true);
                        $info = array();
                        $counts++;
                    }
                    $info['category_name'] = $v['name'];
                    if (($v['format'] != 'input') && ($v['format'] != 'textarea')) {
                        $info['subcategory'][$v['subcatname']] = $v['value'];
                    } else {
                        $info['subcategory'][$v['subcatname']] = $v['id_subcategory_value_input'];
                    }
                    $old_category = $v['name'];
                }
            }
            $array_subcategory_criteria = array(11, 9, 10, 28, 29, 31);
            $objects_option = $this->type_model->get_objects_option($result['id_objects'], $array_subcategory_criteria);
            if ($objects_option) {
                foreach ($objects_option as $v) {
                    if (strlen($v['id_subcategory_value_input']) > 0) {
                        $result[$v['id_subcategory']] = $v['id_subcategory_value_input'];
                    } else {
                        if (isset($result[$v['id_subcategory']])) {
                            $result[$v['id_subcategory']] = ', ' . $v['value'];
                        } else {
                            $result[$v['id_subcategory']] = $v['value'];
                        }
                    }
                    if ($v['id_subcategory'] == 30) {
                        $result['type'] = $v['id_subcategory_value'];
                    }
                }
            }
;
            $this->data['result'] = $result;
            $this->data['result']['ob_images'] = $this->common_model->objectsImgGet($this->data['result']['id_objects']);
            $final_result[] = $this->data['result'];
        }
        var_dump($final_result);




        $this->render('web/comparison', $this->data);
    }
}