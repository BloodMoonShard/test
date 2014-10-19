<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->load->model('type_model');

        $config["base_url"] = base_url() . "search";
        $config["per_page"] = $this->session->userdata('per_page');
        $config["uri_segment"] = 2;
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

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        if(!$this->input->post()){
            $data = unserialize($this->session->userdata('search_post'));
            if(!$data){
                $data = array();
            }
        }else{
            $data = $this->input->post();
            foreach($data as $k=>$vl){
                if($vl == ''){
                    unset($data[$k]);
                }
            }
            $this->session->set_userdata('search_post', serialize($data));
            $this->session->set_userdata('search', array());
        }


        $list_results = array();
        $object_finded = array();



        //get list by type
        if(sizeof($data['type']) > 0){
            if(sizeof($this->input->post('type')) > 0){
                $this->db->where_in('type', $data['type']);
            }
            if(sizeof($data['highway_list']) > 0){
                $this->db->where_in('highway_list', $data['highway_list']);
            }
            $list_results = $this->db->get('objects')->result_array();
        }
        $array_subcategory_criteria = array(9, 10, 28, 29, 31, 30, 32);

        //Get attr for every object
        foreach ($list_results as $k => $o) {
            $objects_option = $this->type_model->get_objects_option($o['id_objects'], $array_subcategory_criteria);
            if ($objects_option) {
                foreach ($objects_option as $v) {
                    if (strlen($v['id_subcategory_value_input']) > 0) {
                        $list_results[$k][$v['id_subcategory']] = $v['id_subcategory_value_input'];
                    } else {
                        if (isset($list_results[$k][$v['id_subcategory']])) {
                            $list_results[$k][$v['id_subcategory']] = ', ' . $v['value'];
                        } else {
                            $list_results[$k][$v['id_subcategory']] = $v['value'];
                        }
                    }
                    if($v['id_subcategory'] == 30){
                        $list_results[$k][$v['id_subcategory']] = $v['id_subcategory_value'];
                    }

                }
            }
        }

        //Search
        foreach ($list_results as $k=>$v) {
            $i = 0;
            if (isset($data['29_max']) && isset($data['29_min'])) {
                if (($data['29_min'] <= $v['29']) && ($v['29'] <= $data['29_max'])) {
                    $i++;
                }
            } elseif (isset($data['29_max'])) {
                if ($data['29_max'] >= $v['29']) {
                    $i++;
                }
            } elseif (isset($data['29_min'])) {
                if ($data['29_min'] <= $v['29']) {
                    $i++;
                }
            } else {
                $i++;
            }

            if (isset($data['28_max']) && isset($data['28_min'])) {
                if (($data['28_min'] <= @$v['28']) && (@$v['28'] <= $data['28_max'])) {
                    $i++;
                }
            } elseif (isset($data['28_max'])) {
                if ($data['28_max'] >= $v['28']) {
                    $i++;
                }
            } elseif (isset($data['28_min'])) {
                if ($data['28_min'] <= $v['28']) {
                    $i++;
                }
            } else {
                $i++;
            }

            if (isset($data['10_max']) && isset($data['10_min'])) {
                if (($data['10_min'] <= $v['10']) && ($v['10'] <= $data['10_max'])) {
                    $i++;
                }
            } elseif (isset($data['10_max'])) {
                if ($data['10_max'] >= $v['10']) {
                    $i++;
                }
            } elseif (isset($data['10_min'])) {
                if ($data['10_min'] <= $v['10']) {
                    $i++;
                }
            } else {
                $i++;
            }

            if (isset($data['9_max']) && isset($data['9_min'])) {
                if (($data['9_min'] <= $v['9']) && ($v['9'] <= $data['9_max'])) {
                    $i++;
                }
            } elseif (isset($data['9_max'])) {
                if ($data['9_max'] >= $v['9']) {
                    $i++;
                }
            } elseif (isset($data['9_min'])) {
                if ($data['9_min'] <= $v['9']) {
                    $i++;
                }
            } else {
                $i++;
            }

            if(isset($v['30'])){
                if($v['30'] == $data['30']){
                    $i++;
                }
            }else{
                $i++;
            }

            if ($i >= 5) {
                $object_finded[] = $v;
            }
        }

        //Generate value for filter
        $sort_filter = array();
        $list_parsed_id_object = array();
        foreach($object_finded as $v){
            if (!in_array($v['id_objects'], $list_parsed_id_object)) {
                if (strlen($v['district']) > 0) {
                    @$sort_filter['district'][$v['district']] += 1;
                }
                if (strlen($v['city']) > 0) {
                    @$sort_filter['city'][$v['city']] += 1;
                }
                $list_parsed_id_object[] = $v['id_objects'];
            }

            if (@$sort_filter['max_home'] < $v['9']) {
                @$sort_filter['max_home'] = $v['9'];
            }
            if (!isset($sort_filter['min_home']) || @$sort_filter['min_home'] > $v['9']) {
                @$sort_filter['min_home'] = $v['9'];
            }
            if (@$sort_filter['max_area'] < $v['10']) {
                @$sort_filter['max_area'] = $v['10'];
            }
            if (!isset($sort_filter['min_area']) || @$sort_filter['min_area'] > $v['10']) {
                @$sort_filter['min_area'] = $v['10'];
            }
            if (@$sort_filter['max_price'] < $v['29']) {
                @$sort_filter['max_price'] = $v['29'];
            }
            if (!isset($sort_filter['min_price']) || @$sort_filter['min_price'] > $v['29']) {
                @$sort_filter['min_price'] = $v['29'];
            }
        }

//        FILTER
        $data = unserialize($this->session->userdata('search'));
        $xz = array();
        if($data){
            //Filter if issue
            foreach ($object_finded as $v) {
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


                if ($i >= 5) {
                    $xz[] = $v;
                }

            }
//            $object_finded = $xz;
        }

        if(sizeof($xz) > 0){
            $config["total_rows"] = sizeof($xz);
            $this->data['objects'] = array_slice($xz, $page, $config["per_page"]);


        }else{
            $config["total_rows"] = sizeof($object_finded);
            $this->data['objects'] = array_slice($object_finded, $page, $config["per_page"]);
        }
        $this->session->set_userdata('objects', serialize($object_finded));

//        $config["total_rows"] = sizeof($object_finded);
        $this->pagination->initialize($config);
        $this->data['filter'] = $sort_filter;
//        $this->data['objects'] = array_slice($object_finded, $page, $config["per_page"]);
        $this->data['counts'] = sizeof($object_finded);
        $this->data["links"] = $this->pagination->create_links();

        foreach ($this->data['objects'] as $key=>$value) {
            $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
        }
        $this->render('/web/search.php', $this->data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */