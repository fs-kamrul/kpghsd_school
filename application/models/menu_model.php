<?php
class menu_model extends CI_Model {
    public function select_all_url() {
        $this->db->select('*');
        $this->db->from('tbl_url');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_url_main() {
        $this->db->select('*');
        $this->db->from('tbl_url');
        $this->db->where('url_type', 'main_url');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_url_sub_url($id) {
        $this->db->select('*');
        $this->db->from('tbl_url');
        $this->db->where('url_active', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_menu_by_id($data) {
        $this->db->select('*');
        $this->db->from('tbl_url_authentication tua');
        $this->db->join('tbl_url', 'tua.url_id=tbl_url.url_id');
        $this->db->where('tua.url_group_name', $data);
        $this->db->where('tbl_url.status', 1);
        $this->db->order_by('tbl_url.order_by');
//        $this->db->where('url_id', $data['url_id']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
