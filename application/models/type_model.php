<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_model extends My_Model{

    function get_catalog_objects($type, $sort = false){
        $this->db->select('objects.id_objects, objects.name_object, objects.city, objects.region, objects.district');
        $this->db->from('objects');
        $this->db->join('objects_type', 'objects.type = objects_type.id_objects_type', 'left');
        $this->db->join('objects_options', 'objects_options.id_objects = objects.id_objects', 'left');
        $this->db->where('objects_type.uri_name', $type);
        $this->db->group_by('objects.id_objects');
        if($sort){
            $this->db->where('objects_options.id_subcategory_value', $sort);
        }
        $result= $this->db->get();
        return $result->num_rows();
    }

    function get_catalog_objects_per_page($type, $sort = false, $page = false, $per_page = false){
        $this->db->from('objects');
        $this->db->join('objects_type', 'objects.type = objects_type.id_objects_type');
        $this->db->join('objects_options', 'objects_options.id_objects = objects.id_objects');
        $this->db->join('underground', 'objects.underground = underground.id_underground', 'left');
        $this->db->join('highway', 'objects.highway_list = highway.id_highway', 'left');
        $this->db->select('objects.id_objects, objects.name_object, objects.city, objects.region, objects.district, objects.underground as underground, underground.name_underground as name_underground, objects.street, objects.building, objects.highway_list, highway.name as highway_name, objects.city_id');
        $this->db->where('objects_type.uri_name', $type);
        $this->db->group_by('objects.id_objects');
        $this->db->order_by('objects.date_add', 'DESC');
        if($sort){
            $this->db->where('objects_options.id_subcategory_value', $sort);
        }

        if($page !== false && $per_page !== false){
            $this->db->limit($per_page, $page);
        }
        $result= $this->db->get();

        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function get_objects_option($id_object, $list_category = false) {
        $this->db->from('objects_options');
        $this->db->join('subcategory', 'subcategory.id_subcategory=objects_options.id_subcategory');
        $this->db->join('subcategory_value', 'subcategory_value.id_subcategory_value=objects_options.id_subcategory_value');
        $this->db->where('objects_options.id_objects', $id_object);
        if($list_category){
            $this->db->where_in('objects_options.id_subcategory', $list_category);
        }
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function get_criteria_search($type, $list_category){
        $this->db->from('objects');
        $this->db->join('objects_options', 'objects_options.id_objects=objects.id_objects');
        $this->db->where('objects.type', $type);
        if($list_category){
            $this->db->where_in('objects_options.id_subcategory', $list_category);
        }
        $result= $this->db->get();
        if($result->num_rows() > 0){
            return $result->result_array();
        }
        return false;
    }

    function get_criteria_filter($type, $list_category = false, $sort = false){
        $this->db->select('objects.id_objects, underground.id_underground, underground.name_underground as underground, objects.name_object, objects.city, objects.region, objects.district, objects_options.id_subcategory_value, objects_options.id_subcategory_value_input, objects_options.id_subcategory, objects.highway_list, highway.name as highway_name, highway.id_highway');
        $this->db->from('objects_options');
        $this->db->join('objects', 'objects_options.id_objects = objects.id_objects', 'left');
        $this->db->join('objects_type', 'objects.type = objects_type.id_objects_type', 'left');
        $this->db->join('underground', 'objects.underground = underground.id_underground', 'left');
        $this->db->join('highway', 'objects.highway_list = highway.id_highway', 'left');

        $this->db->where('objects_type.uri_name', $type);
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