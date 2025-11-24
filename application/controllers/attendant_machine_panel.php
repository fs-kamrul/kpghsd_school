<?php
class attendant_machine_panel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //$this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('attendant_panel_model', 'att_model', TRUE);

    }

    public function attendant_machin($tag='') {
        date_default_timezone_set('Asia/Dhaka');
        $today = date("Y-m-d H:i:s");
        $this->att_model->insert_att_save($tag,$today);
//        echo 'Done';
        return "hello";
    }
    public function attendant_machin_date($tag='',$today='') {
        date_default_timezone_set('Asia/Dhaka');
//        $today = date("Y-m-d H:i:s");
        $today_t = $today.date(" H:i:s");
        $this->att_model->insert_att_save($tag,$today_t);
//        echo 'Done';
        return "hello";
    }


    public function attendant_machine($tag,$cardnumber) {
        date_default_timezone_set('Asia/Dhaka');
        $number = $this->att_model->check_att_init($cardnumber);
        $today = date("Y-m-d H:i:s");

        if($number){
            if($number->rfid_tag){
                $check_inout = $this->att_model->check_att_inout($number->reg_id,$today);
                if($check_inout){
                    $this->att_model->update_att_out($check_inout->id,$today);
                    echo 'already';
                }else{
                    $this->att_model->insert_att_in($number->reg_id,$today);
                    echo 'done';
                }

            }else{
                $this->att_model->update_att_init($cardnumber,$tag,$today);
                echo 'ok';
            }

        }else{
            echo 'error';
        }
        return $today;
    }

}
