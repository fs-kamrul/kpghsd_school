<?php

class sms_panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('attendant_panel_model', 'att_model', TRUE);
        $this->load->model('pdf_result_process', 'process_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function sms() {
        $data = array();
        $data['title'] = 'sms';
        $data['show'] = '16';
        $data['site_block'] = 'sms';
//        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function attendant_absent() {
        $data['title'] = 'attendant_absent';
        $data['show'] = '16';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] = $al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('sms/sms_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function absent_sms() {
        $data['title'] = 'attendant_absent';
        $data['show'] = '16';
//        $data['option'] = $this->sa_model->select_option();
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['day'] = $this->input->post('day', TRUE);
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['subject_id'] = $this->input->post('subject_id', TRUE);

        $data['months'] = $this->att_model->search_month_day_att($data);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data['months']);
//        exit();
        $data['maincontain'] = $this->load->view('sms/sms_absent', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    //578482323
    //7921
    public function attendant_absent_all_class() {
        $data['title'] = 'attendant_absent_all_class';
        $data['show'] = '16';
        $data['option'] = $this->sa_model->select_option();
        $data['sub_all'] = $this->att_model->select_all_in_one_subject();
//        $data['all_class'] =$al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('sms/sms_input_1', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function attendant_absent_all_class_report() {
        $data['title'] = 'attendant_absent_all_class';
        $data['show'] = '16';
//        $data['option'] = $this->sa_model->select_option();
//        $data['class'] = $this->input->post('class', TRUE);
//        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['day'] = $this->input->post('day', TRUE);
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
//        $data['section'] = $this->input->post('section', TRUE);
        $data['subject_name'] = $this->input->post('subject_name', TRUE);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();

        $data['months'] = $this->att_model->search_month_day_all_class($data);
//        echo '<pre>';
//        print_r($data['months']);
//        exit();
        $data['maincontain'] = $this->load->view('sms/sms_absent_1', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function absent_all_class() {
        $data['title'] = 'attendant_absent_all_class';
        $data['show'] = '16';
        $data['option'] = $this->sa_model->select_option();
        $data['sub_all'] = $this->att_model->select_subject_by_class();
        $data['maincontain'] = $this->load->view('sms/sms_input_2', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function absent_all_class_report() {
        $data['title'] = 'attendant_absent_all_class';
        $data['show'] = '16';
//        $data['class'] = $this->input->post('class', TRUE);
//        $data['group_r'] = $this->input->post('group_r', TRUE);
//        $data['section'] = $this->input->post('section', TRUE);
        $data['chk'] = $this->input->post('chk', TRUE);
        $data['chk11'] = $this->input->post('chk11', TRUE);
        $data['day'] = $this->input->post('day', TRUE);
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['subject_name'] = $this->input->post('subject_name', TRUE);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        if ($data['chk'] == 1) {
            $data['months'] = $this->att_model->search_one_ten_class($data);
        } elseif ($data['chk11'] == 1) {
            $data['months'] = $this->att_model->search_month_day_by_class($data);
        }

//        echo '<pre>';
//        echo $data['chk'];
//        print_r($data['months']);
//        exit();
        $data['maincontain'] = $this->load->view('sms/sms_absent_2', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function result_sms() {
        $data['title'] = 'result_sms';
        $data['show'] = '16';
        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('sms/sms_input_3', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function result_sms_show() {
        $data['title'] = 'result_sms';
        $data['show'] = '16';
//        $data['option'] = $this->sa_model->select_option();
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['number'] = $this->input->post('number', TRUE);
        $data['typ'] = $typ = $this->input->post('typ', TRUE);
        $data['sh_sms'] = $this->input->post('sh_sms', TRUE);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();

        if ($typ == 1) {
            $data['all_reg'] = $this->att_model->select_sms_stu_result($data);
            foreach ($data['all_reg'] as $key => $value) {
                $data['main_data'][$value->id]['id'] = $value->id;
                $data['main_data'][$value->id]['name'] = $value->name;
                $data['main_data'][$value->id]['roll'] = $value->roll;
                $data['main_data'][$value->id]['section'] = $value->section;
                $data['main_data'][$value->id]['all_reg_id'] = $value->all_reg_id;
                $data['main_data'][$value->id]['mobile_number'] = $value->mobile_number;
                $data['main_data'][$value->id]['stu_phone'] = $value->stu_phone;
//                $data['main_data'][$value->id]['sub_name'] = $value->sub_name;
                $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['mark_number'] = $value->mark_number;
                $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['total'] = $value->mark;
                $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['add_f'] = $value->add_f;
                $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['pass_mark'] = $value->pass_mark;
                $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['sub_mark'] = $value->sub_mark;
                $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['mark_pf'] = $value->mark_pf;

//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['add_f']=$value->add_f;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_code']=$value->sub_code;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_name']=$vvt = $value->sub_name;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_mark']=$value->sub_mark;
//            $data['sub_info'][$value->sub_name]['add_f']=$value->add_f;
                $data['sub_info'][$value->sub_name]['sub_code'] = $value->sub_code;
                $data['sub_info'][$value->sub_name]['sub_name'] = $vvt = $value->sub_name;
                $data['sub_info'][$value->sub_name]['pass_mark'] = $value->pass_mark;
                $data['sub_info'][$value->sub_name]['sub_mark'] = $value->sub_mark;
            }
            $data['all_process'] = $this->process_model->all_select_result($data);
//        echo '<pre>';
//        print_r($data['main_data']);
//        print_r($data['sub_info']);
//        exit();
            $data['maincontain'] = $this->load->view('sms/sms_result_1', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        }elseif ($typ==2) {
            $data['all_sms'] = $this->att_model->search_text_sms_result($data);
            $data['maincontain'] = $this->load->view('sms/sms_result', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        }elseif ($typ==3) {
            $data['all_sms'] = $this->att_model->search_sms_result($data);
            $data['maincontain'] = $this->load->view('sms/sms_result_3', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        } else {
            $data['all_sms'] = $this->att_model->search_sms_result($data);
//        echo '<pre>';
//        print_r($data['all_sms']);
//        exit();
            $data['maincontain'] = $this->load->view('sms/sms_result', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        }
    }

}
