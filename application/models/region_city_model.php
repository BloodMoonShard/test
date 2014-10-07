<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Region_city_model extends My_Model{

    public $table_name = 'region_city';
    public $primary_key = 'id_region_city';
    public $sortable = 'name';
    public $type_sort = 'ASC';

}