<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result_pdf extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf');
        $this->load->library('grade');
        $this->load->model('result_model', 'sr_model', TRUE);
        $this->load->model('position_result', 'position_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function result_print() {
        $data = array();
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['all_reg'] = $this->sr_model->stu_view_result($data);
        //$data['sub']= $this->sr_model->sub_mark_result($data);
        $data['position_r'] = $this->position_model->position_r($data);
        $this->load->view('report/result', $data);
    }
}
