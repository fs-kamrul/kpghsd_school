<?php

$i=0;
$pdf = new FPDF();
$pdf->FPDFA('P','mm','A4');
		$h=6; $th=100;$the=180;$sit=190; $signature=192;
		$t=28;$tk=82; $io=0; $banner=1;$pic=9;
                $a1=13;$a2=120;$b1=90;$c1=165;
foreach ($main_a as $key => $value) {
if($io%2==0){
    $pdf->AddPage();
    $banner=1;$signature=192;
    $pic=9;$a1=13;$a2=120;$b1=90;$c1=165;
    $yy = 132;
}
$io++;
//$pdf->Image('testimonial/border.jpg',0,$banner,$signature);
//$pdf->Image('images/im_pdf/a5.jpg',$a1,$a2,30);
//$pdf->Image('images/im_pdf/a1.jpg',$b1,$a2,30);
//$pdf->Image('images/im_pdf/a1.jpg',$c1,$a2,30);
$picture_file = $value->photo;
if(!file_exists($picture_file)){
			$pdf->Image('images/im_pdf/default.jpg',175,$pic,25);
		}else{
			$pdf->Image($picture_file,175,$pic,25);
		}
//$pdf->Image('testimonial/rot.jpg',12,75,193);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell($sit, $h, $academy_info->s_name, 0, 1, 'C');
//$pdf->SetFont('Arial', '', 18);
//$pdf->Cell($sit, $h, $term.' '.$row[session1], 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($sit, $h, $term.' - '. $year, 0, 1, 'C');

$pdf->SetTextColor(200,20,20);
$pdf->Cell($sit, $h, 'Admit Card', 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($t, $h, 'Name: ', 0, 0, 'r');
$pdf->Cell(162, $h, $value->name, 0, 1, 'r');
$pdf->Cell($t, $h, 'Roll: ',0, 0, 'r');
$pdf->Cell($tk, $h, $value->roll,0, 0, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('student_id') . ': ', 0, 0, 'r');
$pdf->Cell(52, $h, $value->id, 0, 1, 'r');
$pdf->Cell($t, $h, $this->lang->line('class') . ': ',0, 0, 'r');
$pdf->Cell($tk, $h, $value->class,0, 0, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('group') . ': ', 0, 0, 'r');
$pdf->Cell(52, $h, $value->group_r, 0, 1, 'r');
$pdf->Cell($t, $h, '' .  $this->lang->line('section') . ': ',0, 0, 'r');
$pdf->Cell($tk, $h, $value->section,0, 0, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('session') . ': ', 0, 0, 'r');
$pdf->Cell(52, $h, $value->year, 0, 1, 'r');
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(200,220,255);
$pdf->Cell($sit, $h, 'Exam Routine For Session '.$year.', Time: '.$time[0].' '.$time[1].' to '.$time[2].' '.$time[3].'', 0, 1, 'C',1);
$pdf->SetFont('Arial','',11);
if ($typ==0) {                // Collage Admit Card
    $ex=38;
$pdf->Cell($ex, $h, 'DATE', 1, 0, 'r');
$pdf->Cell($ex, $h, 'DAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'SCIENCE', 1, 0, 'r');
$pdf->Cell($ex, $h, 'HUMANITIES', 1, 0, 'r');
$pdf->Cell($ex, $h, 'BUSINESS STUDIES', 1, 1, 'r');

$pdf->Cell($ex, $h, '26/11/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'SUNDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'BANGLA', 1, 0, 'r');
$pdf->Cell($ex, $h, 'BANGLA', 1, 0, 'r');
$pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');

$pdf->Cell($ex, $h, '28/11/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'TUESDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ENGLISH', 1, 1, 'r');

$pdf->Cell($ex, $h, '30/11/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'THURSDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ICT', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ICT', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ICT', 1, 1, 'r');

$pdf->Cell($ex, $h, '03/12/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'SUNDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'PHYSICS', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ECONOMICS ', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ECONOMICS', 1, 1, 'r');

$pdf->Cell($ex, $h, '05/12/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'TUESDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'CHEMISTRY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'LOGIC', 1, 0, 'r');
$pdf->Cell($ex, $h, 'ACCOUNTING', 1, 1, 'r');

$pdf->Cell($ex, $h, '07/12/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'THURSDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'BIOLOGY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'CIVICS', 1, 0, 'r');
$pdf->Cell($ex, $h, 'BUS. ORG. & MANG. ', 1, 1, 'r');

$pdf->Cell($ex, $h, '09/12/2017', 1, 0, 'r');
$pdf->Cell($ex, $h, 'SATURDAY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'MATHMETICS', 1, 0, 'r');
$pdf->Cell($ex, $h, 'IS. HISTORY', 1, 0, 'r');
$pdf->Cell($ex, $h, 'P. MANAGEMENT', 1, 1, 'r');
$pdf->Cell($sit, $h, '', 0, 1, 'L',1);
$pdf->Cell($sit, $h, '', 0, 1, 'L');
}  else {               // School Admit Card
    $pdf->SetFont('Arial','',11);
    $ex=47.5;
        $pdf->Cell($ex, $h, 'DATE          |       DAY', 1, 0, 'r');
        $pdf->Cell($ex, $h, 'SUBJECT', 1, 0, 'r');
        $pdf->Cell($ex, $h, 'DATE          |       DAY', 1, 0, 'r');
        $pdf->Cell($ex, $h, 'SUBJECT', 1, 1, 'r');
        $sub_i=$sub_j=0;
        foreach ($select_subject as $key_sub=>$sub) {
//            $sub_j++;
            $check_date = $this->p_model->check_exam_date_set($year,$class,$section,$group_r,$term,$sub->sub_id);
            if($check_date) {
                $sub_i++;
                $pdf->Cell($ex, $h, date("d/m/Y", strtotime($check_date->exam_date)) . '  |  ' . date('l', strtotime($check_date->exam_date)), 1, 0, 'r');
                if (($sub_i) % 2 != 0) {
                    $pdf->Cell($ex, $h, $sub->sub_name, 1, 0, 'r');
                } else {
                    $pdf->Cell($ex, $h, $sub->sub_name, 1, 1, 'r');
                }
            }
        }
    if (($sub_i) % 2 != 0) {
        $pdf->Cell($ex, $h, '', 1, 0, 'r');
        $pdf->Cell($ex, $h, '', 1, 1, 'r');
    }
//    $pdf->Ln($h);
//        $pdf->Cell($ex, $h, '02/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
//        $pdf->Cell($ex, $h, '02/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');
//
//        $pdf->Cell($ex, $h, '03/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
//        $pdf->Cell($ex, $h, '03/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');
//
//        $pdf->Cell($ex, $h, '04/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
//        $pdf->Cell($ex, $h, '04/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');
//
//        $pdf->Cell($ex, $h, '05/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
//        $pdf->Cell($ex, $h, '05/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');
//
//        $pdf->Cell($ex, $h, '06/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
//        $pdf->Cell($ex, $h, '06/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');
//
//        $pdf->Cell($ex, $h, '07/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'ENGLISH', 1, 0, 'r');
//        $pdf->Cell($ex, $h, '07/01/2017  |  SUNDAY', 1, 0, 'r');
//        $pdf->Cell($ex, $h, 'BANGLA', 1, 1, 'r');

        $pdf->Cell($sit, $h, '', 0, 1, 'L',1);
        $pdf->Cell($sit, $h, '', 0, 1, 'L');
}
//$pdf->Ln(14);
    $pdf->SetXY(10, $yy);
        $pdf->SetFont('Helvetica', 'I', 12);
        $pdf->Cell(63.33, 6, 'Exam Committee', 0, 0, 'L');
        $pdf->Cell(63.33, 6, 'Signature Of Class Teacher', 0, 0, 'C');
        $pdf->Cell(63.33, 6, 'Signature Of Principal', 0, 0, 'R');
$pdf->Ln(15);
$banner=149;
$signature=170;
$pic=144;$a2=257;
    $yy += 137;
}


$pdf->Output();

?>