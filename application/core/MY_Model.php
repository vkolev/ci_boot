<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('inflector');
        if( ! $this->_table) {
            $this->_table = strtolower(plural(str_replace('_model', '', get_calss($this))));
        }
    }
    
    public function by($key, $value) {
        $this->db->where($key, $value);
        return $this;
    }
    
    public function get() {
        $args = func_get_args();
        if(count($args) > 1 || is_array($args[0])) {
            $this->db->where($args);
        } else {
            $this->db->where('id', $args[0]);
        }
        return $this->db->get($this->_table)->row();
    }
    
    public function get_all() {
        $args = func_get_args();
        if(count($args) > 1 || is_array($args[0])) {
            $this->db->where($args);
        } else {
            $this->db->where('id', $args[0]);
        }
        return $this->db->get($this->_table)->result();
    }
    
    public function insert($data) {
        $data['created_at'] = $data['updated_at'] = mktime();
        $success = $this->db->insert($this->_table, $data);
        if($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    
    public function update() {
        $args = func_get_args();
        $args[1]['updated_at'] = mktime();
        if(is_array($args[0])) {
            $this->db->where($args);
        } else {
            $this->db->where('id', $args[0]);
        }
        return $this->db->update($this->_table, $args[1]);
    }
    
    public function delete() {
        $args = func_get_args();
        if(count($args) > 1 || is_array($args[0])) {
            $this->db->where($args);
        } else {
            $this->db->where('id', $args[0]);
        }
        return $this->db->delete($this->_table);
    }
    
    
    
}