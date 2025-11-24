<?php

class Other extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('super_admin_model', 'sa_model', TRUE);
                
    }
    public function index() {
        $data = array();
        $data['title'] = 'check_license';
        $data['show'] = '1';
        $this->load->view('admin/licence', $data);
    }
    public function chack_license($data=0) {
//        $data = array();
        if ($data!=0) {
            $data['license'] =$class = $this->input->post('license', TRUE);
        }
        
    } 
    
    
}
