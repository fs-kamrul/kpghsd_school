<?php
class invoice_panel extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf');
        //$this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('attendant_panel_model', 'att_model', TRUE);
        $this->load->model('baton_model', 'b_model', TRUE);
        $this->load->library('other_libraries');
        $this->lang->load('baton');
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function invoice() {
        $data = array();
        $data['title'] = 'invoice';
        $data['show'] = '21';
        $data['site_block'] = 'invoice';
//        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function invoice_package(){
        $data = array();
        $data['title'] = 'payment_package';
        $data['show'] = '21';
//        $data['all_sub_show'] = $this->sp_model->select_all_sub();
//        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['baton_package'] = $this->b_model->select_baton_package();
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('invoice/baton_input_package', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function invoice_package_active($id,$type){
        $sdata = array();
        $this->b_model->baton_package_active_update($id,$type);
        $sdata['message'] = 'Update Successfully';
        $this->session->set_userdata($sdata);

        redirect('invoice_panel/invoice_package');
    }

    public function save_invoice_package() {
        $data = array();
        $data['package_name'] = $this->input->post('package_name', TRUE);
        $data['tution_fee'] = $this->input->post('tution_fee', TRUE);
        if($data['tution_fee'] == ''){ $data['tution_fee'] = 0; }
        $data['tiffin_fee'] = $this->input->post('tiffin_fee', TRUE);
        if($data['tiffin_fee'] == ''){ $data['tiffin_fee'] = 0; }
//        $data['fine'] = $this->input->post('fine', TRUE);
        $data['admission_fee'] = $this->input->post('admission_fee', TRUE);
        if($data['admission_fee'] == ''){ $data['admission_fee'] = 0; }
        $data['development_fee'] = $this->input->post('development_fee', TRUE);
        if($data['development_fee'] == ''){ $data['development_fee'] = 0; }
        $data['session_fee'] = $this->input->post('session_fee', TRUE);
        if($data['session_fee'] == ''){ $data['session_fee'] = 0; }
        $data['lab_fee'] = $this->input->post('lab_fee', TRUE);
        if($data['lab_fee'] == ''){ $data['lab_fee'] = 0; }
        $data['others_fee'] = $this->input->post('others_fee', TRUE);
        if($data['others_fee'] == ''){ $data['others_fee'] = 0; }
        $data['exam_fee'] = $this->input->post('exam_fee', TRUE);
        if($data['exam_fee'] == ''){ $data['exam_fee'] = 0; }
        $data['tesitimonial_fee'] = $this->input->post('tesitimonial_fee', TRUE);
        if($data['tesitimonial_fee'] == ''){ $data['tesitimonial_fee'] = 0; }
        $data['tc_fee'] = $this->input->post('tc_fee', TRUE);
        if($data['tc_fee'] == ''){ $data['tc_fee'] = 0; }
        $data['board_reg'] = $this->input->post('board_reg', TRUE);
        if($data['board_reg'] == ''){ $data['board_reg'] = 0; }
        $data['cultural_fee'] = $this->input->post('cultural_fee', TRUE);
        if($data['cultural_fee'] == ''){ $data['cultural_fee'] = 0; }
        $data['scout_fee'] = $this->input->post('scout_fee', TRUE);
        if($data['scout_fee'] == ''){ $data['scout_fee'] = 0; }
        $data['game_fee'] = $this->input->post('game_fee', TRUE);
        if($data['game_fee'] == ''){ $data['game_fee'] = 0; }
        $data['common_fee'] = $this->input->post('common_fee', TRUE);
        if($data['common_fee'] == ''){ $data['common_fee'] = 0; }
        $data['poor_fund'] = $this->input->post('poor_fund', TRUE);
        if($data['poor_fund'] == ''){ $data['poor_fund'] = 0; }
        $data['magazine_fee'] = $this->input->post('magazine_fee', TRUE);
        if($data['magazine_fee'] == ''){ $data['magazine_fee'] = 0; }
        $data['id_card_fee'] = $this->input->post('id_card_fee', TRUE);
        if($data['id_card_fee'] == ''){ $data['id_card_fee'] = 0; }
        $data['library_fee'] = $this->input->post('library_fee', TRUE);
        if($data['library_fee'] == ''){ $data['library_fee'] = 0; }
        $data['receit_fee'] = $this->input->post('receit_fee', TRUE);
        if($data['receit_fee'] == ''){ $data['receit_fee'] = 0; }
        $data['dev_study_fee'] = $this->input->post('dev_study_fee', TRUE);
        if($data['dev_study_fee'] == ''){ $data['dev_study_fee'] = 0; }
        $data['computer_fee'] = $this->input->post('computer_fee', TRUE);
        if($data['computer_fee'] == ''){ $data['computer_fee'] = 0; }

        $data['admission_form_fee'] = $this->input->post('admission_form_fee', TRUE);
        if($data['admission_form_fee'] == ''){ $data['admission_form_fee'] = 0; }
        $data['batch_fee'] = $this->input->post('batch_fee', TRUE);
        if($data['batch_fee'] == ''){ $data['batch_fee'] = 0; }
        $data['name_plate_fee'] = $this->input->post('name_plate_fee', TRUE);
        if($data['name_plate_fee'] == ''){ $data['name_plate_fee'] = 0; }
        $data['mark_sheet_fee'] = $this->input->post('mark_sheet_fee', TRUE);
        if($data['mark_sheet_fee'] == ''){ $data['mark_sheet_fee'] = 0; }
        $data['transportation_fee'] = $this->input->post('transportation_fee', TRUE);
        if($data['transportation_fee'] == ''){ $data['transportation_fee'] = 0; }
        $data['medical_fee'] = $this->input->post('medical_fee', TRUE);
        if($data['medical_fee'] == ''){ $data['medical_fee'] = 0; }
        $data['kallnayan_fund'] = $this->input->post('kallnayan_fund', TRUE);
        if($data['kallnayan_fund'] == ''){ $data['kallnayan_fund'] = 0; }
        $data['electricity_fee'] = $this->input->post('electricity_fee', TRUE);
        if($data['electricity_fee'] == ''){ $data['electricity_fee'] = 0; }
        $data['syllabus_fee'] = $this->input->post('syllabus_fee', TRUE);
        if($data['syllabus_fee'] == ''){ $data['syllabus_fee'] = 0; }

        $data['teacher_id'] = $this->session->userdata('user_id');
//        echo '<pre>';
//        print_r($data);

        $name_p=$this->b_model->select_baton_package_name($data);
        $sdata = array();
        if(!$name_p) {
            $this->b_model->save_baton_package($data);
//            echo 'Data Save';
            $sdata['message'] = 'Save Successfully';
        }else {
//            echo 'Package Name Already Save. Please Change Package Name.';
            $sdata['erroraaa'] = 'Package Name Already Save. Please Change Package Name.';
        }
//        $sdata['message'] = 'Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('invoice_panel/invoice_package');
    }
    public function update_invoice_package(){
        $package_id = $this->input->post('package_id', TRUE);
        $post_data = $this->input->post();
        unset($post_data['package_id']);



        $data = $this->b_model->update_baton_package($package_id, $post_data);

        if(!$data) {
            $sdata['message'] = 'Update Successfully';
        }else {
//            echo 'Package Name Already Save. Please Change Package Name.';
            $sdata['erroraaa'] = 'Something Error. Try again later';
        }
        $this->session->set_userdata($sdata);
        redirect('invoice_panel/invoice_package');

//        echo '<pre>';
//        print_r($post_data);
//        echo '</pre>';
    }
    public function invoice_package_edit($id){
        $data = array();
        $data['title'] = 'payment_package';
        $data['show'] = '21';
//        $data['all_sub_show'] = $this->sp_model->select_all_sub();
//        $data['tea_admin'] = $this->sp_model->select_teacher_admin();
        $data['record'] = $this->b_model->select_baton_package_id($id);
//        echo '<pre>';
//        print_r($name_p);
//        echo '</pre>';
        $data['baton_package'] = $this->b_model->select_baton_package();
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('invoice/baton_input_package', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function invoice_package_delete($id){
        $name_p=$this->b_model->select_baton_package_name_dalete($id);
        $sdata = array();
        $sdata['message'] = 'Delete Successfully';
        $this->session->set_userdata($sdata);
        redirect('invoice_panel/invoice_package');
    }
    public function invoice_set_package(){
        $data = array();
        $data['title'] = 'view_set_package';
        $data['show'] = '21';
        $data['year'] = $this->input->post('year', TRUE);

        $data['baton_package'] = $this->b_model->select_baton_package();
        $data['baton_set_package'] = $this->b_model->select_baton_set_package($data);
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('invoice/baton_input_set_package', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function show_invoice_set_package() {
        $data = array();
        $data['title'] = 'view_set_package';
        $data['show'] = '21';
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group', TRUE);
        $data['tbl_baton_package_id'] = $this->input->post('package', TRUE);
//        echo '<pre>';
//        print_r($data);

        $name_p=$this->b_model->select_baton_set_package_name($data);

        $data['all_class'] = $this->sa_model->student_reg_search($data['class'], $data['year'], $data['group_r']);
        $data['maincontain'] = $this->load->view('invoice/baton_student_discount', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function save_invoice_set_package() {
        $data = array();
        $datap = array();
        $sdata = array();
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['tbl_baton_package_id'] = $this->input->post('tbl_baton_package_id', TRUE);
        $other = $this->input->post('other', TRUE);

        $name_p=$this->b_model->select_baton_set_package_name($data);
//        echo '<pre>';
//        print_r($data);
//        exit();
        if(!$name_p) {
            $package_insert_id = $this->b_model->save_baton_set_package($data);

            $datap['teacher_id'] = $this->session->userdata('user_id');
            $datap['tbl_baton_set_package_id'] = $data['tbl_baton_package_id'];
            $a=0;
            $b=0;
            for ($key=1;$key<=$other; $key++) {
                $discount = $this->input->post('discount'.$key, TRUE);
                if($discount==''){
                    $discount = 0;
                }
                $datap['discount'] = $discount;
                $datap['student_id'] = $id = $this->input->post('id'.$key, TRUE);
                $datap['reg_id'] = $this->input->post('reg_id'.$key, TRUE);
                $datap['class_b'] = $this->input->post('class_b'.$key, TRUE);
                $datap['group_b'] = $this->input->post('group_b'.$key, TRUE);
                $datap['section_b'] = $this->input->post('section_b'.$key, TRUE);
                $datap['year_stu_b'] = $this->input->post('year_stu_b'.$key, TRUE);

                $sa_ch = $this->b_model->check_baton_invoice_discount($datap);
                if ($sa_ch) {
                    $b++;
                    $sdata['erroraaa'] = $b.' Student Is Already Save.';
                }  else {
                    $a++;
                    $sa = $this->b_model->save_baton_invoice_discount($datap);
                    $sdata['message'] = $a.' Student Save Successfully';
                }
            }
        }else {
            $sdata['erroraaa'] = 'This Class Package Already Save. Try Another Class.';
        }

        $this->session->set_userdata($sdata);
        redirect('invoice_panel/invoice_set_package');

    }
    public function invoice_set_delete($id)
    {
        $sdata = array();
        $package_name = $this->b_model->check_baton_set_package_name($id);
        $this->b_model->delete_baton_set($id);
        if($package_name) {
            $this->b_model->delete_baton_set_invoice_discount($package_name->tbl_baton_package_id, $package_name->class, $package_name->year, $package_name->group_r);
        }
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('invoice_panel/invoice_set_package');
    }
    public function invoice_set_edit($id)
    {
        $sdata = array();
        $package_name = $this->b_model->check_baton_set_package_name($id);

        echo '<pre>';
        print_r($package_name);
        echo '</pre>';
//        $this->b_model->delete_baton_set($id);
//        if($package_name) {
//            $this->b_model->delete_baton_set_invoice_discount($package_name->tbl_baton_package_id, $package_name->class, $package_name->year, $package_name->group_r);
//        }
//        $sdata['message'] = 'Delete Record Successfully';
//        $this->session->set_userdata($sdata);
//
//        redirect('invoice_panel/invoice_set_package');
    }
    public function generate_invoice(){
        $data = array();
        $data['title'] = 'generate_invoice';
        $data['show'] = '21';
        $data['session'] = $this->input->post('session', TRUE);
//        $data['year'] = $this->input->post('year', TRUE);

//        $data['baton_package'] = $this->b_model->select_baton_package();
//        $data['baton_set_package'] = $this->b_model->select_baton_set_package($data);
        $data['option'] = $this->sa_model->select_option();


//        echo '<pre>';
//        $userdata = $this->all_userdata();
//        print_r($userdata);
//        echo '</pre>';
//        exit();
        $data['maincontain'] = $this->load->view('invoice/baton_input_generate', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function generate_invoice_baton() {
        $data = array();
        $pdata = array();
        $qdata = array();
        $data['session'] = $this->input->post('session', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group', TRUE);
        $data['month'] = $this->input->post('month', TRUE);
        $data['admission'] = $this->input->post('admission', TRUE);

        $data['baton_set_package'] = $this->b_model->select_baton_set_package_by_class_session($data);
        $data['class_student'] = $this->sa_model->student_reg_search($data['class'],$data['session'],$data['group_r']);

        $sub_total = $g_total = 0;
        $data_set = (array)$data['baton_set_package'];
        if(count($data_set) > 0) {


            $pdata['year_stu_b']=$data['session'];
            $pdata['class_b']=$data['class'];
            $pdata['group_b']=$data['group_r'];
            $pdata['teacher_id']=$this->session->userdata('user_id');

            $pdata['year_b']=$data['year'];
            $pdata['month_b']=$data['month'];
            // last input //
//            $pdata['tution_fee']=$data['baton_set_package']->tution_fee;
//            $sub_total += $pdata['tution_fee'];
//            $pdata['tiffin_fee']=$data['baton_set_package']->tiffin_fee;
//            $sub_total += $pdata['tiffin_fee'];
            $pdata['fine']=$data['baton_set_package']->fine;
//            if($data['month'] == 'January'){
//                if($data['class'] == 'Eleven' || $data['class'] == 'Twelve'){

//            }
//            elseif($data['month'] == 'July'){
//                if($data['class'] == 'Eleven' || $data['class'] == 'Twelve'){
//                    $pdata['admission_fee']=$data['baton_set_package']->admission_fee;
//                    $sub_total += $pdata['admission_fee'];
//                    $pdata['development_fee']=$data['baton_set_package']->development_fee;
//                    $sub_total += $pdata['development_fee'];
//                    $pdata['session_fee']=$data['baton_set_package']->session_fee;
//                    $sub_total += $pdata['session_fee'];
//                    $pdata['lab_fee']=$data['baton_set_package']->lab_fee;
//                    $sub_total += $pdata['lab_fee'];
//                    $pdata['others_fee']=$data['baton_set_package']->others_fee;
//                    $sub_total += $pdata['others_fee'];
//                }else{
//
//                }
//            }
//            $pdata['total_amnt']=$sub_total;
//            $g_total = $sub_total+$pdata['fine'];
//            $pdata['g_total']=$g_total;
//            $pdata['total_due']=$g_total;

            $in = $out = 0;
            foreach ($data['class_student'] as $stu_data){

                $qdata['tbl_baton_set_package_id'] = $data['baton_set_package']->id;
                $qdata['student_id']=$stu_data->id;
                $qdata['year_stu_b']=$stu_data->year;
                $qdata['class_b']=$stu_data->class;
                $qdata['group_b']=$stu_data->group_r;
                $qdata['section_b']=$stu_data->section;
                $qdata['baton_set_discount'] = $this->b_model->search_baton_invoice_discount($qdata);
                if($qdata['baton_set_discount']) {
                    $tution_fee_count = $data['baton_set_package']->tution_fee - ($data['baton_set_package']->tution_fee * $qdata['baton_set_discount']->discount / 100);

                    $pdata['discount_present'] = $qdata['baton_set_discount']->discount;
                }else{
                    $tution_fee_count = $data['baton_set_package']->tution_fee;
                    $pdata['discount_present'] = 0;
                }
                $pdata['tution_fee'] = $tution_fee_count;
                $sub_total += $tution_fee_count;
                $pdata['tiffin_fee']=$data['baton_set_package']->tiffin_fee;
                $sub_total += $pdata['tiffin_fee'];
                if( $data['admission'] != '1'){

                }else{
                    $pdata['re_addmission_fee']=$data['baton_set_package']->admission_fee;
                    $sub_total += $pdata['re_addmission_fee'];
                    $pdata['dev_fee']=$data['baton_set_package']->development_fee;
                    $sub_total += $pdata['dev_fee'];
                    $pdata['session_others_fee']=$data['baton_set_package']->session_fee;
                    $sub_total += $pdata['session_others_fee'];
                    $pdata['lab_fee']=$data['baton_set_package']->lab_fee;
                    $sub_total += $pdata['lab_fee'];
                    $pdata['others_fee']=$data['baton_set_package']->others_fee;
                    $sub_total += $pdata['others_fee'];

                    $pdata['exam_fee']=$data['baton_set_package']->exam_fee;
                    $sub_total += $pdata['exam_fee'];
                    $pdata['tesitimonial_fee']=$data['baton_set_package']->tesitimonial_fee;
                    $sub_total += $pdata['tesitimonial_fee'];
                    $pdata['tc_fee']=$data['baton_set_package']->tc_fee;
                    $sub_total += $pdata['tc_fee'];
                    $pdata['board_reg']=$data['baton_set_package']->board_reg;
                    $sub_total += $pdata['board_reg'];
                    $pdata['cultural_fee']=$data['baton_set_package']->cultural_fee;
                    $sub_total += $pdata['cultural_fee'];
                    $pdata['scout_fee']=$data['baton_set_package']->scout_fee;
                    $sub_total += $pdata['scout_fee'];
                    $pdata['game_fee']=$data['baton_set_package']->game_fee;
                    $sub_total += $pdata['game_fee'];
                    $pdata['common_fee']=$data['baton_set_package']->common_fee;
                    $sub_total += $pdata['common_fee'];
                    $pdata['poor_fund']=$data['baton_set_package']->poor_fund;
                    $sub_total += $pdata['poor_fund'];
                    $pdata['magazine_fee']=$data['baton_set_package']->magazine_fee;
                    $sub_total += $pdata['magazine_fee'];
                    $pdata['id_card_fee']=$data['baton_set_package']->id_card_fee;
                    $sub_total += $pdata['id_card_fee'];
                    $pdata['library_fee']=$data['baton_set_package']->library_fee;
                    $sub_total += $pdata['library_fee'];
                    $pdata['receit_fee']=$data['baton_set_package']->receit_fee;
                    $sub_total += $pdata['receit_fee'];
                    $pdata['dev_study_fee']=$data['baton_set_package']->dev_study_fee;
                    $sub_total += $pdata['dev_study_fee'];
                    $pdata['computer_fee']=$data['baton_set_package']->computer_fee;
                    $sub_total += $pdata['computer_fee'];

                    $pdata['admission_form_fee']=$data['baton_set_package']->admission_form_fee;
                    $sub_total += $pdata['admission_form_fee'];
                    $pdata['batch_fee']=$data['baton_set_package']->batch_fee;
                    $sub_total += $pdata['batch_fee'];
                    $pdata['name_plate_fee']=$data['baton_set_package']->name_plate_fee;
                    $sub_total += $pdata['name_plate_fee'];
                    $pdata['mark_sheet_fee']=$data['baton_set_package']->mark_sheet_fee;
                    $sub_total += $pdata['mark_sheet_fee'];
                    $pdata['transportation_fee']=$data['baton_set_package']->transportation_fee;
                    $sub_total += $pdata['transportation_fee'];
                    $pdata['medical_fee']=$data['baton_set_package']->medical_fee;
                    $sub_total += $pdata['medical_fee'];
                    $pdata['kallnayan_fund']=$data['baton_set_package']->kallnayan_fund;
                    $sub_total += $pdata['kallnayan_fund'];
                    $pdata['electricity_fee']=$data['baton_set_package']->electricity_fee;
                    $sub_total += $pdata['electricity_fee'];
                    $pdata['syllabus_fee']=$data['baton_set_package']->syllabus_fee;
                    $sub_total += $pdata['syllabus_fee'];
                }



                $pdata['total_amnt']=$sub_total;
                $g_total = $sub_total+$pdata['fine'];
                $pdata['g_total']=$g_total;
                $pdata['total_due']=$g_total;

                $pdata['student_id']=$stu_data->id;
                $pdata['reg_id']=$stu_data->reg_id;
                $pdata['section_b']=$stu_data->section;
                $check_baton = $this->b_model->check_baton_invoice($pdata);
                $sub_total = 0;
//                $check_baton = $this->b_model->save_baton_invoice($data);
//                echo '<pre>';
//                print_r($qdata['baton_set_discount']);
//                echo '</pre>';
//                exit();
                if($check_baton){
                    $out++;
                }else{
                    $this->b_model->save_baton_invoice($pdata);
                    $in++;
                }
            }

//            $this->b_model->save_baton_set_package($data);
//            echo 'Data Save'
            $sdata = array();
            if($out > 0){
                $sdata['erroraaa'] = $out.' Student Already Exit';
            }
//            $pdata['erroraaa'] = $in.'------'.$out;
            $sdata['message'] = $in.' Student Save Successfully';
//            $this->session->set_userdata($sdata);
//            redirect('invoice_panel/generate_invoice');
        }else {
//            echo 'This Class Package Already Save. Try Another Class.';
            $sdata = array();
            $sdata['erroraaa'] = 'This Class can not be set any package. Please set package First.';
//            $this->session->set_userdata($sdata);
//            redirect('invoice_panel/generate_invoice');
        }
        $sdata['session'] = $data['session'];
        $sdata['year'] = $data['year'];
        $sdata['class'] = $data['class'];
        $sdata['group_r'] = $data['group_r'];
        $sdata['month_s'] = $data['month'];
        $this->session->set_userdata($sdata);
            redirect('invoice_panel/generate_invoice');
//        echo '<pre>';
//        print_r($pdata);
//        print_r($data);
//        echo '</pre>';
//        exit();
    }

    public function invoice_create(){
        $data = array();
        $data['title'] = 'invoice_create';
        $data['show'] = '21';
//        $data['year'] = $this->input->post('year', TRUE);

//        $data['baton_package'] = $this->b_model->select_baton_package();
//        $data['baton_set_package'] = $this->b_model->select_baton_set_package($data);
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('invoice/baton_invoice_create', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function previous_due(){
        $data = array();
        $data['title'] = 'previous_due';
        $data['show'] = '21';
        $data['session'] = $this->input->post('session', TRUE);
//        $data['year'] = $this->input->post('year', TRUE);

//        $data['baton_package'] = $this->b_model->select_baton_package();
//        $data['baton_set_package'] = $this->b_model->select_baton_set_package($data);
        $data['option'] = $this->sa_model->select_option();


//        echo '<pre>';
//        $userdata = $this->all_userdata();
//        print_r($userdata);
//        echo '</pre>';
//        exit();
        $data['maincontain'] = $this->load->view('invoice/previous_due', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function previous_due_show() {
        $data['title'] = 'previous_due';
        $data['show'] = '21';
        $data['option'] = $this->sa_model->select_option();
        $data['class'] =$class = $this->input->post('class', TRUE);
        $data['group_r'] =$group_r = $this->input->post('group_r', TRUE);
        $data['year'] =$year = $this->input->post('year', TRUE);
        $data['section'] =$section = $this->input->post('section', TRUE);

        $data['all_class'] = $this->sa_model->class_reg_search($class, $year, $section,$group_r);
        $data['maincontain'] = $this->load->view('invoice/previous_due_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function previous_due_generate(){
        $data = array();
        $datap = array();
        $data['title'] = 'previous_due';
        $data['show'] = '21';
        $data['check'] = $check = $this->input->post('check', TRUE);
        $datap['teacher_id'] = $this->session->userdata('user_id');


        $datap['month_b'] = $this->input->post('month_b', TRUE);
        $datap['year_b'] = $this->input->post('year_b', TRUE);
        $a=0;
        $b=0;
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        foreach ($data['check'] as $key => $value) {
            $previous_due = $this->input->post('previous_due'.$key, TRUE);
            if($previous_due==''){
                $previous_due = 0;
            }
            $datap['previous_due'] = $previous_due;
            $datap['student_id'] = $id = $this->input->post('id'.$key, TRUE);
            $datap['reg_id'] = $this->input->post('reg_id'.$key, TRUE);
            $datap['class_b'] = $this->input->post('class_b'.$key, TRUE);
            $datap['group_b'] = $this->input->post('group_b'.$key, TRUE);
            $datap['section_b'] = $this->input->post('section_b'.$key, TRUE);
            $datap['year_stu_b'] = $this->input->post('year_stu_b'.$key, TRUE);

            $datap['total_amnt']=$previous_due;
            $datap['g_total']=$previous_due;
            $datap['total_due']=$previous_due;
//            echo '<pre>';
//            print_r($datap);
//            exit();
            $sa_ch = $this->b_model->check_baton_invoice($datap);
            if ($sa_ch) {
                $b++;
                $sdata['erroraaa'] = $b.' Data Is Already Save.';
            }  else {
                $a++;
                $sa = $this->b_model->save_baton_invoice($datap);
                $sdata['message'] = $a.' Data Save Successfully';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('invoice_panel/previous_due');
    }
    public function advance_pay(){
        $data = array();
        $data['title'] = 'advance_pay';
        $data['show'] = '21';
        $data['session'] = $this->input->post('session', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['maincontain'] = $this->load->view('invoice/advance_pay', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function advance_pay_show() {
        $data['title'] = 'advance_pay';
        $data['show'] = '21';
        $data['option'] = $this->sa_model->select_option();
        $data['class'] =$class = $this->input->post('class', TRUE);
        $data['group_r'] =$group_r = $this->input->post('group_r', TRUE);
        $data['year'] =$year = $this->input->post('year', TRUE);
        $data['section'] =$section = $this->input->post('section', TRUE);

        $data['all_class'] = $this->sa_model->class_reg_search($class, $year, $section,$group_r);
        $data['maincontain'] = $this->load->view('invoice/advance_pay_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function advance_pay_generate(){
        $data = array();
        $datap = array();
        $data['title'] = 'advance_pay';
        $data['show'] = '21';
        $data['check'] = $check = $this->input->post('check', TRUE);
        $data['fees_type'] = $check = $this->input->post('fees_type', TRUE);
        $datap['teacher_id'] = $this->session->userdata('user_id');


        $datap['month_b'] = $this->input->post('month_b', TRUE);
        $datap['year_b'] = $this->input->post('year_b', TRUE);
        $a=0;
        $b=0;
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();

        $sub_total = $g_total = 0;
        $in = $out = 0;
        foreach ($data['check'] as $key => $value) {

            $ssatap['class'] = $this->input->post('class_b' . $key, TRUE);
            $ssatap['session'] = $this->input->post('year_stu_b' . $key, TRUE);
            $ssatap['group_r'] = $this->input->post('group_b' . $key, TRUE);
            $data['baton_set_package'] = $this->b_model->select_baton_set_package_by_class_session($ssatap);
            $pdata['fine']=$data['baton_set_package']->fine;
            $data_set = (array)$data['baton_set_package'];
            if(count($data_set) > 0) {
                $student_id = $this->input->post('id' . $key, TRUE);
                $data['class_student'] = $stu_data = $this->sa_model->student_information_by_stu_id($student_id);
                $pdata['teacher_id'] = $this->session->userdata('user_id');
                $pdata['year_b'] = $this->input->post('year_b', TRUE);
                $pdata['month_b'] = $this->input->post('month_b', TRUE);

//              echo '<pre>';
//              print_r($stu_data);
//              echo '</pre>';
//              exit();

//                foreach ($data['class_student'] as $stu_data) {

                $qdata['tbl_baton_set_package_id'] = $data['baton_set_package']->id;
                $qdata['student_id'] = $stu_data->id;
                $qdata['year_stu_b'] = $stu_data->year;
                $qdata['class_b'] = $stu_data->class;
                $qdata['group_b'] = $stu_data->group_r;
                $qdata['section_b'] = $stu_data->section;
                $qdata['baton_set_discount'] = $this->b_model->search_baton_invoice_discount($qdata);
                if ($qdata['baton_set_discount']) {
                    $tution_fee_count = $data['baton_set_package']->tution_fee - ($data['baton_set_package']->tution_fee * $qdata['baton_set_discount']->discount / 100);

                    $pdata['discount_present'] = $qdata['baton_set_discount']->discount;
                } else {
                    $tution_fee_count = $data['baton_set_package']->tution_fee;
                    $pdata['discount_present'] = 0;
                }
                $pdata['tution_fee'] = $tution_fee_count;
                $sub_total += $tution_fee_count;
                $pdata['tiffin_fee'] = $data['baton_set_package']->tiffin_fee;
                $sub_total += $pdata['tiffin_fee'];

                if( $data['fees_type'] == 'admission_fees'){

//                      echo '<pre>';
//                      print_r($data['baton_set_package']->admission_fee);
//                      echo '</pre>';
//                      exit();

                    $pdata['re_addmission_fee']=$data['baton_set_package']->admission_fee;
                    $sub_total += $pdata['re_addmission_fee'];
                    $pdata['dev_fee']=$data['baton_set_package']->development_fee;
                    $sub_total += $pdata['dev_fee'];
                    $pdata['session_others_fee']=$data['baton_set_package']->session_fee;
                    $sub_total += $pdata['session_others_fee'];
                    $pdata['lab_fee']=$data['baton_set_package']->lab_fee;
                    $sub_total += $pdata['lab_fee'];
                    $pdata['others_fee']=$data['baton_set_package']->others_fee;
                    $sub_total += $pdata['others_fee'];

                    $pdata['exam_fee']=$data['baton_set_package']->exam_fee;
                    $sub_total += $pdata['exam_fee'];
                    $pdata['tesitimonial_fee']=$data['baton_set_package']->tesitimonial_fee;
                    $sub_total += $pdata['tesitimonial_fee'];
                    $pdata['tc_fee']=$data['baton_set_package']->tc_fee;
                    $sub_total += $pdata['tc_fee'];
                    $pdata['board_reg']=$data['baton_set_package']->board_reg;
                    $sub_total += $pdata['board_reg'];
                    $pdata['cultural_fee']=$data['baton_set_package']->cultural_fee;
                    $sub_total += $pdata['cultural_fee'];
                    $pdata['scout_fee']=$data['baton_set_package']->scout_fee;
                    $sub_total += $pdata['scout_fee'];
                    $pdata['game_fee']=$data['baton_set_package']->game_fee;
                    $sub_total += $pdata['game_fee'];
                    $pdata['common_fee']=$data['baton_set_package']->common_fee;
                    $sub_total += $pdata['common_fee'];
                    $pdata['poor_fund']=$data['baton_set_package']->poor_fund;
                    $sub_total += $pdata['poor_fund'];
                    $pdata['magazine_fee']=$data['baton_set_package']->magazine_fee;
                    $sub_total += $pdata['magazine_fee'];
                    $pdata['id_card_fee']=$data['baton_set_package']->id_card_fee;
                    $sub_total += $pdata['id_card_fee'];
                    $pdata['library_fee']=$data['baton_set_package']->library_fee;
                    $sub_total += $pdata['library_fee'];
                    $pdata['receit_fee']=$data['baton_set_package']->receit_fee;
                    $sub_total += $pdata['receit_fee'];
                    $pdata['dev_study_fee']=$data['baton_set_package']->dev_study_fee;
                    $sub_total += $pdata['dev_study_fee'];
                    $pdata['computer_fee']=$data['baton_set_package']->computer_fee;
                    $sub_total += $pdata['computer_fee'];

                    $pdata['admission_form_fee']=$data['baton_set_package']->admission_form_fee;
                    $sub_total += $pdata['admission_form_fee'];
                    $pdata['batch_fee']=$data['baton_set_package']->batch_fee;
                    $sub_total += $pdata['batch_fee'];
                    $pdata['name_plate_fee']=$data['baton_set_package']->name_plate_fee;
                    $sub_total += $pdata['name_plate_fee'];
                    $pdata['mark_sheet_fee']=$data['baton_set_package']->mark_sheet_fee;
                    $sub_total += $pdata['mark_sheet_fee'];
                    $pdata['transportation_fee']=$data['baton_set_package']->transportation_fee;
                    $sub_total += $pdata['transportation_fee'];
                    $pdata['medical_fee']=$data['baton_set_package']->medical_fee;
                    $sub_total += $pdata['medical_fee'];
                    $pdata['kallnayan_fund']=$data['baton_set_package']->kallnayan_fund;
                    $sub_total += $pdata['kallnayan_fund'];
                    $pdata['electricity_fee']=$data['baton_set_package']->electricity_fee;
                    $sub_total += $pdata['electricity_fee'];
                    $pdata['syllabus_fee']=$data['baton_set_package']->syllabus_fee;
                    $sub_total += $pdata['syllabus_fee'];
                }

                $pdata['total_amnt'] = $sub_total;
                $g_total = $sub_total + $pdata['fine'];
                $pdata['g_total'] = $g_total;
                $pdata['total_due'] = $g_total;

                $pdata['reg_id'] = $stu_data->reg_id;
                $pdata['student_id'] = $stu_data->id;
                $pdata['year_stu_b'] = $stu_data->year;
                $pdata['class_b'] = $stu_data->class;
                $pdata['group_b'] = $stu_data->group_r;
                $pdata['section_b'] = $stu_data->section;
                $check_baton = $this->b_model->check_baton_invoice($pdata);
                $sub_total = 0;
//                $check_baton = $this->b_model->save_baton_invoice($data);
//                echo '<pre>';
//                print_r($qdata['baton_set_discount']);
//                echo '</pre>';
//                exit();
                    if ($check_baton) {
                        $out++;
                    } else {
                        $this->b_model->save_baton_invoice($pdata);
                        $in++;
                    }
//                }


//                $pdata['year_stu_b'] = $data['session'];
//                $pdata['class_b'] = $data['class'];
//                $pdata['group_b'] = $data['group_r'];
//
//                $pdata['teacher_id'] = $this->session->userdata('user_id');
//                $pdata['year_b'] = $data['year'];
//                $pdata['month_b'] = $data['month'];
//                $pdata['fine'] = $data['baton_set_package']->fine;

                $sdata = array();
                if ($out > 0) {
                    $sdata['erroraaa'] = $out . ' Student Already Exit';
                }
//            $pdata['erroraaa'] = $in.'------'.$out;
                $sdata['message'] = $in . ' Student Save Successfully';
            }else {
//            echo 'This Class Package Already Save. Try Another Class.';
                $sdata = array();
                $sdata['erroraaa'] = 'This Class can not be set any package. Please set package First.';
            }
        }
        $this->session->set_userdata($sdata);
        redirect('invoice_panel/advance_pay');
    }
    public function invoice_show(){
        $data = array();
        $data['title'] = 'invoice_show';
        $data['show'] = '21';
        $data['student_id'] = $this->input->post('student_id', TRUE);
        $check_istudent = $this->b_model->select_student_student_id($data);
        $data['student_data'] = $this->b_model->select_baton_invoice_student_id($data);
        $data['student_select'] = $this->sa_model->student_information_by_stu_id_new_student($data['student_id']);


//        echo '<pre>';
//        print_r();
//        echo '</pre>';
//        exit();
        if(!empty($check_istudent)){
            $data['maincontain'] = $this->load->view('invoice/baton_invoice_show', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
        }else{
            $sdata = array();
            $sdata['erroraaa'] = 'This Student Is Not Exist. Try Again Another Student.';
            $this->session->set_userdata($sdata);

            redirect('invoice_panel/invoice_create');
        }
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();

    }
    public function invoice_show_submit(){
        $data = array();
        $teacher_id=$this->session->userdata('user_id');
        $data['title'] = 'invoice_show';
        $data['show'] = '21';
        $data['student_id'] = $this->input->post('student_id', TRUE);
        $data['tbl_baton_invoice_id'] = $this->input->post('tbl_baton_invoice_id', TRUE);
        $data['tbl_baton_month'] = $this->input->post('tbl_baton_month', TRUE);
        $data['tbl_baton_month_paid'] = $this->input->post('tbl_baton_month_paid', TRUE);
        $data['tbl_baton_month_fine'] = $this->input->post('tbl_baton_month_fine', TRUE);
        $data['tbl_baton_month_total_amnt'] = $this->input->post('tbl_baton_month_total_amnt', TRUE);
//        $data['grand_total'] = $this->input->post('grand_total', TRUE);

        $invoice_info['due'] = $this->input->post('grand_total_main', TRUE);
        $invoice_info['fine'] = $this->input->post('fine', TRUE);
        $invoice_info['discount'] = $this->input->post('discount', TRUE);
        $invoice_info['pay_amount'] = $this->input->post('pay_amount', TRUE);
//        $data['student_data'] = $this->b_model->select_baton_invoice_student_id($data);
        $tbl_baton_invoice_id = implode(",", $data['tbl_baton_invoice_id']);
        $invoice_info['tbl_baton_invoice_id'] = $tbl_baton_invoice_id;
        $invoice_info['receipte_no'] = '';
        $invoice_info['student_id'] = $this->input->post('student_id', TRUE);
        $invoice_info['reg_id'] = $this->input->post('reg_id', TRUE);
        $invoice_info['year_stu_b'] = $this->input->post('year_stu_b', TRUE);
        $invoice_info['class_b'] = $this->input->post('class_b', TRUE);
        $invoice_info['group_b'] = $this->input->post('group_b', TRUE);
        $invoice_info['section_b'] = $this->input->post('section_b', TRUE);
        $invoice_info['month_b'] = $this->input->post('month_b', TRUE);
        $invoice_info['year_b'] = $this->input->post('year_b', TRUE);
        $invoice_info['teacher_id'] = $teacher_id;

        $total_pay = $invoice_info['pay_amount']+$invoice_info['discount'];

        $baton_invoice_info = $this->b_model->save_baton_invoice_info($invoice_info);
        $value_amount = $value_set = $total_due = $fine = $total_amnt = 0;
        $i = 0;
        foreach ($data['tbl_baton_month'] as $key=>$data_value) {
//            $i = $i+1;
            $i++;
            if (count($data['tbl_baton_month']) == $i) {
                $value_amount = $data_value + $invoice_info['fine'];
                $fine = $data['tbl_baton_month_fine'][$key] + $invoice_info['fine'];
                $total_amnt = $data['tbl_baton_month_total_amnt'][$key] + $invoice_info['fine'];
                $total_pay = $total_pay-$value_amount;
                if($total_pay >= 0){
//                    echo $total_pay.'-------------';
                    $total_due = 0;//-1*$total_pay;//$value_amount-$total_pay;
                    $this->b_model->update_due_baton_invoice($key,$value_amount+$data['tbl_baton_month_paid'][$key],$total_due,$fine,$total_amnt);
                    $data['tbl_baton_due'][$key] = $value_amount;
                }else{
                    $total_due = $total_pay * -1;
                    $value_pay = $value_amount - $total_due;
                    $this->b_model->update_due_baton_invoice($key,$value_pay+$data['tbl_baton_month_paid'][$key],$total_due,$fine,$total_amnt);
                    $data['tbl_baton_due'][$key] = $value_amount-$invoice_info['fine'];
                }
//                echo $data['tbl_baton_month_paid'][$key] .'<br/>';
                $total_due=0;

            }else{
                $fine = $data['tbl_baton_month_fine'][$key];
                $total_amnt = $data['tbl_baton_month_total_amnt'][$key];
                $value_amount = $data_value;
                if($total_pay <= $value_amount){
                    $pay_due = -1*($total_pay-$value_amount);
                    $this->b_model->update_due_baton_invoice($key,$total_pay+$data['tbl_baton_month_paid'][$key],$pay_due,$fine,$total_amnt);
                    $data['tbl_baton_due'][$key] = $value_amount;
                    $total_pay = 0;
                }else {
                    $total_pay = $total_pay - $value_amount;
                    if ($total_pay >= 0) {
                        $total_due = 0;
                        $this->b_model->update_due_baton_invoice($key, $value_amount+$data['tbl_baton_month_paid'][$key], $total_due,$fine,$total_amnt);
                        $data['tbl_baton_due'][$key] = $value_amount;
                    } else {
                        $total_due = $total_pay * -1;
                        $value_pay = $value_amount - $total_due;
                        $this->b_model->update_due_baton_invoice($key, $value_pay+$data['tbl_baton_month_paid'][$key], $total_due,$fine,$total_amnt);
                        $data['tbl_baton_due'][$key] = $total_pay;
                    }
                }
//                echo $data['tbl_baton_month_paid'][$key] . '<br/>';
                //$total_due=0;
            }
            $ddata['tbl_baton_invoice_id']=$key;
            $ddata['tbl_baton_invoice_info_id']=$baton_invoice_info;
            $ddata['due_amount']=$data['tbl_baton_due'][$key];
            $this->b_model->save_baton_invoice_due($ddata);
        }

        $data['show_date'] = date("Y-F");
        $data['show_date_1'] = date("d/m/Y H:i:s a");
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['stu_info'] = $this->sa_model->student_information_by_stu_id_new_student($data['student_id']);
        $data['baton_invoice'] = $this->b_model->select_baton_invoice($data['tbl_baton_invoice_id']);
        $data['invoice_info'] = $invoice_info;
        $data['baton_invoice_info'] = $baton_invoice_info;
//        echo '<pre>';
//        print_r($data['tbl_baton_invoice_id']);
//        print_r($data['baton_invoice']);
////        print_r($data['baton_invoice']);
////        print_r(count($data['tbl_baton_month']));
//
////        echo $ddd;
////        print_r(explode(',', $ddd));
//        echo '</pre>';
//        exit();

//        $this->load->view('invoice/invoice_pdf', $data);


        $sdata = array();
        $sdata['message'] = 'Invoice Create Successfully. Your Receipt No.: <b>'.$baton_invoice_info.'</b> . <a target="_blank" href="'.base_url().'invoice_panel/invoice_by_print/'.$baton_invoice_info.'">View</a>';
        $this->session->set_userdata($sdata);
        redirect('invoice_panel/invoice_create');
//        $data['maincontain'] = $this->load->view('invoice/baton_invoice_show', $data, TRUE);
//        $this->load->view('admin/dashboard', $data);
    }


    public function invoice_print(){
        $data = array();
        $data['title'] = 'invoice_print';
        $data['show'] = '21';
//        $data['year'] = $this->input->post('year', TRUE);

//        $data['baton_package'] = $this->b_model->select_baton_package();
//        $data['baton_set_package'] = $this->b_model->select_baton_set_package($data);
        $data['option'] = $this->sa_model->select_option();


        $data['maincontain'] = $this->load->view('invoice/baton_invoice_print', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function invoice_print_show()
    {
        $data = array();
//        $teacher_id = $this->session->userdata('user_id');
        $data['title'] = 'invoice_show';
        $data['show'] = '21';
        $data['receipt_no'] = $baton_invoice_info = $this->input->post('receipt_no', TRUE);

        $invoice_info = $this->b_model->select_invoice_by_id($data['receipt_no']);
        $array_invoice = explode(',', $invoice_info->tbl_baton_invoice_id);
        $data['show_date'] = date("Y-F", strtotime($invoice_info->create_at));
        $data['show_date_1'] = date("d/m/Y H:i:s a", strtotime($invoice_info->create_at));
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['stu_info'] = $this->sa_model->student_information_by_stu_id($invoice_info->student_id);
        $data['baton_invoice'] = $this->b_model->select_baton_invoice($array_invoice);
        $data['invoice_info'] = (array) $invoice_info;
        $data['baton_invoice_info'] = $baton_invoice_info;

        foreach ($data['baton_invoice']  as $data12){
            $t_due = $this->b_model->select_baton_invoice_due($baton_invoice_info,$data12->id);
            $data['tbl_baton_due'][$data12->id] = $t_due->due_amount;
//            $data['tbl_baton_due'][$data12->id] = $data12->g_total;
        }

//        echo '<pre>';
//        print_r($array_invoice);
//        print_r($invoice_info);
//        print_r($data);
//        echo '</pre>';
//        exit();
        if($invoice_info){
            $this->load->library('pdf');
            $this->generate_invoice_pdf($data);
//            $this->load->view('invoice/invoice_pdf', $data);
        }else{
            $sdata = array();
            $sdata['erroraaa'] = 'Receipt No Not Fount';
            $this->session->set_userdata($sdata);

            redirect('invoice_panel/invoice_print');
        }

    }
    public function invoice_by_print($id)
    {
        $data = array();
//        $teacher_id = $this->session->userdata('user_id');
        $data['title'] = 'invoice_show';
        $data['show'] = '21';
        $data['receipt_no'] = $baton_invoice_info = $id;

        $invoice_info = $this->b_model->select_invoice_by_id($data['receipt_no']);
        $array_invoice = explode(',', $invoice_info->tbl_baton_invoice_id);
        $data['show_date'] = date("Y-F", strtotime($invoice_info->create_at));
        $data['show_date_1'] = date("d/m/Y H:i:s a", strtotime($invoice_info->create_at));
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['stu_info'] = $this->sa_model->student_information_by_stu_id($invoice_info->student_id);
        $data['baton_invoice'] = $this->b_model->select_baton_invoice($array_invoice);
        $data['invoice_info'] = (array) $invoice_info;
        $data['baton_invoice_info'] = $baton_invoice_info;

        foreach ($data['baton_invoice']  as $data12){
            $t_due = $this->b_model->select_baton_invoice_due($baton_invoice_info,$data12->id);
            $data['tbl_baton_due'][$data12->id] = $t_due->due_amount;
//            $data['tbl_baton_due'][$data12->id] = $data12->g_total;
        }

//        echo '<pre>';
//        print_r($array_invoice);
//        print_r($invoice_info);
//        print_r($data);
//        echo '</pre>';
//        exit();
        if($invoice_info){
            $this->load->library('pdf');
            $this->generate_invoice_pdf($data);
//            $this->load->view('invoice/invoice_pdf_2', $data);
            exit();
        }else{
            $sdata = array();
            $sdata['erroraaa'] = 'Receipt No Not Fount';
            $this->session->set_userdata($sdata);

            redirect('invoice_panel/invoice_print');
        }
    }
    private function generate_invoice_pdf($data)
    {
        // Extract data
        extract($data);

        // Create new PDF document
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator('School Management System');
        $pdf->SetAuthor($academy_info->s_name);
        $pdf->SetTitle('Fee Invoice - ' . $receipt_no);
        $pdf->SetKeywords('Invoice, Fee, Payment, Receipt');

        // Set default header data
        $pdf->SetHeaderData('', 0, '', '', array(0,0,0), array(255,255,255));

        // Set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//        $pdf->Cell(138, 5, 'This is a computer generated receipt. Please keep it for your records.', 0, 1, 'C');
//        $pdf->SetFooterData(array(0,0,0), array(200,200,200), '© 2025 Your School Name', 'Generated by School Management System');


        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Set margins
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 15);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Add fonts for Bengali/UTF-8 support
        $pdf->SetFont('dejavusans', '', 10);

        // Calculate totals
        $total_amount = 0;
        $total_paid = 0;
        $total_due = 0;

        foreach($baton_invoice as $invoice_item) {
            $due_amount = isset($tbl_baton_due[$invoice_item->id]) ? $tbl_baton_due[$invoice_item->id] : $invoice_item->total_due;
            $total_amount += $invoice_item->g_total;
            $total_paid += $invoice_item->total_paid;
            $total_due += $due_amount;
        }

        // Generate Student Copy
        $pdf->AddPage();
        $this->generate_invoice_copy($pdf, $data, 'STUDENT COPY');

        // Generate School Copy
//        $pdf->AddPage();
//        $this->generate_invoice_copy($pdf, $data, 'SCHOOL COPY');

        // Output PDF
        $filename = 'Invoice_' . $receipt_no . '_' . date('Y-m-d') . '.pdf';
        $pdf->Output($filename, 'I'); // I = display in browser, D = force download
    }

    private function generate_invoice_copy($pdf, $data, $copy_type = '')
    {
        extract($data);

        // Left and right X positions
        $leftX = 10;
        $rightX = 148; // 138 + 4 + some margin
        $startY = 8;

        $pdf->SetLineStyle(['width' => 0.2, 'dash' => 1,1]);
        $pdf->Line(148, 10, 148, 200); // From top to bottom
        $pdf->SetLineStyle(['width' => 0.3, 'dash' => 0]);
        // Render a copy on a given position
        $render_copy = function($x, $y, $copy_title) use ($pdf, $stu_info, $academy_info, $baton_invoice, $tbl_baton_due, $receipt_no, $show_date_1, $show_date, $invoice_info) {
            $pdf->SetXY($x, $y);
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(138, 8, $copy_title, 1, 1, 'C');

            if(!empty($academy_info->logo) && file_exists(FCPATH . $academy_info->logo)) {
//                $pdf->SetX($x);
                $pdf->Image(FCPATH . $academy_info->logo, $x+3, 16, 20, 20);
            }
            $due_amount2 = $invoice_info['due'] - $invoice_info['pay_amount'];
            if($due_amount2 > 0){
                $pdf->Image(FCPATH . 'images/due.png', $x+85, 60, 25, 0);
            }else{
                $pdf->Image(FCPATH . 'images/paid.png', $x+85, 60, 25, 0);
            }

            $pdf->SetFont('nikosh', '', 9);
            $pdf->SetXY($x, $pdf->GetY());
            $pdf->Cell(138, 6, $academy_info->s_name, 0, 2, 'C');
            $pdf->SetFont('nikosh', '', 8);
            $pdf->Cell(138, 5, $academy_info->s_address, 0, 2, 'C');
//            $pdf->Cell(138, 5, 'Phone: ' . $academy_info->phone_number . ' | Email: ' . $academy_info->email . ' | Code: ' . $academy_info->s_code, 0, 2, 'C');

            $pdf->Ln(2);

            $pdf->SetX($x);
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(138, 6, 'FEE PAYMENT RECEIPT', 0, 2, 'C');
            $pdf->Ln(2);

            // Student & Receipt Info headers
            $pdf->SetFont('dejavusans', 'B', 9);
            $pdf->SetFillColor(230, 230, 230);
            $pdf->SetX($x);
            $pdf->Cell(69, 6, 'STUDENT INFORMATION', 1, 0, 'C', true);
            $pdf->Cell(2, 5, '', 0, 0);
            $pdf->Cell(67, 6, 'RECEIPT INFORMATION', 1, 1, 'C', true);

            $student_details = [
                'Student ID: ' . $stu_info->id,
                'Name: ' . $stu_info->name,
                'Class: ' . $stu_info->class,
                'Section: ' . $stu_info->section,
                'Roll: ' . $stu_info->roll,
                'Group: ' . $stu_info->group_r,
                'Year: ' . $stu_info->year
            ];
            $receipt_details = [
                'Receipt No: ' . $receipt_no,
                'Date: ' . $show_date_1,
                'Payment Month: ' . $show_date,
                '', '', '', ''
            ];

            $pdf->SetFont('dejavusans', '', 8);
            foreach ($student_details as $i => $std_info) {
                $pdf->SetX($x);
                $pdf->Cell(69, 5, $std_info, 1, 0);
                $pdf->Cell(2, 5, '', 0, 0);
                $border_detail = $receipt_details[$i] ? 1 : 0;
                $pdf->Cell(67, 5, $receipt_details[$i] ?? '', $border_detail, 1);
            }

            $pdf->Ln(2);
            $pdf->SetX($x);
            $pdf->SetFont('nikosh', 'B', 9);
            $pdf->Cell(70, 6, 'Fee Description', 1, 0, 'C', true);
            $pdf->Cell(23, 6, 'Amount (৳)', 1, 0, 'C', true);

//            $pdf->SetFont('dejavusans', 'B', 9);
//            $pdf->Cell(25, 6, 'Amount ', 1, 0, 'R');
//            $pdf->SetFont('siyamrupali', '', 9);

            $pdf->Cell(23, 6, 'Total Paid (৳)', 1, 0, 'C', true);
            $pdf->Cell(22, 6, 'Due (৳)', 1, 1, 'C', true);

            $total_amount = $total_paid = $total_due = 0;

            foreach($baton_invoice as $invoice_item) {
                $month_year = $invoice_item->month_b . ' ' . $invoice_item->year_b;
                $due_amount = $tbl_baton_due[$invoice_item->id] ?? $invoice_item->total_due;
                $total_amount += $invoice_item->g_total;
                $total_paid += $invoice_item->total_paid;
                $total_due += $due_amount;

                $pdf->SetX($x);
                $pdf->SetFont('dejavusans', 'B', 9);
                $pdf->Cell(138, 5, $month_year, 1, 1, 'C', true);

                $pdf->SetFont('dejavusans', '', 8);
                $fees = [
                    'Tuition Fee' => $invoice_item->tution_fee,
                    'Tiffin Fee' => $invoice_item->tiffin_fee,
                    'Adv Tuition Fee' => $invoice_item->adv_tution_fee,
                    'Development Fee' => $invoice_item->dev_fee,
                    'Lab Fee' => $invoice_item->lab_fee,
                    'Re-admission Fee' => $invoice_item->re_addmission_fee,
                    'Session Others Fee' => $invoice_item->session_others_fee,
                    'Delay Fee' => $invoice_item->delay_fee,
                    'Fine' => $invoice_item->fine,
                    'Exam Fee' => $invoice_item->exam_fee,
                    'Library Fee' => $invoice_item->library_fee,
                    'Computer Fee' => $invoice_item->computer_fee,
                    'Transportation Fee' => $invoice_item->transportation_fee,
                    'Medical Fee' => $invoice_item->medical_fee,
                    'TC Fee' => $invoice_item->tc_fee,
                    'Bard Fee' => $invoice_item->board_reg,
                    'Previous Due' => $invoice_item->previous_due,
                    'Others Fee' => $invoice_item->others_fee,
                    'Dev Study Fee' => $invoice_item->dev_study_fee,
                    'Receipt Fee' => $invoice_item->receit_fee,
                    'Id Card Fee' => $invoice_item->id_card_fee,
                    'Magazine Fee' => $invoice_item->magazine_fee,
                    'Poor Fund' => $invoice_item->poor_fund,
                    'Common Fee' => $invoice_item->common_fee,
                    'Game Fee' => $invoice_item->game_fee,
                    'Scout Fee' => $invoice_item->scout_fee,
                    'Cultural Fee' => $invoice_item->cultural_fee,
                    'Testimonial Fee' => $invoice_item->tesitimonial_fee,
                    'Admission Form Fee' => $invoice_item->admission_form_fee,
                    'Batch Fee' => $invoice_item->batch_fee,
                    'Name Plate Fee' => $invoice_item->name_plate_fee,
                    'Mark Sheet Fee' => $invoice_item->mark_sheet_fee,
                    'Kallnayan Fund' => $invoice_item->kallnayan_fund,
                    'Electricity Fee' => $invoice_item->electricity_fee,
                    'Syllabus Fee' => $invoice_item->syllabus_fee,
                ];

                foreach($fees as $fee_name => $fee_amount) {
                    if($fee_amount > 0) {
                        $pdf->SetX($x);
                        $pdf->Cell(70, 4, $fee_name, 1, 0);
                        $pdf->Cell(23, 4, number_format($fee_amount, 2), 1, 0, 'R');
                        $pdf->Cell(23, 4, '-', 1, 0, 'C');
                        $pdf->Cell(22, 4, '-', 1, 1, 'C');
                    }
                }

                // Month total
                $pdf->SetX($x);
                $pdf->SetFont('dejavusans', 'B', 9);
                $pdf->Cell(70, 4, 'Month Total', 1, 0);
                $pdf->Cell(23, 4, number_format($invoice_item->g_total, 2), 1, 0, 'R');
                $pdf->Cell(23, 4, number_format($invoice_item->total_paid, 2), 1, 0, 'R');
                $pdf->Cell(22, 4, number_format($due_amount, 2), 1, 1, 'R');
            }

            $pdf->Ln(2);
            $pdf->SetX($x);
            $pdf->SetFont('dejavusans', 'B', 9);
            $pdf->Cell(138, 6, 'PAYMENT SUMMARY', 1, 1, 'C', true);

            $summary_items = [
//                'Total Amount:' => number_format($total_amount, 2),
                'Total Amount:' => number_format($invoice_info['due'], 2),
                'Service Charge:' => number_format($invoice_info['service_charge'], 2),
                'Total Paid:' => number_format($invoice_info['pay_amount'], 2),
                'Discount:' => number_format($invoice_info['discount'], 2),
                'Fine:' => number_format($invoice_info['fine'], 2)
            ];

            $pdf->SetFont('nikosh', '', 8);
            foreach ($summary_items as $label => $value) {
                $pdf->SetX($x);
                $pdf->Cell(100, 5, $label, 1, 0);
                $pdf->Cell(38, 5, '৳ ' . $value, 1, 1, 'R');
            }

            // Total due highlighted
            $pdf->SetX($x);
            $pdf->SetFont('nikosh', 'B', 9);
            $pdf->SetFillColor(255, 230, 230);
            $pdf->Cell(100, 6, 'TOTAL DUE:', 1, 0, 'L', true);
//            $pdf->Cell(38, 6, '৳ ' . number_format($invoice_info['due']-$invoice_info['pay_amount'], 2), 1, 1, 'R', true);
            $due_amount = $invoice_info['due'] - $invoice_info['pay_amount'];
            $display_due = ($due_amount < 0) ? 0 : $due_amount;
            $pdf->Cell(38, 6, '৳ ' .  number_format($display_due, 2), 1, 1, 'R', true);

            $pdf->Ln(4);
            $pdf->SetX($x);
            $pdf->SetFont('dejavusans', '', 8);
            $pdf->Cell(69, 5, 'Printed on: ' . date('d/m/Y H:i:s a'), 0, 0, 'L');
            $pdf->Cell(69, 5, 'Authorized Signature: ________________________________', 0, 1, 'R');

//            $pdf->SetY(-20);
            $pdf->Ln(2);
            $pdf->SetX($x);
            $pdf->SetFont('dejavusans', 'I', 8);
            $pdf->Cell(138, 5, 'This is a computer generated receipt. Please keep it for your records.', 0, 0, 'C');
        };

        // Draw Student Copy on Left
        $render_copy($leftX - 3, $startY, 'STUDENT COPY');
        $pdf->setPage(1);
        $render_copy($rightX + 3, $startY, 'COLLEGE COPY');
    }
    public function invoice_report(){
        $data = array();
        $data['title'] = 'invoice_report';
        $data['show'] = '21';
        $year = date('Y');
        $data['year_stu_b'] = $year = $this->input->post('year', TRUE);
        $data['student_id'] = $student_id = $this->input->post('student_id', TRUE);
        $data['class_b'] = $class_b = $this->input->post('class', TRUE);
        $data['group_b'] = $this->input->post('group_r', TRUE);
        $data['section_b'] = $this->input->post('section', TRUE);
        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
        $data['month'] =$month= $this->input->post('month', TRUE);
//        $entry_date = $this->input->post('entry_date', TRUE);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();

        $data['form_date'] = $this->input->post('form_date', TRUE);
        $data['to_date'] = $this->input->post('to_date', TRUE);

        if($data['form_date']==''){
            $data['form_date_form'] ='';
            $data['to_date_to'] = '';
            $data['all_baton'] = $this->b_model->select_all_invoive_info($data);
        }else{

            $data['form_date_form'] = date('Y-m-d', strtotime($data['form_date'])).' 00:00:00';
            if($data['to_date'] == ''){
                $data['to_date_to'] = date('Y-m-d', strtotime(date('Y-m-d'))).' 23:59:59';
                $data['to_date'] = date('m/d/Y');
            }else{
                $data['to_date_to'] = date('Y-m-d', strtotime(date('Y-m-d'))).' 23:59:59';
            }
            $data['all_baton'] = $this->b_model->select_all_invoive_info_with_date($data);
        }
//        if ($entry_date){
//            $data['entry_date'] = date('m/d/Y', strtotime($entry_date));
//        }else{
//            $data['entry_date'] = '';
//        }

        $data['option'] = $this->sa_model->select_option();
        if ($class_b=="") {
            $data['class_b'] = $class_b="Anik";
        }  else {

//            $data['all_baton'] = $this->b_model->select_all_invoive_info($data);

//            echo '<pre>';
//            print_r($data['all_baton']);
//            echo '</pre>';
//            exit();
        }


        $data['maincontain'] = $this->load->view('invoice/baton_invoice_report', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function admin_report() {
        $data = array();
        $data['main_a']=  array();
//        $data['main_one']=  array();
        $data['total_stu_id']=  array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'class_report';
        $data['show'] = '21';
        $data['input_gallery'] = ' ';
        $data['year'] = $this->input->post('year', TRUE);
        $data['admin_report'] = $admin_report = $this->input->post('admin_report', TRUE);
//        $data['group_r'] = $this->input->post('group_r', TRUE);
//        $data['section'] = $this->input->post('section', TRUE);
//        $data['term']=$term = $this->input->post('term', TRUE);
        if ($admin_report=="") {
            $data['class'] = $class="Anik";
        }  else {
            $data['main_a'] = $this->b_model->admin_report_sql($data);
            $data['total_stu_id'] = $this->b_model->admin_report_total_stu_id();
//            foreach ($data['main_a'] as $key => $value) {
//                $data['main_data'][$value->section_b][$value->group_b]['roll']=$value->roll;
//                $data['main_data'][$value->section_b][$value->group_b]['cgpa']=$value->cgpa;
//            }
        }
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data);
//        exit();

        $data['maincontain'] = $this->load->view('invoice/admin_report', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
//        $data['maincontain'] = $this->load->view('invoice/admin_report', $data, TRUE);
//        $this->load->view('admin/dashboard', $data);
    }
    public function monthly_report() {
        $data['title'] = 'monthly_report';
        $data['show'] = '21';
        $year = date('Y');
//        $class = "";
//        $section = "";
//        $group_r = "";
        $data['year_stu_b'] = $year_stu_b = $this->input->post('year', TRUE);
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
        $invoice_year = $this->input->post('invoice_year', TRUE);
        $data['custom_invoice_year'] = explode(",",$invoice_year);
        sort($data['custom_invoice_year']);
        $data['invoice_year'] = implode(",",$data['custom_invoice_year']);

        if ($class_b=="") {
            $data['class_b'] = $class_b="Anik";
        }  else {
            $data['form_month'] = $form_month = $this->input->post('form_month', TRUE);
            $data['to_month'] = $to_month = $this->input->post('to_month', TRUE);
//            $data['all_b'] = $this->b_model->select_all_stu_baton_monthly_report($data);
            $data['all_student'] = $this->b_model->select_student_search($data);
//            foreach ($data['all_b'] as $key => $value) {
//                $data['all_baton'][$value->id]['id']=$value->id;
//                $data['all_baton'][$value->id]['stu_year']=$value->year_stu_b;
//                if($data['all_baton'][$value->id]['stu_year']!=$value->year_b){
//                    $data['baton_year']=$value->year_b;
//                }else{
////                    $data['baton_year']=0;
//                }
//                $data['all_baton'][$value->id]['name']=$value->name;
//                $data['all_baton'][$value->id]['roll']=$value->roll;
//                $data['all_baton'][$value->id]['mon'][$value->month_b]['month']=$value->month_b;
//                $data['all_baton'][$value->id]['mon'][$value->month_b]['year']=$value->year_b;
//                $data['all_baton'][$value->id]['mon'][$value->month_b]['total']=$value->total_amnt;
//                $data['all_baton'][$value->id]['mon'][$value->month_b]['dat']=$value->create_date;
//            }
        }
//        $nvoice_y = $this->b_model->select_student_monthly_report($value3, $value2, $value->id)
//            echo '<pre>';
//            print_r($nvoice_y);
//            echo '</pre>';
//            exit();
            $data['maincontain'] = $this->load->view('invoice/monthly_report', $data, TRUE);
            $this->load->view('admin/dashboard', $data);
    }
    public function top_sheet() {
        $data['title'] = 'top_sheet';
        $data['show'] = '21';
        $year = date('Y');
        $data['designGroup'] = $year = $this->input->post('designGroup', TRUE);
        $data['year_stu_b'] = $year = $this->input->post('year', TRUE);
        $data['student_id'] = $student_id = $this->input->post('student_id', TRUE);
        $data['class_b'] = $class_b = $this->input->post('class', TRUE);
        $data['group_b'] = $this->input->post('group_r', TRUE);
        $data['section_b'] = $this->input->post('section', TRUE);
        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
        $data['month'] =$month= $this->input->post('month', TRUE);

        $data['form_date'] = $this->input->post('form_date', TRUE);
        $data['to_date'] = $this->input->post('to_date', TRUE);

        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['option'] = $this->sa_model->select_option();

        if($data['form_date']==''){
            $data['form_date_form'] ='';
            $data['to_date_to'] = '';
            $data['all_b'] = $this->b_model->select_all_stu_baton_subject_invoice($data);
//            echo '<pre>';
//            print_r($data['all_b']);
//            echo '</pre>';
//            exit();
        }else{

            $data['form_date_form'] = date('Y-m-d', strtotime($data['form_date'])).' 00:00:00';
            if($data['to_date'] == ''){
                $data['to_date_to'] = date('Y-m-d', strtotime(date('Y-m-d'))).' 23:59:59';
                $data['to_date'] = date('m/d/Y');
            }else{
                $data['to_date_to'] = date('Y-m-d', strtotime($data['to_date'])).' 23:59:59';
            }
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            exit();
            $data['all_b'] = $this->b_model->select_all_stu_baton_subject_invoice_with_date($data);
        }


//        $entry_date = $this->input->post('entry_date', TRUE);
//        if ($entry_date){
//            $data['entry_date'] = date('m/d/Y', strtotime($entry_date));
//        }else{
//            $data['entry_date'] = '';
//        }

//        $sum=$sum_all=0;
        $data['all_baton']=  array();
        if ($class_b=="") {
            $data['class_b'] = $class_b="Anik";
        }  else {

            $data['all_empty']['tution_fee']=0;
            $data['all_empty']['tiffin_fee']=0;
            $data['all_empty']['fine']=0;
            $data['all_empty']['delay_fee']=0;
            $data['all_empty']['re_addmission_fee']=0;
            $data['all_empty']['dev_fee']=0;
            $data['all_empty']['session_others_fee']=0;
            $data['all_empty']['lab_fee']=0;
            $data['all_empty']['exam_fee']=0;
            $data['all_empty']['tesitimonial_fee']=0;
            $data['all_empty']['tc_fee']=0;
            $data['all_empty']['board_reg']=0;
            $data['all_empty']['cultural_fee']=0;
            $data['all_empty']['scout_fee']=0;
            $data['all_empty']['game_fee']=0;
            $data['all_empty']['common_fee']=0;
            $data['all_empty']['poor_fund']=0;
            $data['all_empty']['magazine_fee']=0;
            $data['all_empty']['id_card_fee']=0;
            $data['all_empty']['receit_fee']=0;
            $data['all_empty']['dev_study_fee']=0;
            $data['all_empty']['computer_fee']=0;
            $data['all_empty']['previous_due']=0;
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
                $data['all_empty']['exam_fee'] += $value_baton->exam_fee;
                $data['all_empty']['tesitimonial_fee'] += $value_baton->tesitimonial_fee;
                $data['all_empty']['tc_fee'] += $value_baton->tc_fee;
                $data['all_empty']['board_reg'] += $value_baton->board_reg;
                $data['all_empty']['cultural_fee'] += $value_baton->cultural_fee;
                $data['all_empty']['scout_fee'] += $value_baton->scout_fee;
                $data['all_empty']['game_fee'] += $value_baton->game_fee;
                $data['all_empty']['common_fee'] += $value_baton->common_fee;
                $data['all_empty']['poor_fund'] += $value_baton->poor_fund;
                $data['all_empty']['magazine_fee'] += $value_baton->magazine_fee;
                $data['all_empty']['id_card_fee'] += $value_baton->id_card_fee;
                $data['all_empty']['receit_fee'] += $value_baton->receit_fee;
                $data['all_empty']['dev_study_fee'] += $value_baton->dev_study_fee;
                $data['all_empty']['computer_fee'] += $value_baton->computer_fee;
                $data['all_empty']['previous_due'] += $value_baton->previous_due;
                $data['all_empty']['others_fee'] += $value_baton->others_fee;
            }
//            echo '<pre>';
//            print_r($data['all_empty']);
//            echo '</pre>';
//            exit();
        }

        if($data['designGroup'] == 'design2'){
            $data['maincontain'] = $this->load->view('invoice/baton_top_sheet_2', $data, TRUE);
        }else{
            $data['maincontain'] = $this->load->view('invoice/baton_top_sheet', $data, TRUE);
        }
//        $data['maincontain'] = $this->load->view('invoice/baton_top_sheet', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

}