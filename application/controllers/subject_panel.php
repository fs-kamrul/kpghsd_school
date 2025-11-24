<?php

class Subject_panel extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        //$this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function sub() {
        $data = array();
        $data['title'] = 'subject';
        $data['show'] = '3';
        $data['site_block'] = 'subject';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function subject() {
        $data = array();
        $data['title'] = 'subject_input';
        $data['show'] = '3';
        $data['option'] = $this->sp_model->select_opt_all();
        $classc = $this->sp_model->select_all_sub_s();
        if ($classc) {
            $data['class'] = $class = $classc->class;
        } else {
            $data['class'] = $class = '';
        }
        $data['group_r']='';
        $data['user_power'] = $this->session->userdata('user_power');
        $data['all_sub_show'] = $this->sp_model->select_sub_class($data);
        $data['maincontain'] = $this->load->view('admin/subject_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function save_sub() {
        $data = array();
        $data['sub_code'] = $this->input->post('sub_code', TRUE);
        $data['sub_name'] = $this->input->post('sub_name', TRUE);
        $data['sub_mark'] = $this->input->post('sub_mark', TRUE);
        $data['pass_mark'] = $this->input->post('pass_mark', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $this->sp_model->save_sub_data($data);
        $sdata = array();
        $sdata['message'] = 'Subject Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('subject_panel/subject');
    }

    public function search_sub() {
        $data = array();
        $data['title'] = 'subject_input';
        $data['show'] = '3';
        $data['option'] = $this->sp_model->select_opt_all();
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r']=$this->input->post('group_r', TRUE);;
        $data['all_sub_show'] = $this->sp_model->select_sub_class($data);
        $data['user_power'] = $this->session->userdata('user_power');
        $data['maincontain'] = $this->load->view('admin/subject_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function sub_delete($sub_id) {
        $this->sp_model->delete_sub_id($sub_id);
        //echo '----------' . $sub_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);
        redirect('subject_panel/subject');
    }

    public function update_reg_info($year='',$class='',$section='',$group_r='') {
        $data = array();
        $data['title'] = 'student_information';
        $data['show'] = '2';
        $data['input_gallery'] = ' ';
        $data['all_data'] = ' ';
        $data['year'] = $year;
        $data['class'] = $class;
        $data['section'] = $section;
        $data['group_r'] = $group_r;
        $data['option'] = $this->sp_model->select_opt_all();
//        $data['all_reg'] = $this->sp_model->select_all_reg();
//        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $data['maincontain'] = $this->load->view('sub/update_reg', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    
    

    public function reg_search() {
        $data = array();
        $data['title'] = 'student_information';
        $data['show'] = '2';
        $data['all_data'] = '1';
        $data['option'] = $this->sp_model->select_opt_all();
//        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['section'] = $section = $this->input->post('section', TRUE);
        $data['group_r'] = $group_r = $this->input->post('group_r', TRUE);
//        $data['rfid_tag'] = $this->sp_model->search_reg($class, $year, $section,$group_r);
        $data['search_reg'] = $this->sp_model->search_reg($class, $year, $section,$group_r);
        $data['maincontain'] = $this->load->view('sub/update_reg', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function tag_delete($id) {
        
        $this->sp_model->tag_delete($id);
        //echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('subject_panel/update_reg_info/');
    }

    public function delete_reg($all_reg_id) {
        $this->sp_model->delete_registration($all_reg_id);
        //echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('subject_panel/reg_search');
    }

    public function reg_update() {
        $data = array();
        $datap = array();
        $other = $this->input->post('other', TRUE);
        $i = 1;
        for ($i > 0; $i <= $other; $i++) {
            $data['all_reg_id' . $i] = $this->input->post('all_reg_id' . $i, TRUE);
            $data['roll' . $i] = $this->input->post('roll' . $i, TRUE);
            $data['group_r' . $i] = $this->input->post('group_r' . $i, TRUE);
            $data['section' . $i] = $this->input->post('section' . $i, TRUE);
            $datap['stu_id' . $i] = $this->input->post('stu_id' . $i, TRUE);
            $datap['reg_id' . $i] = $this->input->post('reg_id' . $i, TRUE);
            $datap['rfid_tag' . $i] = $this->input->post('rfid_tag' . $i, TRUE);
        }
//        $data['roll'] = $this->input->post('roll', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
//        $data['section'] = $this->input->post('section', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
//        echo '<pre>';
//        print_r($other);
//        print_r($data);
//        exit();
        
        $this->sp_model->update_tag_tbl($datap, $other);
        $this->sp_model->update_reg_tbl($data, $other);
        $sdata = array();
        $sdata['message'] = 'Update Successfully';
        $this->session->set_userdata($sdata);
        
        $year = $this->input->post('year', TRUE);
        $class = $this->input->post('class', TRUE);
        $section = $this->input->post('section', TRUE);
        $group_r = $this->input->post('group_r', TRUE);
        redirect('subject_panel/update_reg_info/'.$year.'/'.$class.'/'.$section.'/'.$group_r);
    }

    public function subject_assigned() {
        $data = array();
        $data['title'] = 'subject_assigned';
        $data['show'] = '3';
        $data['all_data'] = '1';
        $data['sub'] = $this->sp_model->select_sub_all();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['option'] = $this->sp_model->select_opt_all();
        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $data['user_power'] = $this->session->userdata('user_power');
        $group_r = "";
        $class = "";
        $section = "";
        $year = date('Y');
        $data['all_reg'] = $this->sp_model->select_subject_assign_search($group_r, $class, $section, $year);
        $data['maincontain'] = $this->load->view('admin/subject_assigned_num', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function show_sub($datas=0,$grp=0) {
//        echo $grp;
        if($grp=="Business%20Studies"){
            $grp="Business Studies";
        }
        $sub = $this->sp_model->select_one_cls_sub_all($datas,$grp);
//        echo '<pre>';
//        print_r($sub);
//            echo '<select  name="subject_name" id="subject_name" >';
        foreach ($sub as $v_option) {
            echo "<option value=" . "$v_option->sub_id" .">" . "$v_option->sub_name"."</option>";
            
        }
//        echo ' </select>';
    }
    public function show_sub_one($id) {
        $ss= $this->sp_model->select_sub_att($id);
        echo $ss->sub_name;
    }

    public function sub_ass_delete($assigned_id) {
        $this->sp_model->delete_assign($assigned_id);
//echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('subject_panel/subject_assigned');
    }

    public function view_assign_subject() {
        $data = array();
        $data['title'] = 'view_assign_subject';
        $data['show'] = '3';
        $data['all_sub_show'] = $this->sp_model->select_all_sub();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['sub'] = $this->sp_model->select_sub_all();
        $data['option'] = $this->sp_model->select_opt_all();

        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $group_r = $this->input->post('group_r', TRUE);
        $data['section'] = $section = $this->input->post('section', TRUE);

        $data['user_power'] = $this->session->userdata('user_power');


        $data['all_reg'] = $this->sp_model->select_subject_assign_search($group_r, $class, $section, $year);

        $data['maincontain'] = $this->load->view('admin/subject_assigned_num', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function save_subject_assigned() {
        $data = array();
        $datam = array();
        $other = $this->input->post('other', TRUE);
        $data['year']= $datam['year'] = $this->input->post('year', TRUE);
        $data['class']= $datam['class'] = $this->input->post('class', TRUE);
        $data['section']= $datam['section'] = $this->input->post('section', TRUE);
        $data['group_r']= $datam['group_r'] = $this->input->post('group', TRUE);
        $data['teacher_id'] = $this->input->post('teacher_name', TRUE);
        $data['subject_id']= $datam['sub_id'] = $this->input->post('subject_name', TRUE);
        
        
        $ak = $this->input->post('ak', TRUE);
        if($ak=='num'){
//            echo 'num';
            $datam['mark_number'] = '0';
            $datam['mark_pass'] = '0';
//            echo '<pre>';
            $option = $this->sp_model->select_opt_opt_a('term');
            $add_mark = $this->sp_model->select_opt_opt_a('add_mark');
            foreach ($option as $key1 => $value1) {
                $datam['term'] = $value1->data_a;
                foreach ($add_mark as $key2 => $value2) {
                    $datam['mark_title'] = $value2->data_a;
                    $this->sp_model->save_all_add_mark_assign($datam);
//                    print_r($datam);
                }
            }
        }
//        print_r($add_mark);
//        exit();
        
        $this->sp_model->save_assigned($data, $other);
        
        echo 'Data Save';
//        $sdata = array();
//        $sdata['message'] = 'Save Successfully';
//        $this->session->set_userdata($sdata);
//        redirect('subject_panel/subject_assigned');
    }

    public function transfer() {
        $data = array();
        $data['title'] = 'dashboard';
        $data['show'] = '1';
        $data['maincontain'] = $this->load->view('fpdf/fpdf.php', $data, TRUE);
        $this->load->view('pdf/report_transfer', $data);
        //echo 'anik';
    }

}
