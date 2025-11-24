<?php

class Notice_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function save_notice_m($data) {
        $this->db->insert('tbl_notice', $data);
    }
    
}
