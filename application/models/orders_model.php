<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends My_Model{

    function get_all_orders() {
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
            $this->db->where('buyer', $post['buyer']);
        }
        if (isset($post['buyer_phone'])) {
            $this->db->where('buyer_phone', $post['buyer_phone']);
        }
        if (isset($post['status_obj'])) {
            $this->db->where('status_obj', $post['status_obj']);
        }
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