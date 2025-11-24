<?php

class Setting_panel extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
//        $this->load->model('setting_model', 'setting_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function setting() {
        $data = array();
        $data['title'] = 'setting';
        $data['show'] = '19';
        $data['site_block'] = 'setting';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function academy_information() {
        $data = array();
        $data['title'] = 'academy_information';
        $data['show'] = '19';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['maincontain'] = $this->load->view('setting/academy_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function backup() {

        $backup = $this->input->post('backup', TRUE);
        if($backup){
            $this->load->database();
            $this->load->library('zip');
            $this->load->dbutil();

            $prefs = array(
                'format'      => 'zip',
                'filename'    => 'my_db_backup.sql'
            );

//            $backup =& $this->dbutil->backup();
            $backup =& $this->dbutil->backup($prefs);

            $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
            $save = 'pathtobkfolder/'.$db_name;

            $this->load->helper('file');
            write_file($save, $backup);


            $this->load->helper('download');
            force_download($db_name, $backup);

        }

        $data = array();
        $data['title'] = 'backup';
        $data['show'] = '19';
        $data['maincontain'] = $this->load->view('setting/backup', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function save_info() {

        $data = array();
        /* --------file--------------- */
        $config['upload_path'] = 'images/upload/setting/';
        $config['allowed_types'] = 'gif|jpg|png|svg';
        $config['file_name'] = $this->input->post('id', TRUE);
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';

        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('favicon')) {
            $error['erroraaa'] = $this->upload->display_errors();
            $this->session->set_userdata($error);
        } else {
            $fdata = $this->upload->data();
            $data['favicon'] = $config['upload_path'] . $fdata['file_name'];
        }
        if (!$this->upload->do_upload('logo')) {
            $error['erroraaa'] = $this->upload->display_errors();
            $this->session->set_userdata($error);
        } else {
            $fdata = $this->upload->data();
            $data['logo'] = $config['upload_path'] . $fdata['file_name'];
        }
        /* ---------------------------- */
        $data['s_name'] = $this->input->post('s_name', TRUE);
        $data['s_address'] = $this->input->post('s_address', TRUE);
        $data['s_code'] = $this->input->post('s_code', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['phone_number'] = $this->input->post('phone_number', TRUE);
        $data['site_url'] = $this->input->post('site_url', TRUE);

        $academy_info = $this->setting_model->select_info();
        if($academy_info){
            $this->setting_model->update_academy_info($data);
        }else{
            $this->setting_model->insert_academy_info($data);
        }
        $sdata['message'] = "Information Update Successfully";
        $this->session->set_userdata($sdata);
        redirect('setting_panel/academy_information');
    }

}
