<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callback_model extends My_Model{

    function callbacksGet() {
        $this->db->order_by('submit', 'asc');
        $this->db->order_by('date', 'desc');
        $result=$this->db->get('callbacks')->result_array();
        return $result;
    }

    function submitCallback($id) {
        $this->db->where('id', $id);
        $this->db->set('submit', 1);
        return $this->db->update('callbacks');
    }

    function сallbackDelete($id) {
        $this->db->where('id',$id);
        return  $this->db->delete('callbacks');
    }

    function сallbacksClear() {
        $this->db->where('id >', 0);
        return  $this->db->delete('callbacks');
    }

}