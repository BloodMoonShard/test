<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{

    private $table_name = 'users';

    public function login($login, $password, $type_auth){
        //pre install $result
        $result = array();
        switch($type_auth){
            case 'both':
                $this->db->where('username', $login);
                $this->db->or_where('email', $login);
                $this->db->where('password', $password);
                $result = $this->db->get($this->table_name);
                break;

            case 'login':
                $this->db->where('username', $login);
                $this->db->where('password', $password);
                $result = $this->db->get($this->table_name);
                break;

            case 'email':
                $this->db->where('email', $login);
                $this->db->where('password', $password);
                $result = $this->db->get($this->table_name);
                break;
        }

        if($result->num_rows() > 0){
            return $result->row_array();
        }else{
            return false;
        }
    }

    public function register($data){
        return $this->db->insert($this->table_name, $data);
    }

    public function update_register_info($id_users, $data) {
        $this->db->where('id_users', $id_users);
        $this->db->set($data);
        return $this->db->update('users');
    }

    public function remove_user($id_users){
        $this->db->where('id_users', $id_users);
        return $this->db->delete('users');
    }
}