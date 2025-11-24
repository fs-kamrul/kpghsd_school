<?php
require ('fpdf/fpdf.php');
//echo '<pre>';
//print_r($main_a);
//exit();
$pdf = new FPDF('P', 'mm', 'A4');
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
$main_a=array('0' => 0, '1' => 1, '1' => 1, '2' => 2, '3' => 3
, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10);
//$main_a[1]="a";
//$main_a[2]="a";
//$main_a[3]="a";
$h = 56;$th = 5;$em = 16;$def = 190;$hef = 55;
$y = 10;$x = 10;$i = 0;$j = 0;$k=0;
$px=30;$py=12;$pz=15;
$sx=28;$sy=41;$sz=22;
$lx=48;$ly=85;$lz=16;
$pdf->SetFont('Arial', 'I', 11);
foreach ($main_a as $key => $value) {
    $i++;$j++;$k++;
    if($j==10){
        $pdf->AddPage();
        $j=1;$y = 10;$x = 10;
        $px=30;$py=12;$pz=15;
        $sx=28;$sy=41;$sz=22;
        $lx=48;$ly=85;$lz=16;
    }
    $pdf->SetFillColor(200,220,255);
    $pdf->Image('pictures/images/logod.jpg', $px, $py, $pz);
    $pdf->Image('pictures/images/1.jpg', $sx, $sy, $sz);
    $pdf->Image('pictures/images/principal.jpg', $lx, $ly, $lz);
    $pdf->SetFont('Arial', 'I', 11);
        $pdf->SetXY($x, $y);
    $pdf->Cell($hef, 20, ' ','LTR', 1, 'C');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th,"Collectorate Public College",'LR',1,'C',1);
        $pdf->SetX($x);
    $pdf->Cell($hef,$th,"Nilphamari",'LR',1,'C',1);
        $pdf->SetX($x);
    $pdf->Cell($hef,30,"",'LR',1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell($hef,$th," ID: $k",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th," Name",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell($hef,$th," Class: XI, Roll: 10, Ses: 2016-17",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell($hef,$th," Group  : ",'LR',1,'L');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell($hef, $th+1, " Validity : 31/12/2018",'LRB', 1, 'L');
    
    if ($k==1) {
        $x = 65;
        $px=85;$sx=82;//$sy=40;$sz=22;
        $lx=103;//$ly=85;$lz=16;$lx=48;
    }elseif ($k==2) {
        $x = 120;
        $px=140;$sx=136;$lx=158;//$sz=22;
    }elseif($k==3){
        $k=0;
        $y=$y+86;$x = 10;
        $px=30;$py+=86;$sy+=86;$sx=28;$lx=48;$ly+=86;
    }
}
$pdf->Output();
