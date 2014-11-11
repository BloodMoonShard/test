<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Model extends CI_Model{

    function get_element($id = false, $role_id = false, $order_by = false, $per_page = false, $page = false){
        if($id){
            $this->db->where($this->primary_key, $id);
            $result = $this->db->get($this->table_name);
            if($result->num_rows() > 0){
                return $result->row_array();
            }else{
                return false;
            }
        }else{
            if($order_by) {
                $this->db->order_by('date_add', $order_by);
            }

            if(isset($this->sortable)){
                if(!isset($this->type_sort)){
                    $this->type_sort = 'ASC';
                }
                $this->db->order_by($this->sortable, $this->type_sort);
            }
            if ($role_id) {
                if (is_array($role_id)) {
                    $this->db->where_in('id_users', $role_id);
                } else {
                    $this->db->where('id_users', $role_id);
                }
            }

            if (($per_page!=false) && (($page!=false)||($page==0))) {
                $this->db->limit($per_page, $page);
            }

            $result = $this->db->get($this->table_name);
            if($result->num_rows() > 0){
                return $result->result_array();
            }else{
                return false;
            }
        }
    }

    function get_result($data){
        $this->db->where($data);
        if(isset($this->sortable)){
            if(!isset($this->type_sort)){
                $this->type_sort = 'ASC';
            }
            $this->db->order_by($this->sortable, $this->type_sort);
        }
        $result = $this->db->get($this->table_name);
        if($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return false;
        }
    }

    function set_element($data){
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function edit_element($id, $data){
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    function delete_element($id){
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }

}