<?php

class machine_attendant_model extends CI_Model {

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
    public function machine_search_month_day_att($data) {
//        student_information.*,reg_info.*,tbl_attendant_machine.stu_id,tbl_attendant_machine.inout_datetime
        $this->db->select('student_information.*,reg_info.*,tbl_attendant_machine.stu_id,tbl_attendant_machine.inout_datetime');
        $this->db->from('student_information');
        $this->db->join('tbl_attendant_machine', "student_information.id=tbl_attendant_machine.stu_id "
                . " and tbl_attendant_machine.inout_datetime >= '".$data['form_date']."'"
                . " and tbl_attendant_machine.inout_datetime <= '".$data['to_date']."'", 'left');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
//        $this->db->where('tbl_attendant_machine.inout_datetime >= ', $data['form_date']);
//        $this->db->where('tbl_attendant_machine.inout_datetime < ', $data['to_date']);
//        WHERE columname >='2012-12-25 00:00:00'
//AND columname <'2012-12-26 00:00:00'
        $this->db->where('reg_info.year', $data['session']);
        $this->db->where('reg_info.class', $data['class']);
//        $this->db->where('reg_info.group_r', $data['group_r']);
        $this->db->like('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.section', $data['section']);
        $this->db->like('reg_info.section', $data['section']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by('tbl_attendant_machine.id', 'ASC');
        $this->db->group_by('student_information.id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function machine_search_month_day_att_all_class($data) {
//        student_information.*,reg_info.*,tbl_attendant_machine.stu_id,tbl_attendant_machine.inout_datetime
        $this->db->select('student_information.*,reg_info.*,tbl_attendant_machine.stu_id,tbl_attendant_machine.inout_datetime');
        $this->db->from('student_information');
        $this->db->join('tbl_attendant_machine', "student_information.id=tbl_attendant_machine.stu_id "
                . " and tbl_attendant_machine.inout_datetime >= '".$data['form_date']."'"
                . " and tbl_attendant_machine.inout_datetime <= '".$data['to_date']."'", 'left');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
//        $this->db->where('tbl_attendant_machine.inout_datetime >= ', $data['form_date']);
//        $this->db->where('tbl_attendant_machine.inout_datetime < ', $data['to_date']);
//        WHERE columname >='2012-12-25 00:00:00'
//AND columname <'2012-12-26 00:00:00'
        $this->db->where('reg_info.year', $data['session']);
        $this->db->where_in('reg_info.class', explode(',', $data['class']));
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->like('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.section', $data['section']);
//        $this->db->like('reg_info.section', $data['section']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by('tbl_attendant_machine.id', 'ASC');
        $this->db->group_by('student_information.id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function machine_search_month_monthly_apsent($data) {
//        student_information.*,reg_info.*,tbl_attendant_machine.stu_id,tbl_attendant_machine.inout_datetime
//        $this->db->select('student_information.*,reg_info.*');
        $this->db->select('student_information.id,min(student_information.name) name,min(student_information.photo) photo,min(reg_info.roll) roll,min(student_information.mobile_number) mobile_number');
        $this->db->from('student_information');
//        $this->db->join('tbl_attendant_machine', "student_information.id=tbl_attendant_machine.stu_id "
//                . " and tbl_attendant_machine.inout_datetime >= '".$data['form_date']."'"
//                . " and tbl_attendant_machine.inout_datetime <= '".$data['to_date']."'", 'left');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
//        $this->db->where('tbl_attendant_machine.inout_datetime >= ', $data['form_date']);
//        $this->db->where('tbl_attendant_machine.inout_datetime < ', $data['to_date']);
//        WHERE columname >='2012-12-25 00:00:00'
//AND columname <'2012-12-26 00:00:00'
        $this->db->where('reg_info.year', $data['session']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.group_r', $data['group_r']);
        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
//        $this->db->order_by('tbl_attendant_machine.id', 'ASC');
        $this->db->order_by('roll', 'ASC');
        $this->db->group_by('student_information.id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function machine_search_month_present($form_date,$to_date,$id) {
        $this->db->select('*');
        $this->db->from('tbl_attendant_machine');
        $this->db->where('stu_id', $id);
        $this->db->where('inout_datetime >= ', $form_date);
        $this->db->where('inout_datetime < ', $to_date);
        $this->db->order_by('id', 'ASC');
//        $this->db->group_by('stu_id');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function machine_search_yearly_present($form_date,$to_date,$id) {
        $this->db->select('COUNT(*) AS `numrows`');
        $this->db->from('tbl_attendant_machine');
        $this->db->where('stu_id', $id);
        $this->db->where('inout_datetime >= ', $form_date);
        $this->db->where('inout_datetime < ', $to_date);
//        $this->db->order_by('id', 'ASC');
//        $this->db->group_by(', DAY(inout_datetime), MONTH(inout_datetime), YEAR(inout_datetime)');
        $this->db->group_by(', date(inout_datetime)');
        $query_result = $this->db->get();
        $result = $query_result->result();
//        $result = $this->db->count_all_results();
        return count($result);
    }
    public function search_holly_date() {
        $this->db->select('*');
        $this->db->from('tbl_holly_day');
        $this->db->order_by('id', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_id_holly_date($id) {
        $this->db->select('*');
        $this->db->where('holly_date', $id);
        $this->db->from('tbl_holly_day');
//        $this->db->order_by('id', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function holly_date_insert($data) {
//        $this->db->set('holly_date', $data['holly_date']);
//        $this->db->set('detail', $data['detail']);
        $this->db->insert('tbl_holly_day',$data);
    }
    public function holly_date_datele($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_holly_day');
    }
}
