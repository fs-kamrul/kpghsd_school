<?php

class chack_model extends CI_Model {

    public function endode_r($fdata) {
        $ps = array();
        $ps = $fdata;
        $str = "@ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $b = strlen($str);
        $a = strlen($ps);
        $sum = "";
        for ($i = 0; $i < $a; $i++) {
            $k = strpos($str, $ps[$i]);
            $c = $k + $a;
            if ($k == 0) {
                $sum = $sum . $ps[$i];
            } else {
                if ($b <= $c) {
                    $c = ($c - $b) + 1;
                }
                $sum = $sum . $str[$c];
            }
        }
        $sum = substr($sum, 1, $a - 1) . $sum[0];
        $sk = $sum;
        return $sk;
    }

    public function is_connected() {
        $connected = @fsockopen("www.google.com", 80);
        //website, port  (try 80 or 443)
        if ($connected) {
            $is_conn = 1; //action when connected
            fclose($connected);
        } else {
            $is_conn = 0; //action in connection failure
        }
        return $is_conn;
    }

}
