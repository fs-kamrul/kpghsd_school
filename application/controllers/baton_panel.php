<?php
class baton_panel extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf');
        //$this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('attendant_panel_model', 'att_model', TRUE);
        $this->load->model('baton_model', 'b_model', TRUE);
        $this->lang->load('baton');
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function baton() {
        $data = array();
        $data['title'] = 'baton';
        $data['show'] = '11';
        $data['site_block'] = 'baton';
//        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function baton_input() {
        $data['title'] = 'baton_input';
        $data['show'] = '11';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] =$al_cls = $this->b_model->select_baton();
//        $data['all_class'] = $this->sa_model->select_all_class_info($al_cls);
        $data['maincontain'] = $this->load->view('baton/baton_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function baton_input_new() {
        $data['title'] = 'baton_input';
        $data['show'] = '11';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] =$al_cls = $this->b_model->select_baton();
//        $data['all_class'] = $this->sa_model->select_all_class_info($al_cls);
        $data['maincontain'] = $this->load->view('baton/baton_input_7', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function all_class_baton_set() {
        $data['title'] = 'baton_input';
        $data['show'] = '11';
        $data['class'] =$class = $this->input->post('class', TRUE);
        $data['group_r'] =$group_r = $this->input->post('group_r', TRUE);
        $data['year'] =$year = $this->input->post('year', TRUE);
        $data['section'] =$section = $this->input->post('section', TRUE);
        $data['student_id'] =$student_id = $this->input->post('student_id', TRUE);
        $data['b_collage'] =$b_collage = $this->input->post('b_collage', TRUE);
        $data['option'] = $this->sa_model->select_option();

        $data['all_class'] = $this->sa_model->class_reg_search_by_student_id($class, $year, $section,$group_r,$student_id);
        $data['baton_set_package'] = $this->b_model->select_baton_set_package_by_class($data);
        $data['all_b'] = $this->b_model->select_all_stu_baton_set($data);
        foreach ($data['all_b'] as $key => $value) {
            $data['all_baton'][$value->id]['id']=$value->id;
            $data['all_baton'][$value->id]['name']=$value->name;
            $data['all_baton'][$value->id]['roll']=$value->roll;
            $data['all_baton'][$value->id]['stu_year']=$value->year_stu_b;
            if($data['all_baton'][$value->id]['stu_year']!=$value->year_b){
                $data['baton_year']=$value->year_b;
            }else{
//                    $data['baton_year']=0;
            }
            $data['all_baton'][$value->id]['mon'][$value->month_b]['month']=$value->month_b;
            $data['all_baton'][$value->id]['mon'][$value->month_b]['year']=$value->year_b;
            $data['all_baton'][$value->id]['mon'][$value->month_b]['year']=$value->year_b;
            $data['all_baton'][$value->id]['mon'][$value->month_b]['total']=$value->total_amnt;
            $data['all_baton'][$value->id]['mon'][$value->month_b]['dat']=$value->entry_date;
        }
//        echo '<pre>';
////        if(count($data['baton_set_package']))
//            print_r($data['all_baton']);
////            print_r($data['all_baton']);
////        print_r(count($data['all_baton']));
////        else
////            echo count($data['all_class']).'anik';
//        echo '</pre>';
//        exit();
        if($b_collage==1){
            $data['maincontain'] = $this->load->view('baton/baton_input_set_collage', $data, TRUE);
        }else{
            $data['maincontain'] = $this->load->view('baton/baton_input_set', $data, TRUE);
        }

        $this->load->view('admin/dashboard', $data);
    }
    public function save_baton_stu($class='',$year='',$group='',$section='',$st_tk='',$sttk='',$stuid='',$all_reg_id='',$month='',$development_fee='',$tution_fee='',$tiffin_fee='',$session_fee='',$lab_fee='',$admission_fee='',$fine='',$delay_fee='',$year_b='',$receite_no='') {

        if($group=='Business%20Studies'){
            $group='Business Studies';
        }
        $data = array();
        $data['student_id'] = $stuid;
        $data['reg_id'] = $all_reg_id;
        $data['class_b'] = $class;
        $data['year_stu_b'] = $year;
        $data['group_b'] = $group;
        $data['section_b'] = $section;
        $data['lab_fee'] = $lab_fee;
        $data['year_b'] = $year_b;
        $data['month_b'] = $month;
        $data['dev_fee'] = $development_fee;
        $data['tution_fee'] = $tution_fee;
        $data['tiffin_fee'] = $tiffin_fee;
        $data['session_others_fee'] = $session_fee;
        $data['re_addmission_fee'] = $admission_fee;
        $data['fine'] = $fine;
        $data['delay_fee'] = $delay_fee;
        $data['receite_no'] = $receite_no;

        $data['total_amnt'] = $st_tk;
        $data['entry_date'] = date('m/d/Y');
        $data['teacher_id'] = $this->session->userdata('user_id');

//        echo '<pre>';
//        echo $st_tk.'-'.$stuid;
//        print_r($data);
//        exit();
//        echo $grp;
        $sub = $this->b_model->save_stu_baton($data);
        if($sub){
            echo $st_tk;
        }else{
            echo "Error. Try Again!!!";
        }
    }
    public function all_class_baton() {
        $data['title'] = 'baton_input';
        $data['show'] = '11';
        $data['option'] = $this->sa_model->select_option();
        $data['class'] =$class = $this->input->post('class', TRUE);
        $data['group_r'] =$group_r = $this->input->post('group_r', TRUE);
        $data['year'] =$year = $this->input->post('year', TRUE);
        $data['section'] =$section = $this->input->post('section', TRUE);

        $data['all_class'] = $this->sa_model->class_reg_search($class, $year, $section,$group_r);
        $data['maincontain'] = $this->load->view('baton/pay_baton', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function baton_save() {
        $data = array();
        $datap = array();
        $data['title'] = 'baton_input';
        $data['show'] = '11';
        $data['check'] = $check = $this->input->post('check', TRUE);
//        echo '<pre>';
//        print_r($data['check']);
//        exit();
        $datap['teacher_id'] = $this->session->userdata('user_id');
        $datap['tution_fee'] =$tution_fee= $this->input->post('tution_fee', TRUE);
        $datap['tiffin_fee'] =$tiffin_fee= $this->input->post('tiffin_fee', TRUE);
        $datap['fine'] =$fine= $this->input->post('fine', TRUE);
        $datap['delay_fee'] =$delay_fee= $this->input->post('delay_fee', TRUE);
        $datap['re_addmission_fee'] =$re_addmission_fee= $this->input->post('re_addmission_fee', TRUE);
        $datap['dev_fee'] =$dev_fee= $this->input->post('dev_fee', TRUE);
        $datap['session_others_fee'] =$session_others_fee= $this->input->post('session_others_fee', TRUE);
        $datap['lab_fee'] =$lab_fee= $this->input->post('lab_fee', TRUE);
        $datap['others_fee'] =$others_fee= $this->input->post('others_fee', TRUE);
        $datap['total_amnt'] = $tution_fee+$tiffin_fee+$fine+$delay_fee+$re_addmission_fee+$dev_fee+$session_others_fee+$lab_fee+$others_fee;
        $datap['entry_date'] = date('m/d/Y');//$this->input->post('entry_date', TRUE);
        
        $datap['month_b'] = $this->input->post('month_b', TRUE);
        $datap['year_b'] = $this->input->post('year_b', TRUE);
        
        $a=0;
        $b=0;
        foreach ($data['check'] as $key => $value) {
            $datap['receite_no'] = $this->input->post('receite_no'.$key, TRUE);
            $datap['student_id'] = $id = $this->input->post('id'.$key, TRUE);
            $datap['reg_id'] = $this->input->post('reg_id'.$key, TRUE);
            $datap['class_b'] = $this->input->post('class_b'.$key, TRUE);
            $datap['group_b'] = $this->input->post('group_b'.$key, TRUE);
            $datap['section_b'] = $this->input->post('section_b'.$key, TRUE);
            $datap['year_stu_b'] = $this->input->post('year_stu_b'.$key, TRUE);
//            echo '<pre>';
//            print_r($datap);
//            exit();
            $sa_ch = $this->b_model->select_stu_baton($datap);
            if ($sa_ch) {
                $b++;
                $sdata['erroraaa'] = $b.' Data Is Already Save.';
            }  else {
                $a++;
                $sa = $this->b_model->save_stu_baton($datap);
                $sdata['message'] = $a.' Data Save Successfully';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('baton_panel/baton_input_new');
//        echo '<pre>';
//        print_r($datap);
//        exit();
    }
    public function baton_assign() {
        $data['title'] = 'baton_assign';
        $data['show'] = '11';
        $year = date('Y');
        $class = "";
        $section = "";
        $group_r = "";
        $data['baton_v'] = $this->b_model->select_all_baton($year, $class, $section, $group_r);
        $data['option'] = $this->sa_model->select_option();
        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['all_class'] =$al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('baton/baton_input_1', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function save_baton_assigned() {
        $data = array();
//        $other = $this->input->post('other', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group', TRUE);
        $data['teacher_id'] = $this->input->post('teacher_name', TRUE);
//        echo '<pre>';
//        print_r($data);
        $this->b_model->save_baton_assigned($data);
        
        echo 'Data Save';
//        $sdata = array();
//        $sdata['message'] = 'Save Successfully';
//        $this->session->set_userdata($sdata);
//        redirect('subject_panel/subject_assigned');
    }
    public function baton_delete($ass_id) {
        $sdata = array();
        $this->b_model->delete_baton_ass($ass_id);
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('baton_panel/baton_assign');
    }
    public function baton_report() {
        $data['title'] = 'baton_report';
        $data['show'] = '11';
        $year = date('Y');
//        $class = "";
//        $section = "";
//        $group_r = "";
        $data['year_stu_b'] = $year_b = $this->input->post('year', TRUE);
        $data['class_b'] = $class_b = $this->input->post('class', TRUE);
        $data['group_b'] = $this->input->post('group_r', TRUE);
        $data['section_b'] = $this->input->post('section', TRUE);
        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
        $data['b_collage'] =$b_collage= $this->input->post('b_collage', TRUE);
        $data['option'] = $this->sa_model->select_option();
//        $sum=$sum_all=0;
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['all_baton']=  array();
        if ($class_b=="") {
            $data['class_b'] = $class_b="Anik";
        }  else {
            $data['all_b'] = $this->b_model->select_all_stu_baton($data);
            foreach ($data['all_b'] as $key => $value) {
                $data['all_baton'][$value->id]['id']=$value->id;
                $data['all_baton'][$value->id]['stu_year']=$value->year_stu_b;
                if($data['all_baton'][$value->id]['stu_year']!=$value->year_b){
                    $data['baton_year']=$value->year_b;
                }else{
//                    $data['baton_year']=0;
                }
                $data['all_baton'][$value->id]['name']=$value->name;
                $data['all_baton'][$value->id]['roll']=$value->s_roll;
                $data['all_baton'][$value->id]['mon'][$value->month_b]['month']=$value->month_b;
                $data['all_baton'][$value->id]['mon'][$value->month_b]['year']=$value->year_b;
                $data['all_baton'][$value->id]['mon'][$value->month_b]['total']=$value->total_amnt;
                $data['all_baton'][$value->id]['mon'][$value->month_b]['dat']=$value->entry_date;
            }
        }
//        echo '<pre>';
  //      print_r($data['all_b']);
////        echo $data['b_total'];
    //    exit();
        if($b_collage==1 && $b_date==0){
            $data['maincontain'] = $this->load->view('baton/baton_input_8', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        }elseif($b_collage==1 && $b_date==1){
            $data['maincontain'] = $this->load->view('baton/baton_input_9', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        } elseif($b_total==0 && $b_date==1){
            $data['maincontain'] = $this->load->view('baton/baton_input_3', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        } elseif ($b_total==1 && $b_date==0) {
            $data['maincontain'] = $this->load->view('baton/baton_input_4', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        } elseif ($b_total==1 && $b_date==1){
            $data['maincontain'] = $this->load->view('baton/baton_input_5', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        } elseif ($b_total==0 && $b_date==0) {
            $data['maincontain'] = $this->load->view('baton/baton_input_2', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        }
    }
    public function top_sheet() {
        $data['title'] = 'top_sheet';
        $data['show'] = '11';
        $year = date('Y');
        $data['year_stu_b'] = $year = $this->input->post('year', TRUE);
        $data['student_id'] = $student_id = $this->input->post('student_id', TRUE);
        $data['class_b'] = $class_b = $this->input->post('class', TRUE);
        $data['group_b'] = $this->input->post('group_r', TRUE);
        $data['section_b'] = $this->input->post('section', TRUE);
        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
        $data['month'] =$month= $this->input->post('month', TRUE);
        $entry_date = $this->input->post('entry_date', TRUE);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        if ($entry_date){
            $data['entry_date'] = date('m/d/Y', strtotime($entry_date));
        }else{
            $data['entry_date'] = '';
        }

        $data['option'] = $this->sa_model->select_option();
//        $sum=$sum_all=0;
        $data['all_baton']=  array();
        if ($class_b=="") {
            $data['class_b'] = $class_b="Anik";
        }  else {
            $data['all_b'] = $this->b_model->select_all_stu_baton_subject($data);

            $data['all_empty']['tution_fee']=0;
            $data['all_empty']['tiffin_fee']=0;
            $data['all_empty']['fine']=0;
            $data['all_empty']['delay_fee']=0;
            $data['all_empty']['re_addmission_fee']=0;
            $data['all_empty']['dev_fee']=0;
            $data['all_empty']['session_others_fee']=0;
            $data['all_empty']['lab_fee']=0;
            $data['all_empty']['others_fee']=0;
            foreach ($data['all_b'] as $value_baton){
                $data['all_empty']['tution_fee'] += $value_baton->tution_fee;
                $data['all_empty']['tiffin_fee'] += $value_baton->tiffin_fee;
                $data['all_empty']['fine'] += $value_baton->fine;
                $data['all_empty']['delay_fee'] += $value_baton->delay_fee;
                $data['all_empty']['re_addmission_fee'] += $value_baton->re_addmission_fee;
                $data['all_empty']['dev_fee'] += $value_baton->dev_fee;
                $data['all_empty']['session_others_fee'] += $value_baton->session_others_fee;
                $data['all_empty']['lab_fee'] += $value_baton->lab_fee;
                $data['all_empty']['others_fee'] += $value_baton->others_fee;
            }
//            echo '<pre>';
//            print_r($data['all_empty']);
//            echo '</pre>';
//            exit();
        }

        $data['maincontain'] = $this->load->view('baton/baton_input_6', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function baton_package(){
        $data = array();
        $data['title'] = 'baton_package';
        $data['show'] = '11';
//        $data['all_sub_show'] = $this->sp_model->select_all_sub();
//        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['baton_package'] = $this->b_model->select_baton_package();
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('baton/baton_input_package', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function baton_package_active($id,$type){
        $sdata = array();
        $this->b_model->baton_package_active_update($id,$type);
        $sdata['message'] = 'Update Successfully';
        $this->session->set_userdata($sdata);

        redirect('baton_panel/baton_package');
    }

    public function save_baton_package() {
        $data = array();
        $data['package_name'] = $this->input->post('package_name', TRUE);
        $data['tution_fee'] = $this->input->post('tution_fee', TRUE);
        $data['tiffin_fee'] = $this->input->post('tiffin_fee', TRUE);
        $data['fine'] = $this->input->post('fine', TRUE);
        $data['admission_fee'] = $this->input->post('admission_fee', TRUE);
        $data['development_fee'] = $this->input->post('development_fee', TRUE);
        $data['session_fee'] = $this->input->post('session_fee', TRUE);
        $data['lab_fee'] = $this->input->post('lab_fee', TRUE);
        $data['others_fee'] = $this->input->post('others_fee', TRUE);
        $data['teacher_id'] = $this->session->userdata('user_id');
//        echo '<pre>';
//        print_r($data);

        $name_p=$this->b_model->select_baton_package_name($data);
        if(!$name_p) {
            $this->b_model->save_baton_package($data);
            echo 'Data Save';
        }else {
            echo 'Package Name Already Save. Please Change Package Name.';
        }
//        $sdata = array();
//        $sdata['message'] = 'Save Successfully';
//        $this->session->set_userdata($sdata);
//        redirect('baton_panel/baton_package');
    }
    public function baton_package_delete($id){
        $name_p=$this->b_model->select_baton_package_name_dalete($id);
                $sdata = array();
        $sdata['message'] = 'Delete Successfully';
        $this->session->set_userdata($sdata);
        redirect('baton_panel/baton_package');
    }
    public function baton_set_package(){
        $data = array();
        $data['title'] = 'view_set_package';
        $data['show'] = '11';
        $data['year'] = $this->input->post('year', TRUE);

        $data['baton_package'] = $this->b_model->select_baton_package();
        $data['baton_set_package'] = $this->b_model->select_baton_set_package($data);
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('baton/baton_input_set_package', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function save_baton_set_package() {
        $data = array();
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group', TRUE);
        $data['tbl_baton_package_id'] = $this->input->post('package', TRUE);
//        echo '<pre>';
//        print_r($data);

        $name_p=$this->b_model->select_baton_set_package_name($data);
        if(!$name_p) {
            $this->b_model->save_baton_set_package($data);
//            echo 'Data Save'
            $sdata = array();
            $sdata['message'] = 'Save Successfully';
            $this->session->set_userdata($sdata);
            redirect('baton_panel/baton_set_package');
        }else {
//            echo 'This Class Package Already Save. Try Another Class.';
            $sdata = array();
            $sdata['erroraaa'] = 'This Class Package Already Save. Try Another Class.';
            $this->session->set_userdata($sdata);
            redirect('baton_panel/baton_set_package');
        }

    }
    public function baton_set_delete($id)
    {
        $sdata = array();
        $this->b_model->delete_baton_set($id);
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('baton_panel/baton_set_package');
    }
    public function baton_invoice() {
        $data['title'] = 'payment_invoice';
        $data['show'] = '11';
//        $year = date('Y');
//        $class = "";
//        $section = "";
//        $group_r = "";
//        $data['baton_v'] = $this->b_model->select_all_baton($year, $class, $section, $group_r);
//        $data['option'] = $this->sa_model->select_option();
//        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
//        $data['all_class'] =$al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('baton/baton_input_invoice', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function baton_invoice_pdf() {
        $data = array();
//        $other = $this->input->post('other', TRUE);
        $data['show_date'] = date("Y-F", strtotime($this->input->post('c_date', TRUE)));
        $data['show_date_1'] = date("d/m/Y", strtotime($this->input->post('c_date', TRUE)));
        $data['to_date'] = date("Y-m-d 00:00:00", strtotime($this->input->post('c_date', TRUE)));
        $data['form_date'] = date("Y-m-d 23:59:59", strtotime($this->input->post('c_date', TRUE)));
        $data['student_id'] = $this->input->post('student_id', TRUE);
//        $months = array();
//        for ($i = 0; $i < 12; $i++) {
//            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
//            $months[date('n', $timestamp)] = date('F', $timestamp);
//        }
        $data['baton_invoice'] = $this->b_model->select_baton_payment_invoice($data);
        $data['stu_info'] = $this->sa_model->student_information_by_stu_id($data['student_id']);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        print_r($data);
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            exit();
        $this->load->view('baton/baton_pdf_invoice', $data);
    }
    public function baton_due(){
        $data = array();
        $datax = array();
        $data['main_a']=  array();
        $data['main_data']=  array();
        $data['title'] = 'due_student';
        $data['show'] = '11';

        $data['option'] = $this->sa_model->select_option();
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['month'] = $this->input->post('month', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['pay_year'] = $this->input->post('pay_year', TRUE);
        if ($class=="") {
            $data['class'] = $class="Anik";
        }  else {
            $data['main_a'] = $this->b_model->select_baton_due($data);
//            foreach ($data['main_a'] as $key => $value) {
//                $data['main_data'][$value->section_b][$value->group_b][$value->reg_id]['roll']=$value->roll;
////            $data['main_data'][$value->section_b][$value->group_b][$value->reg_id]['cgpa']=$value->cgpa;
//            }
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            exit();
            $data['main_all_stu'] = $this->b_model->class_all_stu_distinct($class,$data['year']);
//            if($data['main_a']==null){
//                $datax['reg_id'] = -1;
//                $datax['year_stu_b'] = $data['year'];
//                $datax['class_b'] = $class;
//                $datax['group_b'] = 'k';
//                $datax['section_b'] = 'k';
//                $datax['roll'] = 0;
////                $data['main_a'][0] = (object) $datax;
//            }
        }
        foreach ($data['main_a'] as $key => $value) {
            $data['main_data'][$value->section_b][$value->group_b][$value->reg_id]['roll']=$value->roll;
//            $data['main_data'][$value->section_b][$value->group_b][$value->reg_id]['cgpa']=$value->cgpa;
        }
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();

        $data['maincontain'] = $this->load->view('baton/baton_student_due', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
}
