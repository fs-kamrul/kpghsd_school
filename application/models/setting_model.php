<?php

class setting_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function select_info() {
        $this->db->select('*');
        $this->db->from('tbl_school');
        $this->db->where('id', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function update_academy_info($data) {
//            $this->db->set('s_name', $data['s_name']);
//            $this->db->set('s_address', $data['s_address']);
//            $this->db->set('s_code', $data['s_code']);
//            $this->db->set('email', $data['email']);
//            $this->db->set('phone_number', $data['phone_number']);
//            $this->db->set('favicon', $data['favicon']);
//            $this->db->set('logo', $data['logo']);
//            $this->db->set('site_url', $data['site_url']);
            $this->db->where('id', '1');
            $this->db->update('tbl_school', $data);
    }
    public function insert_academy_info($data) {
            $this->db->set('id', 1);
            $this->db->set('s_name', $data['s_name']);
            $this->db->set('s_address', $data['s_address']);
            $this->db->set('s_code', $data['s_code']);
            $this->db->insert('tbl_school');
    }
    public function class_student_reg_search($class, $year, $section, $group_r) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.name,student_information.photo');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('tbl_all_registration_info.year', $year);
        $this->db->where('tbl_all_registration_info.class', $class);
        $this->db->where('tbl_all_registration_info.section', $section);
        $this->db->where('tbl_all_registration_info.group_r', $group_r);
        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function student_info_select($id) {
        $this->db->select('*');
        $this->db->from('student_information');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
