<?php

class mark_panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('mark_model', 'sm_model', TRUE);
        $this->load->model('student_info_model', 'stu_model', TRUE);
        $this->load->model('subject_panel_model', 'sub_model', TRUE);
        $this->load->model('pdf_model', 'p_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function index() {
        
    }

    public function mark_term($assigned_id) {
        $data = array();
        $data['title'] = 'term_select';
        $data['show'] = '1';
        $data['option'] = $this->sa_model->select_option();
        $data['assigned_id'] = $assigned_id;
        $data['maincontain'] = $this->load->view('admin/mark_term', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function mark_show() {
        $data = array();
        $dataz = array();
        $data['title'] = 'mark_show';
        $data['show'] = '1';
        $term = $this->input->post('term', TRUE);
        $assigned_id = $this->input->post('assigned_id', TRUE);
        if ($assigned_id == '' && $term == '') {
            $assigned_id = $this->session->userdata('assigned_id');
            $dataz['term'] = $data['term'] = $this->session->userdata('term');
        } else {
            $sdata = array();
            $sdata['assigned_id'] = $assigned_id;
            $dataz['term'] = $sdata['term'] = $data['term'] = $term;
            $this->session->set_userdata($sdata);
        }


        $data['option'] = $this->sa_model->select_option();
        $data['sub_one_assigned'] = $this->sm_model->sub_ass_view($assigned_id);
        $dataz['year'] = $data['sub_one_assigned']->year;
        $dataz['section'] = $data['sub_one_assigned']->section;
        $dataz['group_r'] = $data['sub_one_assigned']->group_r;
        $dataz['class'] = $data['sub_one_assigned']->class;
        $dataz['sub_id'] = $data['sub_one_assigned']->sub_id;

        $data['all_reg'] = $this->stu_model->select_all_reg_four($dataz);

        $data['add_mark_show_r'] = $this->sm_model->select_add_mark_r($dataz);
        $data['mark_sub'] = $this->sm_model->select_add_mark_r($dataz);
        
        $data['maincontain'] = $this->load->view('admin/mark_sub', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    
    public function mark_in($add_mark_id) {
        $data = array();
        $dataz = array();
        $data['title'] = 'mark_input';
        $data['show'] = '1';
        $assigned_id = $this->session->userdata('assigned_id');
        $dataz['term'] = $data['term'] = $this->session->userdata('term');

        $data['option'] = $this->sa_model->select_option();
        $data['sub_one_assigned'] = $this->sm_model->sub_ass_view($assigned_id);
        $dataz['year'] = $data['sub_one_assigned']->year;
        $dataz['class'] = $data['sub_one_assigned']->class;
        $dataz['section'] = $data['sub_one_assigned']->section;
        $dataz['group_r'] = $data['sub_one_assigned']->group_r;
        $dataz['add_mark_id'] = $add_mark_id;
        $data['mark_title'] = $this->sm_model->add_mark_title($add_mark_id);
        $dataz['sub_id'] = $data['mark_title']->sub_id;
        $data['all_reg'] = $this->sm_model->mark_show_all($dataz);

        $data['maincontain'] = $this->load->view('admin/input_mark', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function save_mark() {
        $data = array();
        $data['term'] = $this->session->userdata('term');
        $data['add_mark_id'] = $this->input->post('add_mark_id', TRUE);
        $data['other'] = $this->input->post('other', TRUE);
        $data['sub_id'] = $this->input->post('sub_id', TRUE);
        for ($i = 1; $i < $data['other']; $i++) {
            $data['all_reg_id'] = $this->input->post('all_reg_id' . $i, TRUE);
            $data['mark'] = $this->input->post('mark' . $i, TRUE);
            $mark_check = $this->sm_model->select_mark_view($data);
            
            $chk_pf=$this->sm_model->add_mark_title($data['add_mark_id']);
            if($chk_pf->mark_pass==1){
                $chk_pass=$this->sub_model->select_sub_id($data['sub_id']);
                $ssd=$chk_pass->pass_mark*$chk_pf->mark_number;
//                echo $ssd;
//                echo $chk_pass->pass_mark;
//                echo $chk_pf->mark_number;
//                exit();
                if($ssd<=$data['mark']){
                    $data['mark_pf'] = 'p';
                }else{
                    $data['mark_pf'] = 'f';
                }
            }else{
                $data['mark_pf'] = 'p';
            }
            if ($mark_check) {
                $this->sm_model->update_mark($data);
            } else {
                $this->sm_model->in_mark($data);
            }
        }
        $sdata = array();
        $sdata['message'] = 'Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('mark_panel/mark_in/' . $data['add_mark_id']);
    }

    public function add_mark() {
        $data = array();
        $data['title'] = 'mark';
        $data['show'] = '1';
        $data['sub_mark'] = $this->input->post('sub_mark', TRUE);
        $data['totalmark'] = $this->input->post('totalmark', TRUE);
        $data['term'] = $this->session->userdata('term');
        $assigned_id = $this->session->userdata('assigned_id');
        $data['sub_one_assigned'] = $this->sm_model->sub_ass_view($assigned_id);
        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('admin/add_mark', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function add_mark_view($add_mark_id) {
        $data = array();
        $dataz = array();
        $data['title'] = 'add_mark_edit_and_delete';
        $data['show'] = '1';
        $data['add_mark'] = $this->sm_model->add_mark_title($add_mark_id);
        $data['option'] = $this->sa_model->select_option();
        
        
        $data['add_mark_id'] = $this->sm_model->select_add_mark_id($add_mark_id);
        $dataz['term'] = $this->session->userdata('term');
        $dataz['year'] = $data['add_mark_id']->year;
        $dataz['section'] = $data['add_mark_id']->section;
        $dataz['group_r'] = $data['add_mark_id']->group_r;
        $dataz['class'] = $data['add_mark_id']->class;
        $dataz['sub_id'] = $data['add_mark_id']->sub_id;
        $add_mark_show_r = $this->sm_model->select_add_mark_r($dataz);
        $data['totalmark'] = 0;
        $data['this_id_mark'] = $data['add_mark_id']->mark_number;
        foreach ($add_mark_show_r as $key => $value) {
            $data['sub_mark'] = $value->sub_mark;
            $data['totalmark'] += $value->mark_number;
        }
//        echo '<pre>';
//        print_r($add_mark_show_r);
//        print_r($data);
//        exit();
        $data['maincontain'] = $this->load->view('admin/add_mark_edit', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function update_add_mark() {
        $dataz = array();
        $dataz['add_mark_id'] = $this->input->post('add_mark_id', TRUE);
        $dataz['mark_title'] = $this->input->post('mark_title', TRUE);
        $dataz['mark_number'] = $this->input->post('mark_number', TRUE);
        $dataz['mark_pass'] = $this->input->post('mark_pass', TRUE);
        $this->sm_model->update_add_mark_m($dataz);
        $sdata = array();
        $sdata['message'] = 'Update Add mark Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('mark_panel/mark_show');
    }
    public function delete_add_mark($add_mark_id) {
        $this->sm_model->delete_add_mark_m($add_mark_id);
        $this->sm_model->delete_mark_m($add_mark_id);
        $sdata = array();
        $sdata['message'] = 'Delete Add mark Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('mark_panel/mark_show');
    }

    public function save_add_mark() {
        $data = array();
        $dataz = array();
        $assigned_id = $this->session->userdata('assigned_id');
        $data['sub_one_assigned'] = $this->sm_model->sub_ass_view($assigned_id);
        $dataz['sub_id'] = $data['sub_one_assigned']->subject_id;
        $dataz['year'] = $data['sub_one_assigned']->year;
        $dataz['group_r'] = $data['sub_one_assigned']->group_r;
        $dataz['section'] = $data['sub_one_assigned']->section;
        $dataz['class'] = $data['sub_one_assigned']->class;
        $dataz['term'] = $this->session->userdata('term');
        $dataz['mark_title'] = $this->input->post('mark_title', TRUE);
        $dataz['mark_number'] = $this->input->post('mark_number', TRUE);
        $dataz['mark_pass'] = $this->input->post('mark_pass', TRUE);
        $this->sm_model->save_all_add_mark($dataz);
        $sdata = array();
        $sdata['message'] = 'Add mark Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('mark_panel/mark_show');
    }

}
