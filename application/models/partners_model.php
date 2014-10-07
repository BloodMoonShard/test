<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners_model extends My_Model{

    function partnerAdd($post) {
        $this->db->set($post);
        $this->db->insert('partners');
        return true;
    }

    function partnerGet() {
        $result=$this->db->get('partners')->result_array();
        return $result;
    }

    function onePartnerGet($id) {
        $this->db->where('id', $id);
        $result=$this->db->get('partners')->row_array();
        return $result;
    }

    function partnerImgDelete($id) {
        $this->db->where('id',$id);
        $this->db->set('img', NULL);
        $this->db->update('partners');
        return true;
    }

    function partnerUpdate($id, $post) {
        $this->db->where('id',$id);
        $this->db->set($post);
        $this->db->update('partners');
        return true;
    }

    function partnerDelete($id) {
        $this->db->where('id',$id);
        $this->db->delete('partners');
        return true;
    }

}