<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Object_options_model extends My_Model{

    public $table_name = 'objects_options';
    public $primary_key = 'id_objects_options';


    function object_value($id){
        $this->db->where('id_objects', $id);
        $result = $this->db->get($this->table_name);
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function object_value_rm_all($id){
        $this->db->where('id_objects', $id);
        return $this->db->delete($this->table_name);
    }
}