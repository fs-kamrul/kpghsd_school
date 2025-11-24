<?php
class url_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function select_url($data) {
        $this->db->select('*');
        $this->db->from('tbl_url');
        $this->db->where('url_name', $data['url_name']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_url_active($data) {
        $this->db->select('*');
        $this->db->from('tbl_url');
        $this->db->where('url_name', $data['url_name']);
        $this->db->where('url_active', $data['url_active']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function save_url($data) {
        $this->db->insert('tbl_url', $data);
    }
    public function select_url_name() {
        $this->db->select('*');
        $this->db->from('tbl_url');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function update_url_order_by($data) {
        $this->db->set('order_by', $data['order_by']);
        $this->db->where('url_id', $data['url_id']);
        $this->db->update('tbl_url');
    }
    public function save_url_authentication($data) {
        $this->db->insert('tbl_url_authentication', $data);
    }
    public function select_url_authentication($data) {
        $this->db->select('*');
        $this->db->from('tbl_url_authentication');
        $this->db->where('url_group_name', $data['url_group_name']);
        $this->db->where('url_id', $data['url_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function url_delete_by_id($data) {
        $this->db->where('url_authentication_id', $data);
        $this->db->delete('tbl_url_authentication');
    }
    public function update_url($data) {
        $this->db->set('url_insert', $data['url_insert']);
        $this->db->set('url_edit', $data['url_edit']);
        $this->db->set('url_delete', $data['url_delete']);
        $this->db->where('url_authentication_id', $data['url_authentication_id']);
        $this->db->update('tbl_url_authentication');
    }
}
