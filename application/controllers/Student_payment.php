<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Methods: GET, OPTIONS");
//header('Access-Control-Allow-Headers: Content-Type, Authorization');
class Student_payment extends CI_Controller {
    private $angular_base_url;
    public function __construct() {
        parent::__construct();
//        $this->angular_base_url = 'http://localhost:4200';
        $this->angular_base_url = 'https://studentportal.ssdcnil.edu.bd';
//        $this->load->model('Student_payment_model');
        $this->load->helper('url');
        $this->load->model('baton_model', 'b_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('transaction_model', 'ts_model', TRUE);
        $this->load->model('transactions_ssl_model', 'ssl_model', TRUE);
        $this->load->model('transactions_payments_model', 'payments_model', TRUE);
        // Set JSON response header
//        header('Content-Type: application/json');
// Add CORS headers
//        header("Access-Control-Allow-Origin: {$this->angular_base_url}");
//        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
////        header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');
//        header('Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With');
//        header('Content-Type: application/json');
//
//        // Handle preflight requests
//        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
//            header('HTTP/1.1 200 OK');
//            exit();
//        }
    }

    // Create a new payment
//    public function create() {
//        $data = json_decode(file_get_contents('php://input'), true);
//
//        // Validate input
//        if (empty($data['student_id']) || empty($data['year']) || empty($data['amount'])) {
//            $this->output->set_status_header(400);
//            echo json_encode(['status' => 'error', 'message' => 'Student ID, year, and amount are required']);
//            return;
//        }
//
//        // Validate student_id format (e.g., YYYY-XXXXX)
//        if (!preg_match('/^\d{4}-\d{5}$/', $data['student_id'])) {
//            $this->output->set_status_header(400);
//            echo json_encode(['status' => 'error', 'message' => 'Invalid student ID format. Use YYYY-XXXXX']);
//            return;
//        }
//
//        // Validate year
//        if (!is_numeric($data['year']) || $data['year'] < 2000 || $data['year'] > date('Y')) {
//            $this->output->set_status_header(400);
//            echo json_encode(['status' => 'error', 'message' => 'Invalid year']);
//            return;
//        }
//
//        // Validate amount
//        if (!is_numeric($data['amount']) || $data['amount'] <= 0) {
//            $this->output->set_status_header(400);
//            echo json_encode(['status' => 'error', 'message' => 'Invalid amount']);
//            return;
//        }
//
//        $payment_data = [
//            'student_id' => $data['student_id'],
//            'year' => $data['year'],
//            'amount' => $data['amount'],
//            'payment_date' => date('Y-m-d H:i:s'),
//            'status' => 'completed'
//        ];
//
//        if ($this->Student_payment_model->insert($payment_data)) {
//            $this->output->set_status_header(201);
//            echo json_encode([
//                'status' => 'success',
//                'message' => 'Payment recorded successfully',
//                'data' => $payment_data
//            ]);
//        } else {
//            $this->output->set_status_header(500);
//            echo json_encode(['status' => 'error', 'message' => 'Failed to record payment']);
//        }
//    }

//    public function invoice_payment_success() {
////        ini_set('display_errors', 1);
////        error_reporting(E_ALL);
//        $data = array();
//        $invoice_info = array();
//
//        $json_data = file_get_contents('php://input');
//        $student_details = json_decode($json_data, true);
//
////        print_r($student_details);
////        return;
//
//        try {
//
//        $data['student_data_get'] = $student_details['student_data_get'];
//        $data['total_pay'] = $student_details['total_pay'];
////        $data['service_charge'] = $student_details['service_charge'];
//        $invoice_info['due'] = $student_details['due'];
//        $invoice_info['fine'] = $student_details['fine'];
//        $invoice_info['discount'] = $student_details['discount'];
//        $invoice_info['pay_amount'] = $student_details['pay_amount'];
////        $data['student_data'] = $this->b_model->select_baton_invoice_student_id[$data);
////        $tbl_baton_invoice_id = implode(",", $data['tbl_baton_invoice_id']);
////        $invoice_info['tbl_baton_invoice_id'] = $tbl_baton_invoice_id;
//        $invoice_info['tbl_baton_invoice_id'] = $student_details['tbl_baton_invoice_id'];
//        $invoice_info['receipte_no'] = '';
//        $invoice_info['student_id'] = $student_details['student_id'];
//        $invoice_info['reg_id'] = $student_details['reg_id'];
//        $invoice_info['year_stu_b'] = $student_details['year_stu_b'];
//        $invoice_info['class_b'] = $student_details['class_b'];
//        $invoice_info['group_b'] = $student_details['group_b'];
//        $invoice_info['section_b'] = $student_details['section_b'];
//        $invoice_info['month_b'] = $student_details['month_b'];
//        $invoice_info['year_b'] = $student_details['year_b'];
//        $invoice_info['teacher_id'] = $student_details['reg_id'];
//        $invoice_info['service_charge'] = $student_details['service_charge'];
//
//        $total_pay = $invoice_info['pay_amount']+$invoice_info['discount'];
//
////        print_r($data);
////        return;
//        $baton_invoice_info = $this->b_model->save_baton_invoice_info($invoice_info);
//        $value_amount = $value_set = $total_due = $fine = $total_amnt = 0;
//        $i = 0;
//        foreach ($data['student_data_get'] as $key=>$data_value) {
////            $i = $i+1;
////            $i++;
////            if (count($data['tbl_baton_month']) == $i) {
//                $int_id = $data_value['id'];
//                $value_amount = $data_value['total_due'] + $invoice_info['fine'];
//                $fine = $data_value['fine'] + $invoice_info['fine'];
//                $total_amnt = $data_value['total_amnt'] + $invoice_info['fine'];
//                $total_pay = $total_pay-$value_amount;
//                if($total_pay >= 0){
////                    echo $total_pay.'-------------';
//                    $total_due = 0;//-1*$total_pay;//$value_amount-$total_pay;
//                    $this->b_model->update_due_baton_invoice($int_id,$value_amount+$data_value['total_paid'],$total_due,$fine,$total_amnt);
//                    $data['tbl_baton_due'][$int_id] = $value_amount;
//                }else{
//                    $total_due = $total_pay * -1;
//                    $value_pay = $value_amount - $total_due;
//                    $this->b_model->update_due_baton_invoice($int_id,$value_pay+$data_value['total_paid'],$total_due,$fine,$total_amnt);
//                    $data['tbl_baton_due'][$int_id] = $value_amount-$invoice_info['fine'];
//                }
//            $ddata['tbl_baton_invoice_id']=$int_id;
//            $ddata['tbl_baton_invoice_info_id']=$baton_invoice_info;
//            $ddata['due_amount']=$data['tbl_baton_due'][$int_id];
//            $this->b_model->save_baton_invoice_due($ddata);
//
//        }
//
//
//
//            $sdata = array();
////        $sdata['message'] = 'Invoice Create Successfully. Your Receipt No.: <b>'.$baton_invoice_info.'</b> . <a target="_blank" href="'.base_url().'invoice_panel/invoice_by_print/'.$baton_invoice_info.'">View</a>';
////            $sdata['status'] = 'success';
////            $sdata['message'] = 'Invoice Create Successfully. Your Receipt No. ' . $baton_invoice_info;
////            $this->session->set_userdata($sdata);
////            echo json_encode(array('status' => 'success', 'message' => 'Invoice Create Successfully. Your Receipt No. ' . $baton_invoice_info));
//            echo json_encode(array('status' => 'success', 'message' => 'Your Receipt No. ' . $baton_invoice_info));
//            return;
////            print_r($sdata);
//        }catch (Exception $e) {
//
//            $sdata = array();
////        $sdata['message'] = 'Invoice Create Successfully. Your Receipt No.: <b>'.$baton_invoice_info.'</b> . <a target="_blank" href="'.base_url().'invoice_panel/invoice_by_print/'.$baton_invoice_info.'">View</a>';
////            $sdata['status'] = 'error';
////            $sdata['message'] = 'Something is wrong';
////            $this->session->set_userdata($sdata);
//            echo json_encode(array('status' => 'error', 'message' => 'Something is wrong '));
//            return;
////            print_r($sdata);
//        }
//
//        return;
////        redirect('invoice_panel/invoice_create');
////        $data['maincontain'] = $this->load->view('invoice/baton_invoice_show', $data, TRUE);
////        $this->load->view('admin/dashboard', $data);
//    }
    public function save_student_payments_info() {
        $json_data = file_get_contents('php://input');
        $transaction_data = json_decode($json_data, true);
//        print_r($transaction_data);
//        return;
        // Check if JSON decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid JSON data'));
            return;
        }

        // Map JSON data to database fields
        $data = array(
//            'id' => isset($transaction_data['id']) ? $transaction_data['id'] : null,
            'reg_id' => isset($transaction_data['reg_id']) ? $transaction_data['reg_id'] : null,
            'student_id' => isset($transaction_data['student_id']) ? $transaction_data['student_id'] : null,
            'customer_order_id' => isset($transaction_data['customer_order_id']) ? $transaction_data['customer_order_id'] : null,
            'order_id' => isset($transaction_data['order_id']) ? $transaction_data['order_id'] : null,
            'due' => isset($transaction_data['due']) ? $transaction_data['due'] : '0.0',
            'fine' => isset($transaction_data['fine']) ? $transaction_data['fine'] : 0.0,
            'discount' => isset($transaction_data['discount']) ? $transaction_data['discount'] : 0.0,
            'service_charge' => isset($transaction_data['service_charge']) ? $transaction_data['service_charge'] : 0.0,
            'total_pay' => isset($transaction_data['total_pay']) ? $transaction_data['total_pay'] : 0.0,
            'pay_amount' => isset($transaction_data['pay_amount']) ? $transaction_data['pay_amount'] : 0.0,
            'sp_message' => isset($transaction_data['sp_message']) ? $transaction_data['sp_message'] : null,
            'transactions_id' => isset($transaction_data['transactions_id']) ? $transaction_data['transactions_id'] : null,
            'status' => isset($transaction_data['status']) ? $transaction_data['status'] : 0,
            'created_at' => date('Y-m-d H:i:s'),

            'class_b' => isset($transaction_data['class_b']) ? $transaction_data['class_b'] : null,
            'group_b' => isset($transaction_data['group_b']) ? $transaction_data['group_b'] : null,
            'section_b' => isset($transaction_data['section_b']) ? $transaction_data['section_b'] : null,
            'month_b' => isset($transaction_data['month_b']) ? $transaction_data['month_b'] : null,
            'year_b' => isset($transaction_data['year_b']) ? $transaction_data['year_b'] : null,
            'year_stu_b' => isset($transaction_data['year_stu_b']) ? $transaction_data['year_stu_b'] : null,
            'teacher_id' => isset($transaction_data['teacher_id']) ? $transaction_data['teacher_id'] : null,
            'receipte_no' => isset($transaction_data['receipte_no']) ? $transaction_data['receipte_no'] : null,
            'tbl_baton_invoice_id' => isset($transaction_data['tbl_baton_invoice_id']) ? $transaction_data['tbl_baton_invoice_id'] : null,
            'district' => isset($transaction_data['district']) ? $transaction_data['district'] : null,
            'email' => isset($transaction_data['email']) ? $transaction_data['email'] : null,
            'name' => isset($transaction_data['name']) ? $transaction_data['name'] : null,
            'stu_phone' => isset($transaction_data['stu_phone']) ? $transaction_data['stu_phone'] : null,
            'village' => isset($transaction_data['village']) ? $transaction_data['village'] : null,
            'zip_code' => isset($transaction_data['zip_code']) ? $transaction_data['zip_code'] : null,
        );
//
//        print_r($data);
//        return;
        // Remove 'id' from data if it's auto-incremented in the database
//        unset($data['id']);

        $data_save = $this->ts_model->save_transactions_payments($data);
        if ($data_save) {
            echo json_encode(array('status' => 'success', 'message' => 'Transaction payment saved successfully', 'data' => $data_save));;
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to save transaction payment'));
        }
    }
//    public function update_student_payments_info() {
//        $json_data = file_get_contents('php://input');
//        $transaction_data = json_decode($json_data, true);
//
//        // Check if JSON decoding was successful
//        if (json_last_error() !== JSON_ERROR_NONE) {
//            echo json_encode(array('status' => 'error', 'message' => 'Invalid JSON data'));
//            return;
//        }
//
//        // Map JSON data to database fields
//        $data = array(
//            'order_id' => $transaction_data['order_id'],
//            'customer_order_id' => isset($transaction_data['customer_order_id']) ? $transaction_data['customer_order_id'] : null,
//            'sp_message' => isset($transaction_data['sp_message']) ? $transaction_data['sp_message'] : null,
//            'total_pay' => isset($transaction_data['received_amount']) ? $transaction_data['received_amount'] : null,
//            'transactions_id' => isset($transaction_data['id']) ? $transaction_data['id'] : null,
//            'status' => 1,
//        );
////        print_r($data);
////        return;
//        $data_save = $this->ts_model->update_transactions_payments($data);
//        if ($data_save) {
//            echo json_encode(array('status' => 'success', 'message' => 'Transaction payment update successfully', 'data' => $data_save));;
//        } else {
//            echo json_encode(array('status' => 'error', 'message' => 'Failed to update transaction payment'));
//        }
//    }
    public function get_payment_ssl_data($tran_id) {

        $ssl_data = $this->ssl_model->check_customer_tran_id($tran_id);
        $checkSslcommerz = $this->payments_model->check_customer_order_id($tran_id);
//        return $checkSslcommerz;
        echo json_encode(array('status' => 'success', 'message' => 'Get data successfully','data'=>$checkSslcommerz, 'ssl_data'=>$ssl_data));
    }
    public function get_student_data_by_id($student_id) {

//        $checkSslcommerz = $this->ssl_model->check_customer_tran_id($tran_id);
        $checkSslcommerz = $this->payments_model->get_student_data_by_id($student_id);
//        return $checkSslcommerz;
        echo json_encode(array('status' => 'success', 'message' => 'Get data successfully','data'=>$checkSslcommerz));
    }
//    public function transaction_save() {
//        $json_data = file_get_contents('php://input');
//        $transaction_data = json_decode($json_data, true);
////        print_r($transaction_data);
////        return;
//        // Check if JSON decoding was successful
//        if (json_last_error() !== JSON_ERROR_NONE) {
//            echo json_encode(array('status' => 'error', 'message' => 'Invalid JSON data'));
//            return;
//        }
//
//        // Map JSON data to database fields
//        $data = array(
//            'id' => isset($transaction_data['id']) ? $transaction_data['id'] : null,
//            'order_id' => isset($transaction_data['order_id']) ? $transaction_data['order_id'] : null,
//            'currency' => isset($transaction_data['currency']) ? $transaction_data['currency'] : null,
//            'amount' => isset($transaction_data['amount']) ? $transaction_data['amount'] : null,
//            'payable_amount' => isset($transaction_data['payable_amount']) ? $transaction_data['payable_amount'] : null,
//            'address' => isset($transaction_data['address']) ? $transaction_data['address'] : null,
//            'bank_status' => isset($transaction_data['bank_status']) ? $transaction_data['bank_status'] : null,
//            'bank_trx_id' => isset($transaction_data['bank_trx_id']) ? $transaction_data['bank_trx_id'] : null,
//            'card_holder_name' => isset($transaction_data['card_holder_name']) ? $transaction_data['card_holder_name'] : null,
//            'card_number' => isset($transaction_data['card_number']) ? $transaction_data['card_number'] : null,
//            'city' => isset($transaction_data['city']) ? $transaction_data['city'] : null,
//            'customer_order_id' => isset($transaction_data['customer_order_id']) ? $transaction_data['customer_order_id'] : null,
//            'date_time' => isset($transaction_data['date_time']) ? $transaction_data['date_time'] : null,
//            'disc_percent' => isset($transaction_data['disc_percent']) ? $transaction_data['disc_percent'] : null,
//            'discsount_amount' => isset($transaction_data['discsount_amount']) ? $transaction_data['discsount_amount'] : null,
//            'email' => isset($transaction_data['email']) ? $transaction_data['email'] : null,
//            'invoice_no' => isset($transaction_data['invoice_no']) ? $transaction_data['invoice_no'] : null,
//            'is_verify' => isset($transaction_data['is_verify']) ? $transaction_data['is_verify'] : 0,
//            'method' => isset($transaction_data['method']) ? $transaction_data['method'] : null,
//            'name' => isset($transaction_data['name']) ? $transaction_data['name'] : null,
//            'phone_no' => isset($transaction_data['phone_no']) ? $transaction_data['phone_no'] : null,
//            'received_amount' => isset($transaction_data['received_amount']) ? $transaction_data['received_amount'] : null,
//            'sp_code' => isset($transaction_data['sp_code']) ? $transaction_data['sp_code'] : null,
//            'sp_message' => isset($transaction_data['sp_message']) ? $transaction_data['sp_message'] : null,
//            'transaction_status' => isset($transaction_data['transaction_status']) ? $transaction_data['transaction_status'] : null,
//            'usd_amt' => isset($transaction_data['usd_amt']) ? $transaction_data['usd_amt'] : null,
//            'usd_rate' => isset($transaction_data['usd_rate']) ? $transaction_data['usd_rate'] : null,
//            'value1' => isset($transaction_data['value1']) ? $transaction_data['value1'] : null,
//            'value2' => isset($transaction_data['value2']) ? $transaction_data['value2'] : null,
//            'value3' => isset($transaction_data['value3']) ? $transaction_data['value3'] : null,
//            'value4' => isset($transaction_data['value4']) ? $transaction_data['value4'] : null
//        );
//
//        // Remove 'id' from data if it's auto-incremented in the database
////        unset($data['id']);
//
//        // Save data to database
//        $check_data = $this->ts_model->check_transaction($transaction_data['id']);
//        if (!$check_data){
//            $save_transaction=$this->ts_model->save_transaction($data);
//            if ($save_transaction) {
//                $data_stu_1 = $this->ts_model->check_transaction($save_transaction);
//                $data_stu_2 = $this->ts_model->select_transactions_payments_by_customer_order_id($data_stu_1->customer_order_id);
//                echo json_encode(array('status' => 'success', 'message' => 'Transaction saved successfully','student_id'=>$data_stu_2->student_id));
//            } else {
//                echo json_encode(array('status' => 'error', 'message' => 'Failed to save transaction'));
//            }
//        }else{
//            $data_stu = $this->ts_model->select_transactions_payments($check_data->customer_order_id);
//            echo json_encode(array('status' => 'error', 'message' => 'Already exit this transaction','student_id'=>$data_stu->student_id));
//        }
//    }
    public function get_by_student_and_year($student_id) {
//        echo preg_match('/^\d{4}-\d{5}$/', $student_id);
//        return $student_id;
        // Validate student_id format
//        if (!preg_match('/^\d{4}-\d{5}$/', $student_id)) {
//            $this->output->set_status_header(400);
//            echo json_encode(['status' => 'error', 'message' => 'Invalid student ID format']);
//            return;
//        }

        // Validate year
//        if (!is_numeric($year) || $year < 2000 || $year > date('Y')) {
//            $this->output->set_status_header(400);
//            echo json_encode(['status' => 'error', 'message' => 'Invalid year']);
//            return;
//        }
        $data = array();
        $pdata = array();
        $pdata['student_id'] = $student_id;
//        $pdata['year'] = $year;
        $data['student_data'] = $this->b_model->select_baton_invoice_student_id($pdata);
        $data['student_select'] = $this->sa_model->student_information_by_stu_id_new_student($pdata['student_id']);

//        $payments = $this->Student_payment_model->get_by_student_and_year($student_id, $year);

        $payments = [0=>'dd'];
        if (empty($payments)) {
            $this->output->set_status_header(404);
            echo json_encode(['status' => 'error', 'message' => 'No payments found']);
            return;
        }else{
//            $this->output->set_status_header(400);
//            echo  'payments found';
//            echo json_encode(['status' => 'error', 'message' => 'payments found']);
//            return;
        }

        echo json_encode(['status' => 'success', 'data' => $data]);
    }

    // Get all payments for a student
    public function get_by_student($student_id) {
        // Validate student_id format
        if (!preg_match('/^\d{4}-\d{5}$/', $student_id)) {
            $this->output->set_status_header(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid student ID format']);
            return;
        }

        $payments = $this->Student_payment_model->get_by_student($student_id);

        if (empty($payments)) {
            $this->output->set_status_header(404);
            echo json_encode(['status' => 'error', 'message' => 'No payments found']);
            return;
        }

        echo json_encode(['status' => 'success', 'data' => $payments]);
    }
}