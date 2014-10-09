<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Type extends My_Controller
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->model('type_model');
        $this->load->model('building_model');
        $this->load->library('pagination');
    }

    public function index($object_type = false, $id_obj = false)
    {
        $data = array();
        $config["base_url"] = base_url() . "type/$object_type";
        $config["per_page"] = $this->session->userdata('per_page');
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<div class="link">';
        $config['next_tag_close'] = '</div>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<div class="link">';
        $config['prev_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="link">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="link active">';
        $config['cur_tag_close'] = '</div>';
        $config['display_last'] = FALSE;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $ses_data = $this->session->userdata('sort');
        if (!$ses_data) {
            $ses_data = 49;
        }
        $this->session->set_userdata('sort', $ses_data);


        switch ($object_type) {
            case 'house':
                //Get total counts
//                $config["total_rows"] = $this->type_model->get_catalog_objects($object_type, $ses_data);

                $data = unserialize($this->session->userdata($object_type));
                if(!$data){
                    $data = array();
                }

                $objects_all = $this->type_model->get_catalog_objects_per_page($object_type,false, false, false);
                //Get result per page

//                $objects = $this->type_model->get_catalog_objects_per_page($object_type, $ses_data, $page, $config["per_page"]);

                $sort_filter = array();
                $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30);


//                $list_active_objects = array();
//                foreach ($objects as $s) {
//                    $list_active_objects[] = $s['id_objects'];
//                }

                //Start Left block filter generate
                $filter = $this->type_model->get_criteria_filter($object_type, array(9, 10, 29), $ses_data);
                $list_parsed_id_object = array();
                foreach ($filter as $v) {
                    if (!in_array($v['id_objects'], $list_parsed_id_object)) {
                        if (strlen($v['district']) > 0) {
                            @$sort_filter['district'][$v['district']] += 1;
                        }
                        if (strlen($v['city']) > 0) {
                            @$sort_filter['city'][$v['city']] += 1;
                        }
                        $list_parsed_id_object[] = $v['id_objects'];
                    }

                    if ($v['id_subcategory'] == 9) {
                        if (@$sort_filter['max_home'] < $v['id_subcategory_value_input']) {
                            @$sort_filter['max_home'] = $v['id_subcategory_value_input'];
                        }
                        if (!isset($sort_filter['min_home']) || @$sort_filter['min_home'] > $v['id_subcategory_value_input']) {
                            @$sort_filter['min_home'] = $v['id_subcategory_value_input'];
                        }
                    }
                    if ($v['id_subcategory'] == 10) {
                        if (@$sort_filter['max_area'] < $v['id_subcategory_value_input']) {
                            @$sort_filter['max_area'] = $v['id_subcategory_value_input'];
                        }
                        if (!isset($sort_filter['min_area']) || @$sort_filter['min_area'] > $v['id_subcategory_value_input']) {
                            @$sort_filter['min_area'] = $v['id_subcategory_value_input'];
                        }
                    }
                    if ($v['id_subcategory'] == 29) {
                        if (@$sort_filter['max_price'] < $v['id_subcategory_value_input']) {
                            @$sort_filter['max_price'] = $v['id_subcategory_value_input'];
                        }
                        if (!isset($sort_filter['min_price']) || @$sort_filter['min_price'] > $v['id_subcategory_value_input']) {
                            @$sort_filter['min_price'] = $v['id_subcategory_value_input'];
                        }
                    }
                }
                //End



                //Get attr for every object
                foreach ($objects_all as $k => $o) {
                    $objects_option = $this->type_model->get_objects_option($o['id_objects'], $array_subcategory_criteria);
                    if ($objects_option) {
                        foreach ($objects_option as $v) {
                            if (strlen($v['id_subcategory_value_input']) > 0) {
                                $objects_all[$k][$v['id_subcategory']] = $v['id_subcategory_value_input'];
                            } else {
                                if (isset($objects[$k][$v['id_subcategory']])) {
                                    $objects_all[$k][$v['id_subcategory']] = ', ' . $v['value'];
                                } else {
                                    $objects_all[$k][$v['id_subcategory']] = $v['value'];
                                }
                            }
                            if($v['id_subcategory'] == 30){
                                $objects_all[$k]['type'] = $v['id_subcategory_value'];
                            }
//                            //If objects place on the page
//                            if (in_array($o['id_objects'], $list_active_objects)) {
//                                if (strlen($v['id_subcategory_value_input']) > 0) {
//                                    $objects_output[$o['id_objects']][$v['id_subcategory']] = $v['id_subcategory_value_input'];
//                                } else {
//                                    if (isset($objects_output[$o['id_objects']][$v['id_subcategory']])) {
//                                        $objects_output[$o['id_objects']][$v['id_subcategory']] = ', ' . $v['value'];
//                                    } else {
//                                        $objects_output[$o['id_objects']][$v['id_subcategory']] = $v['value'];
//                                    }
//                                }
//
//                            }
                        }
                    }
                }

                $objects_filtered = array();

                foreach ($objects_all as $v) {
                    $i = 0;
                    if (isset($data['price_max']) && isset($data['price_min'])) {
                        if (($data['price_min'] <= $v['29']) && ($v['29'] <= $data['price_max'])) {
                            $i++;
                        }
                    } elseif (isset($data['price_max'])) {
                        if ($data['price_max'] >= $v['29']) {
                            $i++;
                        }
                    } elseif (isset($data['price_min'])) {
                        if ($data['price_min'] <= $v['29']) {
                            $i++;
                        }
                    } else {
                        $i++;
                    }

                    if (isset($data['area_max']) && isset($data['area_min'])) {
                        if (($data['area_min'] <= $v['10']) && ($v['10'] <= $data['area_max'])) {
                            $i++;
                        }
                    } elseif (isset($data['area_max'])) {
                        if ($data['area_max'] >= $v['10']) {
                            $i++;
                        }
                    } elseif (isset($data['area_min'])) {
                        if ($data['area_min'] <= $v['10']) {
                            $i++;
                        }
                    } else {
                        $i++;
                    }

                    if (isset($data['home_max']) && isset($data['home_min'])) {
                        if (($data['home_min'] <= $v['9']) && ($v['9'] <= $data['home_max'])) {
                            $i++;
                        }
                    } elseif (isset($data['home_max'])) {
                        if ($data['home_max'] >= $v['9']) {
                            $i++;
                        }
                    } elseif (isset($data['home_min'])) {
                        if ($data['home_min'] <= $v['9']) {
                            $i++;
                        }
                    } else {
                        $i++;
                    }

                    if (isset($data['city']) && sizeof($data['city']) > 0) {
                        foreach ($data['city'] as $f => $g) {
                            if ($f == $v['city']) {
                                $i++;
                                break;
                            }
                        }
                    } else {
                        $i++;
                    }
                    if (isset($data['district']) && sizeof($data['district']) > 0) {
                        foreach ($data['district'] as $f => $g) {
                            if ($f == $v['district']) {
                                $i++;
                                break;
                            }
                        }
                    } else {
                        $i++;
                    }

                    if ($v['type'] != $ses_data) {
                        continue;
                    }

                    if ($i >= 5) {
                        $objects_filtered[] = $v;
                    }

                }

//                if($page > 1){
//                    $page--;
//                }

                $config["total_rows"] = sizeof($objects_filtered);

                $this->pagination->initialize($config);
                $this->data['filter'] = $sort_filter;
                $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                $this->session->set_userdata('objects', serialize($objects_all));
                $this->data['counts'] = $this->type_model->get_catalog_objects($object_type);
                $this->data["links"] = $this->pagination->create_links();
                $this->render('/web/catalog.php', $this->data);
                break;
            case 'land_area':

                break;
            case 'overseas_real_estate':

                break;
            case 'building':
                if ($id_obj) {
                    $data = $this->building_model->oneBuildingGet($id_obj);
                    $data['images'] = $this->building_model->buildingImgGet($data['id']);
                    $option['data'] = $data;

                    $this->render('web/building_advanced', $option);
                } else {
                    $data = $this->building_model->buildingGet();
                    foreach ($data as $key=>$value) {
                        $data[$key]['images'] = $this->building_model->buildingImgGet($data[$key]['id']);
                    }
                    $option['data'] = $data;
                    $this->render('web/building', $option);
                }
                break;
            default:
                $this->render('web/oops', false);
                break;
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */