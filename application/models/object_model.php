<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Object_model extends My_Model{

    public $table_name = 'objects';
    public $primary_key = 'id_objects';


    function delete_object($id){
        $this->db->delete($this->table_name, array('id_objects'=>$id));
        return $this->db->delete('objects_options', array('id_objects'=>$id));
    }

    function get_details($id){
        $this->db->select('*, subcategory.name as subcatname, subcategory.public as public');
        $this->db->from('objects_options');
        $this->db->join('subcategory', 'objects_options.id_subcategory=subcategory.id_subcategory');
        $this->db->join('subcategory_value', 'objects_options.id_subcategory_value=subcategory_value.id_subcategory_value');
        $this->db->join('category', 'category.id_category=subcategory.parent');
        $this->db->where('inner_parent', 0);
        $this->db->where('category.public', 1);
        $this->db->where('subcategory.public', 1);
        $this->db->where('objects_options.id_objects', $id);
        $this->db->order_by('category.sortable');
        $this->db->order_by('subcategory.sortable');
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function get_object_price($id) {
        $this->db->from('objects_options');
        $this->db->select('id_subcategory_value_input');
        $this->db->where('id_objects', $id);
        $this->db->where('id_subcategory', 29);
        return $this->db->get()->row_array();
    }

    function get_one_object($id){
        $this->db->select('*, objects_type.name as type_object, highway.name as highway_name');
        $this->db->from('objects');
        $this->db->join('objects_type', 'objects.type=objects_type.id_objects_type', 'left');
        $this->db->join('highway', 'highway.id_highway=objects.highway_list', 'left');
        $this->db->where('id_objects', $id);
        return $this->db->get()->row_array();
    }

    function get_objects($where, $id = false){
        $this->db->select('*, objects_type.name as type_object, highway.name as highway_name');
        $this->db->from('objects');
        $this->db->join('objects_type', 'objects.type=objects_type.id_objects_type', 'left');
        $this->db->join('highway', 'highway.id_highway=objects.highway_list', 'left');
        $this->db->where($where);
        if($id){
            $this->db->where('id_objects !=', $id);
        }
        $this->db->limit(5,0);
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function get_status_options() {
        return $this->db->get('status_options')->result_array();
    }

    function get_objects_type_options() {
        return $this->db->get('objects_type')->result_array();
    }

    function update_object_order($id_object, $post) {
        $this->db->where('id_objects', $id_object);

        if (isset($post['order_flag'])) {
            $this->db->set('order_flag', $post['order_flag']);
        }
        if (isset($post['order_date'])) {
            $this->db->set('order_date', $post['order_date']);
        }
        if (isset($post['performer'])) {
            $this->db->set('performer', $post['performer']);
        }

        $this->db->set('buyer', $post['buyer']);
        $this->db->set('buyer_email', $post['buyer_email']);
        $this->db->set('buyer_phone', $post['buyer_phone']);
        $this->db->set('additional_info', $post['additional_info']);
        $this->db->set('comment', $post['comment']);
//        $this->db->set('status_obj', $post['status_obj']);
        $this->db->set('comment', $post['comment']);
        return $this->db->update('objects');
    }

    function getUsername($id_users) {
        $this->db->where('id_users', $id_users);
        $this->db->select('username');
        return $this->db->get('users')->row_array();
    }

    function get_all_objects_v2() {
        if ($this->auth->get_user_role()==4) {
            $agents_id = '';
            $this->load->model('users_model');
            $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
            $agents_list = array_unique($agents_list);
            foreach ($agents_list as $a) {
                $agents_id[] = $a['id_agent'];
            }
            $agents_id[] = $this->auth->get_user_id();
            $this->db->where_in('id_users', $agents_id);
        }

        if ($this->auth->get_user_role()==3) {
            $this->db->where('id_users', $this->auth->get_user_id());
        }
        $this->db->order_by('date_add', 'desc');
        return $this->db->get('objects')->result_array();
    }

    function get_objects_by_options_v2($post) {
        $this->db->from('objects');
        if (isset($post['id_objects'])) {
            $this->db->where('id_objects', $post['id_objects']);
        }
        if (isset($post['article'])) {
            $this->db->where('article', $post['article']);
        }
        if (isset($post['city'])) {
            $this->db->like('city', $post['city'], 'both');
        }

        if (isset($post['users_obj'])) {
            var_dump($post['users_obj']);
            $this->db->where('id_users', $post['users_obj']);
        } else {
            if ($this->auth->get_user_role() == 4) {
                $agents_id = '';
                $this->load->model('users_model');
                $agents_list = $this->users_model->getMyAgents($this->auth->get_user_id());
                $agents_list = array_unique($agents_list);
                foreach ($agents_list as $a) {
                    $agents_id[] = $a['id_agent'];
                }
                $agents_id[] = $this->auth->get_user_id();
                $this->db->from('objects');
                $this->db->where_in('id_users', $agents_id);
            }
        }


        if ($this->auth->get_user_role()==3) {
            $this->db->where('id_users', $this->auth->get_user_id());
        }

        if (isset($post['type_object'])) {
            $this->db->where('type', $post['type_object']);
        }

        if (isset($post['status_obj'])) {
            $this->db->where('status_obj', $post['status_obj']);
        }

        if (isset($post['search_sort'])) {
            switch ($post['search_sort']) {
                case 'sort_status':
                    $this->db->order_by('status_obj', 'asc');
                    break;
            }
        }

        if (isset($post['date_sort_begin'])) {
            $this->db->where('order_date >= ', $post['date_sort_begin']);
        }
        if (isset($post['date_sort_end'])) {
            $this->db->where('order_date <= ', $post['date_sort_end']);
        }

        return $this->db->get()->result_array();
    }
}