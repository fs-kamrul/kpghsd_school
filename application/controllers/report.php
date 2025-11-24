<?php
class report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('subject_panel_model', 'sp_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    //put your code here
    public function index() {
        $data=array();
        $data['title'] = 'gallery';
        $data['show'] = '1';
        $data['option'] = $this->sp_model->select_opt_all();
        $data['all_reg'] = $this->sp_model->select_all_reg();
        $data['sub'] = $this->sp_model->select_all_sub();
        //$data['view_img'] = $this->i_model->select_all_image();
        $data['maincontain'] = $this->load->view('admin/transcripts', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function pdf_file() {
        $data=array();
        $class = $this->input->post('class', TRUE);
        $year = $this->input->post('year', TRUE);
        $section = $this->input->post('section', TRUE);
        $data['search_reg'] = $this->sp_model->search_reg($class, $year, $section,$group_r);
        //$data['maincontain'] = $this->load->view('sub/mark_input', $data, TRUE);
        //$this->load->view('admin/dashboard', $data);
        $this->load->view('report_submit', $data);
    }
}
