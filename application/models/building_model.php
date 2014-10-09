<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Building_model extends My_Model{
    public $table_name = 'category';
    public $primary_key = 'id_category';
    public $sortable = 'sortable';
    public $type_sort = 'ASC';


    function buildingAdd($post) {
        $this->db->set($post);
        $this->db->insert('building_objects');
        return $this->db->insert_id();
    }

    function buildingImgAdd($id_building_objects, $img_name) {
        $this->db->set('id_building_objects', $id_building_objects);
        $this->db->set('img_name', $img_name);
        return $this->db->insert('building_images');
    }

    function buildingGet() {
        $this->db->order_by('title', 'ASC');
        return $this->db->get('building_objects')->result_array();
    }

    function oneBuildingGet($id) {
        $this->db->where('id', $id);
        return $this->db->get('building_objects')->row_array();
    }

    function buildingImgGet($id) {
        $this->db->where('id_building_objects', $id);
        $result=$this->db->get('building_images')->result_array();
        return $result;
    }

    function buildingOneImgGet($id) {
        $this->db->where('id', $id);
        return $this->db->get('building_images')->row_array();
    }

    function oneBuildingUpdate($id, $post) {
        $this->db->where('id', $id);
        $this->db->set('title', $post['title']);
        $this->db->set('description', $post['description']);
        return $this->db->update('building_objects');
    }

    function buildingImgDelete($id) {
        $this->db->where('id_building_objects', $id);
        return $this->db->delete('building_images');
    }

    function buildingOneImgDelete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('building_images');
    }

    function buildingDelete($id) {
        $this->db->where('id',$id);
        return  $this->db->delete('building_objects');
    }

}