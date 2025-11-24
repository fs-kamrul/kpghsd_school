<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sslcommerz extends CI_Controller {

    private $angular_base_url;
    private $ssl_url;
    public function __construct() {
        parent::__construct();
        $this->load->model('transactions_payments_model', 'payments_model', TRUE);
        $this->load->model('transactions_ssl_model', 'ssl_model', TRUE);
        $this->load->model('baton_model', 'b_model', TRUE);
//        $store_id = 'appda686e5ea255235';
//        $store_passwd = 'appda686e5ea255235@ssl';
        $store_id = 'ssdcniledubdlive';
        $store_passwd = '68749D8CEEE2515917';
//        $this->angular_base_url = 'http://localhost:4200';
        $this->angular_base_url = 'https://studentportal.ssdcnil.edu.bd';
//        $this->ssl_url = 'https://sandbox.sslcommerz.com';
        $this->ssl_url = 'https://securepay.sslcommerz.com';
    }

    public function initiate_payment()
    {
//        header("Access-Control-Allow-Origin: *");
//        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
//        header("Access-Control-Allow-Headers: Content-Type, Authorization");
//
//        // Handle OPTIONS preflight
//        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//            exit(0);
//        }

        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);

//        echo $data; exit;
//        print_r($inputJSON); exit;
        if (!is_array($data)) {
            echo json_encode(['status' => 'FAILED', 'failedreason' => 'Invalid request data']); exit;
        }
//        print_r($data);
        $url = "{$this->ssl_url}/gwprocess/v4/api.php";

        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($handle, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);

        $response = curl_exec($handle);

        if (curl_errno($handle)) {
            $result = ['status' => 'error', 'message' => curl_error($handle)];
        } else {
            $result = json_decode($response, true);
        }

        curl_close($handle);

        // Return the gateway page URL or error message
        echo json_encode($result);
//        echo $response;
    }
    public function fail_redirect()
    {
        $tran_id = $this->input->post('tran_id');
        $tuitionfees = $this->payments_model->check_customer_order_id($tran_id);

        $data_p['sp_message'] =  'Failed';
        $data_p['status'] =  2;
        $this->payments_model->update_id_payments($data_p, $tuitionfees->id);

        redirect("{$this->angular_base_url}/payment/fail?tran_id={$tran_id}&status=failed");
    }
    public function cancel_redirect()
    {
        $tran_id = $this->input->post('tran_id');
        $tuitionfees = $this->payments_model->check_customer_order_id($tran_id);

        $data_p['sp_message'] =  'Cancelled';
        $data_p['status'] =  2;
        $this->payments_model->update_id_payments($data_p, $tuitionfees->id);

        redirect("{$this->angular_base_url}/payment/cancel?tran_id={$tran_id}&status=canceled");
    }
    public function success_redirect()
    {
//        echo '<pre>';
        $tran_id = $this->input->post('tran_id');
//        print_r($tran_id);
//        echo '<br/>';

        $tuitionfees = $this->payments_model->check_customer_order_id($tran_id);
//        print_r($tuitionfees);
//        echo 'tuitionfees<br/>';
        $data = array();
        $data_p = array();
        $data_s = array();
        $data_save = 0;

        if($tuitionfees and $tuitionfees->status == 0 ) {
            $ssl_val_id = $this->sslValidate_recheck($tuitionfees->customer_order_id);
//            echo '<pre>';
//            print_r($ssl_val_id);
//            echo '<br/>';
//            exit();

            if (
                isset($ssl_val_id['element'][0]['status']) &&
                in_array($ssl_val_id['element'][0]['status'], ['VALIDATED', 'VALID'])
            )  {

                $checkSslcommerz = $this->ssl_model->check_customer_tran_id($tran_id);
//                print_r($checkSslcommerz);
//                echo 'checkSslcommerz<br/>';
                if(!$checkSslcommerz) {
                    $data_s['user_id'] = $ssl_val_id['element'][0]['value_b'];
                    $data_s['status'] = $ssl_val_id['element'][0]['status'];
                    $data_s['tran_date'] = $ssl_val_id['element'][0]['tran_date'];
                    $data_s['tran_id'] = $ssl_val_id['element'][0]['tran_id'];
                    $data_s['val_id'] = $ssl_val_id['element'][0]['val_id'];
                    $data_s['store_amount'] = $ssl_val_id['element'][0]['store_amount'];
                    $data_s['currency'] = $ssl_val_id['element'][0]['currency'];
                    $data_s['bank_tran_id'] = $ssl_val_id['element'][0]['bank_tran_id'];
                    $data_s['card_type'] = $ssl_val_id['element'][0]['card_type'];
                    $data_s['card_no'] = $ssl_val_id['element'][0]['card_no'];
                    $data_s['card_issuer'] = $ssl_val_id['element'][0]['card_issuer'];
                    $data_s['card_brand'] = $ssl_val_id['element'][0]['card_brand'];
                    $data_s['card_issuer_country'] = $ssl_val_id['element'][0]['card_issuer_country'];
                    $data_s['card_issuer_country_code'] = $ssl_val_id['element'][0]['card_issuer_country_code'];
                    $data_s['currency_type'] = $ssl_val_id['element'][0]['currency_type'];
                    $data_s['currency_amount'] = $ssl_val_id['element'][0]['currency_amount'];
                    $data_s['currency_rate'] = $ssl_val_id['element'][0]['currency_rate'];
                    $data_s['base_fair'] = $ssl_val_id['element'][0]['base_fair'];
                    $data_s['emi_instalment'] = $ssl_val_id['element'][0]['emi_instalment'];
                    $data_s['emi_amount'] = $ssl_val_id['element'][0]['emi_amount'];
                    $data_s['emi_description'] = $ssl_val_id['element'][0]['emi_description'];
                    $data_s['emi_issuer'] = $ssl_val_id['element'][0]['emi_issuer'];
                    $data_s['risk_title'] = $ssl_val_id['element'][0]['risk_title'];
                    $data_s['risk_level'] = $ssl_val_id['element'][0]['risk_level'];
                    $data_s['discount_percentage'] = $ssl_val_id['element'][0]['discount_percentage'];
                    $data_s['discount_remarks'] = $ssl_val_id['element'][0]['discount_remarks'];
                    $data_s['validated_on'] = $ssl_val_id['element'][0]['validated_on'];
                    $data_s['reff_id'] = $ssl_val_id['element'][0]['value_a'];

                    $data_save = $this->ssl_model->save_all_ssl_data($data_s);
                }
                // update payment invoice
                $this->payments_student_due($tran_id);

//                print_r($data_save);
//                echo 'data_save<br/>';
                //update payment 1stTable
                $data_p['order_id'] =  $ssl_val_id['element'][0]['val_id'];
                $data_p['val_id'] =  $ssl_val_id['element'][0]['val_id'];
                $data_p['status'] =  1;
                $data_p['sp_message'] =  'Success';
                $data_p['updated_at'] =  date('Y-m-d H:i:s');
                $data_p['transactions_id'] =  $data_save;
                $this->payments_model->update_id_payments($data_p, $tuitionfees->id);
                redirect("{$this->angular_base_url}/payment/success?tran_id={$tran_id}&status=success");
            }else{
                $data_p['order_id'] =  0;
                $data_p['val_id'] =  0;
                $data_p['status'] =  2;
                $data_p['updated_at'] =  date('Y-m-d H:i:s');
                $data_p['sp_message'] =  'Failed';
                $data_p['transactions_id'] =  0;
                $this->payments_model->update_id_payments($data_p, $tuitionfees->id);
                $data['message']= "ssl validation fail";
                redirect("{$this->angular_base_url}/payment/fail?tran_id={$tran_id}&status=failed");
            }
        }else{
            $data['message']= "not found";
            redirect("{$this->angular_base_url}/payment/fail?tran_id={$tran_id}&status=not-found");
        }
//        print_r($data);
//        return $data;
//        echo '<pre>';
//        print_r('ok');
//        echo '</pre>';
//        exit();
//        redirect("{$this->angular_base_url}/payment/success?tran_id=$tran_id");
    }
    public function sslValidate_recheck($tran_id)
    {
        $store_id = 'ssdcniledubdlive';
        $store_passwd = '68749D8CEEE2515917';
//        $store_id = 'appda686e5ea255235';
//        $store_passwd = 'appda686e5ea255235@ssl';
        $url = "{$this->ssl_url}/validator/api/merchantTransIDvalidationAPI.php";
//        $url = '{$this->ssl_url}/validator/api/validationserverAPI.php?wsdl';


        $query = http_build_query([
            'tran_id'       => $tran_id,
            'store_id'      => $store_id,
            'store_passwd'  => $store_passwd,
            'format'        => 'json'
        ]);

        $fullUrl = $url . '?' . $query;

        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_HEADER, true);  // optional: get headers too
