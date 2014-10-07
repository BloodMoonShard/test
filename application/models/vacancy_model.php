<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacancy_model extends My_Model{

    function vacancyGet() {
        $result=$this->db->get('vacancy')->result_array();
        return $result;
    }

    function vacancyAdd($post) {
        $this->db->set($post);
        return $this->db->insert('vacancy');
    }

    function oneVacancyGet($id) {
        $this->db->where('id', $id);
        $result=$this->db->get('vacancy')->row_array();
        return $result;
    }

    function vacancyUpdate($id, $post) {
        $this->db->where('id',$id);
        $this->db->set($post);
        return $this->db->update('vacancy');
    }

    function vacancyDelete($id) {
        $this->db->where('id',$id);
        return $this->db->delete('vacancy');
    }

}