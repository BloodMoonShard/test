<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume_model extends My_Model{

    function resumeAdd($post) {
        $this->db->set($post);
        return $this->db->insert('resume');
    }

    function resumeGet() {
        $this->db->order_by('create_date', 'desc');
        return $this->db->get('resume')->result_array();
    }

    function oneResumeGet($id) {
        $this->db->where('id', $id);
        return $this->db->get('resume')->row_array();
    }

    function resumeDelete($id) {
        $this->db->where('id',$id);
        return $this->db->delete('resume');

    }

}