//        curl_setopt($ch, CURLOPT_VERBOSE, true); // optional: for debugging
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // optional: 5 seconds timeout
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // NOTE: In production, consider setting this to true

        $result = curl_exec($ch);
//        echo '<pre>';
//        print_r($result);
//        exit;
        if ($result === false) {
            log_message('error', 'SSLCommerz CURL Error: ' . curl_error($ch));
            curl_close($ch);
            return ['error' => 'CURL_FAILED'];
        }

        curl_close($ch);

        $res = json_decode($result, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'SSLCommerz JSON Decode Error: ' . json_last_error_msg());
            return ['error' => 'JSON_DECODE_FAILED'];
        }

        return $res;
    }

    public function sslValidate_check($tran_id){
        $store_id = 'appda686e5ea255235';
        $store_passwd = 'appda686e5ea255235@ssl';

        $url = 'https://securepay.sslcommerz.com/validator/api/merchantTransIDvalidationAPI.php?tran_id='.$tran_id.'&store_id='.$store_id.'&store_passwd='.$store_passwd.'&format=json';
        //  $header = array("Content-Type:application/json", "Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl Faild: ' . curl_error($ch));
        }
        curl_close($ch);
        $res = json_decode($result,true);
        return $res;
    }

    public function payments_student_due($tran_id) {
//        ini_set('display_errors', 1);
//        error_reporting(E_ALL);
        $data = array();
        $invoice_info = array();

//        $json_data = file_get_contents('php://input');
//        $student_details = json_decode($json_data, true);
        $student_details = $this->payments_model->check_customer_order_id($tran_id);
//        return;
//        print_r($student_details);
//        echo 'student_details<br/>';

        try {

            $tbl_baton_invoice_id = $student_details->tbl_baton_invoice_id;
            $ids_array = explode(',', $tbl_baton_invoice_id);
            $data['student_data_get'] = $this->b_model->select_baton_invoice($ids_array);
            $data['total_pay'] = $student_details->total_pay;

//            print_r($tbl_baton_invoice_id);
//            echo '<pre>';
//            print_r($student_details);
//            print_r($data['student_data_get']);
//            print_r($student_details->id);
//            print_r($pay_data);
//            echo 'payments_student_due<br/>';
//        exit();

            $invoice_info['due'] = $student_details->due;
            $invoice_info['fine'] = $student_details->fine;
            $invoice_info['discount'] = $student_details->discount;
            $invoice_info['service_charge'] = $student_details->service_charge;
            $invoice_info['pay_amount'] = $student_details->pay_amount;

            $invoice_info['tbl_baton_invoice_id'] = $student_details->tbl_baton_invoice_id;
            $invoice_info['receipte_no'] = $student_details->receipte_no;
            $invoice_info['student_id'] = $student_details->student_id;
            $invoice_info['reg_id'] = $student_details->reg_id;
            $invoice_info['year_stu_b'] = $student_details->year_stu_b;
            $invoice_info['class_b'] = $student_details->class_b;
            $invoice_info['group_b'] = $student_details->group_b;
            $invoice_info['section_b'] = $student_details->section_b;
            $invoice_info['month_b'] = $student_details->month_b;
            $invoice_info['year_b'] = $student_details->year_b;
            $invoice_info['teacher_id'] = $student_details->teacher_id;

            $total_pay = $invoice_info['pay_amount']+$invoice_info['discount'];
            $baton_invoice_info = $this->b_model->save_baton_invoice_info($invoice_info);

            $pay_data['receipte_no'] = $baton_invoice_info;
            $this->payments_model->update_id_payments($pay_data, $student_details->id);
//            echo '<pre>';
//            print_r($invoice_info);
//            exit();
            foreach ($data['student_data_get'] as $key=>$data_value) {
                $int_id = $data_value->id;
                $value_amount = $data_value->total_due + $invoice_info['fine'];
                $fine = $data_value->fine + $invoice_info['fine'];
                $total_amnt = $data_value->total_amnt + $invoice_info['fine'];
                $total_pay = $total_pay-$value_amount;
                if($total_pay >= 0){
//                    echo $total_pay.'-------------';
                    $total_due = 0;//-1*$total_pay;//$value_amount-$total_pay;
                    $this->b_model->update_due_baton_invoice($int_id,$value_amount+$data_value->total_paid,$total_due,$fine,$total_amnt);
                    $data['tbl_baton_due'][$int_id] = $value_amount;
                }else{
                    $total_due = $total_pay * -1;
                    $value_pay = $value_amount - $total_due;
                    $this->b_model->update_due_baton_invoice($int_id,$value_pay+$data_value->total_paid,$total_due,$fine,$total_amnt);
                    $data['tbl_baton_due'][$int_id] = $value_amount-$invoice_info['fine'];
                }
                $ddata['tbl_baton_invoice_id']=$int_id;
                $ddata['tbl_baton_invoice_info_id']=$baton_invoice_info;
                $ddata['due_amount']=$data['tbl_baton_due'][$int_id];
                $this->b_model->save_baton_invoice_due($ddata);

            }
//            echo json_encode(array('status' => 'success', 'message' => 'Your Receipt No. ' . $baton_invoice_info));
//            return;
        }catch (Exception $e) {

//            echo json_encode(array('status' => 'error', 'message' => 'Something is wrong '));
//            return;
        }
    }
    public function ipn()
    {
        // No CORS here — this is server to server
        $ipn = file_get_contents('php://input');

        log_message('debug', 'IPN received: ' . print_r($ipn, true));

        if (!empty($ipn['tran_id']) && $ipn['status'] === 'VALID') {
            // Mark transaction as completed
            // Example: $this->db->update('payments', [...], ['tran_id' => $ipn['tran_id']]);
        } else {
            // Possibly failed
        }

        echo 'IPN received';
    }

}
