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
}