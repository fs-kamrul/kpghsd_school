<?php

class Student_info extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student_info_model', 'stu_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);

        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }

    public function registration() {
        $data = array();
        $data['title'] = 'registration';
        $data['show'] = '2';
        $data['site_block'] = 'registration';
        $data['maincontain'] = $this->load->view('report/site_block_show', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function student_view() {
        $data = array();
        $data['title'] = 'view_registration';
        $data['show'] = '2';
        $data['year'] = "";
        $data['class'] = "";
        $data['group_r'] = "";
        $data['section'] = "";
        $data['option'] = $this->sa_model->select_option();
        $group_r = '';
        $class = '';
        $section = '';
        $year = date('Y');
        $data['all_reg'] = $this->stu_model->select_all_reg_search($group_r, $class, $section, $year);
        $data['maincontain'] = $this->load->view('admin/view_registation', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function student_reg() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'registration';
        $data['show'] = '2';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('admin/registation_info', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function reg_save() {
        $data = array();
        $datap = array();
        $config = array();

        /* --------file--------------- */
        $config['upload_path'] = 'images/upload/students/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('id', TRUE);
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';

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
        /* ---------------------------- */

        $data['id'] = $id = $this->input->post('id', TRUE);
        $data['name'] = $this->input->post('name', TRUE);
        $data['password'] = md5('123456');
        $data['stu_phone'] = $this->input->post('stu_phone', TRUE);
        $data['roll'] = $datap['roll'] = $this->input->post('roll', TRUE);
        $data['class'] = $datap['class'] = $this->input->post('class', TRUE);
        $data['section'] = $datap['section'] = $this->input->post('section', TRUE);
        $data['year'] = $datap['year'] = $this->input->post('year', TRUE);
        $data['group_r'] = $datap['group_r'] = $this->input->post('group_r', TRUE);

        $data['father_name'] = $this->input->post('father_name', TRUE);
        $data['job_category'] = $this->input->post('job_category', TRUE);
        $data['mother_name'] = $this->input->post('mother_name', TRUE);
        $data['birth_bate'] = date("Y-m-d", strtotime($this->input->post('birth_bate', TRUE)));
        $data['join_date'] = date("Y-m-d", strtotime($this->input->post('join_date', TRUE)));
        $data['id'] = $this->input->post('id', TRUE);
        $data['gender'] = $this->input->post('gender', TRUE);
        $data['marital_status'] = $this->input->post('marital_status', TRUE);
        $data['blood_group'] = $this->input->post('blood_group', TRUE);
        $data['person_type'] = $this->input->post('person_type', TRUE);
        $data['religion'] = $this->input->post('religion', TRUE);
        $data['nationality'] = $this->input->post('nationality', TRUE);
        $data['national_id'] = $this->input->post('national_id', TRUE);
        $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['village'] = $this->input->post('village', TRUE);
        $data['post'] = $this->input->post('post', TRUE);
        $data['sub_district'] = $this->input->post('sub_district', TRUE);
        $data['district'] = $this->input->post('district', TRUE);
        $data['division'] = $this->input->post('division', TRUE);
        $data['country'] = $this->input->post('country', TRUE);
        $data['zip_code'] = $this->input->post('zip_code', TRUE);

        $stu_id = $this->stu_model->seclct_std_id($id);

        if (!$stu_id) {
            //echo 'New Id <br/>';
            $datap['reg_id'] = $this->stu_model->save_registation($data);
            $this->stu_model->select_all_reg_add_save_reg($datap);
//            echo 'Save Student Information Successfully';
            $sdata['message'] = 'Save Student Information Successfully.';
            $this->session->set_userdata($sdata);
            redirect('student_info/student_reg');
        } else {
//            echo 'This ID Already Exit.';
            $sdata['message'] = 'This ID Already Exit.';
            $this->session->set_userdata($sdata);
            redirect('student_info/student_reg');
        }
//        $datap['reg_id']=$this->stu_model->save_registation($data);
//        $this->stu_model->select_all_reg_add_save_reg($datap);
//        $sdata = array();
//        $sdata['message'] = 'Save Student Information Successfully';
//        $this->session->set_userdata($sdata);
//        redirect('student_info/student_reg');
    }

    public function stu_registration_view() {
        $data = array();
        $data['title'] = 'view_registration';
        $data['show'] = '2';
        $data['show_stu_reg'] = ' ';

        $data['option'] = $this->sa_model->select_option();
        $data['year'] = $year = $this->input->post('year', TRUE);
        $data['class'] = $class = $this->input->post('class', TRUE);
        $data['group_r'] = $group_r = $this->input->post('group_r', TRUE);
        $data['section'] = $section = $this->input->post('section', TRUE);

        $data['user_power'] = $this->session->userdata('user_power');


        $data['all_reg'] = $this->stu_model->select_all_reg_search($group_r, $class, $section, $year);

        $data['maincontain'] = $this->load->view('admin/view_registation', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function reg_delete($reg_id) {
        $this->stu_model->delete_registration_reg_id($reg_id);
        //echo '----------' . $category_id;
        $sdata = array();
        $sdata['message'] = 'Delete Record Successfully';
        $this->session->set_userdata($sdata);

        redirect('student_info/student_view');
    }

    public function reg_edit($reg_id) {
        $data = array();
        $data['title'] = 'view_registration';
        $data['show'] = '2';
        $data['reg_info'] = $this->stu_model->select_reg_info_by_reg_id($reg_id);
        $data['maincontain'] = $this->load->view('admin/edit_reg_form', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function reg_update() {
        $data = array();
        
            /* --------file--------------- */
            $config['upload_path'] = 'images/upload/students/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $this->input->post('id', TRUE);
            $config['max_size'] = '3000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';

            $error = array();
            $fdata = array();
            $this->load->library('upload', $config);
            $photo="";
//        $photo = $this->input->post('photo', TRUE);
//        echo '<pre>';
//        print_r($_POST);
//        exit();
        
            if (!$this->upload->do_upload('photo')) {
                $error['erroraaa'] = $this->upload->display_errors();
                $this->session->set_userdata($error);
            } else {
                $fdata = $this->upload->data();
                $photo = $config['upload_path'] . $fdata['file_name'];
            }
            if (!empty($photo)) {
                $data['photo'] = $photo;
        }
            /* ---------------------------- */
        $reg_id = $this->input->post('reg_id', TRUE);
        $data['id'] = $this->input->post('id', TRUE);
        $data['name'] = $this->input->post('name', TRUE);
        $data['stu_phone'] = $this->input->post('stu_phone', TRUE);
        $data['father_name'] = $this->input->post('father_name', TRUE);
        $data['job_category'] = $this->input->post('job_category', TRUE);
        $data['mother_name'] = $this->input->post('mother_name', TRUE);
//        $data['birth_bate'] = $this->input->post('birth_bate', TRUE);
//        $data['join_date'] = $this->input->post('join_date', TRUE);
        $data['birth_bate'] = date("Y-m-d", strtotime($this->input->post('birth_bate', TRUE)));
        $data['join_date'] = date("Y-m-d", strtotime($this->input->post('join_date', TRUE)));
        $data['id'] = $this->input->post('id', TRUE);
        //$data['photo'] = $this->input->post('photo', TRUE);
        $data['gender'] = $this->input->post('gender', TRUE);
        $data['marital_status'] = $this->input->post('marital_status', TRUE);
        $data['blood_group'] = $this->input->post('blood_group', TRUE);
        $data['person_type'] = $this->input->post('person_type', TRUE);
        $data['religion'] = $this->input->post('religion', TRUE);
        $data['nationality'] = $this->input->post('nationality', TRUE);
        $data['national_id'] = $this->input->post('national_id', TRUE);
        $data['mobile_number'] = $this->input->post('mobile_number', TRUE);
        $data['email'] = $this->input->post('email', TRUE);
        $data['village'] = $this->input->post('village', TRUE);
        $data['post'] = $this->input->post('post', TRUE);
        $data['sub_district'] = $this->input->post('sub_district', TRUE);
        $data['district'] = $this->input->post('district', TRUE);
        $data['division'] = $this->input->post('division', TRUE);
        $data['country'] = $this->input->post('country', TRUE);
        $data['zip_code'] = $this->input->post('zip_code', TRUE);

        $this->sa_model->update_stu_reg_info($data, $reg_id);

        $sdata = array();
        $sdata['message'] = 'Update Category Successfully';
        $this->session->set_userdata($sdata);

        redirect('student_info/student_view/');
//        redirect('student_info/reg_edit/' . $reg_id);
    }

    public function stu_reg_xls() {
        $data = array();
        $data['option'] = $this->sa_model->select_option();
        $data['title'] = 'student_registration_input_by_excel';
        $data['show'] = '2';
        $data['input_gallery'] = ' ';
        $data['maincontain'] = $this->load->view('admin/stu_xls_input', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    public function stu_reg_save_xls() {
        $data = array();
        $config = array();
        $sdata = array();
        $stu_cun = 0;
        echo $filename = $_FILES["xls_file"]["tmp_name"];
        echo $size_all = $_FILES["xls_file"]["size"];
//            $data['save_all'] = $this->stu_model->stu_xls_save($filename,$size_all);
        if ($size_all > 0) {
            $file = fopen($filename, "r");
            while (($emapData = fgetcsv($file, 70000, ",")) !== FALSE) {
            $stu_cun = $stu_cun + 1;
                $data = array(
                    'id' => $emapData[0],
                    'name' => $emapData[1],
                    'roll' => $emapData[2],
                    'class' => $emapData[3],
                    'section' => $emapData[4],
                    'group_r' => $emapData[5],
                    'year' => $emapData[6],
                    'father_name' => $emapData[7],
                    'mother_name' => $emapData[8],
                    'gender' => $emapData[9],
                    'religion' => $emapData[10],
                    'mobile_number' => "0".$emapData[11],
                    'stu_phone' => "0".$emapData[12],
                    'village' => $emapData[13],
                    'post' => $emapData[14],
                    'sub_district' => $emapData[15],
                    'district' => $emapData[16],
                    'division' => $emapData[17],
                    'country' => $emapData[18],
                    'zip_code' => $emapData[19]
                );
                $datap = array(
                    'roll' => $emapData[2],
                    'class' => $emapData[3],
                    'section' => $emapData[4],
                    'group_r' => $emapData[5],
                    'year' => $emapData[6]
                );
                if ($stu_cun != 1) {
                    $datap['reg_id'] = $this->stu_model->save_registation($data);
                    $this->stu_model->select_all_reg_add_save_reg($datap);
//                    echo 'Save Student Information Successfully';
//                    if (!$datap['reg_id']) {
//                        echo "Invalid File:Please Upload CSV File.";
//                    }
                    $sdata['message'] = 'Save Student Information Successfully';
                }
            }
            fclose($file);
//            echo "<br/>CSV File has been successfully Imported.";
        }
//        echo '<pre>';
//        print_r($data);
//        print_r($datap);
//        exit();
        $this->session->set_userdata($sdata);
        redirect('student_info/stu_reg_xls');
    }

}
