<?php
class pdf_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function select_stu($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.blood_group,stu_info.stu_phone,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
//        $this->db->join('tbl_testimonial tt_in', 'tt_in.testimonial_all_reg_id=reg_info.all_reg_id', 'left');
//        $this->db->join('tbl_tc tc', 'tc.tc_all_reg_id=reg_info.all_reg_id','left');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_admin_user($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.blood_group,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
//        $this->db->join('tbl_testimonial tt_in', 'tt_in.testimonial_all_reg_id=reg_info.all_reg_id', 'left');
//        $this->db->join('tbl_tc tc', 'tc.tc_all_reg_id=reg_info.all_reg_id','left');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_stu_testimonial($data) {
        $this->db->select('tt_in.*,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_testimonial tt_in', 'tt_in.testimonial_all_reg_id=reg_info.all_reg_id', 'left');
//        $this->db->join('tbl_tc tc', 'tc.tc_all_reg_id=reg_info.all_reg_id','left');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("tt_in.roll_g", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_stu_tc() {
        $this->db->select('*');
        $this->db->from('tbl_admin');
//        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("admin_name", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function sub_result_all($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.father_name,stu_info.mother_name,stu_info.mobile_number,stu_info.photo,'
                . 'reg_info.roll,reg_info.class,reg_info.section,reg_info.group_r,reg_info.year,reg_info.reg_id,reg_info.all_reg_id'
                //. 'tbl_mark_sub.sub_id,tbl_mark_sub.mark,tbl_mark_sub.mark_pf,tbl_mark_sub.add_mark_id,tbl_mark_sub.all_reg_id,'
                . '');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        //$this->db->join('tbl_mark_sub', 'tbl_mark_sub.all_reg_id=reg_info.all_reg_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->like('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("reg_info.roll", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function sub_mark_result_all($data) {
        $this->db->select('tms.all_reg_id,tms.mark,tms.mark_pf,tms.term,tms.add_mark_id,tms.sub_id,'
                . ''
                . 'tam.term,tam.mark_title,tam.mark_number,tam.add_mark_id,tam.sub_id,'
                . 'tsi.sub_name,tsi.sub_mark');
        $this->db->from('tbl_mark_sub tms');
        $this->db->join('tbl_add_mark tam', 'tam.add_mark_id=tms.add_mark_id');
        $this->db->join('tbl_subject_info tsi', 'tsi.sub_id=tam.sub_id');
//        $this->db->where('tam.add_mark_id', 'tms.add_mark_id');
        $this->db->where('tam.term', $data['term']);
        $this->db->where('tam.year', $data['year']);
        $this->db->where('tam.class', $data['class']);
        $this->db->where('tam.group_r', $data['group_r']);
        $this->db->where('tam.section', $data['section']);
        $this->db->where('tsi.class', $data['class']);
        $this->db->where('tsi.group_r', $data['group_r']);
