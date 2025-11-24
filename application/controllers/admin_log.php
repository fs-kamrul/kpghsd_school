<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
session_start();
class Admin_log extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct(); 
        $this->load->model('admin_login_model', 'al_model', TRUE);
        $m_view=$this->session->userdata('user_id');
        if($m_view!=NULL){
            redirect("super_admin","refresh");
        }
    }
    
    public function index() {

        $this->load->view('admin/login');
    }
//    public function login() {
//        $this->load->view('admin/login');
//    }
    public function chech_login() {
        $sess_data=array();
        $user_email = $this->input->post('admin_email_address', TRUE);
        $user_password = $this->input->post('admin_password', TRUE);
        $result=$this->al_model->select_admin($user_email,$user_password);
        if($result){
            $sess_data['user_id']=$result->admin_id;
            $sess_data['user_name']=$result->admin_name;
            $sess_data['user_power']=$result->admin_action;
            $this->session->set_userdata($sess_data);
            redirect("super_admin");
        }else{
            
            $sess_data['exception']="Invelid ID or Password";
            $this->session->set_userdata($sess_data);
            redirect("admin_log");
        }       
//        echo '<pre>';
//        echo ($result);
    }
}
