<?php
require_once APPPATH . 'libraries/tcpdf/tcpdf.php';
//require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

class Pdf
{
    public function __construct() {
        // Constructor
    }

    public function create_pdf() {
        return new TCPDF();
    }

}
