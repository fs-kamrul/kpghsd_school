<?php

class Add_four_panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student_info_model', 'stu_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function sub_four($year="",$class="",$group_r="",$section="",$sub_id="") {
        $data = array();
        $message = $this->session->userdata('message');
//        if($message != NULL){
        if($class != ""){
            $data['year'] = $year;
            $data['class'] = $class;
            $data['group_r'] = $group_r;
            $data['section'] = $section;
            $data['sub_id'] = $sub_id;
//            $data['year'] = $this->session->userdata('year');
//            $data['class'] =  $class = $this->session->userdata('class');
//            $data['group_r'] = $this->session->userdata('group_r');
//            $data['section'] = $this->session->userdata('section');
//            $data['sub_id'] = $sub_id = $this->session->userdata('sub_id');
//            $this->session->unset_userdata($data);
//        echo '<pre>';
//        print_r($data);
//        exit();
        }else{
            $data['year'] = $this->input->post('year', TRUE);
            $data['class'] = $class = $this->input->post('class', TRUE);
            $data['group_r'] = $this->input->post('group_r', TRUE);
            $data['section'] = $this->input->post('section', TRUE);
            $data['sub_id'] = $sub_id = $this->input->post('sub_id', TRUE);
//            $this->session->set_userdata($data);
        }
        $data['title'] = 'add_four_subject';
        $data['show'] = '3';
        $data['all_reg'] = $this->sp_model->select_add_four_stu($data);
        
        $data['option'] = $this->sa_model->select_option();
        $data['sub'] = $this->sp_model->select_sub_class($data);
        $sub_id_s = $this->sp_model->select_sub_id($sub_id);
        if ($sub_id_s) {
            $data['sub_name'] = $sub_id_s->sub_name;
        }else{
            $data['sub_name']='';
        }
        $data['maincontain'] = $this->load->view('admin/add_four_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function search_subject() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'search_subject';
        $data['show'] = '3';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('admin/add_four_compulsory', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function save_add() {
        
        $data['sub_id'] = $sub_id = $this->input->post('sub_id', TRUE);
        $other = $this->input->post('other', TRUE);
        for ($i = 1; $i <= $other; $i++) {
            $data['all_reg_id'] = $this->input->post('all_reg_id' . $i, TRUE);

            $four = $this->input->post('four' . $i, TRUE);
            $remove = $this->input->post('remove' . $i, TRUE);
            $inactive = $this->input->post('inactive' . $i, TRUE);
            $scheck = $this->sp_model->select_add_four($data);
            if ($remove == 2) {
                $add = '2';
                if ($scheck) {
                    $this->sp_model->update_add_four($data, $add);
                } else {
                    $this->sp_model->save_add_four($data, $add);
                }
            } else if ($four == 1) {
                $add = '1';
                if ($scheck) {
                    $this->sp_model->update_add_four($data, $add);
                } else {
                    $this->sp_model->save_add_four($data, $add);
                }
            } else if ($inactive == 3) {
                $add = '3';
                if ($scheck) {
                    $this->sp_model->update_add_four($data, $add);
                } else {
                    $this->sp_model->save_add_four($data, $add);
                }
            } else {
                $this->sp_model->delete_add_four($data);
            }
        }
        
            $data['year'] =$year= $this->input->post('year', TRUE);
            $data['class'] = $class = $this->input->post('class', TRUE);
            $data['group_r'] =$group_r= $this->input->post('group_r', TRUE);
            $data['section'] =$section= $this->input->post('section', TRUE);
//        
        $sdata = array();
        $sdata['message'] = 'Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('add_four_panel/sub_four/'.$year.'/'.$class.'/'.$group_r.'/'.$section.'/'.$sub_id);
    }

}
