<?php
class profile_model extends CI_Model {

    public function check_previous_password($data) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $data['user_name']);
        $this->db->where('admin_password', md5($data['previous_password']));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function change_password($data) {
        $this->db->set('admin_password', md5($data['new_password']));
        $this->db->where('admin_id', $data['user_name']);
        $this->db->update('tbl_admin');
    }
    public function select_admin() {
        
    }
}
