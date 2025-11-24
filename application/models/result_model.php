<?php

class Result_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function stu_view_result($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.father_name,stu_info.mother_name,stu_info.mobile_number,stu_info.photo,reg_info.roll,reg_info.class,reg_info.section,reg_info.group_r,reg_info.year,reg_info.reg_id,reg_info.all_reg_id');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("reg_info.roll", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function stu_view_result_p($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.father_name,stu_info.mother_name,stu_info.mobile_number,stu_info.photo,reg_info.roll,reg_info.class,reg_info.section,reg_info.group_r,reg_info.year,reg_info.reg_id,reg_info.all_reg_id');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->like('reg_info.section', '');
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("reg_info.roll", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function mark_result($term) {
        $this->db->select('*');
        $this->db->from('tbl_mark_sub');
        $this->db->where('term', $term);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function sub_name_result($term,$all_reg_id) {
        $this->db->select('tms.sub_id,tsi.sub_name,tsi.sub_mark,tbl_4sub.add_f,tsi.sub_code');
        $this->db->distinct('tms.sub_id');
        $this->db->from('tbl_mark_sub tms');
        $this->db->join('tbl_subject_info tsi', 'tms.sub_id=tsi.sub_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.sub_id = tms.sub_id and tbl_4sub.all_reg_id =\''.$all_reg_id.'\'','left');
        $this->db->where('tms.term', $term);
        $this->db->where('tms.all_reg_id', $all_reg_id);
        $this->db->order_by("tsi.sub_code", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function sub_name_and_four($all_reg_id,$group_r,$class) {
        $this->db->select('tsi.sub_id,tsi.sub_name,tsi.sub_mark,tbl_4sub.add_f');
        $this->db->from('tbl_subject_info tsi');
        $this->db->where('tsi.group_r', $group_r);
        $this->db->where('tsi.class', $class);
        $this->db->join('tbl_4sub', 'tbl_4sub.sub_id = tsi.sub_id and tbl_4sub.all_reg_id =\''.$all_reg_id.'\'','left');
        $this->db->order_by("tsi.sub_code", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function sub_mark_result($term,$all_reg_id,$sub_id) {
        $this->db->select('tms.mark,tms.mark_pf');
        $this->db->from('tbl_mark_sub tms');
        $this->db->where('tms.term', $term);
        $this->db->where('tms.all_reg_id', $all_reg_id);
        $this->db->where('tms.sub_id', $sub_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
