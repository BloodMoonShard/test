<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends My_Model{

    public $table_name = 'category';
    public $primary_key = 'id_category';
    public $sortable = 'sortable';
    public $type_sort = 'ASC';

}