<?php
defined('BASEPATH') OR exit('No direct script access allowed');

session_start();
class Sslcommerz_collection extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transactions_ssl_model', 'ssl_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('baton_model', 'b_model', TRUE);
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
        $data['designGroup'] = $year = $this->input->post('designGroup', TRUE);
        $data['year_stu_b'] = $year = $this->input->post('year', TRUE);
        $data['student_id'] = $student_id = $this->input->post('student_id', TRUE);
        $data['class_b'] = $class_b = $this->input->post('class', TRUE);
        $data['group_b'] = $this->input->post('group_r', TRUE);
        $data['section_b'] = $this->input->post('section', TRUE);
        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
        $data['month'] =$month= $this->input->post('month', TRUE);

        $data['form_date'] = $this->input->post('form_date', TRUE);
        $data['to_date'] = $this->input->post('to_date', TRUE);

        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['option'] = $this->sa_model->select_option();

        if($data['form_date']==''){
            $data['form_date_form'] ='';
            $data['to_date_to'] = '';
            $data['all_b'] = $this->b_model->select_all_stu_baton_subject_invoice($data);
//            echo '<pre>';
//            print_r($data['all_b']);
//            echo '</pre>';
//            exit();
        }else{

            $data['form_date_form'] = date('Y-m-d', strtotime($data['form_date'])).' 00:00:00';
            if($data['to_date'] == ''){
                $data['to_date_to'] = date('Y-m-d', strtotime(date('Y-m-d'))).' 23:59:59';
                $data['to_date'] = date('m/d/Y');
            }else{
                $data['to_date_to'] = date('Y-m-d', strtotime($data['to_date'])).' 23:59:59';
            }
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            exit();
            $data['all_b'] = $this->b_model->select_all_stu_baton_subject_invoice_with_date($data);
        }


//        $entry_date = $this->input->post('entry_date', TRUE);
//        if ($entry_date){
//            $data['entry_date'] = date('m/d/Y', strtotime($entry_date));
//        }else{
//            $data['entry_date'] = '';
//        }

//        $sum=$sum_all=0;
        $data['all_baton']=  array();
        if ($class_b=="") {
            $data['class_b'] = $class_b="Anik";
        }  else {

            $data['all_empty']['tution_fee']=0;
            $data['all_empty']['tiffin_fee']=0;
            $data['all_empty']['fine']=0;
            $data['all_empty']['delay_fee']=0;
            $data['all_empty']['re_addmission_fee']=0;
            $data['all_empty']['dev_fee']=0;
            $data['all_empty']['session_others_fee']=0;
            $data['all_empty']['lab_fee']=0;
            $data['all_empty']['exam_fee']=0;
            $data['all_empty']['tesitimonial_fee']=0;
            $data['all_empty']['tc_fee']=0;
            $data['all_empty']['board_reg']=0;
            $data['all_empty']['cultural_fee']=0;
            $data['all_empty']['scout_fee']=0;
            $data['all_empty']['game_fee']=0;
            $data['all_empty']['common_fee']=0;
            $data['all_empty']['poor_fund']=0;
            $data['all_empty']['magazine_fee']=0;
            $data['all_empty']['id_card_fee']=0;
            $data['all_empty']['receit_fee']=0;
            $data['all_empty']['dev_study_fee']=0;
            $data['all_empty']['computer_fee']=0;
            $data['all_empty']['previous_due']=0;
            $data['all_empty']['others_fee']=0;
            foreach ($data['all_b'] as $value_baton){
                $data['all_empty']['tution_fee'] += $value_baton->tution_fee;
                $data['all_empty']['tiffin_fee'] += $value_baton->tiffin_fee;
                $data['all_empty']['fine'] += $value_baton->fine;
                $data['all_empty']['delay_fee'] += $value_baton->delay_fee;
                $data['all_empty']['re_addmission_fee'] += $value_baton->re_addmission_fee;
                $data['all_empty']['dev_fee'] += $value_baton->dev_fee;
                $data['all_empty']['session_others_fee'] += $value_baton->session_others_fee;
                $data['all_empty']['lab_fee'] += $value_baton->lab_fee;
                $data['all_empty']['exam_fee'] += $value_baton->exam_fee;
                $data['all_empty']['tesitimonial_fee'] += $value_baton->tesitimonial_fee;
                $data['all_empty']['tc_fee'] += $value_baton->tc_fee;
                $data['all_empty']['board_reg'] += $value_baton->board_reg;
                $data['all_empty']['cultural_fee'] += $value_baton->cultural_fee;
                $data['all_empty']['scout_fee'] += $value_baton->scout_fee;
                $data['all_empty']['game_fee'] += $value_baton->game_fee;
                $data['all_empty']['common_fee'] += $value_baton->common_fee;
                $data['all_empty']['poor_fund'] += $value_baton->poor_fund;
                $data['all_empty']['magazine_fee'] += $value_baton->magazine_fee;
                $data['all_empty']['id_card_fee'] += $value_baton->id_card_fee;
                $data['all_empty']['receit_fee'] += $value_baton->receit_fee;
                $data['all_empty']['dev_study_fee'] += $value_baton->dev_study_fee;
                $data['all_empty']['computer_fee'] += $value_baton->computer_fee;
                $data['all_empty']['previous_due'] += $value_baton->previous_due;
                $data['all_empty']['others_fee'] += $value_baton->others_fee;
            }
//            echo '<pre>';
//            print_r($data['all_empty']);
//            echo '</pre>';
//            exit();
        }

//        if($data['designGroup'] == 'design2'){
//            $data['maincontain'] = $this->load->view('invoice/baton_top_sheet_2', $data, TRUE);
//        }else{
//            $data['maincontain'] = $this->load->view('invoice/baton_top_sheet', $data, TRUE);
//        }
        $data['maincontain'] = $this->load->view('ssl/index', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

}
