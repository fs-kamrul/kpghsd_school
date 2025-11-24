<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $data = array();
//        $data['title'] = 'home';
//        $data['slider'] = 1;
//        $data['right_site'] = 1;
//        $data['maincontain'] = $this->load->view('home_contain', $data, TRUE);
//        $this->load->view('home', $data);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
//            $this->load->view('admin/login');
            redirect("admin_log", "refresh");
        }  else {
            redirect('super_admin');
        }
    }

}
