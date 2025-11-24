<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student_Login_Model extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function select_student($email_address,$password) {
        $this->db->select('*');
        $this->db->from('student_information');
        $this->db->where('id', $email_address);
        $this->db->where('password', md5($password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
