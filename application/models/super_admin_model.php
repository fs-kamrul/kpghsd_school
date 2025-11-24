<?php

class Super_admin_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function dboard() {
        $admin_id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_sub_assigned');
        $this->db->join('tbl_subject_info', 'tbl_subject_info.sub_id=tbl_sub_assigned.subject_id');
        $this->db->where('tbl_sub_assigned.teacher_id', $admin_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_notice() {
        $this->db->select('*');
        $this->db->from('tbl_notice');
        $this->db->order_by("n_id", "DESC");
        $this->db->limit("3");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function dboard_admin() {
        $admin_id = $this->session->userdata('user_id');
        $this->db->select('admin_name,admin_id,photo');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $admin_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_teacher($data) {
        if ($this->db->insert('tbl_admin', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function select_email_teacher($data) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address', $data['admin_email_address']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_all_class_info() {
        //$this->db->distinct();
        $this->db->select('class,year,section,group_r,count(year) total');
        $this->db->group_by("class,year,section,group_r");
        $this->db->from('tbl_all_registration_info');
//        $this->db->where('ending_date', '0000-00-00');
        $this->db->where('ending_date', null);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function class_reg_search($class, $year, $section, $group_r) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.name,student_information.photo');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('tbl_all_registration_info.year', $year);
        $this->db->where('tbl_all_registration_info.class', $class);
        $this->db->where('tbl_all_registration_info.section', $section);
        $this->db->where('tbl_all_registration_info.group_r', $group_r);
//        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->where('tbl_all_registration_info.ending_date', null);
        $this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function student_reg_search($class, $session, $group_r) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.name,student_information.photo');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('tbl_all_registration_info.year', $session);
        $this->db->where('tbl_all_registration_info.class', $class);
//        $this->db->where('tbl_all_registration_info.section', $section);
        $this->db->where('tbl_all_registration_info.group_r', $group_r);
//        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->where('tbl_all_registration_info.ending_date', null);
        $this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function class_reg_search_by_student_id($class, $year, $section, $group_r,$student_id) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.name,student_information.photo');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('tbl_all_registration_info.year', $year);
        $this->db->where('tbl_all_registration_info.class', $class);
        $this->db->where('tbl_all_registration_info.section', $section);
        $this->db->where('tbl_all_registration_info.group_r', $group_r);
        $this->db->like('student_information.id', $student_id);
//        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function student_information_by_stu_id($student_id) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.name,student_information.photo');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('student_information.id', $student_id);
        //$this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        //$this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function student_information_by_stu_id_new_student($student_id) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.father_name,student_information.name,student_information.photo,student_information.stu_phone,student_information.email,student_information.village,student_information.district,student_information.zip_code');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('student_information.id', $student_id);
//        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->where('tbl_all_registration_info.ending_date', null);
        //$this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_class_reg($data, $chk) {
        $tt = $data['class'];

        foreach ($chk as $key => $value) {
            if ($tt != "None") {
                $this->db->set('reg_id', $data['reg_id' . $key]);
                $this->db->set('roll', $data['roll' . $key]);
                $this->db->set('class', $data['class']);
                $this->db->set('section', $data['section']);
                $this->db->set('group_r', $data['group_r']);
                $this->db->set('year', $data['year']);
                $this->db->insert('tbl_all_registration_info');
            }
        }
        $y = date('Y');
        $m = date('m');
        $d = date('d');
        $date = $y . '-' . $m . '-' . $d;
        foreach ($chk as $key => $value) {
            $this->db->set('ending_date', $date);
            $this->db->where('reg_id', $data['reg_id' . $key]);
            $this->db->where('roll', $data['roll' . $key]);
            $this->db->where('class', $data['class_x']);
            $this->db->where('section', $data['section_x']);
            $this->db->where('group_r', $data['group_r_x']);
            $this->db->where('year', $data['year_x']);
            $this->db->update('tbl_all_registration_info');
        }
    }

    public function update_stu_reg_info($data, $reg_id) {
        $this->db->where('reg_id', $reg_id);
        $this->db->update('student_information', $data);
    }

    public function select_all_option($per_page, $offset) {
        if ($offset == NULL) {
            $offset = 0;
        }
        $this->db->select('*');
        $this->db->from('option_a');
        $this->db->order_by('data_a');
        //$this->db->limit(2);

        $query_result = $this->db->get('', $per_page, $offset);
        $result = $query_result->result();
        return $result;
    }

    public function select_option() {
        $this->db->select('*');
        $this->db->from('option_a');
        $this->db->order_by('order');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function Select_sub() {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_option_a($data) {
        $this->db->select('*');
        $this->db->from('option_a');
        $this->db->where('opt_a',$data['opt_a']);
        $this->db->where('data_a',$data['data_a']);
        $this->db->order_by('order');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_option($data) {
        $this->db->insert('option_a', $data);
    }

    public function delete_opt_reg_id($opt_id) {
        $this->db->where('opt_id', $opt_id);
        $this->db->delete('option_a');
    }
    public function select_all_teacher() {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_by_id_teacher($ter_id) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $ter_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function delete_teacher($data) {
        $this->db->where('admin_id', $data);
        $this->db->delete('tbl_admin'); 
    }
    public function update_teacher_reg($data,$admin_id) {
        $this->db->where('admin_id', $admin_id);
        $this->db->update('tbl_admin', $data);
    }
}
