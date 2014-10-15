<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');    class Seo_model extends CI_Model {        function get_static_seo($url) {           $this->db->where("url",$url);           return $this->db->get('seo_static')->row_array();        }        function get_seo_dynamic($table, $id_object) {            $this->db->from($table);            $this->db->where('id', $id_object);            $this->db->select('title_seo, description_seo, keywords_seo');            return $this->db->get()->row_array();        }        function get_seo_dynamic_v2($table, $id_object) {            $this->db->from($table);            $this->db->where('id_objects', $id_object);            $this->db->select('title_seo, description_seo, keywords_seo');            return $this->db->get()->row_array();        }        function seoGetAll() {            $this->db->order_by('url', 'ASC');            return $this->db->get('seo_static')->result_array();        }        function oneSeoGet($id_seo) {            $this->db->where("id_seo", $id_seo);            return $this->db->get('seo_static')->row_array();        }        function seoUpdate($id_seo, $post) {            $this->db->where("id_seo", $id_seo);            $this->db->set($post);            return $this->db->update('seo_static');        }    }