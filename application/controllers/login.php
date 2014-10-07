<?php

class Login extends My_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $data = array();
        if(sizeof($_POST) > 0){
            if(!$data = $this->auth->login($this->input->post())){
                $data['error'] = $this->auth->error;
            }else{
                redirect('/');
            }
        }
        $this->render_common('common/auth/login', $data, array('login.css'));
    }

    function logout(){
        return $this->auth->logout();
    }

    function signup(){
        $data = array();
        if(sizeof($_POST) > 0){
            if(!$data = $this->auth->registration($this->input->post())){
                $data['error'] = 'Cant register';
            }else{
                redirect('/');
            }
        }
        $this->render_common('common/auth/register', $data, array('register.css'));
    }

}