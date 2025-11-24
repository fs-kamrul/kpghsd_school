<?php
class profile_panel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('profile_model', 'f_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function user_admin() {
        $data = array();
        $data['title'] = 'profile';
        $data['show'] = '17';
        $data['site_block'] = 'profile';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function change_password() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'change_password';
        $data['show'] = '17';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('profile/change_password', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function change_password_submit() {
        $data = array();
        $data['user_name'] = $this->session->userdata('user_id');
        $data['previous_password'] = $this->input->post('previous_password', TRUE);
        $data['new_password'] = $this->input->post('new_password', TRUE);
        $data['repeat_password'] = $this->input->post('repeat_password', TRUE);

        $data['check_previous_password'] = $this->f_model->check_previous_password($data);
        $sdata = array();
        if($data['check_previous_password']){
            if($data['new_password']===$data['repeat_password']){
                $this->f_model->change_password($data);
                $sdata['message'] = 'Password Change Successfully';
            }else{
                $sdata['erroraaa'] = 'New Password And Repeat Password Not Match';
            }
        }else{
            $sdata['erroraaa'] = 'Your Password Not Match';
        }
//        echo '<pre>';
//        print_r($data);
//        exit();


        $this->session->set_userdata($sdata);

        redirect('profile_panel/change_password');
    }
}
