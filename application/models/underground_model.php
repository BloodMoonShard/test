<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Underground_model extends My_Model{

    public $table_name = 'underground';
    public $primary_key = 'id_underground';
    public $sortable = 'name_underground';
    public $type_sort = 'ASC';

}