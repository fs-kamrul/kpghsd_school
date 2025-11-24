<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Student_login extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Student_Login_Model', 'sl_model', TRUE);
        $m_view=$this->session->userdata('student_id');
//        echo '<pre>';
//        echo ($m_view);
//        exit();
        if($m_view!=NULL){
            redirect("student_portal/dashboard","refresh");
        }
    }

    public function index() {

        $data['title'] = 'student_portal';
        $this->load->view('student_portal/login', $data);
    }
//    public function login() {
//        $this->load->view('admin/login');
//    }
    public function chech_login() {
        $sess_data=array();
        $user_email = $this->input->post('student_id', TRUE);
        $user_password = $this->input->post('password', TRUE);
        $result=$this->sl_model->select_student($user_email,$user_password);
        if($result){
            $sess_data['student_id']= $result->id;
            $sess_data['student_name']= $result->name;
            $sess_data['student_power']= 'student';
            $this->session->set_userdata($sess_data);
            redirect("student_portal/dashboard");
        }else{

            $sess_data['exception']="Invalid Student ID or Password";
            $this->session->set_userdata($sess_data);
            redirect("student_login");
        }
    }
}
