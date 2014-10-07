<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Model extends CI_Model{

    function get_element($id = false){
        if($id){
            $this->db->where($this->primary_key, $id);
            $result = $this->db->get($this->table_name);
            if($result->num_rows() > 0){
                return $result->row_array();
            }else{
                return false;
            }
        }else{
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