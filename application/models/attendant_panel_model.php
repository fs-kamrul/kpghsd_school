<?php
class attendant_panel_model extends CI_Model {
    public function save_att_assigned($data) {
        $this->db->insert('tbl_attendant_assigned', $data);
    }
    public function select_att_search($group_r, $class, $section, $year) {
        $this->db->select('tbl_attendant_assigned.ass_id,tbl_attendant_assigned.year,tbl_attendant_assigned.group_r,tbl_attendant_assigned.class,tbl_subject_info.sub_code,tbl_subject_info.sub_id,tbl_subject_info.sub_name,tbl_admin.admin_name');
        $this->db->from('tbl_attendant_assigned');
        $this->db->join('tbl_subject_info', 'tbl_attendant_assigned.subject_id=tbl_subject_info.sub_id');
        $this->db->join('tbl_admin', 'tbl_attendant_assigned.teacher_id=tbl_admin.admin_id');
        $this->db->where('tbl_attendant_assigned.year', $year);
        $this->db->like('tbl_attendant_assigned.class', $class);
        $this->db->like('tbl_attendant_assigned.section', $section);
        $this->db->like('tbl_attendant_assigned.group_r', $group_r);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function delete_ass($assigned_id) {
        $this->db->where('ass_id', $assigned_id);
        $this->db->delete('tbl_attendant_assigned');
    }
    // Start Machine
    public function check_att_init($number) {
        $this->db->select('*');
        $this->db->from('tbl_tag');
        $this->db->where('rfid_tag', $number);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function check_att_inout($reg_id,$date) {
        $this->db->select('*');
        $this->db->from('tbl_attendant_machine');
        $this->db->where('reg_id', $reg_id);
        $this->db->where('in_date >=', substr($date,0,10));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function insert_att_in($reg_id,$date){
        $this->db->set('reg_id', $reg_id);
        $this->db->set('in_date', $date);
        $this->db->insert('tbl_attendant_machine');
    }
    
    public function insert_att_save($tag,$date){
        $this->db->select('*');
        $this->db->from('tbl_tag');
        $this->db->where('rfid_tag', $tag);
        $this->db->where('status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if($result){
            $this->db->set('stu_id', $result->stu_id);
//            $this->db->set('reg_id', $result->reg_id);
            $this->db->set('inout_datetime', $date);
            $this->db->insert('tbl_attendant_machine');
        }
    }


    public function update_att_init($number, $tag,$date) {
            $this->db->set('update_at', $date);
            $this->db->set('rfid_tag', $tag);
            $this->db->where('rfid_tag', $number);
            $this->db->where('status', '1');
            $this->db->update('tbl_tag');
    }

    public function update_att_out($id,$date) {
        $this->db->set('out_date', $date);
        $this->db->where('id', $id);
        $this->db->update('tbl_attendant_machine');
    }

    // End Machine
    public function select_att() {
        //$this->db->distinct();
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_attendant_assigned');
        $this->db->join('tbl_subject_info', 'tbl_attendant_assigned.subject_id=tbl_subject_info.sub_id');
        $this->db->where('teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_att_techer() {
        //$this->db->distinct();
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tbl_attendant_assigned');
        $this->db->join('tbl_subject_info', 'tbl_attendant_assigned.subject_id=tbl_subject_info.sub_id');
        $this->db->where('teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function chk_att_stu($data) {
        $this->db->select('*');
        $this->db->from('tbl_attendant');
        $this->db->where('day', $data['day']);
        $this->db->where('month', $data['month']);
        $this->db->where('year', $data['year']);
        $this->db->where('subject_id', $data['subject_id']);
        $this->db->where('student_id', $data['student_id_a']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function save_att_stu($date, $chk,$i) {
        $m_ew = $this->session->userdata('user_id');
//        for ($i=1;$i<=$other;$i++) {
            if(isset($chk[$i])){
                $this->db->set('student_id', $date['student_id'.$i]);
                $this->db->set('subject_id', $date['subject_id']);
                $this->db->set('day', $date['day']);
                $this->db->set('month', $date['month']);
                $this->db->set('year', $date['year']);
                $this->db->set('teacher_id', $m_ew);
                $this->db->set('valid_att', '1');
                $this->db->insert('tbl_attendant');
            }  else {
                $this->db->set('student_id', $date['student_id'.$i]);
                $this->db->set('subject_id', $date['subject_id']);
                $this->db->set('day', $date['day']);
                $this->db->set('month', $date['month']);
                $this->db->set('year', $date['year']);
                $this->db->set('teacher_id', $m_ew);
                $this->db->set('valid_att', '0');
                $this->db->insert('tbl_attendant');
            }
//        }
    }
    public function updat_att_stu($date, $chk,$i) {
        $m_ew = $this->session->userdata('user_id');
//        for ($i=1;$i<=$other;$i++) {
            if($chk[$i]){
                $this->db->set('valid_att', '1');
                $this->db->set('teacher_id', $m_ew);
                $this->db->where('subject_id', $date['subject_id']);
                $this->db->where('day', $date['day']);
                $this->db->where('month', $date['month']);
                $this->db->where('year', $date['year']);
                $this->db->where('student_id', $date['student_id'.$i]);
                $this->db->where('subject_id', $data['subject_id']);
                $this->db->update('tbl_attendant');
            }  else {
                $this->db->set('valid_att', '0');
                $this->db->set('teacher_id', $m_ew);
                $this->db->where('subject_id', $date['subject_id']);
                $this->db->where('day', $date['day']);
                $this->db->where('month', $date['month']);
                $this->db->where('year', $date['year']);
                $this->db->where('student_id', $date['student_id'.$i]);
                $this->db->where('subject_id', $data['subject_id']);
                $this->db->update('tbl_attendant');
            }
//        }
    }
    public function search_month_att($data) {
        $this->db->select('*');
        $this->db->from('tbl_attendant');
        $this->db->join('tbl_subject_info', 'tbl_attendant.subject_id=tbl_subject_info.sub_id');
        $this->db->join('student_information', 'student_information.id=tbl_attendant.student_id');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
        $this->db->where('tbl_attendant.year', $data['year']);
        $this->db->where('tbl_attendant.month', $data['month']);
        $this->db->where('tbl_attendant.subject_id', $data['subject_id']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.group_r', $data['group']);
        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by('tbl_attendant.day', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_month_day_att($data) {
        $this->db->select('*');
        $this->db->from('tbl_attendant');
        $this->db->join('tbl_subject_info', 'tbl_attendant.subject_id=tbl_subject_info.sub_id');
        $this->db->join('student_information', 'student_information.id=tbl_attendant.student_id');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
        $this->db->where('tbl_attendant.valid_att', 0);
        $this->db->where('tbl_attendant.year', $data['year']);
        $this->db->where('tbl_attendant.month', $data['month']);
        $this->db->where('tbl_attendant.day', $data['day']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.group_r', $data['group_r']);
        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->where('tbl_attendant.subject_id', $data['subject_id']);
        $this->db->order_by('tbl_attendant.day', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_month_day_all_class($data) {
        $this->db->select('*');
        $this->db->from('tbl_attendant');
        $this->db->join('tbl_subject_info', 'tbl_attendant.subject_id=tbl_subject_info.sub_id');
        $this->db->join('student_information', 'student_information.id=tbl_attendant.student_id');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
        $this->db->where('tbl_attendant.valid_att', 0);
        $this->db->where('tbl_attendant.year', $data['year']);
        $this->db->where('tbl_attendant.month', $data['month']);
        $this->db->where('tbl_attendant.day', $data['day']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
//        $this->db->where('reg_info.class', $data['class']);
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('tbl_subject_info.sub_name', $data['subject_name']);
        $this->db->order_by('tbl_attendant.day', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_month_day_by_class($data) {
        $this->db->select('*');
        $this->db->from('tbl_attendant');
        $this->db->join('tbl_subject_info', 'tbl_attendant.subject_id=tbl_subject_info.sub_id');
        $this->db->join('student_information', 'student_information.id=tbl_attendant.student_id');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
//        $this->db->where('tbl_all_registration_info.ending_date', '0000-00-00');
        $this->db->where('tbl_attendant.valid_att', 0);
        $this->db->where('tbl_attendant.year', $data['year']);
        $this->db->where('tbl_attendant.month', $data['month']);
        $this->db->where('tbl_attendant.day', $data['day']);
        $this->db->where('tbl_subject_info.sub_name', $data['subject_name']);
        $this->db->where_not_in('student_information.class', 'One');
        $this->db->where_not_in('reg_info.class', 'Two');
        $this->db->where_not_in('reg_info.class', 'Three');
        $this->db->where_not_in('reg_info.class', 'Four');
        $this->db->where_not_in('reg_info.class', 'Five');
        $this->db->where_not_in('reg_info.class', 'Six');
        $this->db->where_not_in('reg_info.class', 'Seven');
        $this->db->where_not_in('reg_info.class', 'Eight');
        $this->db->where_not_in('reg_info.class', 'Nine');
        $this->db->where_not_in('reg_info.class', 'Ten');
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
//        $this->db->where('reg_info.class', 'Eleven');
//        $this->db->where('reg_info.class', 'Twelve');
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.section', $data['section']);
        $this->db->order_by('tbl_attendant.day', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_one_ten_class($data) {
        $this->db->select('*');
        $this->db->from('tbl_attendant');
        $this->db->join('tbl_subject_info', 'tbl_attendant.subject_id=tbl_subject_info.sub_id');
        $this->db->join('student_information', 'student_information.id=tbl_attendant.student_id');
        $this->db->join('tbl_all_registration_info reg_info', 'reg_info.reg_id = student_information.reg_id', 'inner');
        $this->db->where('tbl_attendant.valid_att', 0);
        $this->db->where('tbl_attendant.year', $data['year']);
        $this->db->where('tbl_attendant.month', $data['month']);
        $this->db->where('tbl_attendant.day', $data['day']);
        $this->db->where_not_in('reg_info.class', 'Eleven');
        $this->db->where_not_in('reg_info.class', 'Twelve');
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.sub_name', $data['subject_name']);
        $this->db->order_by('tbl_attendant.day', 'ASC');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_in_one_subject() {
        $this->db->select('sub_name');
        $this->db->distinct();
        $this->db->from('tbl_subject_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_subject_by_class() {
        $this->db->select('sub_name');
        $this->db->distinct();
        $this->db->from('tbl_subject_info');
        $this->db->where('class', 'Eleven');
        $this->db->or_where('class', 'Twelve');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_sms_result($data) {
        $this->db->select('tt_in.cgpa,tt_in.term,stu_info.id,stu_info.name,stu_info.stu_phone,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_stu_result tt_in', 'tt_in.result_all_reg_id=reg_info.all_reg_id', 'left');
        $this->db->like('reg_info.class', $data['class']);
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('tt_in.class', $data['class']);
        $this->db->where('tt_in.year', $data['year']);
        $this->db->where('tt_in.term', $data['term']);
//        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("reg_info.roll", "ASC");
        $this->db->order_by("reg_info.group_r", "ASC");
        $this->db->order_by("reg_info.class", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function search_text_sms_result($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.stu_phone,stu_info.mobile_number,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.post,stu_info.sub_district,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
//        $this->db->join('tbl_stu_result tt_in', 'tt_in.result_all_reg_id=reg_info.all_reg_id', 'left');
        $this->db->where('reg_info.year', $data['year']);
//        $this->db->where('tt_in.term', $data['term']);
        $this->db->like('reg_info.class', $data['class']);
//        $this->db->where('reg_info.section', $data['section']);
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("reg_info.roll", "ASC");
        $this->db->order_by("reg_info.group_r", "ASC");
        $this->db->order_by("reg_info.class", "ASC");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_sms_stu_result($data) {
        $this->db->select('marksub.mark,marksub.mark_pf,marksub.mark_id,marksub.term,addm.mark_title,addm.mark_number,addm.mark_pass,sub.sub_name,sub.sub_code,sub.sub_mark,sub.pass_mark,tbl_4sub.add_f,stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.stu_phone,stu_info.father_name,stu_info.mother_name,stu_info.birth_bate,reg_info.group_r,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.class,reg_info.section,reg_info.year');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id');
        $this->db->join('tbl_subject_info sub', 'sub.sub_id=tbl_4sub.sub_id');
        $this->db->join('tbl_add_mark addm', 'addm.sub_id=sub.sub_id AND addm.sub_id=sub.sub_id AND tbl_4sub.sub_id=addm.sub_id');
        $this->db->join('tbl_mark_sub marksub', 'marksub.all_reg_id=reg_info.all_reg_id AND addm.add_mark_id=marksub.add_mark_id And marksub.sub_id=sub.sub_id');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->like('reg_info.class', $data['class']);
//        $this->db->like('reg_info.section', $data['section']);
//        $this->db->where('reg_info.group_r', $data['group_r']);
//        $this->db->where('sub.group_r', $data['group_r']);
        $this->db->where('marksub.term', $data['term']);
        $this->db->order_by("sub.sub_id", "ASC");
//        $this->db->where('addm.add_mark_id', 'marksub.add_mark_id');
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