//        $this->db->where('tms.all_reg_id', $all_reg_id);
//        $this->db->where('tms.sub_id', $sub_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_tc_save($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_tc tc', 'tc.tc_all_reg_id=reg_info.all_reg_id');
        $this->db->where('tc.tc_all_reg_id', $data['tc_all_reg_id']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function tc_save($data) {
        $this->db->insert('tbl_tc', $data);
    }
    public function save_exam_date($data) {
        $this->db->insert('tbl_sub_exam_date', $data);
    }
    public function check_exam_date($data) {
        $this->db->select('*');
        $this->db->from('tbl_sub_exam_date');
        $this->db->where('year', $data['year']);
        $this->db->where('class', $data['class']);
        $this->db->where('section', $data['section']);
        $this->db->where('group_r', $data['group_r']);
        $this->db->where('term', $data['term']);
        $this->db->where('subject_id', $data['subject_id']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function check_exam_date_set($year,$class,$section,$group_r,$term,$subject_id) {
        $this->db->select('*');
        $this->db->from('tbl_sub_exam_date');
        $this->db->where('year', $year);
        $this->db->where('class', $class);
        $this->db->where('section', $section);
        $this->db->where('group_r', $group_r);
        $this->db->where('term', $term);
        $this->db->where('subject_id', $subject_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_exam_date_search($group_r, $class, $section, $year) {
//        $this->db->select('tbl_sub_exam_date.id,tbl_sub_exam_date.group_r,tbl_sub_exam_date.class,tbl_sub_exam_date.section,tbl_subject_info.sub_code,tbl_subject_info.sub_id,tbl_subject_info.sub_name');
        $this->db->select('*');
        $this->db->from('tbl_sub_exam_date');
        $this->db->join('tbl_subject_info', 'tbl_sub_exam_date.subject_id=tbl_subject_info.sub_id');
//        $this->db->join('tbl_admin', 'tbl_sub_exam_date.teacher_id=tbl_admin.admin_id');
        $this->db->where('tbl_sub_exam_date.year', $year);
        $this->db->like('tbl_sub_exam_date.class', $class);
        $this->db->like('tbl_sub_exam_date.section', $section);
        $this->db->like('tbl_sub_exam_date.group_r', $group_r);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function delete_exam_date($assigned_id) {
        $this->db->where('id', $assigned_id);
        $this->db->delete('tbl_sub_exam_date');
    }
    public function tc_update($data) {
        $this->db->set('institution_till', $data['institution_till']);
        $this->db->set('due_till', $data['due_till']);
        $this->db->where('tc_all_reg_id', $data['tc_all_reg_id']);
        $this->db->update('tbl_tc');
    }
    public function select_all_tc($data) {
        $this->db->select('tc.institution_till,tc.due_till,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_tc tc', 'tc.tc_all_reg_id=reg_info.all_reg_id');
//        $this->db->where('tc.tc_all_reg_id', $data['tc_all_reg_id']);
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_testimonial_save($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_testimonial tc', 'tc.testimonial_all_reg_id=reg_info.all_reg_id');
        $this->db->where('tc.testimonial_all_reg_id', $data['testimonial_all_reg_id']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function testimonial_save($data) {
        $this->db->insert('tbl_testimonial', $data);
    }
    public function testimonial_update($data) {
        $this->db->set('roll_g', $data['roll_g']);
        $this->db->set('reg_no', $data['reg_no']);
        $this->db->set('gpa_g', $data['gpa_g']);
        $this->db->set('month_g', $data['month_g']);
        $this->db->set('date_g', $data['date_g']);
        $this->db->set('year_g', $data['year_g']);
        $this->db->where('testimonial_all_reg_id', $data['testimonial_all_reg_id']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->update('tbl_testimonial');
    }
    public function select_all_testimonial($data) {
        $this->db->select('tc.roll_g,tc.reg_no,tc.gpa_g,tc.year_g,tc.month_g,tc.date_g,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_testimonial tc', 'tc.testimonial_all_reg_id=reg_info.all_reg_id');
//        $this->db->where('tc.tc_all_reg_id', $data['tc_all_reg_id']);
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->where_not_in('tc.gpa_g', 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_stu_result($data) {
        $this->db->select('marksub.mark,marksub.mark_pf,marksub.mark_id,marksub.term,addm.mark_title,addm.mark_number,addm.mark_pass,sub.sub_name,sub.sub_code,sub.sub_mark,sub.add_group,sub.pass_mark,tbl_4sub.add_f,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id');
        $this->db->join('tbl_subject_info sub', 'sub.sub_id=tbl_4sub.sub_id');
        $this->db->join('tbl_add_mark addm', 'addm.sub_id=sub.sub_id AND addm.sub_id=sub.sub_id AND tbl_4sub.sub_id=addm.sub_id');
        $this->db->join('tbl_mark_sub marksub', 'marksub.all_reg_id=reg_info.all_reg_id AND addm.add_mark_id=marksub.add_mark_id And marksub.sub_id=sub.sub_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->like('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
        $this->db->where('sub.group_r', $data['group_r']);
        $this->db->where('marksub.term', $data['term']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("sub.sub_code", "ASC");
//        $this->db->where('addm.add_mark_id', 'marksub.add_mark_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_prev_stu_result($data) {
        $this->db->select('marksub.mark,marksub.mark_pf,marksub.mark_id,marksub.term,addm.mark_title,addm.mark_number,addm.mark_pass,sub.sub_name,sub.sub_code,sub.sub_mark,sub.pass_mark,tbl_4sub.add_f,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id');
        $this->db->join('tbl_subject_info sub', 'sub.sub_id=tbl_4sub.sub_id');
        $this->db->join('tbl_add_mark addm', 'addm.sub_id=sub.sub_id AND addm.sub_id=sub.sub_id AND tbl_4sub.sub_id=addm.sub_id');
        $this->db->join('tbl_mark_sub marksub', 'marksub.all_reg_id=reg_info.all_reg_id AND addm.add_mark_id=marksub.add_mark_id And marksub.sub_id=sub.sub_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->like('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
        $this->db->where('sub.group_r', $data['group_r']);
        $this->db->where('marksub.term', $data['term_prev']);
       // $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("sub.sub_code", "ASC");
//        $this->db->where('addm.add_mark_id', 'marksub.add_mark_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_result_by_id($data) {
        $this->db->select('*');
        $this->db->from('tbl_stu_result');
        $this->db->where('result_all_reg_id', $data['result_all_reg_id']);
        $this->db->where('year', $data['year']);
        $this->db->where('class', $data['class']);
        $this->db->where('section', $data['section']);
        $this->db->where('group_r', $data['group_r']);
        $this->db->where('term', $data['term']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function stu_result_save($data) {
        $this->db->insert('tbl_stu_result', $data);
    }
    public function stu_result_update($data) {
        $this->db->set('gpa', $data['gpa']);
        $this->db->set('cgpa', $data['cgpa']);
        $this->db->set('total_mark', $data['total_mark']);
        $this->db->set('position', $data['position']);
        $this->db->where('result_all_reg_id', $data['result_all_reg_id']);
        $this->db->where('year', $data['year']);
        $this->db->where('class', $data['class']);
        $this->db->where('section', $data['section']);
        $this->db->where('group_r', $data['group_r']);
        $this->db->where('term', $data['term']);
        $this->db->update('tbl_stu_result');
    }
    public function select_class_report($data) {
        $this->db->select('sr.group_r, sr.cgpa, sr.result_all_reg_id, sr.section, reg_info.roll');
        $this->db->from('tbl_stu_result sr');
        $this->db->join('tbl_all_registration_info reg_info', 'sr.result_all_reg_id=reg_info.all_reg_id');
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('sr.year', $data['year']);
        $this->db->where('sr.class', $data['class']);
//        $this->db->where('sr.section', $data['section']);
//        $this->db->where('sr.group_r', $data['group_r']);
        $this->db->where('sr.term', $data['term']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_stu_info($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.stu_phone,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
//        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("reg_info.group_r", "ASC");
        $this->db->order_by("reg_info.section", "ASC");
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
