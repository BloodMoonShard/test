<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Highway_model extends My_Model{

    public $table_name = 'highway';
    public $primary_key = 'id_highway';
    public $sortable = 'name';
    public $type_sort = 'ASC';

    function get_list_highway($id = false){
        $this->db->select('*, highway_direction.name as highway_direction_name, highway.name as highway_name');
        $this->db->from('highway');
        $this->db->join('highway_direction', 'highway_direction.id_highway_direction=highway.id_highway_direction', 'left');
        $result = $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

}