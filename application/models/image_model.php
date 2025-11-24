<?php
class image_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function save_img($data) {
        $this->db->insert('image_gallery',$data);
    }
    public function select_all_image() {
        $this->db->select('*');
        $this->db->from('image_gallery');
        $query_result=  $this->db->get();
        $result=  $query_result->result();
        return $result;
    }
    public function select_detail_image($img_id) {
        $this->db->select('*');
        $this->db->from('image_gallery');
        $this->db->where('img_id',$img_id);
        $query_result=  $this->db->get();
        $result=  $query_result->row();
        return $result;
    }
}
