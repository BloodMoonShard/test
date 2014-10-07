<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partners extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    public function index()
    {
        $option['partners'] = $this->common_model->getPartners();
        $this->render('web/partners', $option);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */