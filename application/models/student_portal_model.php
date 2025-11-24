<?php

class student_portal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select_option() {
//        $this=$this->load->database('dba', TRUE);
        $this->db->select('*');
        $this->db->from('option_a');
        $this->db->order_by('order');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function student_info($data) {
//        $this=$this->load->database('dba', TRUE);
        $this->db->select('stu_info.id,stu_info.name,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year,reg_info.group_r');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('stu_info.id', $data['studentID']);
        $this->db->where('reg_info.year', $data['session']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function sub_result_a($data) {
//        $this=$this->load->database('dba', TRUE);
        $this->db->select('marksub.mark,marksub.mark_pf,marksub.mark_id,addm.mark_title,addm.mark_number,addm.mark_pass,sub.sub_name,sub.sub_code,sub.sub_mark,sub.pass_mark,tbl_4sub.add_f,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year,reg_info.group_r');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id');
        $this->db->join('tbl_subject_info sub', 'sub.sub_id=tbl_4sub.sub_id');
        $this->db->join('tbl_add_mark addm', 'addm.sub_id=sub.sub_id AND addm.sub_id=sub.sub_id AND tbl_4sub.sub_id=addm.sub_id');
        $this->db->join('tbl_mark_sub marksub', 'marksub.all_reg_id=reg_info.all_reg_id AND addm.add_mark_id=marksub.add_mark_id And marksub.sub_id=sub.sub_id');
        $this->db->where('stu_info.id', $data['studentID']);
        $this->db->where('reg_info.year', $data['session']);
        $this->db->where('marksub.term', $data['exam_type']);
        $this->db->order_by("sub.sub_id", "ASC");
//        $this->db->where('reg_info.class', $data['class']);
//        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('sub.group_r', $data['group_r']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}