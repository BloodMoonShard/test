<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model{
    function getAllUsers() {
        $this->db->from('users');
        $this->db->order_by('id','asc');
        $this->db->join('users_privileges', 'users_privileges.id = users.user_role');
        return $this->db->get()->result_array();
    }

    function getRoles() {
        return $this->db->get('users_privileges')->result_array();
    }

    function getUser($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('users')->row_array();
    }

    function getMyAgents($id_manager) {
        $this->db->where('id_manager', $id_manager);
        return $this->db->get('manager_agents')->result_array();
    }

    function getFreeAgents() {
        $this->db->where('user_role', 3);
        $this->db->where('free_agent', 0);
        return $this->db->get('users')->result_array();
    }

    function setAgentToManager($id_manager, $id_agent) {
        $this->db->set('id_manager', $id_manager);
        $this->db->set('id_agent', $id_agent);
        return $this->db->insert('manager_agents');
    }

    function unsetAgentToManager($id_agent) {
        $this->db->where('id_agent', $id_agent);
        return $this->db->delete('manager_agents');
    }

    function getManagerId($id_agent) {
        $this->db->where('id_agent', $id_agent);
        $this->db->select('id_manager');
        return $this->db->get('manager_agents')->row_array();
    }

    function getCountAgentsOnManager($id_manager) {
        $this->db->where('id_manager', $id_manager);
        $result = $this->db->get('manager_agents');
        return $result->num_rows();
    }

    function setUnfreeAgent($id_agent) {
        $this->db->where('id_users', $id_agent);
        $this->db->set('free_agent', 1);
        return $this->db->update('users');
    }

    function setFreeAgent($id_agent) {
        $this->db->where('id_users', $id_agent);
        $this->db->set('free_agent', 0);
        return $this->db->update('users');
    }
}