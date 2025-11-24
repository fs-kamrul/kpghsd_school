<?php

class student_info_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_registation($data) {
        $this->db->insert('student_information', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function select_all_reg_search($group_r, $class, $section, $year) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.father_name,stu_info.mother_name,stu_info.stu_phone,stu_info.mobile_number,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.ending_date,reg_info.reg_id,reg_info.all_reg_id');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('reg_info.year', $year);
        $this->db->where('reg_info.class', $class);
        $this->db->where('reg_info.section', $section);
        $this->db->where('reg_info.group_r', $group_r);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_reg_four($dataz) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,tbl_4sub.add_f');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id And tbl_4sub.sub_id=\'' . $dataz['sub_id'] . '\'', 'left');
        $this->db->where('reg_info.year', $dataz['year']);
        $this->db->where('reg_info.class', $dataz['class']);
        $this->db->where('reg_info.section', $dataz['section']);
        $this->db->where('reg_info.group_r', $dataz['group_r']);
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function seclct_std_id($id) {
        $this->db->select('*');
        $this->db->from('student_information stu_info');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_all_reg_add_save_reg($datap) {
        $this->db->insert('tbl_all_registration_info', $datap);
        //return $result;
    }

    public function delete_registration_reg_id($reg_id) {
        $this->db->where('reg_id', $reg_id);
        $this->db->delete('student_information');

        $this->db->where('reg_id', $reg_id);
        $this->db->delete('tbl_all_registration_info');
    }

    public function select_reg_info_by_reg_id($reg_id) {
        $this->db->select('*');
        $this->db->from('student_information');
        $this->db->where('reg_id', $reg_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
