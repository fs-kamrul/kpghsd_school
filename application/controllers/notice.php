<?php
class Notice extends CI_Controller {
    public function __construct() {
        parent::__construct();

    }
    public function index() {
        $data = array();
        $data['title'] = 'notice';
        $data['slider'] = 0;
        $data['right_site'] = 1;

        $data['maincontain'] = $this->load->view('notice_n', $data, TRUE);
        $this->load->view('home', $data);
    }

}
