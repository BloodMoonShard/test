<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Highway_model extends My_Model{

    public $table_name = 'highway';
    public $primary_key = 'id_highway';
    public $sortable = 'name';
    public $type_sort = 'ASC';

}