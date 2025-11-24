<?php
class admit_card_panel extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf');
        $this->lang->load('pdf');
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('pdf_model', 'p_model', TRUE);
//        $this->load->model('attendant_panel_model', 'att_model', TRUE);
//        $this->load->model('baton_model', 'b_model', TRUE);
//        $this->lang->load('baton');
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function admit_card_page() {
        $data = array();
        $data['title'] = 'admit_card';
        $data['show'] = '22';
        $data['site_block'] = 'admit_card';
//        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function admit_card() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'admit_card';
        $data['show'] = '22';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('admit_card/admit_card_view_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function admid_card_show() {
        $data = array();
        $data['design'] = $design = $this->input->post('design', TRUE);
        $data['typ'] = 1;//$this->input->post('typ', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['time'] = $this->input->post('time', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'admit_card';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        $data['all_reg'] = $this->p_model->sub_result_all($data);
//        $data['position_r'] = $this->position_model->position_r($data);
        $data['main_a'] = $this->p_model->select_stu($data);
        $data['select_subject'] = $this->sp_model->select_sub_class($data);
        $data['select_subject_set'] = $this->sp_model->select_sub_class_set($data);
//        echo '<pre>';
//        print_r($data['select_subject_set']);
//        exit();
          $data['design'] = $design = $this->input->post('design', TRUE);
        if ($design==1) {
            $this->load->view('admit_card/pdf_admit_card', $data);
        }elseif ($design==2) {
            $this->load->view('admit_card/pdf_admit_card_1', $data);
        }
    }
    public function exam_date() {
        $data = array();
        $data['title'] = 'exam_date';
        $data['show'] = '22';
        $data['all_data'] = '1';
        $data['sub'] = $this->sp_model->select_sub_all();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['option'] = $this->sp_model->select_opt_all();
        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $group_r = "";
        $class = "";
        $section = "";
        $year = date('Y');
        $data['all_reg'] = $this->p_model->select_exam_date_search($group_r, $class, $section, $year);
        $data['maincontain'] = $this->load->view('admit_card/exam_date', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function view_exam_date_subject() {
        $data = array();
        $data['title'] = 'view_assign_subject';
        $data['show'] = '3';
        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['sub'] = $this->sp_model->select_sub_all();
        $data['option'] = $this->sp_model->select_opt_all();

        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $group_r = $this->input->post('group_r', TRUE);
        $data['section'] = $section = $this->input->post('section', TRUE);



        $data['all_reg'] = $this->p_model->select_exam_date_search($group_r, $class, $section, $year);

        $data['maincontain'] = $this->load->view('admit_card/exam_date', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function exam_date_delete($assigned_id) {
        $this->p_model->delete_exam_date($assigned_id);
//echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('admit_card_panel/exam_date');
    }
    public function save_exam_date() {
        $data = array();
        $datam = array();
        $other = $this->input->post('other', TRUE);
        $data['year']= $datam['year'] = $this->input->post('year', TRUE);
        $data['class']= $datam['class'] = $this->input->post('class', TRUE);
        $data['section']= $datam['section'] = $this->input->post('section', TRUE);
        $data['group_r']= $datam['group_r'] = $this->input->post('group', TRUE);
        $data['term']= $datam['term'] = $this->input->post('term', TRUE);
        $data['exam_date'] = date("Y-m-d", strtotime($this->input->post('exam_date', TRUE))); ;
        $data['subject_id']= $datam['sub_id'] = $this->input->post('subject_name', TRUE);


//        print_r($add_mark);
//        exit();

        $sdata = array();

        $sdata['year'] = $data['year'];
        $sdata['class'] = $data['class'];
        $sdata['group_r'] = $data['group_r'];
        $sdata['section'] = $data['section'];
        $sdata['term'] = $data['term'];
        $sdata['subject_id'] = $data['subject_id'];

        $check_date = $this->p_model->check_exam_date($data);
        if($check_date){
            $sdata['erroraaa'] = 'Data Already Exit';
//            echo 'Data Already Save';
        }else{
            $sdata['message'] = 'Save Successfully';
            $this->p_model->save_exam_date($data);
        }

//        echo 'Data Save';

        $this->session->set_userdata($sdata);
        redirect('admit_card_panel/exam_date');
    }

}