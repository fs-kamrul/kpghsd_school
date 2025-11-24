<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Login_Model extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function select_admin($email_address,$password) {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address', $email_address);
        $this->db->where('admin_password', md5($password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
