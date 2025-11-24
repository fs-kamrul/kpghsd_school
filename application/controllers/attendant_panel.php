<?php
class attendant_panel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //$this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('attendant_panel_model', 'att_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function attendant() {
        $data = array();
        $data['title'] = 'attendant';
        $data['show'] = '8';
        $data['site_block'] = 'attendant';
//        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function attendant_assigned() {
        $data = array();
        $data['title'] = 'attendant_assigned';
        $data['show'] = '8';
        $data['all_data'] = '1';
        $data['sub'] = $this->sp_model->select_sub_all();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['option'] = $this->sp_model->select_opt_all();
        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $group_r = "";
        $class = "";
        $section = "";
        $year = date('Y');
        $data['all_reg'] = $this->att_model->select_att_search($group_r, $class, $section, $year);
        $data['maincontain'] = $this->load->view('admin/attendant_assigned', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
        public function save_att_assigned() {
        $data = array();
        $other = $this->input->post('other', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group', TRUE);
        $data['teacher_id'] = $this->input->post('teacher_name', TRUE);
        $data['subject_id'] = $this->input->post('subject_name', TRUE);
//        echo '<pre>';
//        print_r($data);
        $this->att_model->save_att_assigned($data);
        $sdata = array();
        $sdata['message'] = 'Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('attendant_panel/attendant_assigned');
    }
        public function view_assign_att() {
        $data = array();
        $data['title'] = 'view_attendant';
        $data['show'] = '8';
        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['sub'] = $this->sp_model->select_sub_all();
        $data['option'] = $this->sp_model->select_opt_all();

        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $group_r = $this->input->post('group_r', TRUE);
        $data['section'] = $section = $this->input->post('section', TRUE);



        $data['all_reg'] = $this->att_model->select_att_search($group_r, $class, $section, $year);

        $data['maincontain'] = $this->load->view('admin/attendant_assigned', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function att_delete($ass_id) {
        $this->att_model->delete_ass($ass_id);
//echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('attendant_panel/attendant_assigned');
    }
    public function attendant_input() {
        $data = array();
        $data['title'] = 'attendant_input';
        $data['show'] = '8';
        $data['all_data'] = '1';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] =$al_cls = $this->att_model->select_att();
        $data['maincontain'] = $this->load->view('admin/attendant_in', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function only_att() {
        $data['title'] = 'attendant_input';
        $data['show'] = '8';
        $data['option'] = $this->sa_model->select_option();
        $data['class'] =$class = $this->input->post('class', TRUE);
        $data['group_r'] =$group_r = $this->input->post('group_r', TRUE);
        $data['year'] =$year = $this->input->post('year', TRUE);
        $data['section'] =$section = $this->input->post('section', TRUE);
        $data['subject_id'] =$subject_id = $this->input->post('subject_id', TRUE);
                
        $data['all_class'] = $this->sa_model->class_reg_search($class, $year, $section,$group_r);
        $data['maincontain'] = $this->load->view('admin/att_input_submit', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function class_att_save() {
        $data = array();
        $sdata = array();
        $chk=$this->input->post('check', TRUE);
        $other=$this->input->post('other', TRUE);
//        $other=$this->input->post('other', TRUE);
        
        $data['subject_id'] = $this->input->post('subject_id', TRUE);
        $data['day'] = $this->input->post('day', TRUE);
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        
        for ($i = 1; $i <= $other; $i++) {
            $data['student_id' . $i] = $this->input->post('student_id' . $i, TRUE);
            $data['student_id_a'] = $this->input->post('student_id' . $i, TRUE);
        
            $chk_in=$this->att_model->chk_att_stu($data);
            if($chk_in){
                //$this->att_model->updat_att_stu($data,$chk,$i);
                $sdata['erroraaa'] = 'You have already submitted';
//                $this->session->set_userdata($sdata);
            }  else {
                $this->att_model->save_att_stu($data,$chk,$i);
            $sdata['message'] = 'Save Data Successfully';
//            $this->session->set_userdata($sdata);
            }
        }
        $this->session->set_userdata($sdata);
//        echo '<pre>';
//        print_r($data);
//        exit();
        //$this->att_model->save_att_stu($data,$chk,$other);
        redirect('attendant_panel/attendant_input');
    }
//    public function attendant_report() {
//        $data = array();
//        $data['title'] = 'attendant';
//        $data['show'] = '8';
//        $data['site_block'] = 'attendant';
////        $data['option'] = $this->sa_model->select_option();
//        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
//        $this->load->view('admin/dashboard', $data);
//    }
    public function report_month() {
        $data = array();
        $data['title'] = 'attendant_report';
        $data['show'] = '8';
        $data['option'] = $this->sa_model->select_option();
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group'] = $this->input->post('group', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['subject_id'] = $this->input->post('subject_name', TRUE);
        $data['subject'] = $this->input->post('subject', TRUE);
        
        $data['months']=$this->att_model->search_month_att($data);

        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data['months']);
//        exit();
        $data['maincontain'] = $this->load->view('report/month_report', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function report_month_teacher() {
        $data = array();
        $data['title'] = 'attendant_report_teacher';
        $data['show'] = '8';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] =$al_cls = $this->att_model->select_att_techer();
        $data['maincontain'] = $this->load->view('report/pdf_input_11', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function report_month_view() {
        $data = array();
        $data['title'] = 'attendant_report';
        $data['show'] = '8';
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['subject_id'] = $this->input->post('subject_id', TRUE);
        $data['subject'] = $this->input->post('subject', TRUE);
        
        $data['months']=$this->att_model->search_month_att($data);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data);
//        exit();
        $data['maincontain'] = $this->load->view('report/month_report_1', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
}
