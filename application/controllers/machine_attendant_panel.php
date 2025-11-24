<?php

class Machine_attendant_panel extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('machine_attendant_model', 'ma_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function machine() {
        $data = array();
        $data['title'] = 'machine';
        $data['show'] = '20';
        $data['site_block'] = 'machine';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function machine_absent() {
        $data['title'] = 'attendant_absent';
        $data['show'] = '20';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] = $al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('machine/machine_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function absent_sms() {
        $data['title'] = 'attendant_absent';
        $data['show'] = '20';
//        $data['option'] = $this->sa_model->select_option();

        $day = $this->input->post('day', TRUE);
        $month = $this->input->post('month', TRUE);
        $year = $this->input->post('year', TRUE);

        $form_date = $year . '-' . $month . '-' . $day . ' 00:00:00';
        $to_date = $year . '-' . $month . '-' . $day . ' 23:59:59';
        $data['form_date'] = $form_date;
        $data['to_date'] = $to_date;

        $data['session'] = $this->input->post('session', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
//        echo $form_date;
        $data['months'] = $this->ma_model->machine_search_month_day_att($data);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data['months']);
//        exit();
        $data['maincontain'] = $this->load->view('machine/machine_absent', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function machine_yearly_report() {
        $data['title'] = 'yearly_report';
        $data['show'] = '20';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] = $al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('machine/machine_input_3', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function yearly_report_show() {
        $data['title'] = 'attendant_absent';
        $data['show'] = '20';
        $data['month_p'] = $month = $this->input->post('month', TRUE);
        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['start_date'] = $start = $month.' 01 '.$year;
        $data['session'] = $this->input->post('session', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);

        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
        $data['result'] = $this->ma_model->machine_search_month_monthly_apsent($data);

        $data['date_array']['1']["start"] = date('Y-m-d 00:00:00', strtotime($start));
        $data['date_array']['1']["end"] = date('Y-m-t 23:59:59', strtotime($start));
        for($i=1;$i<=11;$i++){
            $j = $i+1;
            $data['date_array'][$j]["start"] = date('Y-m-d 00:00:00', strtotime($start . ' + '.$i.' Months'));
            $data['date_array'][$j]["end"] = date('Y-m-t 23:59:59', strtotime($start . ' + '.$i.' Months'));
        }


        foreach ($data['result'] as $key => $value) {
            $data['stu']["$value->id"]['row']["id"] = $value->id;
            $data['stu']["$value->id"]['row']["roll"] = $value->roll;
            $data['stu']["$value->id"]['row']["name"] = $value->name;
//            $data['stu']["$value->id"]["photo"] = $value->photo;
//            $data['stu']["$value->id"]["phn"] = $value->mobile_number;
            foreach ($data['date_array'] as $key01=>$value01){
//                print_r($value01);
                $data['stu']["$value->id"]['row'][date("F", strtotime($value01['start']))] = $this->ma_model->machine_search_yearly_present($value01['start'],$value01['end'],$value->id);
            }

//            echo '<pre>';
//            print_r($data['stu']);
//            exit();
        }
//        echo '<pre>';
//        print_r($data['stu']);
//        exit();

        $data['maincontain'] = $this->load->view('machine/machine_yearly_report', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function machine_absent_all_class() {
        $data['title'] = 'attendant_absent_all_class';
        $data['show'] = '20';
        $data['option'] = $this->sa_model->select_option();
        $data['all_class'] = $al_cls = $this->sa_model->select_all_class_info();
//        $data['all_class'] = $this->sa_model->select_count($al_cls);
        $data['maincontain'] = $this->load->view('machine/machine_input_2', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function absent_sms_all_class() {
        $data['title'] = 'attendant_absent';
        $data['show'] = '20';
//        $data['option'] = $this->sa_model->select_option();

        $day = $this->input->post('day', TRUE);
        $month = $this->input->post('month', TRUE);
        $year = $this->input->post('year', TRUE);

        $form_date = $year . '-' . $month . '-' . $day . ' 00:00:00';
        $to_date = $year . '-' . $month . '-' . $day . ' 23:59:59';
        $data['form_date'] = $form_date;
        $data['to_date'] = $to_date;

        $data['session'] = $this->input->post('session', TRUE);
        $class_s = $this->input->post('class', TRUE);
        $data['class'] =implode(",",$class_s);
//        $data['group_r'] = $this->input->post('group_r', TRUE);
//        $data['section'] = $this->input->post('section', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
//        echo $form_date;
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $data['months'] = $this->ma_model->machine_search_month_day_att_all_class($data);
        $data['academy_info'] = $academy_info = $this->setting_model->select_info();
//        echo '<pre>';
//        print_r($data['months']);
//        exit();
        $data['maincontain'] = $this->load->view('machine/machine_absent_all_class', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function holly_day() {
        $data = array();
        $data['holly_day'] = $this->ma_model->search_holly_date();
        $data['title'] = 'holly_day';
        $data['show'] = '20';
        $data['maincontain'] = $this->load->view('machine/machine_input_1', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function holly_day_delete($id) {
        $sdata = array();
        $this->ma_model->holly_date_datele($id);
        $sdata['message'] = 'Delete Data Successfully';
        $this->session->set_userdata($sdata);
        redirect('machine_attendant_panel/holly_day');
    }

    public function holly_day_save() {
        $data = array();
        $datap = array();
        $data['form_date'] = $this->input->post('form_date', TRUE);
        $data['to_date'] = $this->input->post('to_date', TRUE);
        $data['detail'] = $this->input->post('detail', TRUE);
        $date_time = date('Y-m-d', strtotime(' +1 day', strtotime($data['to_date'])));
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        $date1 = $data['form_date'];
        $date2 = $data['to_date'];
//        $date3=$date1;
//        $date4=$date2;
//        $diff = date_diff($date3,$date4);
//        echo $diff->format("%R%a days");
//        $diff = abs(strtotime($date2) - strtotime($date1));
//        $years = floor($diff / (365*60*60*24));
//        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
//        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//        printf("%d years, %d months, %d days\n", $years, $months, $days);
//        $count = $diff/(24*60*60);

        $begin = new DateTime($date1);
        $end = new DateTime($date_time);

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt) {
            $datap['holly_date'] = $dt->format("Y-m-d");
            $datap['detail'] = $data['detail'];
//            echo $dt->format("Y-m-d");
            $this->ma_model->holly_date_insert($datap);
        }
        $sdata = array();
        $sdata['message'] = 'Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('machine_attendant_panel/holly_day');
    }

    public function machine_report_month() {
        $data = array();
        $data['stu'] = array();
        $data['title'] = 'attendant_absent_report';
        $data['show'] = '20';
        $data['option'] = $this->sa_model->select_option();

//        $data['month'] = $this->input->post('month', TRUE);
//        $month_year=['January','February','March','April','May','June','July','August','September','October','November','December'];   
//        $month_day = array(
//            'January'=>31,
//            'February'=>28,
//            'March'=>31,
//            'April'=>30,
//            'May'=>31,
//            'June'=>30,
//            'July'=>31,
//            'August'=>31,
//            'September'=>30,
//            'October'=>31,
//            'November'=>30,
//            'December'=>31
//        );
//        $date_s= date('Y-m-d');
//        $last
//        echo date("t", strtotime($date_s));
//        exit();
//        $day = $this->input->post('day', TRUE);
        $data['month_p'] = $month = $this->input->post('month', TRUE);
        if ($month == '') {
            $month_set = date('m') - 0;
        } else {
            $month_set = $month - 1;
        }

//        echo $month_day[$month_year[$month_set]];
        $year = $this->input->post('year', TRUE);
//        $data['session'] = $session = $this->input->post('session', TRUE);

        $form_date = $year . '-' . $month . '-01 00:00:00';
        $search_date = $year . '-' . $month . '-01';
        $to_date = $year . '-' . $month . '-31 23:59:59';
        $data['form_date'] = $form_date;
        $data['to_date'] = $to_date;

        $data['ak'] = $this->input->post('ak', TRUE);
        $data['session'] = $this->input->post('session', TRUE);
        $data['year'] = $this->input->post('year', TRUE);
        $data['class'] = $this->input->post('class', TRUE);
        $data['group_r'] = $this->input->post('group_r', TRUE);
        $data['section'] = $this->input->post('section', TRUE);

        $data['academy_info'] = $academy_info = $this->setting_model->select_info();

        $data['result'] = $this->ma_model->machine_search_month_monthly_apsent($data);
//        print_r($data['result']);
//        exit;
//        echo '<pre>';
//        print_r($data['result']);
//        exit();
        if ($year != '') {
            foreach ($data['result'] as $key => $value) {
                $data['stu']["$value->id"]["id"] = $value->id;
                $data['stu']["$value->id"]["roll"] = $value->roll;
                $data['stu']["$value->id"]["name"] = $value->name;
                $data['stu']["$value->id"]["photo"] = $value->photo;
                $data['stu']["$value->id"]["phn"] = $value->mobile_number;
//    $month_day[$month_year[$month_set]]
                for ($ai = 1; $ai <= date("t", strtotime($search_date)); $ai++) {
                    if($ai > 0 && $ai < 10){
                        $ai = '0'.$ai;
                    }
                    $date_time = $year . '-' . $month . '-' . $ai .'<br>';
                    $holly = $this->ma_model->search_id_holly_date($date_time);
                    if(!$holly){
//                        print_r($holly);
//                        echo '<br>';
//                    }
                    $f_date = $year . '-' . $month . '-' . $ai . ' 00:00:00';
                    $t_date = $year . '-' . $month . '-' . $ai . ' 23:59:59';
                    $data['stu']["$value->id"]["new"]["$ai"]["day"] = $ai;
                    $present = $this->ma_model->machine_search_month_present($f_date, $t_date, $value->id);
//        echo '<pre>';
//        print_r($present);
//        exit();
                    $present_count = count($present);
                    $data['stu']["$value->id"]["new"]["$ai"]["time"] = '';
                    if (!empty($present)) {
                        $data['stu']["$value->id"]["new"]["$ai"]["att"] = 1;
                        foreach ($present as $key122 => $value122) {
                            if ($key122 == 0 || $key122 == $present_count - 1) {
                                $data['stu']["$value->id"]["new"]["$ai"]["time"] .= substr($value122->inout_datetime, 11, 5) . '-';
                            }
                        }
                    } else {
                        $data['stu']["$value->id"]["new"]["$ai"]["att"] = 0;
                    }
                }
                }
                
            }
        }

//    print_r($stu);
//    exit();
//        echo '<pre>';
//        print_r($data['months']);
//        exit();
        if ($data['ak'] == 'num1') {
            $data['maincontain'] = $this->load->view('machine/machine_month_report_1', $data, TRUE);
        } else {
            $data['ak'] = 'num';
            $data['maincontain'] = $this->load->view('machine/machine_month_report', $data, TRUE);
        }
//        $data['maincontain'] = $this->load->view('machine/machine_month_report', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

}
