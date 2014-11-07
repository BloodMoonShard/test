<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends My_Controller {

    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id()){
            redirect('/login');
        }

    }

    public function index()
    {
        redirect('/admin/objects', 'refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */