<?php
//require ('fpdf/fpdf.php');
//require_once ('phplib/db.php') ;
//echo '<pre>';
//print_r($main_a);
//exit();

$pdf = new FPDF('P', 'mm', 'A4');
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
$h = 56;$th = 5;$em = 16;$def = 190;$hef = 52;
$y = 3;$x = 144.4;$i = 0;$j = 0;$k=0;
$sx=153;$sy=18;$sz=34;
$pdf->SetFont('Arial', 'I', 11);
//$main_a=array('0' => 0, '1' => 1, '1' => 1, '2' => 2, '3' => 3
//, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10);

foreach ($main_a as $key => $value) {
    $i++;$j++;$k++;
    if($j==10){
        $pdf->AddPage();
        $j=1;$y = 3;$x = 144.5;
        $sx=153;$sy=18;//$sz=28;
    }
    $pdf->SetFillColor(32,118,196);
//    $pdf->Image('pictures/students/Roll-04.jpg', $sx, $sy, $sz);
    $picture_file = $value->photo;
//    if(empty($picture_file)){
    if(!file_exists($picture_file)){
			$pdf->Image('images/1.jpg',$sx, $sy, $sz);
		}else{
			$pdf->Image($picture_file,$sx, $sy, $sz);
		}
    $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY($x, $y);
    $pdf->Cell($hef, $th, ' ',0, 1, 'C');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th," Mobile : $value->mobile_number",0,1,'L');
        $pdf->SetX($x);
    $pdf->Cell($hef,45,"",0,1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell($hef,$th,"Phone:$academy_info->phone_number",0,1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell($hef,$th,"E-mail:$academy_info->email",0,1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell($hef,$th,"Website:$academy_info->site_url",0,1,'C');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th,"",0,1,'C');
        $pdf->SetX($x);
    $pdf->Cell($hef, $th, "",0, 1, 'C',1);
        $pdf->SetX($x);
    $pdf->Cell($hef, $th+1, "",0, 1, 'C');

    if ($k==1) {
        $x = $x-65.5;//143;//$x+65;
        $sx=$sx-65;
    }elseif ($k==2) {
        $x = $x-65.5;
        $sx=$sx-65;
    }elseif($k==3){
        $k=0;
        $y=$y+92;$x = 144.5;
        $sy+=92;$sx=153;
    }
}
$pdf->Output();
