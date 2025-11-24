<?php

class Notice_panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('notice_model', 'notice_m', TRUE);


        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function notice() {
        $data = array();
        $data['title'] = 'notice';
        $data['show'] = '18';
        $data['maincontain'] = $this->load->view('admin/notice', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function save_notice() {
        $data = array();
        $config_file = array();
        $config_image = array();
        /* --------image file--------------- */
//        $config_image['upload_path'] = 'images/upload/notice/';
//        $config_image['allowed_types'] = 'gif|jpg|png';
//        $config_image['max_size'] = '2000';
//        $config_image['max_width'] = '1024';
//        $config_image['max_height'] = '768';
        /*......file.....*/
        $config_file['upload_path'] = 'images/upload/notice/';
        $config_file['allowed_types'] = 'pdf|doc|xls|xlsx|docx|gif|jpg|png';
        $config_file['max_size'] = '5000';
        
        $error = array();
        $fdata = array();
        $fdate = array();
//        $this->load->library('upload', $config_image);
//        
//        
//        if (!$this->upload->do_upload('n_image')) {
//            $error['erroraaa'] = $this->upload->display_errors();
//            $this->session->set_userdata($error);
//        } else {
//            $fdata = $this->upload->data();
//            $data['n_image'] = $config_image['upload_path'] . $fdata['file_name'];
//        }
        $this->load->library('upload', $config_file);
        
        if (!$this->upload->do_upload('n_file')) {
            $error['erroraaa'] = $this->upload->display_errors();
            $this->session->set_userdata($error);
        } else {
            $fdata = $this->upload->data();
            $data['n_file'] = $config_file['upload_path'] . $fdata['file_name'];
        }
        /* ---------------------------- */

        $data['n_title'] = $this->input->post('n_title', TRUE);
        $data['n_contain'] = $this->input->post('n_contain', TRUE);
        $data['n_dept'] = $roll = $this->input->post('n_dept', TRUE);
        
        $this->notice_m->save_notice_m($data);
        

        $sdata = array();
        $sdata['message'] = 'Notice Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('notice_panel/notice');
    }

}
