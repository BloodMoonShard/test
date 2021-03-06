<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Type extends My_Controller
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->model('type_model');
        $this->load->model('building_model');
        $this->load->model('common_model');
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
                $data = unserialize($this->session->userdata($object_type));
                if (!$data) {
                    $data = array();
                }

                $objects_all = $this->type_model->get_catalog_objects_per_page($object_type, false, false, false);
                //Get result per page

                $sort_filter = array();
                $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30, 32);

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
                            if ($v['id_subcategory'] == 30) {
                                $objects_all[$k]['type'] = $v['id_subcategory_value'];
                            }

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


                $config["total_rows"] = sizeof($objects_filtered);
                $this->pagination->initialize($config);
                $this->data['filter'] = $sort_filter;
                $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                $this->session->set_userdata('objects', serialize($objects_all));
                $this->data['counts'] = $this->type_model->get_catalog_objects($object_type);
                $this->data["links"] = $this->pagination->create_links();

                foreach ($this->data['objects'] as $key => $value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }

                $this->render('/web/catalog.php', $this->data);
                break;

            case 'land_area':
                $data = unserialize($this->session->userdata($object_type));
                if (!$data) {
                    $data = array();
                }

                $objects_all = $this->type_model->get_catalog_objects_per_page($object_type, false, false, false);
                //Get result per page

                $sort_filter = array();
                $array_subcategory_criteria = array(10, 28, 29, 31, 30, 32);

                //Start Left block filter generate
                $filter = $this->type_model->get_criteria_filter($object_type, array(10, 29), $ses_data);
                $list_parsed_id_object = array();
                foreach ($filter as $v) {
                    if (!in_array($v['id_objects'], $list_parsed_id_object)) {
                        if (strlen($v['district']) > 0) {
                            @$sort_filter['district'][$v['district']] += 1;
                        }
                        if (strlen($v['city']) > 0) {
                            @$sort_filter['city'][$v['city']] += 1;
                        }
                        if (strlen($v['highway_list']) > 0) {
                            @$sort_filter['highway_list'][$v['id_highway']] += 1;
                            @$sort_filter['highway_name'][$v['id_highway']] = $v['highway_name'];
                        }
                        $list_parsed_id_object[] = $v['id_objects'];
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
                            if ($v['id_subcategory'] == 30) {
                                $objects_all[$k]['type'] = $v['id_subcategory_value'];
                            }

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
                    if (isset($data['highway_list']) && sizeof($data['highway_list']) > 0) {
                        foreach ($data['highway_list'] as $f => $g) {
                            if ($f == $v['highway_list']) {
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

                $config["total_rows"] = sizeof($objects_filtered);
                $this->pagination->initialize($config);
                $this->data['filter'] = $sort_filter;
                $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                $this->session->set_userdata('objects', serialize($objects_all));
                $this->data['counts'] = $this->type_model->get_catalog_objects($object_type);
                $this->data["links"] = $this->pagination->create_links();

                foreach ($this->data['objects'] as $key => $value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }
                $this->render('/web/catalog_land_area.php', $this->data);
                break;
            case 'room':
                $data = unserialize($this->session->userdata($object_type));
                if (!$data) {
                    $data = array();
                }
                $objects_all = $this->type_model->get_catalog_objects_per_page($object_type, false, false, false);
                //Get result per page
                $sort_filter = array();
                $array_subcategory_criteria = array(9, 29, 31, 30, 32, 33);

                //Start Left block filter generate
                $filter = $this->type_model->get_criteria_filter($object_type, array(9, 29), $ses_data);
                $list_parsed_id_object = array();
                foreach ($filter as $v) {
                    if (!in_array($v['id_objects'], $list_parsed_id_object)) {
                        if (strlen($v['city']) > 0) {
                            @$sort_filter['city'][$v['city']] += 1;
                        }
                        if (strlen($v['underground']) > 0) {
                            @$sort_filter['underground'][$v['id_underground']] += 1;
                            @$sort_filter['underground_name'][$v['id_underground']] = $v['underground'];
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
                            if ($v['id_subcategory'] == 30) {
                                $objects_all[$k]['type'] = $v['id_subcategory_value'];
                            }

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
                    if (isset($data['underground']) && sizeof($data['underground']) > 0) {
                        foreach ($data['underground'] as $f => $g) {
                            if ($f == $v['underground']) {
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

                    if ($i >= 4) {
                        $objects_filtered[] = $v;
                    }
                }
                $config["total_rows"] = sizeof($objects_filtered);
                $this->pagination->initialize($config);
                $this->data['filter'] = $sort_filter;
                $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                $this->session->set_userdata('objects', serialize($objects_all));
                $this->data['counts'] = $this->type_model->get_catalog_objects($object_type);
                $this->data["links"] = $this->pagination->create_links();

                foreach ($this->data['objects'] as $key => $value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }
                $this->render('/web/catalog_room.php', $this->data);
                break;

            case 'real_estate':
                $data = unserialize($this->session->userdata($object_type));
                if (!$data) {
                    $data = array();
                }

                $objects_all = $this->type_model->get_catalog_objects_per_page($object_type, false, false, false);
                //Get result per page

                $sort_filter = array();
                $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30, 32);

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
                            if ($v['id_subcategory'] == 30) {
                                $objects_all[$k]['type'] = $v['id_subcategory_value'];
                            }

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


                $config["total_rows"] = sizeof($objects_filtered);
                $this->pagination->initialize($config);
                $this->data['filter'] = $sort_filter;
                $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                $this->session->set_userdata('objects', serialize($objects_all));
                $this->data['counts'] = $this->type_model->get_catalog_objects($object_type);
                $this->data["links"] = $this->pagination->create_links();

                foreach ($this->data['objects'] as $key => $value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }
                $this->render('/web/catalog_real_estate.php', $this->data);
                break;
            case 'overseas_real_estate':
                $data = unserialize($this->session->userdata($object_type));
                if (!$data) {
                    $data = array();
                }

                $objects_all = $this->type_model->get_catalog_objects_per_page($object_type, false, false, false);
                //Get result per page

                $sort_filter = array();
                $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30, 32);

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
                            if ($v['id_subcategory'] == 30) {
                                $objects_all[$k]['type'] = $v['id_subcategory_value'];
                            }

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

                $config["total_rows"] = sizeof($objects_filtered);
                $this->pagination->initialize($config);
                $this->data['filter'] = $sort_filter;
                $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                $this->session->set_userdata('objects', serialize($objects_all));
                $this->data['counts'] = $this->type_model->get_catalog_objects($object_type);
                $this->data["links"] = $this->pagination->create_links();

                foreach ($this->data['objects'] as $key => $value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }
                $this->render('/web/catalog_overseas_real_estate.php', $this->data);
                break;
            case 'building':
                if ($id_obj) {
                    $data = $this->building_model->oneBuildingGet($id_obj);
                    $data['images'] = $this->building_model->buildingImgGet($data['id']);
                    $option['data'] = $data;

                    $this->render('web/building_advanced', $option);
                } else {
                    $data = $this->building_model->buildingGet();
                    foreach ($data as $key => $value) {
                        $data[$key]['images'] = $this->building_model->buildingImgGet($data[$key]['id']);
                    }
                    $option['data'] = $data;
                    $this->render('web/building', $option);
                }
                break;

            case 'search_func':
                $this->load->model('search_model');
                $string = $this->input->post('search_query');
                if ((strlen((int)$string) == strlen($string)) && (strlen($string) > 0)) {
                    $result = $this->search_model->get_header_search('article', $string);
                    if ($result > 0) {
                        redirect('/details/' . $result[0]['id_objects']);
                    }
                } else {
                    $data = unserialize($this->session->userdata($object_type));
                    if (!$data) {
                        $data = array();
                    }
                    if ($string) {
                        $objects_all = $this->type_model->get_catalog_objects_per_page_search_version($string, false, false, false);
                    }else {
                        $objects_all = $this->session->userdata('objects');
                        $objects_all = unserialize($objects_all);
                    }


                    //Get result per page

                    $sort_filter = array();
                    $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30, 32);

                    //Start Left block filter generate
                    $filter = $this->type_model->get_criteria_filter_search_version($string, array(9, 10, 29), $ses_data);
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
                                if ($v['id_subcategory'] == 30) {
                                    $objects_all[$k]['type'] = $v['id_subcategory_value'];
                                }

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

                    $config["total_rows"] = sizeof($objects_filtered);
                    $this->pagination->initialize($config);
                    $this->data['filter'] = $sort_filter;
                    $this->data['objects'] = array_slice($objects_filtered, $page, $config["per_page"]);
                    $this->session->set_userdata('objects', serialize($objects_all));
                    $this->data['counts'] = $this->type_model->get_catalog_objects_search_version($string);
                    $this->data["links"] = $this->pagination->create_links();

                    foreach ($this->data['objects'] as $key => $value) {
                        $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                    }
                    $this->render('/web/catalog_search_result.php', $this->data);
                    break;
                }


            default:
                $this->render('web/oops', false);
                break;
        }

    }


    public function details($id)
    {
        $this->load->model('object_model');
        $result = $this->object_model->get_one_object($id);
        $near_object = $this->object_model->get_objects(array('district' => $result['district']), $result['id_objects']);
        $content = '<div class="row clearfix">';
        $info = array();
        $counts = 1;
        if ($data = $this->object_model->get_details($id)) {
            $old_category = "";
            foreach ($this->object_model->get_details($id) as $v) {
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
        if ($near_object) {
            foreach ($near_object as $k => $v) {
                $objects_option = $this->type_model->get_objects_option($v['id_objects'], $array_subcategory_criteria);
                if ($objects_option) {
                    foreach ($objects_option as $v) {
                        if (strlen($v['id_subcategory_value_input']) > 0) {
                            $near_object[$k][$v['id_subcategory']] = $v['id_subcategory_value_input'];
                        } else {
                            if (isset($result[$v['id_subcategory']])) {
                                $near_object[$k][$v['id_subcategory']] = ', ' . $v['value'];
                            } else {
                                $near_object[$k][$v['id_subcategory']] = $v['value'];
                            }
                        }
                        if ($v['id_subcategory'] == 30) {
                            $near_object[$k]['type'] = $v['id_subcategory_value'];
                        }
                    }
                }
            }
            $this->data['near_object'] = $near_object;
        }
        $content .= "</div>";
        $this->data['result'] = $result;
        $this->data['result']['ob_images'] = $this->common_model->objectsImgGet($this->data['result']['id_objects']);
        $this->data['content'] = $content;

        switch ($result['type']) {
            case '3':
                $this->render('/web/item_card_overseas_real_estate', $this->data);
                break;
            case '8':
                $this->render('/web/item_card_real_estate', $this->data);
                break;
            default:
                $this->render('/web/item_card', $this->data);
        }

    }

    function search()
    {
        var_dump($_POST);
        die();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */