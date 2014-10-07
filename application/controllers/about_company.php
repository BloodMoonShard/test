<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_company extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index()
    {
        $this->render('web/about_company', false);
    }
}