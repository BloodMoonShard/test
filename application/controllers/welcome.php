<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends My_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->render('web/index', false);
    }

    public function search_header()
    {
        $this->load->model('search_model');
        $string = $this->input->post('search_query');
        if (strlen($string) > 0) {
            if (strlen((int)$string) == strlen($string)) {
                $result = $this->search_model->get_header_search('article', $string);
                if ($result > 0) {
                    redirect('/details/' . $result[0]['id_objects']);
                }
            } else {
                $data = unserialize($this->session->userdata($object_type));
                if(!$data){
                    $data = array();
                }

                $objects_all = $this->search_model->get_header_search('city', $string);
                //Get result per page

                $sort_filter = array();
                $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30);

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
                $this->render('/web/catalog.php', $this->data);
            }
        }
        redirect('/');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */