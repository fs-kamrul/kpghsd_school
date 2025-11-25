<?php
class pdf_panel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf');
//        $this->load->library('font/makefont/makefont');
        $this->load->library('grade');
        $this->load->library('other_libraries');
//        $this->load->library('pdf_imagealpha');
        $this->load->model('subject_panel_model', 'sp_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $this->load->model('position_result', 'position_model', TRUE);
        $this->load->model('pdf_model', 'p_model', TRUE);
        $this->load->model('pdf_result_process', 'process_model', TRUE);
        $this->load->model('pdf_result_process_test', 'process_model_test', TRUE);
        $this->load->model('pdf_prev_result_mark', 'prev_process_model', TRUE);
        $this->load->model('attendant_panel_model', 'att_model', TRUE);

        $this->lang->load('pdf');
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function pdf_show() {
        $data = array();
        $data['title'] = 'pdf';
        $data['show'] = '9';
        $data['site_block'] = 'pdf';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function id_card() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'id_card_fond';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
//        $data['styles'] = [
//            base_url('assets/pdf/id_card_css.css'),
//        ];
        $data['scripts'] = [
            base_url('assets/pdf/id_card_js.js'),
        ];

        $data['maincontain'] = $this->load->view('report/pdf_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function id_card_show() {
        $user_type = $this->input->post('user_type', TRUE);
        $data = array();
        $data['design'] = $design = $this->input->post('design', TRUE);
        $data['option_set'] = $option_set = $this->input->post('option_set', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'id_card_fond';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
//        $data['main_a'] = $this->p_model->select_stu($data);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($this->input->post());
//        print_r($data['main_a']);
//        exit();
//        $data['maincontain'] = $this->load->view('report/pdf_id_card', $data, TRUE);
        if ($user_type === 'teacher') {
            $data['main_a'] = $this->p_model->select_stu_tc();
            // Show Teacher ID Card PDF
            if ($option_set == 1) {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf/pdf_teacher_design_1', $data); break;
                    case 2: $this->load->view('report/pdf/pdf_teacher_design_2', $data); break;
                    case 3: $this->load->view('report/pdf/pdf_teacher_design_3', $data); break;
                    default: $this->load->view('report/pdf/pdf_teacher_design_1', $data); break;
                }
            } else {
//                echo '<pre>';
//                print_r($option_set);
//                exit();
                switch ($design) {
//                    case 1: $this->load->view('report/pdf/pdf_teacher_design_1_rfid', $data); break;
                    case 2: $this->load->view('report/pdf/pdf_teacher_design_2_rfid', $data); break;
                    default: $this->load->view('report/pdf/pdf_teacher_design_1_rfid', $data); break;
                }
            }
        } else {
            // Student
            $data['main_a'] = $this->p_model->select_stu($data);
            if ($option_set == 1) {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf_id_card_d_1', $data); break;
                    case 2: $this->load->view('report/pdf_id_card_d_2', $data); break;
                    case 3: $this->load->view('report/pdf_id_card_d_3', $data); break;
                    case 4: $this->load->view('report/pdf_id_card_d_4', $data); break;
                    case 5: $this->load->view('report/pdf_id_card_d_5', $data); break;
                    case 6: $this->load->view('report/pdf_id_card_d_6', $data); break;
                    case 7: $this->load->view('report/pdf_id_card_d_7', $data); break;
                    case 7: $this->load->view('report/pdf_id_card_d_8', $data); break;
                    default: $this->load->view('report/pdf_id_card_d_1', $data); break;
                }
            } else {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf_id_card_d_7rfid', $data); break;
                    case 2: $this->load->view('report/pdf_id_card_d_6rfid', $data); break;
                    default: $this->load->view('report/pdf_id_card_d_7rfid', $data); break;
                }
            }
        }
        
    }
    public function id_card_back() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'id_card_back';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_1', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function id_card_back_show() {
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'id_card_back';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['main_a'] = $this->p_model->select_stu($data);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
//        $data['maincontain'] = $this->load->view('report/pdf_id_card_back', $data, TRUE);
        $this->load->view('report/pdf_id_card_bac', $data);
    }
    public function id_card_back_border() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['title'] = 'id_card_back';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_2', $data, TRUE);
        $data['scripts'] = [
            base_url('assets/pdf/id_card_back_js.js'),
        ];
        $this->load->view('admin/dashboard', $data);
    }
    public function id_card_back_border_show() {
        $user_type = $this->input->post('user_type', TRUE);
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'id_card_back';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        $data['main_a'] = $this->p_model->select_stu($data);
        $data['design'] = $design = $this->input->post('design', TRUE);
        $data['option_set'] = $option_set = $this->input->post('option_set', TRUE);
        if ($user_type === 'teacher') {
            $data['main_a'] = $this->p_model->select_stu_tc();
            // Show Teacher ID Card PDF
            if ($option_set == 1) {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf/pdf_id_card_back_rfid_1', $data); break;
//                    case 2: $this->load->view('report/pdf/pdf_teacher_design_2', $data); break;
//                    case 3: $this->load->view('report/pdf/pdf_teacher_design_3', $data); break;
                    default: $this->load->view('report/pdf/pdf_id_card_back_rfid_1', $data); break;
                }
            } else {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf/pdf_id_card_back_rfid_1', $data); break;
//                    case 2: $this->load->view('report/pdf/pdf_id_card_back_rfid_2', $data); break;
                    default: $this->load->view('report/pdf/pdf_id_card_back_rfid_1', $data); break;
                }
            }
        } else {
            // Student
            $data['main_a'] = $this->p_model->select_stu($data);
            if ($option_set == 1) {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf/pdf_id_card_stu_bac_1', $data); break;
                    case 2: $this->load->view('report/pdf/pdf_id_card_stu_bac_2', $data); break;
                    default: $this->load->view('report/pdf/pdf_id_card_stu_bac_1', $data); break;
                }
            } else {
                switch ($design) {
//                    case 1: $this->load->view('report/pdf_id_card_d_7rfid', $data); break;
                    case 2: $this->load->view('report/pdf/pdf_id_card_stu_bac_rfid_1', $data); break;
                    default: $this->load->view('report/pdf/pdf_id_card_stu_bac_rfid_1', $data); break;
                }
            }
        }
//        $this->load->view('report/pdf/pdf_id_card_rfid_1', $data);
//        $this->load->view('report/pdf_id_card_bac_1', $data);
    }
    public function site_list() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'site_plan';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_3', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function site_list_show() {
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'site_plan';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['main_a'] = $this->p_model->select_stu($data);
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
//        $data['maincontain'] = $this->load->view('report/pdf_id_card_back', $data, TRUE);
        $this->load->view('report/pdf_site_list', $data);
    }
    public function result() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'result';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_4', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function result_show_1() {
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'result_print';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['all_reg'] = $this->p_model->sub_result_all($data);
        $data['position_r'] = $this->position_model->position_r($data);
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
        $this->load->view('report/pdf_result', $data);
    }
    public function result_show() {
//        error_reporting(E_ALL);
//        ini_set('display_errors', 1);

        $data = array();
        $data['title'] = 'result_show';
        $data['show'] = '9';
//        $data['all_reg']=  array();
        $data['main_data']=array();
        $data['sub_info']=array();
//        $data['main_data']=array();
        $data['without_average'] = $this->input->post('without_average', TRUE);
//            echo '<pre>';
//            print_r($data);
//            exit();
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['term']=$term = $this->input->post('term', TRUE);
        $data['term_show']=$term_show = $this->input->post('term_show', TRUE);
        $data['term_prev']= $this->input->post('term_prev', TRUE);
//        echo $term_show;
//        exit();
        $data['option'] = $this->sa_model->select_option();
        $vn=$vn1=0;
        $data['all_reg']=  array();
        if ($class=="") {
            $data['class'] = $class="Anik";
        }  else {
            $data['all_reg'] = $this->p_model->select_all_stu_result($data);
            
//            echo '<pre>';
//            print_r($data['all_reg']);
//            exit();
        foreach ($data['all_reg'] as $key => $value) {
//            print_r($data['all_reg']);
//            echo $value->id;
//            exit();
//            return $value;
//            echo $data['main_data'];
            $data['main_data'][$value->id]['id']=$value->id;
            
            $data['main_data'][$value->id]['name']=$value->name;
            $data['main_data'][$value->id]['roll']=$value->roll;
            $data['main_data'][$value->id]['section']=$value->section;
            $data['main_data'][$value->id]['all_reg_id']=$value->all_reg_id;
            $data['main_data'][$value->id]['mobile_number']=$value->mobile_number;
            $data['main_data'][$value->id]['term']=$value->term;
            $data['main_data'][$value->id]['father_name']=$value->father_name;
            $data['main_data'][$value->id]['mother_name']=$value->mother_name;
            $data['main_data'][$value->id]['photo']=$value->photo;
//                $data['main_data'][$value->id]['sub_name'] = $value->sub_name;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['mark_number']=$value->mark_number;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['total']=$value->mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['add_f']=$value->add_f;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['pass_mark']=$value->pass_mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['sub_mark']=$value->sub_mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['mark_pf']=$value->mark_pf;
            
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['s_name']=$value->sub_name;
            
            $data['sub_info'][$value->sub_name]['sub_code']=$value->sub_code;
            $data['sub_info'][$value->sub_name]['sub_name']=$vvt = $value->sub_name;
            $data['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
            $data['sub_info'][$value->sub_name]['sub_mark']=$value->sub_mark;
            $data['sub_info'][$value->sub_name]['add_group']=$value->add_group;
            $data['sub_info'][$value->sub_name]['high_mark']=0;
            $data['sub_info'][$value->sub_name]['high_mark_g1']=0;
        }
        
        $vn = $vn1 = $pas = 0;
        $pf = $pfp = "";
        $count_to=1;$sum_t = "";$sum_main_mark = "";$sum_main_mark_sum = 0;
        foreach ($data['main_data'] as $key1 => $value1) {
            foreach ($data['sub_info'] as $key2 => $value2) {
                if (isset($value1['mark'][$value2['sub_name'] . "_mark"])) {
                    foreach ($value1['mark'][$value2['sub_name'] . "_mark"] as $key3 => $value3) {

                        $pas=$value3['sub_mark'];
                        $pas1=100/$pas;
                        $pas2=round(($pas1*$value3['total']), 2);
                        $vn +=$pas2;
                        $sum_t = $pas2.'+'.$sum_t;
                        $sum_main_mark = $value3['total'].'+'.$sum_main_mark;
                        $sum_main_mark_sum +=round($value3['total'], 2);
                        $vn1 +=$pas2;
                        if ($value3['mark_pf'] == 'f') {
                            $pf = "f";
                        } elseif ($value3['mark_pf'] == 'p') {
                            $pfp = "p";
                        }
                    }
                    if ($vn<($value3['pass_mark']*$value3['sub_mark'])) {
                        $pf = "f";
                    }
                    if ($value3['add_f'] == 2 && $pf == "" && $pfp == "p") {
                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                            echo '<td>' . $vn . '</td>';
                        } elseif ($value3['add_f'] == 1 && $pf == "" && $pfp == "p") {
                            $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                            echo '<td>' . $vn . '*</td>';
                        } elseif ($value3['add_f'] == 2 && $pf == "f") {
                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=0;
//                        echo '<td style="background: red;">' . $vn . '</td>';
                    } elseif ($value3['add_f'] == 1 && $pf == "f") {
                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=0;
//                        echo '<td style="background: red;">' . $vn . '*</td>';
                    }elseif ($value3['add_f'] == 3) {
                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                        echo '<td style="background: red;">' . $vn . '*</td>';
                    }
                    
                     //else {
//                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                    }
//                    echo $value1['id'];
                    $pf = $pfp = "";
                    $data['main_data'][$value1['id']][$value2['sub_name']]['to_mark']=$sum_t;
                    $data['main_data'][$value1['id']][$value2['sub_name']]['main_mark']=$sum_main_mark;
                    $data['main_data'][$value1['id']][$value2['sub_name']]['sum_main_mark_sum']=$sum_main_mark_sum;
                    $data['main_data'][$value1['id']][$value2['sub_name']]['tota_mark']=$vn;
                    $data['main_data'][$value1['id']][$value2['sub_name']]['add_f']=$value3['add_f'];
//                    $data['sub_info'][$value2['sub_name']]['to_mark']=$sum_t;
                    $sum_t="";
                    $sum_main_mark="";
                    if ($vn>$data['sub_info'][$value2['sub_name']]['high_mark']) {
                        $data['sub_info'][$value2['sub_name']]['high_mark']=$vn;
                        $data['sub_info'][$value2['sub_name']]['high_mark_g1']=$sum_main_mark_sum;
                        $vn = 0;
                        $sum_main_mark_sum = 0;
                    }  else {
                        $vn = 0;
                        $sum_main_mark_sum = 0;
                    }
                    
                }else {
//                    $data['sub_info'][$value2['sub_name']]['high_mark']=0;
//                        echo '---';
                      }
            }$vn1=0;
        }

//            echo '<pre>';
//            print_r($data['main_data']);
//            exit();
//            echo '<pre>';
//            print_r($data['main_data']);
//            print_r($data['sub_info']);
//            exit();
            $data['all_process'] = $this->process_model_test->all_select_result($data);
            $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//            $data['all_process'] = $this->process_model->all_select_result($data);
//        echo '<pre>';
//        print_r($data['main_data']);
//        print_r($data['sub_info']);
//        exit();
        }

        if($data['without_average']){
            $this->load->view('report/pdf_result_4', $data);
        }else {
            if ($term_show) {
                $data['prev_reg'] = $this->p_model->select_prev_stu_result($data);
                if ($data['prev_reg']) {
                    $data['prev_process'] = $this->prev_process_model->prev_select_result($data);
                    $this->load->view('report/pdf_result_2', $data);
                } else {
                    $this->load->view('report/pdf_result_3', $data);
                }
            } else {
                $this->load->view('report/pdf_result_3', $data);
            }
        }
        
    }
    public function transfer_input() {
        $data = array();
        $data['title'] = 'transfer_input';
        $data['show'] = '9';
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
//        $data['term']=$term = $this->input->post('term', TRUE);
        if ($class=="") {
            $data['class'] = $class="Anik";
        }
//        echo '<pre>';
//        print_r($data) ;
//        exit();
        $data['option'] = $this->sa_model->select_option();
        $data['main_a'] = $this->p_model->select_stu_tc($data);
        $data['maincontain'] = $this->load->view('report/pdf_input_8', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function transfer_save() {
        
        $data = array();
        $sdata = array();
        $al= $er = 0;
        $chk = $this->input->post('chk', TRUE);
        foreach ($chk as $key => $value) {
            $data['tc_all_reg_id'] = $this->input->post('all_reg_id'.$key, TRUE);
            $data['institution_till'] = $class = $this->input->post('institution_till'.$key, TRUE);
            $data['due_till'] = $this->input->post('due_till'.$key, TRUE);
            
            $in_data = $this->p_model->select_tc_save($data);
            if (!$in_data) {
                $this->p_model->tc_save($data);
                $al++;
                $sdata['message'] = "$al Student Data Save Successfully";
            }  else {
                $er++;
                $this->p_model->tc_update($data);
//                $sdata['message'] = "$al Update Successfully";
//                $sdata['erroraaa'] = "$er Student Data Already Save";
            }
        }
        $sdata['message'] = "$al Student Data Save Successfully and $er Update Successfully";
        $this->session->set_userdata($sdata);
        redirect('pdf_panel/transfer_input');
        
    }
    public function transfer() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'transfer';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_5', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function transfer_show() {
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'result_print';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['main_a'] = $this->p_model->select_all_tc($data);
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
        $this->load->view('report/pdf_tc', $data);
//        $this->load->view('report/pdf_transfer', $data);
    }
    public function all_class_report() {
        $data = array();
        $data['sub_info']=array();
        $data['main_data']=array();
        $data['title'] = 'student_result';
        $data['show'] = '9';
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['term']=$term = $this->input->post('term', TRUE);
        $data['option'] = $this->sa_model->select_option();
//        $data['']['']['']['mark']="";
        $vn=$vn1=0;
        $data['all_reg']=  array();
        if ($class=="") {
            $data['class'] = $class="Anik";
        }  else {
            $data['all_reg'] = $this->p_model->select_all_stu_result($data);
        foreach ($data['all_reg'] as $key => $value) {
            $data['main_data'][$value->id]['id']=$value->id;
            $data['main_data'][$value->id]['name']=$value->name;
            $data['main_data'][$value->id]['roll']=$value->roll;
            $data['main_data'][$value->id]['section']=$value->section;
            $data['main_data'][$value->id]['all_reg_id']=$value->all_reg_id;
            $data['main_data'][$value->id]['mobile_number']=$value->mobile_number;
//                $data['main_data'][$value->id]['sub_name'] = $value->sub_name;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['mark_number']=$value->mark_number;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['total']=$value->mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['add_f']=$value->add_f;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['pass_mark']=$value->pass_mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['sub_mark']=$value->sub_mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name.'_mark'][$value->mark_id]['mark_pf']=$value->mark_pf;
            
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['add_f']=$value->add_f;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_code']=$value->sub_code;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_name']=$vvt = $value->sub_name;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_mark']=$value->sub_mark;
            
//            $data['sub_info'][$value->sub_name]['add_f']=$value->add_f;
            $data['sub_info'][$value->sub_name]['sub_code']=$value->sub_code;
            $data['sub_info'][$value->sub_name]['sub_name']=$vvt = $value->sub_name;
            $data['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
            $data['sub_info'][$value->sub_name]['sub_mark']=$value->sub_mark;
            $data['sub_info'][$value->sub_name]['high_mark']=0;
        }
            $vn = $vn1 = $pas = 0;
            $pf = $pfp = "";
            $count_to=1;$sum_t = "";
            foreach ($data['main_data'] as $key1 => $value1) {
                foreach ($data['sub_info'] as $key2 => $value2) {
                    if (isset($value1['mark'][$value2['sub_name'] . "_mark"])) {
                        foreach ($value1['mark'][$value2['sub_name'] . "_mark"] as $key3 => $value3) {

                            $pas=$value3['sub_mark'];
                            $pas1=100/$pas;
                            $pas2=$pas1*$value3['total'];
                            $vn +=$pas2;
                            $sum_t = $pas2.'+'.$sum_t;
                            $vn1 +=$pas2;
                            if ($value3['mark_pf'] == 'f') {
                                $pf = "f";
                            } elseif ($value3['mark_pf'] == 'p') {
                                $pfp = "p";
                            }
                        }
                        if ($vn<($value3['pass_mark']*$value3['sub_mark'])) {
                            $pf = "f";
                        }
                        if ($value3['add_f'] == 2 && $pf == "" && $pfp == "p") {
                            $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                            echo '<td>' . $vn . '</td>';
                        } elseif ($value3['add_f'] == 1 && $pf == "" && $pfp == "p") {
                            $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                            echo '<td>' . $vn . '*</td>';
                        } elseif ($value3['add_f'] == 2 && $pf == "f") {
                            $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=0;
//                        echo '<td style="background: red;">' . $vn . '</td>';
                        } elseif ($value3['add_f'] == 1 && $pf == "f") {
                            $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=0;
//                        echo '<td style="background: red;">' . $vn . '*</td>';
                        }elseif ($value3['add_f'] == 3) {
                            $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                        echo '<td style="background: red;">' . $vn . '*</td>';
                        }

                        //else {
//                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_fail']=1;
//                    }
//                    echo $value1['id'];
                        $pf = $pfp = "";
                        $data['main_data'][$value1['id']][$value2['sub_name']]['to_mark']=$sum_t;
                        $data['main_data'][$value1['id']][$value2['sub_name']]['tota_mark']=$vn;
                        $data['main_data'][$value1['id']][$value2['sub_name']]['add_f']=$value3['add_f'];
//                    $data['sub_info'][$value2['sub_name']]['to_mark']=$sum_t;
                        $sum_t="";
                        if ($vn>$data['sub_info'][$value2['sub_name']]['high_mark']) {
                            $data['sub_info'][$value2['sub_name']]['high_mark']=$vn;
                            $vn = 0;
                        }  else {
                            $vn = 0;
                        }

                    }else {
//                    $data['sub_info'][$value2['sub_name']]['high_mark']=0;
//                        echo '---';
                    }
                }$vn1=0;
            }
            $data['all_process'] = $this->process_model->all_select_result($data);
//        echo '<pre>';
//        print_r($data['main_data']);
//        print_r($data['sub_info']);
//        exit();
        }
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        
        $data['ak'] = $ak = $this->input->post('ak', TRUE);
        if($ak=='sum_mark'){ 
                $data['maincontain'] = $this->load->view('report/student_result_all_cls_with_sum', $data, TRUE);
            } else {
                $data['ak'] = 'with_out_sum_mark';
                $data['maincontain'] = $this->load->view('report/student_result_all_cls', $data, TRUE);
            }
        $this->load->view('admin/dashboard', $data);
    }
    public function save_stu_data() {
        $data = array();
        $sdata = array();
        $pdata = array();
        $data['title'] = 'student_result';
        $data['show'] = '9';
        $pdata['year'] = $this->input->post('year', TRUE);
        $pdata['class'] = $class = $this->input->post('class', TRUE);
        $pdata['group_r'] = $this->input->post('group_r', TRUE);
        $pdata['term'] = $this->input->post('term', TRUE);
        
        $opt = $this->input->post('opt', TRUE);
        for ($i = 1; $i <= $opt; $i++) {
            $pdata['section'] = $this->input->post('section'.$i, TRUE);
            $pdata['result_all_reg_id'] = $this->input->post('all_reg_id'.$i, TRUE);
            $pdata['gpa'] = $class = $this->input->post('gpa'.$i, TRUE);
            $pdata['cgpa'] = $this->input->post('cgpa'.$i, TRUE);
            $pdata['total_mark'] = $this->input->post('total_mark'.$i, TRUE);
            $pdata['position'] = $this->input->post('position'.$i, TRUE);
            $isif_by_id = $this->p_model->search_result_by_id($pdata);
            if (!$isif_by_id) {
                $this->p_model->stu_result_save($pdata);
                $sdata['message'] = "Result Submit Successfully";
            }  else {
                $this->p_model->stu_result_update($pdata);
                $sdata['message'] = "Result Update Successfully";
            }
        }
//        $sdata['message'] = "Result Submit Successfully";
        $this->session->set_userdata($sdata);
        redirect('pdf_panel/all_class_report');
    }
    public function admid_card() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'admit_card';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_6', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function admid_card_show() {
        $data = array();
        $data['design'] = $design = $this->input->post('design', TRUE);
        $data['typ'] = $this->input->post('typ', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'admit_card';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        $data['all_reg'] = $this->p_model->sub_result_all($data);
//        $data['position_r'] = $this->position_model->position_r($data);
        $data['main_a'] = $this->p_model->select_stu($data);
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();$data['design'] = $design = $this->input->post('design', TRUE);
        if ($design==1) {
            $this->load->view('report/pdf_admit_card', $data);
        }elseif ($design==2) {
            $this->load->view('report/pdf_admit_card_1', $data);
        }
    }
    public function prottayan() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'prottoyon_potro';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_7', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function prottayan_show() {
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['term'] = $this->input->post('term', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'prottoyon_potro_show';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['main_a'] = $this->p_model->select_stu($data);
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
        $this->load->view('report/pdf_prottayan', $data);
    }
    public function testimonial_input() {
        $data = array();   //$class="",$year="",$group_r="",$section=""
        $data['title'] = 'transfer_input';
        $data['show'] = '9';
        
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['year'] = $year=$this->input->post('year', TRUE);
        $data['group_r'] = $group_r=$this->input->post('group_r', TRUE);
        $data['section'] = $csection=$this->input->post('section', TRUE);
        $ak = $this->input->post('ak', TRUE);
//        $data['term']=$term = $this->input->post('term', TRUE);
        if ($class=="") {
            $data['class'] = $class="Anik";
        }
//        echo '<pre>';
//        print_r($data) ;
//        exit();
        $data['option'] = $this->sa_model->select_option();
        $data['main_a'] = $this->p_model->select_stu_testimonial($data);
		if($ak=="num"){
			$data['maincontain'] = $this->load->view('report/pdf_input_9_1', $data, TRUE);
		}else{
			$data['maincontain'] = $this->load->view('report/pdf_input_9', $data, TRUE);
		}
        
        $this->load->view('admin/dashboard', $data);
    }
    public function testimonial_save() {
        
        $data = array();
        $sdata = array();
        $al= $er = 0;
//        $group_r=$this->input->post('group_r', TRUE);
//        $section=$this->input->post('section', TRUE);
//        $class=$this->input->post('class', TRUE);
        
        $chk = $this->input->post('chk', TRUE);
        foreach ($chk as $key => $value) {
            $data['testimonial_all_reg_id'] = $this->input->post('all_reg_id'.$key, TRUE);
            $data['roll_g'] = $this->input->post('roll_g'.$key, TRUE);
            $data['reg_no'] = $this->input->post('reg_no'.$key, TRUE);
            $data['gpa_g'] = $this->input->post('gpa_g'.$key, TRUE);
            $data['date_g'] = $this->input->post('date_g'.$key, TRUE);
            $data['year_g'] =$year= $this->input->post('year_g'.$key, TRUE);
            $data['month_g'] =$year= $this->input->post('month_g'.$key, TRUE);

//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            exit();
            $in_data = $this->p_model->select_testimonial_save($data);
            if (!$in_data) {
                $this->p_model->testimonial_save($data);
                $al++;
                $sdata['message'] = " Student Data Save Successfully";
            }  else {
                $this->p_model->testimonial_update($data);
                $er++;
//                $sdata['erroraaa'] = "$er Student Data Update";
                $sdata['message'] = " Student Data Update Successfully";
            }
        }
        
        $this->session->set_userdata($sdata);
        redirect('pdf_panel/testimonial_input/');
        
    }
    public function testimonial() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'testimonial';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('report/pdf_input_10', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function testimonial_show() {
        $data = array();
        $data['class'] = $this->input->post('class', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
//        $data['term'] = $this->input->post('term', TRUE);
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'result_print';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['main_a'] = $this->p_model->select_all_testimonial($data);
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
        $this->load->view('report/pdf_testimonial', $data);
    }
    public function class_report() {
        $data = array();
        $data['main_a']=  array();
        $data['main_data']=  array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'class_report';
        $data['show'] = '9';
        $data['input_gallery'] = ' ';
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
//        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['term']=$term = $this->input->post('term', TRUE);
        if ($class=="") {
            $data['class'] = $class="Anik";
        }  else {
            $data['main_a'] = $this->p_model->select_class_report($data);
        }
        foreach ($data['main_a'] as $key => $value) {
            $data['main_data'][$value->section][$value->group_r][$value->result_all_reg_id]['roll']=$value->roll;
            $data['main_data'][$value->section][$value->group_r][$value->result_all_reg_id]['cgpa']=$value->cgpa;
        }
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data['main_a']);
//        exit();
        $data['maincontain'] = $this->load->view('report/student_class_report', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function student_info() {
        $data['title'] = 'student_information';
        $data['show'] = '9';
        $year = date('Y');
        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['ak'] = $ak = $this->input->post('ak', TRUE);
//        $data['section_b'] = $this->input->post('section', TRUE);
//        $data['b_date'] =$b_date= $this->input->post('b_date', TRUE);
//        $data['b_total'] =$b_total= $this->input->post('b_total', TRUE);
//        $data['month'] =$month= $this->input->post('month', TRUE);
//        $data['entry_date'] = $entry_date = $this->input->post('entry_date', TRUE);
        $data['option'] = $this->sa_model->select_option();
//        $sum=$sum_all=0;
        $data['all_baton']=  array();
        if ($class=="") {
            $data['class'] = $class_b="Anik";
        }  else {
            $data['all_b'] = $this->p_model->select_stu_info($data);
        }
		if($ak=="num"){
			$data['maincontain'] = $this->load->view('report/pdf_input_12', $data, TRUE);
                }elseif($ak=="num1"){
			$data['maincontain'] = $this->load->view('report/pdf_input_13', $data, TRUE);
		}elseif($ak=="num2"){
			$data['maincontain'] = $this->load->view('report/pdf_input_14', $data, TRUE);
		}else{
			$data['maincontain'] = $this->load->view('report/pdf_input_12', $data, TRUE);
		}
		$this->load->view('admin/dashboard', $data);
    }
}
