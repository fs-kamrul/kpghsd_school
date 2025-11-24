<?php
class baton_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db->query("SET time_zone='+6:00'");
    }
    public function select_all_baton($year, $class, $section, $group_r) {
        $this->db->select('tbl_baton_assigned.*,tbl_admin.admin_name');
        $this->db->from('tbl_baton_assigned');
        $this->db->join('tbl_admin', 'tbl_baton_assigned.teacher_id=tbl_admin.admin_id');
        $this->db->where('tbl_baton_assigned.year', $year);
        $this->db->like('tbl_baton_assigned.class', $class);
        $this->db->like('tbl_baton_assigned.section', $section);
        $this->db->like('tbl_baton_assigned.group_r', $group_r);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function save_baton_assigned($data) {
        $this->db->insert('tbl_baton_assigned', $data);
    }
    public function save_baton_package($data) {
        $this->db->insert('tbl_baton_package', $data);
//        $insert_id = $this->db->insert_id();
//        return  $insert_id;
    }
    public function update_baton_package($package_id, $post_data) {
        $this->db->where('id', $package_id);
        $this->db->update('tbl_baton_package', $post_data);
        return $this->db->affected_rows() > 0;

//        $this->db->insert('tbl_baton_package', $data);
//        $insert_id = $this->db->insert_id();
//        return  $insert_id;
    }
    public function save_baton_set_package($data) {
        $this->db->insert('tbl_baton_set_package', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function check_baton_invoice($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice');
        $this->db->where('student_id', $data['student_id']);
        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->where('class_b', $data['class_b']);
        $this->db->where('group_b', $data['group_b']);
        $this->db->where('section_b', $data['section_b']);
        $this->db->where('month_b', $data['month_b']);
        $this->db->where('year_b', $data['year_b']);
//        $this->db->where('tbl_baton_package_id', $data['tbl_baton_package_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function check_baton_invoice_discount($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice_discount');
        $this->db->where('student_id', $data['student_id']);
        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->where('class_b', $data['class_b']);
        $this->db->where('group_b', $data['group_b']);
        $this->db->where('section_b', $data['section_b']);
        $this->db->where('tbl_baton_set_package_id', $data['tbl_baton_set_package_id']);
//        $this->db->where('tbl_baton_package_id', $data['tbl_baton_package_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function search_baton_invoice_discount($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice_discount');
        $this->db->where('student_id', $data['student_id']);
        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->where('class_b', $data['class_b']);
        $this->db->where('group_b', $data['group_b']);
        $this->db->where('section_b', $data['section_b']);
        $this->db->where('tbl_baton_set_package_id', $data['tbl_baton_set_package_id']);
//        $this->db->where('tbl_baton_package_id', $data['tbl_baton_package_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function save_baton_invoice($data) {
        $this->db->insert('tbl_baton_invoice', $data);
//        $insert_id = $this->db->insert_id();
//        return  $insert_id;
    }
    public function save_baton_invoice_discount($data) {
        $this->db->insert('tbl_baton_invoice_discount', $data);
//        $insert_id = $this->db->insert_id();
//        return  $insert_id;
    }
    public function save_baton_invoice_due($data) {
        $this->db->insert('tbl_baton_invoice_due', $data);
//        $insert_id = $this->db->insert_id();
//        return  $insert_id;
    }
    public function select_baton_invoice_due($info_id,$in_id) {
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice_due');
        $this->db->where('tbl_baton_invoice_info_id', $info_id);
        $this->db->where('tbl_baton_invoice_id', $in_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function save_baton_invoice_info($data) {
        $this->db->insert('tbl_baton_invoice_info', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function update_due_baton_invoice($id,$total_pay,$total_due,$fine,$total_amnt) {
        $this->db->set('fine', $fine);
//        $this->db->set('g_total', $total_amnt);
        $this->db->set('total_paid', $total_pay);
        $this->db->set('total_due', $total_due);
        $this->db->where('id', $id);
        $this->db->update('tbl_baton_invoice');
    }
    public function select_invoice_by_id($id) {
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice_info');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_all_invoive_info($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice_info');
//        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->where('class_b', $data['class_b']);
        $this->db->where('group_b', $data['group_b']);
        $this->db->where('section_b', $data['section_b']);
        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->like('month_b', $data['month']);
        $this->db->like('student_id', $data['student_id']);
        $this->db->order_by('id', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_invoive_info_with_date($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice_info');
//        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->where('class_b', $data['class_b']);
        $this->db->where('group_b', $data['group_b']);
        $this->db->where('section_b', $data['section_b']);
        $this->db->where('year_stu_b', $data['year_stu_b']);
        $this->db->like('month_b', $data['month']);
        $this->db->like('student_id', $data['student_id']);
        $this->db->where('create_at >=', $data['form_date_form']);
        $this->db->where('create_at <=', $data['to_date_to']);
        $this->db->order_by('id', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_baton_invoice_student_id($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice');
        $this->db->where('student_id', $data['student_id']);
        $this->db->where('total_due !=', 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_student_student_id($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('student_information');
        $this->db->where('id', $data['student_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_baton_invoice($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice');
        $this->db->where_in('id', $data);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_baton_package_name($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_package');
        $this->db->where('package_name', $data['package_name']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_baton_package_id($id) {
//        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_package');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_baton_package_name_dalete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_baton_package');

        $this->db->where('tbl_baton_package_id', $id);
        $this->db->delete('tbl_baton_set_package');
    }
    public function select_baton_set_package_name($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_set_package');
        $this->db->where('year', $data['year']);
        $this->db->where('class', $data['class']);
        $this->db->where('group_r', $data['group_r']);
//        $this->db->where('tbl_baton_package_id', $data['tbl_baton_package_id']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_baton() {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_assigned');
        $this->db->where('teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_baton_package() {
//        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_package');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_baton_set_package_by_class($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton_set_package set_pack');
        $this->db->join('tbl_baton_package pack', 'set_pack.tbl_baton_package_id=pack.id');
        $this->db->like('set_pack.year', $data['year']);
        $this->db->like('set_pack.class', $data['class']);
        $this->db->like('set_pack.group_r', $data['group_r']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_baton_set_package_by_class_session($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton_set_package set_pack');
        $this->db->join('tbl_baton_package pack', 'set_pack.tbl_baton_package_id=pack.id');
        $this->db->like('set_pack.year', $data['session']);
        $this->db->like('set_pack.class', $data['class']);
        $this->db->like('set_pack.group_r', $data['group_r']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_baton_set_package($data) {
        $this->db->select('set_pack.*,pack.package_name');
        $this->db->from('tbl_baton_set_package set_pack');
        $this->db->join('tbl_baton_package pack', 'set_pack.tbl_baton_package_id=pack.id');
        $this->db->like('set_pack.year', $data['year']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function delete_baton_ass($assigned_id) {
        $this->db->where('baton_assigned_id', $assigned_id);
        $this->db->delete('tbl_baton_assigned');
    }
    public function baton_package_active_update($id,$type) {
        $this->db->set('p_type', $type);
        $this->db->where('id', $id);
        $this->db->update('tbl_baton_package');
    }
    public function delete_baton_set($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_baton_set_package');
    }

    public function check_baton_set_package_name($id) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_set_package');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function delete_baton_set_invoice_discount($id,$class,$year,$group) {
        $this->db->where('tbl_baton_set_package_id', $id);
        $this->db->where('class_b ', $class);
        $this->db->where('year_stu_b', $year);
        $this->db->where('group_b', $group);
        $this->db->delete('tbl_baton_invoice_discount');
    }
    public function select_all_stu_baton($data) {
        $this->db->select('*, stu_info.roll as s_roll');
        $this->db->from('tbl_baton tbl');
        $this->db->join('tbl_all_registration_info stu_info', 'stu_info.reg_id=tbl.reg_id AND stu_info.class=tbl.class_b');
        $this->db->join('student_information siu', 'siu.reg_id=stu_info.reg_id');
        $this->db->where('tbl.class_b', $data['class_b']);
        $this->db->where('tbl.group_b', $data['group_b']);
        $this->db->where('tbl.section_b', $data['section_b']);
        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
        $this->db->order_by('stu_info.roll', "asc");
//        $this->db->where('stu_info.ending_date', '0000-00-00');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_baton_payment_invoice($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton tbl');
        $this->db->join('tbl_all_registration_info stu_info', 'stu_info.reg_id=tbl.reg_id');
        $this->db->join('student_information siu', 'siu.reg_id=stu_info.reg_id');
        $this->db->where('tbl.student_id', $data['student_id']);
        $this->db->where('tbl.create_date >=', $data['to_date']);
        $this->db->where('tbl.create_date <=', $data['form_date']);
//        $this->db->where('tbl.class_b', $data['class_b']);
//        $this->db->where('tbl.group_b', $data['group_b']);
//        $this->db->where('tbl.section_b', $data['section_b']);
//        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
        $this->db->order_by('stu_info.roll', "asc");
//        $this->db->where('stu_info.ending_date', '0000-00-00');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_stu_baton_set($data) {
        $this->db->select('*');
        $this->db->from('tbl_baton tbl');
        $this->db->join('tbl_all_registration_info stu_info', 'stu_info.reg_id=tbl.reg_id');
        $this->db->join('student_information siu', 'siu.reg_id=stu_info.reg_id');
        $this->db->where('tbl.class_b', $data['class']);
        $this->db->where('tbl.group_b', $data['group_r']);
        $this->db->where('tbl.section_b', $data['section']);
        $this->db->where('tbl.year_stu_b', $data['year']);
        $this->db->like('siu.id', $data['student_id']);
//        $this->db->where('stu_info.ending_date', '0000-00-00');
        $this->db->where('stu_info.ending_date', null);
        $this->db->order_by("siu.id", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_stu_baton_subject($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*, stu_info.roll');
        $this->db->from('tbl_baton tbl');
        $this->db->join('tbl_all_registration_info stu_info', 'stu_info.reg_id=tbl.reg_id');
        $this->db->join('student_information siu', 'siu.reg_id=stu_info.reg_id');
        $this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl.teacher_id ');
        $this->db->where('tbl.class_b', $data['class_b']);
        $this->db->where('tbl.group_b', $data['group_b']);
        $this->db->where('tbl.section_b', $data['section_b']);
        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
        $this->db->like('tbl.month_b', $data['month']);
        $this->db->like('tbl.entry_date', $data['entry_date']);
        $this->db->like('tbl.student_id', $data['student_id']);
//        $this->db->where('stu_info.ending_date', '0000-00-00');
        $this->db->where('stu_info.ending_date', null);
        $this->db->order_by('stu_info.roll', 'ASC');
//        $this->db->where('tbl.teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_stu_baton_subject_invoice($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*, stu_info.roll,tbl.*,tbl.id as rt_no,tbl.create_date as b_invoice_date');
        $this->db->from('tbl_baton_invoice tbl');
        $this->db->join('tbl_all_registration_info stu_info', 'stu_info.reg_id=tbl.reg_id');
        $this->db->join('student_information siu', 'siu.reg_id=stu_info.reg_id');
        $this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl.teacher_id ');
        $this->db->where('tbl.class_b', $data['class_b']);
        $this->db->where('tbl.group_b', $data['group_b']);
        $this->db->where('tbl.section_b', $data['section_b']);
        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
        $this->db->where('tbl.total_paid >', 0);
        $this->db->like('tbl.month_b', $data['month']);
//        $this->db->like('tbl.entry_date', $data['entry_date']);
        $this->db->like('tbl.student_id', $data['student_id']);
//        $this->db->where('tbl.create_date >=', $data['form_date_form']);
//        $this->db->where('tbl.create_date <=', $data['to_date_to']);
//        $this->db->like('tbl.create_date BETWEEN "'. $data['form_date_form'] .'" and "'. $data['to_date_to'] .'"');
//        $this->db->where('stu_info.ending_date', '0000-00-00');
        $this->db->where('stu_info.ending_date', null);
        $this->db->order_by('stu_info.roll', 'ASC');
//        $this->db->where('tbl.teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_student_search($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.father_name,stu_info.mother_name,stu_info.stu_phone,stu_info.mobile_number,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.ending_date,reg_info.reg_id,reg_info.all_reg_id');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('reg_info.year', $data['year_stu_b']);
        $this->db->where('reg_info.class', $data['class_b']);
        $this->db->where('reg_info.section', $data['section_b']);
        $this->db->where('reg_info.group_r', $data['group_b']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->order_by("reg_info.roll", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function admin_report_sql($data) {
//        $m_ew = $this->session->userdata('user_id');
//        $this->db->select('*');, COUNT(class_b) AS count
        $this->db->select('class_b,section_b,year_stu_b,group_b');
        $this->db->distinct();
//        $this->db->group_by('section_b');
        $this->db->from('tbl_baton_invoice tbl');
//        $this->db->where('tbl.year_b', $year_b);
//        $this->db->where('tbl.month_b', $month_b);
//        $this->db->where('tbl.student_id', $student_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function admin_report_sql_count($data) {
//        $m_ew = $this->session->userdata('user_id');
//        $this->db->select('*');, COUNT(class_b) AS total_student
        $this->db->select('student_id');
        $this->db->distinct();
        $this->db->from('tbl_baton_invoice tbl');
        $this->db->where('tbl.class_b', $data['class_b']);
        $this->db->where('tbl.section_b', $data['section_b']);
        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
        $this->db->where('tbl.group_b', $data['group_b']);
//        $this->db->group_by('student_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $query_result->num_rows();
    }
    public function admin_report_total_stu_id() {
//        $m_ew = $this->session->userdata('user_id');
//        $this->db->select('*');, COUNT(class_b) AS total_student
        $this->db->select('student_id');
        $this->db->distinct();
        $this->db->from('tbl_baton_invoice tbl');
//        $this->db->group_by('student_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $query_result->num_rows();
//        return $result;
    }
    public function select_student_monthly_report($year_b, $month_b, $student_id) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_baton_invoice tbl');
        $this->db->where('tbl.year_b', $year_b);
        $this->db->where('tbl.month_b', $month_b);
        $this->db->where('tbl.student_id', $student_id);
//        $this->db->where('tbl.total_paid >', 0);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_all_stu_baton_subject_invoice_with_date($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*, stu_info.roll,tbl.*,tbl.id as rt_no,tbl.create_date as b_invoice_date');
        $this->db->from('tbl_baton_invoice tbl');
        $this->db->join('tbl_all_registration_info stu_info', 'stu_info.reg_id=tbl.reg_id');
        $this->db->join('student_information siu', 'siu.reg_id=stu_info.reg_id');
        $this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl.teacher_id ');
        $this->db->where('tbl.class_b', $data['class_b']);
        $this->db->where('tbl.group_b', $data['group_b']);
        $this->db->where('tbl.section_b', $data['section_b']);
        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
        $this->db->where('tbl.total_paid >', 0);
        $this->db->like('tbl.month_b', $data['month']);
//        $this->db->like('tbl.entry_date', $data['entry_date']);
        $this->db->like('tbl.student_id', $data['student_id']);
        $this->db->where('tbl.create_date >=', $data['form_date_form']);
        $this->db->where('tbl.create_date <=', $data['to_date_to']);
//        $this->db->like('tbl.create_date BETWEEN "'. $data['form_date_form'] .'" and "'. $data['to_date_to'] .'"');
//        $this->db->where('stu_info.ending_date', '0000-00-00');
        $this->db->where('stu_info.ending_date', null);
        $this->db->order_by('stu_info.roll', 'ASC');
//        $this->db->where('tbl.teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_stu_baton($datap) {
        $this->db->select('*');
        $this->db->from('tbl_baton');
        $this->db->where('student_id', $datap['student_id']);
        $this->db->where('month_b', $datap['month_b']);
        $this->db->where('year_b', $datap['year_b']);
        $this->db->where('class_b', $datap['class_b']);
        $this->db->where('group_b', $datap['group_b']);
        $this->db->where('section_b', $datap['section_b']);
        $this->db->where('year_stu_b', $datap['year_stu_b']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function save_stu_baton($datap) {
        $this->db->insert('tbl_baton', $datap);
        return $this->db->insert_id();
    }

    public function class_all_stu_reg_search($class, $year, $section, $group_r) {
        $this->db->select('tbl_all_registration_info.*,student_information.id,student_information.name,student_information.photo');
        $this->db->from('tbl_all_registration_info');
        $this->db->join('student_information', 'student_information.reg_id = tbl_all_registration_info.reg_id', 'inner');
        $this->db->where('tbl_all_registration_info.year', $year);
        $this->db->where('tbl_all_registration_info.class', $class);
        $this->db->where('tbl_all_registration_info.section', $section);
        $this->db->where('tbl_all_registration_info.group_r', $group_r);
//        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->order_by("tbl_all_registration_info.roll", "ASC");

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function class_all_stu_distinct($class, $year) {
        $this->db->select('class,section,year,group_r');
        $this->db->distinct();
        $this->db->from('tbl_all_registration_info');
        $this->db->where('class', $class);
        $this->db->where('year', $year);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_baton_due($data) {
        //year_stu_b, sr.class_b, sr.group_b, sr.section_b
        $this->db->select('sr.*, reg_info.roll');
        $this->db->from('tbl_baton sr');
        $this->db->join('tbl_all_registration_info reg_info', 'sr.reg_id=reg_info.reg_id');
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('sr.year_stu_b', $data['year']);
        $this->db->where('sr.class_b', $data['class']);
        $this->db->where('sr.year_b', $data['pay_year']);
        $this->db->where('sr.month_b', $data['month']);
//        $this->db->where('sr.section', $data['section']);
//        $this->db->where('sr.group_r', $data['group_r']);
//        $this->db->where('sr.term', $data['term']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
