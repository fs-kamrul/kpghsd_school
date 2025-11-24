<?php

class transactions_payments_model extends CI_Model {

    public function save_all_payments($data) {
        $this->db->insert('transactions_payments', $data);
    }
    public function check_customer_order_id($id) {
        $this->db->select('*');
        $this->db->from('transactions_payments');
        $this->db->where('customer_order_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function get_student_data_by_id($id) {
        $this->db->select('*');
        $this->db->from('student_information');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function check_student_id($id) {
        $this->db->select('*');
        $this->db->from('transactions_payments');
        $this->db->where('student_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function update_id_payments($data, $id) {
//        $this->db->set('order_id', $data['order_id']);
//        $this->db->set('status', $data['status']);
//        $this->db->set('transactions_id', $data['transactions_id']);
        $this->db->where('id', $id);
        $this->db->update('transactions_payments', $data);
//        $this->db->update('transactions_payments');
    }
    public function select_all_transactions_payments_list($data) {
        $m_ew = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('transactions_payments tbl');
        $this->db->where('tbl.class_b', $data['class_b']);
        $this->db->where('tbl.group_b', $data['group_b']);
        $this->db->where('tbl.section_b', $data['section_b']);
        $this->db->where('tbl.year_stu_b', $data['year_stu_b']);
//        $this->db->like('tbl.entry_date', $data['entry_date']);
//        $this->db->where('tbl.status', 2);
        $this->db->order_by('tbl.id', 'ASC');
//        $this->db->where('tbl.teacher_id', $m_ew);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
}
