<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function save_transaction($data) {
        $this->db->insert('transactions', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function check_transaction($id) {
        $this->db->select('*');
        $this->db->from('transactions');
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_transactions_payments($id){
        $this->db->select('*');
        $this->db->from('transactions_payments');
        $this->db->where('customer_order_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function select_transactions_payments_by_customer_order_id($id){
        $this->db->select('*');
        $this->db->from('transactions_payments');
        $this->db->where('customer_order_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    public function save_transactions_payments($data) {
        $this->db->insert('transactions_payments', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function update_transactions_payments($data) {
        // Ensure customer_order_id is provided
        if (empty($data['customer_order_id'])) {
            return false;
        }

        // Check if a record exists with the given customer_order_id
        $this->db->where('customer_order_id', $data['customer_order_id']);
        $query = $this->db->get('transactions_payments'); // Change to your actual table name

        if ($query->num_rows() > 0) {
            // Record exists, proceed with update
            $this->db->where('customer_order_id', $data['customer_order_id']);
            $this->db->update('transactions_payments', $data);

            if ($this->db->affected_rows() > 0) {
                return true; // Update successful
            } else {
                return false; // Update failed or no changes
            }
        } else {
            // No record found with the given customer_order_id
            return false;
        }
    }

}