<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory_value_model extends My_Model{

    public $table_name = 'subcategory_value';
    public $primary_key = 'id_subcategory_value';
    public $sortable = 'sortable';
    public $type_sort = 'ASC';

    function get_list_sub_category_value(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('subcategory', 'subcategory.id_subcategory='.$this->table_name.'.id_subcategory');
        $this->db->where('inner_parent', 0);
        $this->db->order_by($this->table_name.'.id_subcategory', $this->type_sort);
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

}