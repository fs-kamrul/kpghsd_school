<?php
defined('BASEPATH') OR exit('No direct script access allowed');

session_start();
class Sslcommerz_collection extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transactions_ssl_model', 'ssl_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('baton_model', 'b_model', TRUE);
        $this->load->model('transactions_payments_model', 'tp_model', TRUE);
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function index()
    {
        $data['title'] = 'SSL Commerz';
//        $data['title'] = 'top_sheet';
        $data['show'] = '21';
        $year = date('Y');
//        $data['designGroup'] = $year = $this->input->post('designGroup', TRUE);
//        $data['student_id'] = $student_id = $this->input->post('student_id', TRUE);
        $data['year_stu_b'] = $year = $this->input->post('year', TRUE);
        $data['class_b'] = $class_b = $this->input->post('class', TRUE);
        $data['group_b'] = $this->input->post('group_r', TRUE);
        $data['section_b'] = $this->input->post('section', TRUE);
//        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
//        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
//        $data['month'] =$month= $this->input->post('month', TRUE);

//        $data['form_date'] = $this->input->post('form_date', TRUE);
//        $data['to_date'] = $this->input->post('to_date', TRUE);

        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['option'] = $this->sa_model->select_option();


        $data['all_b'] = $this->tp_model->select_all_transactions_payments_list($data);


//        $entry_date = $this->input->post('entry_date', TRUE);
//        if ($entry_date){
//            $data['entry_date'] = date('m/d/Y', strtotime($entry_date));
//        }else{
//            $data['entry_date'] = '';
//        }

//        $sum=$sum_all=0;
        $data['all_baton']=  array();


//        if($data['designGroup'] == 'design2'){
//            $data['maincontain'] = $this->load->view('invoice/baton_top_sheet_2', $data, TRUE);
//        }else{
//            $data['maincontain'] = $this->load->view('invoice/baton_top_sheet', $data, TRUE);
//        }
        $data['maincontain'] = $this->load->view('ssl/index', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

}
