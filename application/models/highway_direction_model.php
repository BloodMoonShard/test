<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Highway_direction_model extends My_Model{

    public $table_name = 'highway_direction';
    public $primary_key = 'id_highway_direction';
    public $sortable = 'name';
    public $type_sort = 'ASC';

}