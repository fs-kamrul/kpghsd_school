<?php

class Result_show extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grade');
        $this->load->model('position_result', 'position_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('mark_model', 'sm_model', TRUE);
        $this->load->model('student_info_model', 'stu_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('result_model', 'sr_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function result() {
        $data = array();
        $data['title'] = 'student_result';
        $data['show'] = '6';
        $data['year'] = date('Y');
        $data['group_r'] = '';
        $data['section'] = '';
        $classc = $this->sp_model->select_all_sub_s();
        if ($classc) {
            $data['class'] = $class = $classc->class;
        } else {
            $data['class'] = $class = '';
        }
        $data['term']=$term = '';
        $data['all_reg'] = $this->sr_model->stu_view_result($data);
        $data['position_r'] = $this->position_model->position_r($data);
        $data['option'] = $this->sa_model->select_option();
        $data['sub'] = $this->sp_model->select_sub_class($data);
        $data['mark_result'] = $this->sr_model->mark_result($term);
        $data['maincontain'] = $this->load->view('admin/student_result', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function searchresult() {
        $data = array();
        $data['title'] = 'student_result';
        $data['show'] = '6';
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['term']=$term = $this->input->post('term', TRUE);

        $data['all_reg'] = $this->sr_model->stu_view_result($data);
        $data['position_r'] = $this->position_model->position_r($data);
//        echo '<pre>';
//        print_r($data['position_r']) ;
//        exit();
        $data['option'] = $this->sa_model->select_option();
        $data['sub'] = $this->sp_model->select_sub_class($data);
        $data['mark_result'] = $this->sr_model->mark_result($term);
        $data['maincontain'] = $this->load->view('admin/student_result', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

}
