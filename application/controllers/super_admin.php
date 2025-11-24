<?php

class Super_admin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $m_view = $this->session->userdata('user_id');

        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
        $this->load->model('super_admin_model', 'sa_model', TRUE);       
    }
    
    public function index() {
        $data = array();
        $data['title'] = 'dashboard';
        $data['title_nn'] = 'Notice';
        $data['show'] = '1';
        $data['option_all'] = $this->sa_model->select_option();
        $data['name'] = $this->sa_model->dboard_admin();
        $data['name_all'] = $this->sa_model->dboard();
        $data['notice_all'] = $this->sa_model->select_notice();
        
        $data['maincontain'] = $this->load->view('admin/dashboard_contain', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function p_test() {
        $this->load->view('admin/p_test');
    }
    public function login() {
        $data = array();
        $data['title'] = 'login';
        $this->load->view('admin/login', $data);
    }

    

    public function option() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'option';
        $data['show'] = '12';
        $data['maincontain'] = $this->load->view('admin/option_contain', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function view_option() {
        $data = array();

        /* ---------pagination--------- */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'super_admin/view_option/';
        $config['total_rows'] = $this->db->count_all('option_a');
        $config['per_page'] = '6';
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        /* ---------close pagination--------- */

        $data['option'] = $this->sa_model->select_all_option($config['per_page'], $this->uri->segment(3));
        $data['title'] = 'option';
        $data['show'] = '13';
        $data['maincontain'] = $this->load->view('admin/view_option', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function opsion_save() {
        $data = array();
        $sdata = array();
        $data['opt_a'] = $this->input->post('opt_a', TRUE);
        $data['data_a'] = $this->input->post('data_a', TRUE);
        $data['order'] = $this->input->post('order', TRUE);

        $up_to=$this->sa_model->select_option_a($data);
        if ($up_to) {
            $sdata['erroraaa'] = 'This Data Allready Save.';
        }  else {
            $this->sa_model->save_option($data);
            $sdata['message'] = 'Option Save Successfully';
        }

        $this->session->set_userdata($sdata);
        redirect('super_admin/option');
    }

    public function opt_delete($opt_id) {
        $this->sa_model->delete_opt_reg_id($opt_id);
        //echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('super_admin/view_option');
    }


    public function teacher_reg() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'registration';
        $data['show'] = '2';
        $data['maincontain'] = $this->load->view('admin/teacher_registation_info', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function save_teacher_reg() {
        $data = array();
        $config = array();

        /* --------file--------------- */
        $config['upload_path'] = 'images/upload/teacher/';
//        $config['file_name'] = $this->input->post('admin_email_address', TRUE);
        $config['file_name'] = rand(1000, 9999) . '-' . date('His');;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo')) {
            $error['erroraaa'] = $this->upload->display_errors();
            $this->session->set_userdata($error);
        } else {
            $fdata = $this->upload->data();
            $data['photo'] = $config['upload_path'] . $fdata['file_name'];

        }
        $data['admin_name'] = $this->input->post('admin_name', TRUE);
        $data['admin_email_address'] = $this->input->post('admin_email_address', TRUE);
        $data['profetion'] = $this->input->post('profetion', TRUE);
        $data['department'] = $this->input->post('department', TRUE);
        $data['admin_action'] = $this->input->post('admin_action', TRUE);
        $data['admin_password'] = md5("123456");
        
        $data['father_name'] = $this->input->post('father_name', TRUE);
        $data['index_no'] = $this->input->post('index_no', TRUE);
        $data['mother_name'] = $this->input->post('mother_name', TRUE);
//        $data['birth_bate'] = $this->input->post('birth_bate', TRUE);
//        $data['join_date'] = $this->input->post('join_date', TRUE);
        $data['birth_bate'] = date("Y-m-d", strtotime($this->input->post('birth_bate', TRUE)));
        $data['join_date'] = date("Y-m-d", strtotime($this->input->post('join_date', TRUE)));
        $data['gender'] = $this->input->post('gender', TRUE);
        $data['marital_status'] = $this->input->post('marital_status', TRUE);
        $data['blood_group'] = $this->input->post('blood_group', TRUE);
        $data['religion'] = $this->input->post('religion', TRUE);
        $data['nationality'] = $this->input->post('nationality', TRUE);
        $data['national_id'] = $this->input->post('national_id', TRUE);
        $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
        $data['village'] = $this->input->post('village', TRUE);
        $data['post'] = $this->input->post('post', TRUE);
        $data['sub_district'] = $this->input->post('sub_district', TRUE);
        $data['district'] = $this->input->post('district', TRUE);
        $data['division'] = $this->input->post('division', TRUE);
        $data['country'] = $this->input->post('country', TRUE);
        $data['zip_code'] = $this->input->post('zip_code', TRUE);
        
        $msg = $this->sa_model->select_email_teacher($data);

        $sdata = array();
        if(!$msg){
            $this->sa_model->save_teacher($data);
            $sdata['message'] = 'Save Teacher Information Successfully';
        }  else {
            $sdata['erroraaa'] = 'This Email ID is already exists ';
        }
        
        $this->session->set_userdata($sdata);
        //$data['all_reg'] = $this->sa_model->select_all_reg_info();

        redirect('super_admin/teacher_reg');
    }
    
    public function view_teacher() {
        $data['title'] = 'view_teacher_registration';
        $data['show'] = '2';
        $data['option'] = $this->sa_model->select_option();
        $data['teach'] =$al_cls = $this->sa_model->select_all_teacher();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);

        $data['user_power'] = $this->session->userdata('user_power');
        $data['maincontain'] = $this->load->view('admin/view_teacher_registation', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function teacher_edit($ter_id) {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'registration_update';
        $data['show'] = '2';
        $data['main_a'] = $this->sa_model->select_by_id_teacher($ter_id);
        $data['maincontain'] = $this->load->view('admin/teacher_registation_update', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function teacher_reg_update() {
        $data=  array();
        $photo="";
        /* --------file--------------- */
        $config['upload_path'] = 'images/upload/teacher/';
//        $config['file_name'] = $this->input->post('admin_name', TRUE);
        $config['file_name'] = rand(1000, 9999) . '-' . date('His');;
//        $config['allowed_types'] = 'gif|jpg|png';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
//        $config['allowed_types'] = '*';
        $config['max_size'] = '1024';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
        $config['encrypt_name']  = TRUE; // optional
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo')) {
            $error['erroraaa'] = $this->upload->display_errors();
            $this->session->set_userdata($error);
        } else {
            $fdata = $this->upload->data();
            $photo = $config['upload_path'] . $fdata['file_name'];

        }
        /*----------------end_file---------------*/
        if (!empty($photo)) {
            $data['photo'] = $photo;
        }
//        echo '<pre>';
//        print_r($config);
//        exit();
//        $reg_id = $this->input->post('reg_id', TRUE);
        $admin_id = $this->input->post('admin_id', TRUE);
        $data['admin_name'] = $this->input->post('admin_name', TRUE);
        $data['father_name'] = $this->input->post('father_name', TRUE);
        $data['index_no'] = $this->input->post('index_no', TRUE);
        $data['mother_name'] = $this->input->post('mother_name', TRUE);
//        $data['birth_bate'] = $this->input->post('birth_bate', TRUE);
//        $data['join_date'] = $this->input->post('join_date', TRUE);
        $data['birth_bate'] = date("Y-m-d", strtotime($this->input->post('birth_bate', TRUE)));
        $data['join_date'] = date("Y-m-d", strtotime($this->input->post('join_date', TRUE)));
//        $data['id'] = $this->input->post('id', TRUE);
        //$data['photo'] = $this->input->post('photo', TRUE);
        $data['gender'] = $this->input->post('gender', TRUE);
        $data['marital_status'] = $this->input->post('marital_status', TRUE);
        $data['blood_group'] = $this->input->post('blood_group', TRUE);
        $data['profetion'] = $this->input->post('profetion', TRUE);
        $data['department'] = $this->input->post('department', TRUE);
        $data['admin_action'] = $this->input->post('admin_action', TRUE);
        $data['religion'] = $this->input->post('religion', TRUE);
        $data['nationality'] = $this->input->post('nationality', TRUE);
        $data['national_id'] = $this->input->post('national_id', TRUE);
        $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
        $data['admin_email_address'] = $this->input->post('admin_email_address', TRUE);
        $data['village'] = $this->input->post('village', TRUE);
        $data['post'] = $this->input->post('post', TRUE);
        $data['sub_district'] = $this->input->post('sub_district', TRUE);
        $data['district'] = $this->input->post('district', TRUE);
        $data['division'] = $this->input->post('division', TRUE);
        $data['country'] = $this->input->post('country', TRUE);
        $data['zip_code'] = $this->input->post('zip_code', TRUE);

        $this->sa_model->update_teacher_reg($data, $admin_id);

        $sdata = array();
        $sdata['message'] = 'Update Teacher Registration Successfully';
        $this->session->set_userdata($sdata);

        redirect('super_admin/view_teacher');
//        echo '<pre>';
//        print_r($_POST);
//        print_r($data);
//        exit();
    }
    public function teacher_delete($data) {
        $this->sa_model->delete_teacher($data);
        $sdata = array();
        $sdata['message'] = 'Delete Successfully';
//        $sdata['erroraaa'] = 'This Email ID is already exists ';
        $this->session->set_userdata($sdata);
        redirect('super_admin/view_teacher');
    }
    public function class_reg() {
        $data['title'] = 'class_registration';
        $data['show'] = '7';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] =$al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('admin/class_by_reg', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
        
//        echo '<pre>';
//        print_r($al_cls);
//        exit();
    }

    public function only_class_search() {
        $data['title'] = 'class_registration';
        $data['show'] = '7';
        $data['option'] = $this->sa_model->select_option();
        $data['class'] =$class = $this->input->post('class', TRUE);
        $data['group_r'] =$group_r = $this->input->post('group_r', TRUE);
        $data['year'] =$year = $this->input->post('year', TRUE);
        $data['section'] =$section = $this->input->post('section', TRUE);
                
        $data['all_class'] = $this->sa_model->class_reg_search($class, $year, $section,$group_r);
        $data['maincontain'] = $this->load->view('admin/only_class_by_reg', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function class_by_reg_save() {
        $data = array();
        $chk=$this->input->post('check', TRUE);
//        $other=$this->input->post('other', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        
        $data['class_x'] = $this->input->post('class_x', TRUE);
        $data['group_r_x'] = $this->input->post('group_r_x', TRUE);
        $data['year_x'] = $this->input->post('year_x', TRUE);
        $data['section_x'] = $this->input->post('section_x', TRUE);
        foreach ($chk as $key => $value) {
            $data['reg_id' . $key] = $this->input->post('reg_id' . $key, TRUE);
            $data['roll' . $key] = $this->input->post('roll' . $key, TRUE);
        }
//        echo '<pre>';
//        print_r($data);
//        exit();
        $this->sa_model->save_class_reg($data,$chk);
        $sdata = array();
        $sdata['message'] = 'All Registration Successfully';
        $this->session->set_userdata($sdata);
        redirect('super_admin/class_reg');
    }

    public function view_all_registration() {
        $data = array();
        $data['title'] = 'view_registration';
        $data['show'] = '1';
        $data['option'] = $this->sa_model->select_option();
        $data['all_reg'] = $this->sa_model->select_all_reg_info();
        $data['maincontain'] = $this->load->view('admin/view_registation', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function license() {
        $data = array();
        $data['title'] = 'check_license';
        $data['show'] = '1';
        $this->load->view('admin/licence', $data);
    }
    public function chack_license($data) {
        
    }

    public function logout() {
//        session_destroy();
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_id');
        $sess_data=array();
        $sess_data['message']="successfuly logout";
        $this->session->set_userdata($sess_data);
        redirect("admin_log");
        
    }

}
