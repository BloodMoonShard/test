<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth{

    private $salt;
    private $type_auth;
    public $error;

    function __construct(){
        $this->salt = "erqergqf#!@#QDQWEQW#!@#";

        $this->CI = &get_instance();
        $this->CI->load->model('auth_model');
    }

    public function login($info){
        //TODO: Validation rule
        $login = $info['login'];
        $psw = $info['password'];
        $psw = md5($info['password'].$this->salt);
        if($data = $this->CI->auth_model->login($login, $psw, $this->CI->config->item('type_auth'))){
            $this->CI->session->set_userdata('info_user', $data);
            $this->CI->session->set_userdata('id_users', $data['id_users']);
            $this->CI->session->set_userdata('username', $data['username']);
            $this->CI->session->set_userdata('user_role', $data['user_role']);
            return true;
        }else{
            $this->error = $this->CI->config->item('login_error');
            return false;
        }
    }

    public function logout(){
        $this->CI->session->unset_userdata('info_user');
        $this->CI->session->unset_userdata('id_users');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('user_role');
        redirect ('/login');
    }

    public function registration($info){
//        TODO: Validation rule
        $role = $this->CI->session->userdata('role');
        if($this->get_user_id() && ($role!=0)){
            redirect('/');
        }
        $info['password'] = md5($info['password'].$this->salt);
        unset($info['password_confirmation']);
        return $this->CI->auth_model->register($info);
    }

    public function update_user_info($id_users, $info){
//        TODO: Validation rule
        if (strlen($info['password'])==0) {
            unset($info['password']);
        } else {
            $info['password'] = md5($info['password'].$this->salt);
        }
        unset($info['password_confirmation']);
        return $this->CI->auth_model->update_register_info($id_users, $info);
    }

    public function remove_user($id_users) {
        $role = $this->CI->session->userdata('role');
        if($role!=0){
            redirect('/');
        }
        $this->CI->auth_model->remove_user($id_users);
    }

    function check_login(){
        if(!$this->CI->session->userdata('id_users')){
            return false;
        }
        return true;
    }

    function check_rule(){
        if($this->CI->session->userdata('role') == 0){
            return false;
        }
        return true;
    }

    function get_user_id(){
        return $this->CI->session->userdata('id_users');
    }

    function get_user_role() {
        return $this->CI->session->userdata('user_role');
    }
}