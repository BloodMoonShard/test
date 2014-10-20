<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends My_Model{

    function get_header_search($type,$data){
        if($type == 'city'){
            $this->db->like($type, ucfirst($data), 'both');
        }else{
            $this->db->from('objects');
            $this->db->join('objects_type', 'objects.type = objects_type.id_objects_type');
            $this->db->join('objects_options', 'objects_options.id_objects = objects.id_objects');
            $this->db->select('objects.id_objects, objects.name_object, objects.city, objects.region, objects.district');
            $this->db->where($type,$data);
            $this->db->group_by('objects.id_objects');
            $this->db->order_by('objects.date_add', 'DESC');
            $result= $this->db->get();
            if($result->num_rows() > 0){
                return $result->result_array();
            }
            return false;
        }
        $result = $this->db->get('objects');
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function get_criteria_filter($list_id, $list_category = false){
        $this->db->select('objects.id_objects, objects.name_object, objects.city, objects.region, objects.district, objects_options.id_subcategory_value, objects_options.id_subcategory_value_input, objects_options.id_subcategory');
        $this->db->from('objects_options');
        $this->db->join('objects', 'objects_options.id_objects = objects.id_objects', 'left');
        $this->db->join('objects_type', 'objects.type = objects_type.id_objects_type', 'left');
        $this->db->where_in('objects.id_objects', $list_id);
        if($list_category){
            $this->db->where_in('objects_options.id_subcategory', $list_category);
        }
//        if($sort){
//            $this->db->where('objects_options.id_subcategory_value', $sort);
//        }
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }



}