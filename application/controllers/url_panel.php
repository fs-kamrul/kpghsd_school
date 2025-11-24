<?php
class url_panel extends CI_Controller {
    public function __construct() {
        parent::__construct();
//        $this->load->library('fpdf');
//        $this->load->library('grade');
//        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
//        $this->load->model('position_result', 'position_model', TRUE);
        $this->load->model('url_model', 'u_model', TRUE);
//        $this->load->model('attendant_panel_model', 'att_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function url() {
        $data = array();
        $data['title'] = 'url';
        $data['show'] = '10';
        $data['site_block'] = 'url';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function url_in() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'url_input';
        $data['show'] = '10';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('url/url_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function url_save() {
        $data = array();
        $data['url_name'] = $this->input->post('url_name', TRUE);
        $data['url_title'] = $this->input->post('url_title', TRUE);
        $data['url_icon'] = $this->input->post('url_icon', TRUE);
        $data['url_type'] = $this->input->post('url_type', TRUE);
        $data['url_active'] = $this->input->post('url_active', TRUE);
        $msg = $this->u_model->select_url($data);
        $msg1 = $this->u_model->select_url_active($data);
        $sdata = array();
        if(!$msg && !$msg1){
            $this->u_model->save_url($data);
            $sdata['message'] = 'Save URL Successfully';
        }  else {
            $sdata['erroraaa'] = 'This URL OR URL_Active is already exists ';
        }
        $this->session->set_userdata($sdata);
        redirect('url_panel/url_in');
    }
    public function url_group() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['url_name'] = $this->u_model->select_url_name();
        $data['title'] = 'url_group';
        $data['show'] = '10';
        $data['input_gallery'] = ' ';
        $data['url_menu_name']=$this->menu_model->select_all_url_main();
//        $data['maincontain'] = $this->load->view('url/url_input_1', $data, TRUE);
        $data['maincontain'] = $this->load->view('url/url_input_3', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function url_group_save() {
        $data = array();
        $data['url_group_name'] = $this->input->post('url_group_name', TRUE);
        $data['url_id'] = $this->input->post('url_id', TRUE);
        $data['url_insert'] = $this->input->post('url_insert', TRUE);
        $data['url_edit'] = $this->input->post('url_edit', TRUE);
        $data['url_delete'] = $this->input->post('url_delete', TRUE);
        $msg = $this->u_model->select_url_authentication($data);
        $sdata = array();
        if(!$msg){
            $this->u_model->save_url_authentication($data);
            $sdata['message'] = 'Save URL Successfully';
        }  else {
            $sdata['erroraaa'] = 'This URL is already exists in this Group';
        }
        $this->session->set_userdata($sdata);
        redirect('url_panel/url_group');
    }
    public function url_group_save_1() {
        $data = array();
        $url_data = $this->input->post('url_data', TRUE);

        $data['url_group_name'] = $this->input->post('url_group_name', TRUE);
            $sdata = array();
        foreach ($url_data as $key => $value) {
            $data['url_id'] = $this->input->post("url_id$key", TRUE);
            $data['url_insert'] = $this->input->post("url_insert$key", TRUE);
            $data['url_edit'] = $this->input->post('url_edit'.$key, TRUE);
            $data['url_delete'] = $this->input->post('url_delete'.$key, TRUE);
            
            $msg = $this->u_model->select_url_authentication($data);
            if(!$msg){
                $this->u_model->save_url_authentication($data);
                $sdata['message'] = 'Save URL Successfully';
            } else {
                $sdata['erroraaa'] .= $key.' URL exists. ';
//                $sdata['erroraaa'] .= 'This URL is already exists in this Group';
            }
        }
//        echo '<pre>';
//        print_r($data);
//        exit();
        $this->session->set_userdata($sdata);
        redirect('url_panel/url_group');
    }
    public function url_view() {
        $data = array();
        $url_group_name = $this->input->post('url_group_name', TRUE);
        $data['group_name']=  $url_group_name;
        $data['url_menu_name']=  array();
        if (!$url_group_name) {
            $data['url_group_name']="";
        }  else {
            $data['url_menu_name']=$this->menu_model->select_all_menu_by_id($url_group_name);
        }
        
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'url_view';
        $data['show'] = '10';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('url/url_input_2', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    
    public function url_view_1($dap) {
        $data = array();
        $url_group_name = $dap;
        $data['group_name']=  $dap;
        $data['url_menu_name']=  array();
        if (!$url_group_name) {
            $data['url_group_name']="";
        }  else {
            $data['url_menu_name']=$this->menu_model->select_all_menu_by_id($url_group_name);
        }
        
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'url_view';
        $data['show'] = '10';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('url/url_input_2', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function url_update() {
        $data = array();
        $group_name = $this->input->post('url_group', TRUE);
        $data['url_authentication_id'] = $this->input->post('url_authentication_id', TRUE);
        $data['url_insert'] = $this->input->post('url_insert', TRUE);
        $data['url_edit'] = $this->input->post('url_edit', TRUE);
        $data['url_delete'] = $this->input->post('url_delete', TRUE);
//        echo '<pre>';
//        print_r($data);
//        exit();
        $this->u_model->update_url($data);
        $sdata = array();
        $sdata['message'] = 'Update This URL Successfully';
        $this->session->set_userdata($sdata);
        redirect("url_panel/url_view_1/$group_name");
    }
    public function url_delete($data) {
        $this->u_model->url_delete_by_id($data);
        $sdata = array();
        $sdata['message'] = 'Delete URL Successfully';
        $this->session->set_userdata($sdata);
        redirect('url_panel/url_view');
    }
    public function tbl_url_order_by() {

        echo 'Now Not Open';
        exit();
        $data = array();
        $url_name = $this->u_model->select_url_name($data);
        foreach ($url_name as $datap){
            $data['url_id']= $datap->url_id;
            $data['order_by']= $datap->url_id;
            $this->u_model->update_url_order_by($data);
        }
        echo 'Done';
    }
}
