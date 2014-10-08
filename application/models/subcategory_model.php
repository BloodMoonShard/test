<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory_model extends My_Model{

    public $table_name = 'subcategory';
    public $primary_key = 'id_subcategory';
    public $sortable = 'sortable';
    public $type_sort = 'ASC';

    function get_list_sub_category(){
        $this->db->select('*, subcategory.name as subcatname, subcategory.public as public');
        $this->db->from($this->table_name);
        $this->db->join('category', 'category.id_category=subcategory.parent');
        $this->db->where('inner_parent', 0);
        $this->db->order_by('subcategory.'.$this->sortable, $this->type_sort);
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

}