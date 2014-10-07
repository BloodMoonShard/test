<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacancy extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index()
    {
        $option['vacancy'] = $this->common_model->getVacancy();
        $this->render('web/vacancy', $option);
    }
}