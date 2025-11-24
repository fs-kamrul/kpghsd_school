<?php

class Subject_panel_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function save_sub_data($data) {
        $this->db->insert('tbl_subject_info', $data);
    }

    public function select_all_sub() {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_sub_class($data) {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $this->db->where('class', $data['class']);
        $this->db->where('group_r', $data['group_r']);
        $this->db->order_by("sub_code", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_sub_s() {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_sub_id($sub_id) {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $this->db->where('sub_id', $sub_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_sub_all() {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_one_cls_sub_all($data,$grp) {
        $this->db->select('*');
        $this->db->from('tbl_subject_info');
        $this->db->where('class', $data);
        $this->db->where('group_r', $grp);
        $this->db->order_by("sub_code", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_sub_att($id) {
        $this->db->select('sub_name');
        $this->db->from('tbl_subject_info');
        $this->db->where('sub_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_teacher_admin() {
        $this->db->select('*');
        $this->db->from('tbl_admin');
//        $this->db->where('profetion', 'teacher');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function delete_sub_id($sub_id) {
        $this->db->where('sub_id', $sub_id);
        $this->db->delete('tbl_subject_info');
    }

    public function select_all_reg() {
        $this->db->select('*');
        $this->db->from('tbl_all_registration_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_opt_all() {
        $this->db->select('*');
        $this->db->from('option_a');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_opt_opt_a($opt_a) {
        $this->db->select('*');
        $this->db->from('option_a');
        $this->db->where('opt_a', $opt_a);
        $this->db->order_by("data_a", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function search_reg($class, $year, $section,$group_r) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.photo,stu_info.division,stu_info.country,stu_info.zip_code,stu_info.village,stu_info.district,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,reg_info.year,reg_info.class');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->where('reg_info.year', $year);
        $this->db->where('reg_info.class', $class);
        $this->db->where('reg_info.section', $section);
        $this->db->where('reg_info.group_r', $group_r);
//        $this->db->where('reg_info.ending_date', '0000-00-00');
        $this->db->where('reg_info.ending_date', null);
        $this->db->order_by("reg_info.roll", "asc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
        
//        $this->db->select('*');
//        $this->db->from('tbl_all_registration_info');
//        $this->db->where('year', $year);
//        $this->db->where('class',$class);
////        $this->db->like('class', $class, 'after');
//        $this->db->where('section',$section);
//        $this->db->where('group_r',$group_r);
//        $this->db->where('tbl_all_registration_info.ending_date','0000-00-00');
//        $query_result = $this->db->get();
//        $result = $query_result->result();
//        return $result;
    }

    public function select_reg_by_three($year, $class, $section) {
        $this->db->select('*');
        $this->db->from('tbl_all_registration_info');
        $this->db->where('year', $year);
        $this->db->where('class', $class);
        $this->db->where('section', $section);
        //$this->db->like('class', $class, 'after');
        //$this->db->like('section', $section, 'after');

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_sub_assigned() {
        $this->db->select('*');
        $this->db->from('tbl_sub_assigned');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_one_sub_assigned($assigned_id) {
        $this->db->select('*');
        $this->db->from('tbl_sub_assigned');
        $this->db->where('assigned_id', $assigned_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_assigned($data) {
        $this->db->insert('tbl_sub_assigned', $data);
    }
    public function save_all_add_mark_assign($data) {
        $this->db->insert('tbl_add_mark', $data);
    }

    public function update_reg_tbl($data, $other) {
        $i = 1;
        for ($i > 0; $i <= $other; $i++) {
            $this->db->set('roll', $data['roll' . $i]);
            $this->db->set('section', $data['section' . $i]);
            $this->db->set('group_r', $data['group_r' . $i]);
            $this->db->where('all_reg_id', $data['all_reg_id' . $i]);
            $this->db->update('tbl_all_registration_info');
        }
    }
    
    public function select_tag($data) {
        
        $this->db->select('*');
        $this->db->from('tbl_tag');
        $this->db->where('reg_id', $data);
        $this->db->where('status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if ($result) {
//            ->rfid_tag
            return $result;
        } else {
            return '';
        }
        
    }
    public function tag_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_tag');
    }
    public function update_tag_tbl($data, $other) {
        $i = 1;
        for ($i > 0; $i <= $other; $i++) {
            $this->db->select('*');
            $this->db->from('tbl_tag');
            $this->db->where('rfid_tag', $data['rfid_tag' . $i]);
            $this->db->where('status', 1);
            $query_result = $this->db->get();
            $result22 = $query_result->row();
            if(!$result22 && !empty($data['rfid_tag' . $i])) {

                $this->db->set('status', 0);
                $this->db->where('reg_id', $data['reg_id' . $i]);
                $this->db->update('tbl_tag');
//            }else{
                $this->db->set('stu_id', $data['stu_id' . $i]);
                $this->db->set('reg_id', $data['reg_id' . $i]);
                $this->db->set('rfid_tag', $data['rfid_tag' . $i]);
                $this->db->insert('tbl_tag');
            }
        }
    }

    public function delete_registration($all_reg_id) {
        $this->db->where('all_reg_id', $all_reg_id);
        $this->db->delete('tbl_all_registration_info');
    }

    public function select_subject_assign_search($group_r, $class, $section, $year) {
        $this->db->select('tbl_sub_assigned.assigned_id,tbl_sub_assigned.group_r,tbl_sub_assigned.class,tbl_sub_assigned.section,tbl_subject_info.sub_code,tbl_subject_info.sub_id,tbl_subject_info.sub_name,tbl_admin.admin_name');
        $this->db->from('tbl_sub_assigned');
        $this->db->join('tbl_subject_info', 'tbl_sub_assigned.subject_id=tbl_subject_info.sub_id');
        $this->db->join('tbl_admin', 'tbl_sub_assigned.teacher_id=tbl_admin.admin_id');
        $this->db->where('tbl_sub_assigned.year', $year);
        $this->db->like('tbl_sub_assigned.class', $class);
        $this->db->like('tbl_sub_assigned.section', $section);
        $this->db->like('tbl_sub_assigned.group_r', $group_r);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function delete_assign($assigned_id) {
        $this->db->where('assigned_id', $assigned_id);
        $this->db->delete('tbl_sub_assigned');
    }

    public function save_add_four($data, $add) {
        $this->db->set('sub_id', $data['sub_id']);
        $this->db->set('all_reg_id', $data['all_reg_id']);
        $this->db->set('add_f', $add);
        $this->db->insert('tbl_4sub');
    }

    public function select_add_four($data) {
        $this->db->select('*');
        $this->db->from('tbl_4sub');
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->where('all_reg_id', $data['all_reg_id']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function update_add_four($data,$add) {
        $this->db->set('add_f', $add);
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->where('all_reg_id', $data['all_reg_id']);
        $this->db->update('tbl_4sub');
    }
    public function delete_add_four($data) {
        $this->db->where('sub_id', $data['sub_id']);
        $this->db->where('all_reg_id', $data['all_reg_id']);
        $this->db->delete('tbl_4sub');
    }
    public function select_add_four_stu($data) {
        $this->db->select('stu_info.id,stu_info.name,stu_info.mobile_number,stu_info.photo,reg_info.roll,reg_info.reg_id,reg_info.all_reg_id,tbl_4sub.add_f');
        $this->db->from('student_information stu_info');
        $this->db->join('tbl_all_registration_info reg_info', 'stu_info.reg_id=reg_info.reg_id');
        $this->db->join('tbl_4sub', 'tbl_4sub.all_reg_id=reg_info.all_reg_id and tbl_4sub.sub_id =\''.$data['sub_id'].'\'','left');
        $this->db->where('reg_info.year', $data['year']);
        $this->db->where('reg_info.class', $data['class']);
        $this->db->where('reg_info.section', $data['section']);
        $this->db->where('reg_info.group_r', $data['group_r']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

}
