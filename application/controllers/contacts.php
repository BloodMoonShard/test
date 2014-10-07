<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index()
    {
//        $option['partners'] = $this->common_model->getPartners();
        $this->render('web/contacts', false);
    }
}