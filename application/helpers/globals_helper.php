<?php
if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }
}
if ( ! function_exists('formatPhoneNumber')){
    function formatPhoneNumber($phoneNumber) {
        // Remove any non-numeric characters
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Check if the number starts with "88" or "+88"
        if (substr($phoneNumber, 0, 2) === "88") {
            $formattedNumber = "+$phoneNumber";
        } elseif (substr($phoneNumber, 0, 3) === "+880") {
            $formattedNumber = $phoneNumber;
        } else {
            $formattedNumber = "+88$phoneNumber";
        }

        return $formattedNumber;
    }
}
if ( ! function_exists('kamrul_site_info'))
{
    function kamrul_site_info($name = 's_name')
    {
        $CI = get_instance();
//        $CI->load->model('setting_model');
        $result = $CI->setting_model->select_info();
        if($name == 'favicon' || $name == 'logo'){
            return base_url() . $result->$name;
        }else{
            return $result->$name;
        }
    }
}
if ( ! function_exists('kamrul_student_info'))
{
    function kamrul_student_info($name = 'name')
    {
        $CI = get_instance();
        $id = $CI->session->userdata('student_id');
//        return $id;
        if($id == ''){
            return null;
        }else{
            $result = $CI->setting_model->student_info_select($id);
            return $result->$name;
        }
    }
}