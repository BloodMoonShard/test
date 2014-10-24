<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends My_Controller
{

    public $data;

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
    public function change_count()
    {
        $this->session->set_userdata('per_page', $this->input->post('per_page'));
        echo json_encode(array('status' => true));
    }

    public function change_type()
    {

        $ses_data = $this->session->userdata('sort');
        if (!isset($ses_data)) {
            $sort = 49;
        } else {
            if ($ses_data == 49) {
                $sort = 48;
            } else {
                $sort = 49;
            }
        }
        $link = $this->input->post('link');
        $link_explode = explode(':/', $link);
        $link_explode = explode('/', $link_explode[1]);
        $link_explode = array_reverse($link_explode);
        if ((int)$link_explode[0]) {
            unset($link_explode[0]);
        }
        $this->session->set_userdata('sort', $sort);
        echo json_encode(array('status' => true, 'link' => '/' . implode('/', array_reverse($link_explode))));
    }

    public function filter($type)
    {
        $this->load->model('type_model');
        $this->load->library('pagination');

        $ses_data = $this->session->userdata('sort');
        if (!$ses_data) {
            $ses_data = 49;
        }
        $this->session->set_userdata('sort', $ses_data);

        $config["base_url"] = base_url() . "type/$type";
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

//        $this->session->set_userdata($type, array());
        $data = @unserialize($this->session->userdata($type));
//        var_dump($data);
        switch ($type) {
            case 'house':
                foreach ($_POST as $k => $p) {
                    switch ($k) {
                        case 'district':
                            if (isset($data[$k][$p])) {
                                unset($data[$k][$p]);
                            } else {
                                $data[$k][$p] = 1;
                            }
                            break;
                        case 'city':
                            if (isset($data[$k][$p])) {
                                unset($data[$k][$p]);
                            } else {
                                $data[$k][$p] = 1;
                            }
                            break;
                        case 'home_min':
                            $data['home_min'] = $p;
                            break;
                        case 'home_max':
                            $data['home_min'] = $p;
                            break;
                        case 'price_min':
                            $data['price_min'] = $p;
                            break;
                        case 'price_max':
                            $data['price_max'] = $p;
                            break;
                        case 'area_min':
                            $data['area_min'] = $p;
                            break;
                        case 'area_max':
                            $data['area_max'] = $p;
                            break;
                    }
                }
                break;
            case 'search':
                foreach ($_POST as $k => $p) {
                    switch ($k) {
                        case 'district':
                            if (isset($data[$k][$p])) {
                                unset($data[$k][$p]);
                            } else {
                                $data[$k][$p] = 1;
                            }
                            break;
                        case 'city':
                            if (isset($data[$k][$p])) {
                                unset($data[$k][$p]);
                            } else {
                                $data[$k][$p] = 1;
                            }
                            break;
                        case 'home_min':
                            $data['home_min'] = $p;
                            break;
                        case 'home_max':
                            $data['home_min'] = $p;
                            break;
                        case 'price_min':
                            $data['price_min'] = $p;
                            break;
                        case 'price_max':
                            $data['price_max'] = $p;
                            break;
                        case 'area_min':
                            $data['area_min'] = $p;
                            break;
                        case 'area_max':
                            $data['area_max'] = $p;
                            break;
                    }
                }
                break;
        }
        $this->session->set_userdata($type, serialize($data));
        $data = unserialize($this->session->userdata($type));
        switch ($type) {
            case 'house':
                //Get total counts
                $objects = unserialize($this->session->userdata('objects'));
                $objects_filtered = array();

                $count_valid = 0;

                foreach ($objects as $v) {
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
                //Get result per page
//                $objects = $this->type_model->get_catalog_objects_per_page($type, $ses_data, 0, $config["per_page"]);

                $this->pagination->initialize($config);
                $this->data['objects'] = array_slice($objects_filtered, 0, $config["per_page"]);
                $this->data['counts'] = $this->type_model->get_catalog_objects($type);
                $this->data["links"] = $this->pagination->create_links();
                //Load img
                $this->load->model('common_model');
                foreach ($this->data['objects'] as $key=>$value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }
                $content = $this->load->view('web/catalog_items', $this->data, true);
                break;
            case 'land_area':

                break;
            case 'overseas_real_estate':

                break;
            case 'legal_services':

                break;
            case 'credit_broker':

                break;
            case 'search':
                $config["base_url"] = base_url() . "search";
                $config["per_page"] = $this->session->userdata('per_page');
                $config["uri_segment"] = 2;
                //Get total counts
                $objects = unserialize($this->session->userdata('objects'));
                $objects_filtered = array();

                $count_valid = 0;

                foreach ($objects as $v) {
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
                        $objects_filtered[] = $v;
                    }

                }

                $config["total_rows"] = sizeof($objects_filtered);
                //Get result per page
//                $objects = $this->type_model->get_catalog_objects_per_page($type, $ses_data, 0, $config["per_page"]);
                $this->pagination->initialize($config);
                $this->data['objects'] = array_slice($objects_filtered, 0, $config["per_page"]);
                $this->data['counts'] = $this->type_model->get_catalog_objects($type);
                $this->data["links"] = $this->pagination->create_links();
                //Load img
                $this->load->model('common_model');
                foreach ($this->data['objects'] as $key=>$value) {
                    $this->data['objects'][$key]['ob_images'] = $this->common_model->objectsImgGet($this->data['objects'][$key]['id_objects']);
                }
                $content = $this->load->view('web/catalog_items', $this->data, true);
                break;
            default:
                $this->render('web/oops', false);
                break;
        }
        echo json_encode(array('content' => $content, 'size' => sizeof($this->data['objects'])));

    }

    function comparison() {
        $post = $this->input->post();
        $id = $post['id'];
        $flag = $post['flag'];

        if (!$this->session->userdata('comparison')) {
            $this->session->set_userdata('comparison', array());
        }
        $session_data = $this->session->userdata('comparison');
        if ($flag ==  1) { /* $flag = 0 - убрать из сравнения; $flag = 1 - добавить в сравнение */
            $session_data[$id] = $id;
        } else {
            unset($session_data[$id]);
        }
        $this->session->set_userdata('comparison', $session_data);
        $session = $this->session->userdata('comparison');
        echo json_encode(array('status'=>'true', 'size'=> sizeof($session_data)));
    }

    function unset_comparison() {
        $post = $this->input->post();
        $id = $post['id'];
        $session_data = $this->session->userdata('comparison');
        unset($session_data[$id]);
        $this->session->set_userdata('comparison', $session_data);
        echo json_encode(array('status'=>'true'));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */