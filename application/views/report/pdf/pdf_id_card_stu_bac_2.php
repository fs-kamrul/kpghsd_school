<?php
//require ('fpdf/fpdf.php');
//echo '<pre>';
//print_r($main_a);
//exit();
$pdf = new FPDF('P', 'mm', 'A4');
//$pdf->FPDFA('P', 'mm', 'A4');
//$pdf->Open();
$pdf->AddPage();
$h = 56;$th = 5;$em = 16;$def = 190;$hef = 52;
$y = 3;$x = 144.5;$i = 0;$j = 0;$k=0;
$sx=146;$sy=7;$sz=48;
$bcx=145;$bcy=25;$bcz=51;
$lineHeight = 3.5;
$pdf->SetFont('Arial', 'I', 11);

//echo '<pre>';
//print_r($res);
//exit();
foreach ($main_a as $key => $value) {
    $i++;$j++;$k++;
    if($j==10){
        $pdf->AddPage();
        $j=1;$y = 3;$x = 144.5;
        $sx=146;$sy=7;//$sz=28;
        $bcx=145;$bcy=25;
    }
    $pdf->SetFillColor(32,118,196);
//    $pdf->Image('pictures/students/Roll-04.jpg', $sx, $sy, $sz);
    $picture_file = $value->photo;
//    if(!file_exists($picture_file)){
//        $pdf->Image('images/1.jpg',$sx, $sy, $sz);
//    }else{
//        $pdf->Image($picture_file,$sx, $sy, $sz);
//    }
    if(file_exists('images/pdf/pdf_header2.png')){
        $pdf->Image('images/pdf/pdf_header2.png', $sx, $sy, $sz);
    }
    $pdf->Image('images/pdf/backCondition.png', $bcx, $bcy, $bcz );
    $pdf->SetFont('Arial', 'B', 7);
        $pdf->SetXY($x, $y);
    $pdf->Cell($hef, $th, ' ',0, 1, 'C');
//        $pdf->SetX($x);
//    $pdf->Cell($hef,$th," Mobile : $value->mobile_number",0,1,'L');

        $pdf->SetX($x);
    $pdf->Cell($hef,47.5,"",0,1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell($hef,$lineHeight,"Contact Us",0,1,'C');

        $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 7);
    $pdf->SetTextColor(85, 85, 85);
    $pdf->Cell($hef, $lineHeight,  "EIIN: " . $academy_info->s_code,0, 1, 'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell($hef,$lineHeight,"Phone: $academy_info->phone_number",0,1,'C');

        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell($hef,$lineHeight,"Email: $academy_info->email",0,1,'C');
        $pdf->SetX($x);
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->Cell($hef,$lineHeight,"Website: $academy_info->site_url",0,1,'C');
        $pdf->SetX($x);
    $pdf->Cell($hef,$th,"",0,1,'C');
        $pdf->SetX($x);
    $pdf->Cell($hef, $th, "",0, 1, 'C',1);
        $pdf->SetX($x);
    $pdf->Cell($hef, $th+1, "",0, 1, 'C');

    if ($k==1) {
        $x = $x-65.5;//143;//$x+65;
        $sx=$sx-65;
        $bcx=$bcx-65;
    }elseif ($k==2) {
        $x = $x-65.5;
        $sx=$sx-65;
        $bcx=$bcx-65;
    }elseif($k==3){
        $k=0;
        $y=$y+92;$x = 144.5;
        $sy+=92;$sx=146;
        $bcy+=92;$bcx=145;
    }
}
$pdf->Output();
