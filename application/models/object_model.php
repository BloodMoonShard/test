<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Object_model extends My_Model{

    public $table_name = 'objects';
    public $primary_key = 'id_objects';


    function delete_object($id){
        $this->db->delete($this->table_name, array('id_objects'=>$id));
        return $this->db->delete('objects_options', array('id_objects'=>$id));
    }
}