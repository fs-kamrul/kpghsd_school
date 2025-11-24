<?php

class Student_portal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('student_info_model', 'stu_model', TRUE);
//        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('student_portal_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);

        $m_view = $this->session->userdata('student_id');
        if ($m_view == NULL) {
            redirect("student_login", "refresh");
        }
    }

//    public function index() {
//
//        $this->load->view('student_portal/login');
//    }
    public function dashboard() {
        $data = array();
        $data['title'] = 'student_portal';
        $data['show'] = '2';
        $data['site_block'] = 'student_portal';
        $data['maincontain'] = $this->load->view('student_portal/dboard', $data, TRUE);
        $this->load->view('student_portal/layout', $data);
    }

    public function result() {
        $data = array();
        $data['title'] = 'result';
        $data['show'] = '2';
        $data['site_block'] = 'student_portal';
        $data['option'] = $this->sa_model->select_option();
        $data['studentID'] = $this->input->post('studentID', TRUE);
//        $data['classID'] = $this->input->post('classID', TRUE);
        $data['session'] = $this->input->post('session', TRUE);
        $data['exam_type'] = $this->input->post('exam', TRUE);
        $data['xm_mark'] = $data['exam_type'] . '_total_mark';
        $data['xm_grade'] = $data['exam_type'] . '_grade';

        if (!empty($data['studentID'])) {
            $data['resultsite'] = $this->sp_model->student_info($data);
            $data['sub_r'] = $this->sp_model->sub_result_a($data);
    //        $data['sub_total'] = $this->r_model->sub_total($data);
            foreach ($data['sub_r'] as $key => $value) {
                $data['main_data'][$value->sub_name][$value->mark_id]['mark_number']=$value->mark_number;
                $data['main_data'][$value->sub_name][$value->mark_id]['total']=$value->mark;
                $data['main_data'][$value->sub_name][$value->mark_id]['add_f']=$value->add_f;
                $data['main_data'][$value->sub_name][$value->mark_id]['pass_mark']=$value->pass_mark;
                $data['main_data'][$value->sub_name][$value->mark_id]['sub_mark']=$value->sub_mark;
                $data['main_data'][$value->sub_name][$value->mark_id]['mark_pf']=$value->mark_pf;

                $data['sub_info'][$value->sub_name]['sub_code']=$value->sub_code;
                $data['sub_info'][$value->sub_name]['sub_name']=$vvt = $value->sub_name;
                $data['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
                $data['sub_info'][$value->sub_name]['sub_mark']=$value->sub_mark;
            }
        }
//        if (empty($data['resultsite'])or empty($data['sub_r'])) {
//            redirect("result"); // or empty($data['sub_total'])
//        }

//        echo '<pre>';
//        print_r($data['option_all']);
//        echo '</pre>';
//        exit();
        $data['maincontain'] = $this->load->view('student_portal/result', $data, TRUE);
        $this->load->view('student_portal/layout', $data);
    }

    public function logout() {
//        session_destroy();
        $this->session->unset_userdata('student_name');
        $this->session->unset_userdata('student_id');
        $this->session->unset_userdata('student_power');
        $sess_data=array();
        $sess_data['message']="successfuly logout";
        $this->session->set_userdata($sess_data);
        redirect("student_login");

    }

}