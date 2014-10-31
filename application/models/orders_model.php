<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends My_Model{

    function get_all_orders() {
        if ($this->auth->get_user_role()==4) {
            $agents_id = '';
            $this->load->model('users_model');
            $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
            foreach ($agents_list as $a) {
                $agents_id[] = $a['id_agent'];
            }
            $agents_id[] = $this->auth->get_user_id();
            $this->db->where_in('id_users', $agents_id);
        }

        if ($this->auth->get_user_role()==3) {
            $this->db->where('id_users', $this->auth->get_user_id());
        }


        $this->db->where('order_flag', 1);
        $this->db->order_by('order_date', 'desc');
        return $this->db->get('objects')->result_array();
    }

    function get_orders_by_options($post) {
        $this->db->from('objects');
        $this->db->where('order_flag', 1);
        if (isset($post['id_objects'])) {
            $this->db->where('id_objects', $post['id_objects']);
        }
        if (isset($post['article'])) {
            $this->db->where('article', $post['article']);
        }
        if (isset($post['buyer'])) {
            $this->db->like('buyer', $post['buyer'], 'both');
        }
        if (isset($post['buyer_phone'])) {
            $this->db->like('buyer_phone', $post['buyer_phone'], 'both');
        }

        if ($this->auth->get_user_role()==4) {
            $agents_id = '';
            $this->load->model('users_model');
            $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
            foreach ($agents_list as $a) {
                $agents_id[] = $a['id_agent'];
            }
            $agents_id[] = $this->auth->get_user_id();
            $this->db->where_in('id_users', $agents_id);
        }

        if ($this->auth->get_user_role()==3) {
            $this->db->where('id_users', $this->auth->get_user_id());
        }


//        if (isset($post['status_obj'])) {
//            $this->db->where('status_obj', $post['status_obj']);
//        }

        if (isset($post['search_sort'])) {
            switch ($post['search_sort']) {
                case 'sort_status':
                    $this->db->order_by('status_obj', 'desc');
                    break;
            }
        }
        if (isset($post['date_sort_begin'])) {
            $this->db->where('order_date >= ', $post['date_sort_begin']);
        }
        if (isset($post['date_sort_end'])) {
            $this->db->where('order_date <= ', $post['date_sort_end']);
        }
        if (isset($post['type_object'])) {
            $this->db->where('type', $post['type_object']);
        }

        return $this->db->get()->result_array();
    }
}