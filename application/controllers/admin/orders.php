<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends My_Controller {

    private $status;
    private $msg;

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id() && !$this->auth->check_rule()){
            redirect('/login');
        }
        $this->load->model('orders_model');
        $this->load->model('object_model');
    }

    public function index() {
        $data['status_options'] = $this->object_model->get_status_options();
        $data['objects_type_options'] = $this->object_model->get_objects_type_options();
        $post = $this->input->post();
        if ($post) {
            $post['date_sort_begin'] = strtotime($post['date_sort_begin']);
            $post['date_sort_end'] = strtotime($post['date_sort_end']);
            if (strlen($post['id_objects'])==0) {
                unset($post['id_objects']);
            }
            if (strlen($post['article'])==0) {
                unset($post['article']);
            }
            if (strlen($post['buyer'])==0) {
                unset($post['buyer']);
            }
            if (strlen($post['buyer_phone'])==0) {
                unset($post['buyer_phone']);
            }
            if (strlen($post['status_obj'])==0) {
                unset($post['status_obj']);
            }
            if (strlen($post['search_sort'])==0) {
                unset($post['search_sort']);
            }
            if ($post['date_sort_begin'] == false) {
                unset($post['date_sort_begin']);
            }
            if ($post['date_sort_end'] == false) {
                unset($post['date_sort_end']);
            }
            if (strlen($post['type_object'])==0) {
                unset($post['type_object']);
            }

            if (sizeof($post) == 0) {
                $data['result'] = $this->orders_model->get_all_orders();
                $this->session->unset_userdata('search_result');
                $this->session->set_userdata('search_result', $data['result'] );

                $this->session->unset_userdata('options_s');
                $this->session->set_userdata('options_s', $post);
            } else {
                $data['result'] = $this->orders_model->get_orders_by_options($post);
                $this->session->unset_userdata('search_result');
                $this->session->set_userdata('search_result', $data['result'] );

                $this->session->unset_userdata('options_s');
                $this->session->set_userdata('options_s', $post);
            }
        }
        $this->render_adm('/admin/user_orders_view.php', $data);
    }

    public function clear_ses_search() {
        $this->session->unset_userdata('options_s');
        $this->session->unset_userdata('search_result');
        redirect('/admin/orders', 'refresh');
    }


}