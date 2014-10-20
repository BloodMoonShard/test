<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends My_Model{

    function getPartners() {
        return $this->db->get('partners')->result_array();
    }

    function getVacancy() {
        $this->db->where('display', 1);
        return $this->db->get('vacancy')->result_array();
    }

    function insertCallback($post) {
        $this->db->set($post);
        return $this->db->insert('callbacks');
    }

    function objectsImgAdd($id_objects, $img_name) {
        $this->db->set('id_objects', $id_objects);
        $this->db->set('img_name', $img_name);
        return $this->db->insert('objects_images');
    }

    function objectsImgGet($id) {
        $this->db->where('id_objects', $id);
        $result=$this->db->get('objects_images')->result_array();
        return $result;
    }

    function objectOneImgGet($id) {
        $this->db->where('id', $id);
        return $this->db->get('objects_images')->row_array();
    }

    function objectOneImgDelete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('objects_images');
    }

    /* функции для подготовки данных для поиска */
    function getHighway() {
        return $this->db->get('highway')->result_array();
    }

    function getHighwayDirection() {
        return $this->db->get('highway_direction')->result_array();
    }


}