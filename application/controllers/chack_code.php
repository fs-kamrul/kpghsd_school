<?php

class chack_code extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('chack_model', 'ch_m', TRUE);

    }

    public function connect_page() {
        $pass1 = "a";
        $pass2 = "k";
        $start_date=$end_date=$s_m=$s_y=$s_d=$e_m=$e_y=$e_d="";
        $net_aveleble = $this->ch_m->is_connected();
//        echo $net_aveleble;

        $myfile = fopen("vendors/wysiwyg/anik.txt", "r"); // or die("Unable to open file!");
//        $text_a = file("anik.txt");
        if (!$myfile) {
            echo 'File not found.';
            if ($net_aveleble == 1) {
                $postdata = http_build_query(
                        array(
                            'v1' => 'abc12345678',
                            'v2' => 'aaa'
                        )
                );
                $opts = array('http' =>
                    array(
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $postdata
                    )
                );
                $context = stream_context_create($opts);
                $url = file_get_contents('http://localhost/in_test/funtion_read_1.php', false, $context);

                $t = json_decode($url);
//        $t2=$this->ch_m->endode_r($t);
                echo '<pre>';
                print_r($t);

                $myfile11 = fopen("vendors/wysiwyg/anik.txt", "w") or die("Unable to open file!");
                if ($myfile11 == TRUE) {
                    fwrite($myfile11, $t);
                    fclose($myfile11);
                    echo '<br/><h1>File Creade successfull Open</h1>';
                } else {
                    echo 'File Creade Unsuccessfull Fail';
                }
            } else {
                echo '<h1>Pleace Check Your Internet Connection</h1>';
            }
        } else {
            $text_a = fgets($myfile);
            echo '<pre>';
            print_r($text_a);
            echo '<br/>';
            fclose($myfile);
            $char[] = str_split($text_a);
//        print_r($char);
            foreach ($char[0] as $key => $value) {
                echo "$key>$value,";
                if ($key > 14 && $key <= 25) {
                    $pass1 .= $value;
                    $pass2="a";
                }
                if ($key > 60 && $key <= 71) {
                    $pass2 .= $value;
                }elseif ($key > 40 && $key <= 42) {
                    $s_d .= $value;
                }elseif ($key > 43 && $key <= 45) {
                    $s_m .= $value;
                }elseif ($key > 46 && $key <= 50) {
                    $s_y .= $value;
                }elseif ($key > 50 && $key <= 52) {
                    $e_d .= $value;
                }elseif ($key > 53 && $key <= 55) {
                    $e_m .= $value;
                }elseif ($key > 56 && $key <= 60) {
                    $e_y .= $value;
                }
            }
            $start_date=$s_d."-".$s_m."-".$s_y;
            $end_date=$e_d."-".$e_m."-".$e_y;
            $pc_d=  "14";//date("d");
            $pc_m=  "02";//date("m");
            $pc_y=  "2017";//date("Y");
            $pc_date=$pc_d."-".$pc_m."-".$pc_y;
//            $st = date("d-m-Y", strtotime($start_date));
                echo "<br/>$pass1=>$pass2 <h3>"
                        . "st_date: $start_date</h3> "
                        . "<h3>en_date: $end_date</h3><h3>"
                        . "pc_date: $pc_date<h3>";
            if ($pass1 == $pass2 && $pc_y == $s_y && $pc_y <= $e_y) {
                if ($pc_m >= $s_m && $pc_d >= $s_d) { // && $pc_m == $s_m && $pc_y == $s_y
                    echo "<br/>|ok1| connect=>$net_aveleble <br/>";
                }else {
                    echo '<br/>error1 connect=>' . $net_aveleble;
                }
//            }elseif ($pass1 == $pass2 && $pc_y > $e_y && $pc_y >= $s_y) {
//                echo "<br/>|ok5| connect=>$net_aveleble <br/>";
            }elseif ($pass1 == $pass2 && $pc_y > $s_y && $pc_y <= $e_y) {
                if ($pc_m < $e_m) { // && $pc_m == $s_m && $pc_y == $s_y
                    echo "<br/>|ok2| connect=>$net_aveleble <br/>";
                }elseif ($pc_m == $e_m) { // && $pc_m == $s_m && $pc_y == $s_y
                    if($pc_d <= $e_d){
                        echo "<br/>|ok3| connect=>$net_aveleble <br/>";
                    }else {
                        echo '<br/>error4 connect=>' . $net_aveleble;
                    }
                }else {
                    echo '<br/>error2 connect=>' . $net_aveleble;
                }
            }else {
                echo '<br/>error3 connect=>' . $net_aveleble;
            }
        }
    }

}
