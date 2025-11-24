<?php

class mark_model extends CI_Model {

    public function sub_ass_view($assigned_id) {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $this->db->join('tbl_sub_assigned', 'tbl_sub_assigned.subject_id=tbl_subject_info.sub_id');
        $this->db->where('tbl_sub_assigned.assigned_id', $assigned_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_all_add_mark($dataz) {
        $this->db->insert('tbl_add_mark', $dataz);
    }

    public function select_add_mark_id($add_mark_id) {
        $this->db->select('*');
        $this->db->from('tbl_add_mark');
        $this->db->where('add_mark_id', $add_mark_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_add_mark_r($dataz) {
        $this->db->select('*');
        $this->db->from('tbl_add_mark');
        $this->db->join('tbl_subject_info', 'tbl_add_mark.sub_id = tbl_subject_info.sub_id');
        $this->db->where('tbl_add_mark.sub_id', $dataz['sub_id']);
        $this->db->where('tbl_add_mark.group_r', $dataz['group_r']);
        $this->db->where('tbl_add_mark.section', $dataz['section']);
        $this->db->where('tbl_add_mark.year', $dataz['year']);
        $this->db->where('tbl_add_mark.class', $dataz['class']);
        $this->db->where('tbl_add_mark.term', $dataz['term']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function add_mark_title($add_mark_id) {
        $this->db->select('*');
        $this->db->from('tbl_add_mark');
        $this->db->where('add_mark_id', $add_mark_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_add_mark_m($dataz) {
        $this->db->set('mark_title', $dataz['mark_title']);
        $this->db->set('mark_number', $dataz['mark_number']);
        $this->db->set('mark_pass', $dataz['mark_pass']);
        $this->db->where('add_mark_id', $dataz['add_mark_id']);
        $this->db->update('tbl_add_mark');
    }

    public function delete_add_mark_m($add_mark_id) {
        $this->db->where('add_mark_id', $add_mark_id);
        $this->db->delete('tbl_add_mark');
    }
    
    public function delete_mark_m($add_mark_id) {
        $this->db->where('add_mark_id', $add_mark_id);
        $this->db->delete('tbl_mark_sub');
    }

    public function select_mark_view($data) {
        $this->db->select('*');
        $this->db->from('tbl_mark_sub');
        $this->db->where('add_mark_id', $data['add_mark_id']);
        $this->db->where('term', $data['term']);
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->where('all_reg_id', $data['all_reg_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
  
    public function update_mark($data) {
        $this->db->set('mark', $data['mark']);
        $this->db->set('mark_pf', $data['mark_pf']);
        $this->db->where('add_mark_id', $data['add_mark_id']);
        $this->db->where('term', $data['term']);
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->where('all_reg_id', $data['all_reg_id']);
        $this->db->update('tbl_mark_sub');
    }

    public function in_mark($data) {
        $this->db->set('add_mark_id', $data['add_mark_id']);
        $this->db->set('sub_id', $data['sub_id']);
        $this->db->set('all_reg_id', $data['all_reg_id']);
        $this->db->set('mark', $data['mark']);
        $this->db->set('term', $data['term']);
        $this->db->set('mark_pf', $data['mark_pf']);
        $this->db->insert('tbl_mark_sub');
    }

    public function mark_show_all($dataz) {
        $this->db->select('stu_info.id,stu_info.name,reg_info.roll,reg_info.all_reg_id,reg_info.year,reg_info.class,reg_info.section,reg_info.group_r,mr.term,mr.sub_id,mr.add_mark_id,mr.mark,tbl_4sub.add_f');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_mark_sub mr', 'mr.all_reg_id=reg_info.all_reg_id AND mr.term=\'' . $dataz['term'] . '\' AND mr.sub_id=\'' . $dataz['sub_id'] . '\' AND mr.add_mark_id=\'' . $dataz['add_mark_id'] . '\'', 'left');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id And tbl_4sub.sub_id=\'' . $dataz['sub_id'] . '\'', 'left');
        $this->db->where('reg_info.year', $dataz['year']);
        $this->db->where('reg_info.class', $dataz['class']);
        $this->db->where('reg_info.section', $dataz['section']);
        $this->db->where('reg_info.group_r', $dataz['group_r']);
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        //print_r('<pre>');
        //print_r($result);
        return $result;
    }

    public function select_mark_show_all($dataz) {
        $this->db->select('tbl_mark_sub.mark,tbl_mark_sub.all_reg_id');
        $this->db->from('tbl_add_mark');
        $this->db->join('tbl_mark_sub', 'tbl_add_mark.add_mark_id=tbl_mark_sub.add_mark_id and tbl_add_mark.sub_id=tbl_mark_sub.sub_id and tbl_mark_sub.term=\'' . $dataz['term'] . '\'', 'left');
        $this->db->where('tbl_add_mark.year', $dataz['year']);
        $this->db->where('tbl_add_mark.sub_id', $dataz['sub_id']);
        $this->db->where('tbl_add_mark.section', $dataz['section']);
        $this->db->where('tbl_add_mark.group_r', $dataz['group_r']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_mark_show_one($year, $sub_id, $section, $group_r, $term, $all_reg_id) {
        $this->db->select('tbl_add_mark.add_mark_id,tbl_mark_sub.mark_id,tbl_mark_sub.mark_pf,tbl_mark_sub.mark,tbl_mark_sub.all_reg_id');
        $this->db->from('tbl_add_mark');
        $this->db->join('tbl_mark_sub', 'tbl_add_mark.add_mark_id=tbl_mark_sub.add_mark_id and tbl_add_mark.sub_id=tbl_mark_sub.sub_id and tbl_mark_sub.term=\'' . $term . '\'', 'left');
        $this->db->where('tbl_add_mark.year', $year);
        $this->db->where('tbl_add_mark.sub_id', $sub_id);
        $this->db->where('tbl_add_mark.section', $section);
        $this->db->where('tbl_add_mark.group_r', $group_r);
        $this->db->where('tbl_mark_sub.all_reg_id', $all_reg_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

}
