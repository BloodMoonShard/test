<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comparison_model extends CI_Model{
    function getObject($id_objects) {
        $this->db->select('objects.*, countries.name as country');
        $this->db->from('objects');
        $this->db->join('countries', 'countries.country_id = objects.country', 'LEFT');

        $this->db->where('objects.id_objects', $id_objects);
        return $this->db->get()->row_array();
    }

    function getObjectOptions($id_objects) {
        $this->db->from('objects_options');
        $this->db->where('objects_options.id_objects', $id_objects);

        $this->db->join('subcategory');

        return $this->db->get()->result_array();
    }


}