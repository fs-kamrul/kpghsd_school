<?php

//    require('fpdf/fpdf.php');
//require ('fpdf/fpdf.php');
//require_once ('phplib/db.php') ;
//echo '<pre>';
//print_r($action);
//10,66,122,avarage 56

$pdf = new FPDF('P', 'mm', 'A4');
//$pdf = new FPDF();
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
$h = 56;$th = 7;$em = 12.5;$def = 190;
$hef = 67;$y = 10;$x = 4;
$i = 0;$k=0;$j = 0;

$pdf->SetFont('Arial', 'B', 12);

//$main_a=array('0' => 0, '1' => 1, '1' => 1, '2' => 2, '3' => 3
//, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10
//, '11' => 11, '12' => 12, '13' => 13
//, '14' => 14, '15' => 15, '16' => 16, '17' => 17, '18' => 18, '19' => 19, '20' => 20);
foreach ($main_a as $value) {
    $i++;$j++;$k++;
    if($j==13){
        $pdf->AddPage();
        $j=1;$x = 4;
        $y = 10;
    }
        $pdf->SetXY($x, $y);
    $pdf->Cell($hef, $em, "ID: $value->id",'LTR', 1, 'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell($hef,$th,"Class: $value->class",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 22);
    $pdf->Cell($hef,$th,"Roll: $value->roll",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell($hef,$th,"$value->name",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell($hef,$th,"Section: $value->section",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th,"Group: $value->group_r",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->Cell($hef, $em, ' ','LRB', 1, 'C');
    if ($k==1) {
        $x = 71;
    }elseif ($k==2) {
        $x = 138;
    }elseif($k==3){
        $k=0;
        ;$x = 4;
        $y=$y+60;
    }
}
$pdf->Output();
