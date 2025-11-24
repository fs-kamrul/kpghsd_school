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
}
