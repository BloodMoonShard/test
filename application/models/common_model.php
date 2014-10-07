<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends My_Model{

    function getPartners() {
        $result = $this->db->get('partners')->result_array();
        return $result;
    }

    function getVacancy() {
        $result = $this->db->get('vacancy')->result_array();
        return $result;
    }

    function insertCallback($post) {
        $this->db->set($post);
        return $this->db->insert('callbacks');
    }
}