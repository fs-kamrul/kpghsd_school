<?php

class Db_Connect {
    //put your code here
    public function __construct() {
        $hostname="localhost";
        $username="root";
        $password="";
        $dbname="school_manesment";
        
        $conn=  mysql_connect($hostname, $username, $password);
        if(!$conn){
            die("Database Not connect : ". mysql_error());
        }
        //echo "Database Server Connect";
        mysql_select_db($dbname);
    }
}
