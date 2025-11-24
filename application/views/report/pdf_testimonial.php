<?php


$pdf = new FPDF('L', 'mm', 'A4');
//$pdf->FPDFA('L', 'mm', 'A4');
		$h=7; $th=100;$the=180;$t=25;$tk=83;
foreach ($main_a as $key => $value) {
$pdf->AddPage();
$pdf->Image('images/im_pdf/school_logo1.jpg',110,10,183,195);
$pdf->Image('images/im_pdf/school_logo0.jpg',0,10,110,195);
//$pdf->Image('images/im_pdf/a.jpg',150,80,100);
$pdf->Image('images/im_pdf/dot.png',170,75,113);
$pdf->Image('images/im_pdf/dot1.png',127,81,70);
$pdf->Image('images/im_pdf/dot1.png',207,81,72);
$pdf->Image('images/im_pdf/dot2.png',133,88,28);
$pdf->Image('images/im_pdf/dot2.png',170,88,29);
$pdf->Image('images/im_pdf/dot2.png',216,88,29);
$pdf->Image('images/im_pdf/dot2.png',258,88,27);
$pdf->Image('images/im_pdf/dot2.png',188,101,35);
$pdf->Image('images/im_pdf/dot2.png',123,109,30);
$pdf->Image('images/im_pdf/dot2.png',203,109,29);
$pdf->Image('images/im_pdf/dot2.png',257,109,29);
$pdf->Image('images/im_pdf/dot2.png',154,116,28);

$pdf->Image('images/im_pdf/dot1.png',120,124,40);
$pdf->Image('images/im_pdf/dot1.png',198,124,37);
$pdf->Image('images/im_pdf/dot1.png',250,124,35);

//$pdf->Image('images/im_pdf/dot.png',154,91,126);
//$pdf->Image('images/im_pdf/dot1.png',140,98,60);
//$pdf->Image('images/im_pdf/dot1.png',140,105,60);
//$pdf->Image('images/im_pdf/dot1.png',225,98,55);
//$pdf->Image('images/im_pdf/dot1.png',215,105,65);
////..................
//$pdf->Image('images/im_pdf/dot2.png',120,126,20);
//$pdf->Image('images/im_pdf/dot2.png',173,125,27);
//$pdf->Image('images/im_pdf/dot2.png',245,125,35);
////..................
//$pdf->Image('images/im_pdf/dot2.png',160,132,30);
//$pdf->Image('images/im_pdf/dot2.png',218,133,25);
//$pdf->Image('images/im_pdf/dot2.png',247,132,33);
////..................
//$pdf->Image('images/im_pdf/dot2.png',180,139,35);

    $picture_file = $academy_info->logo;
    if(!file_exists($picture_file)){
        $pdf->Image('images/im_pdf/logo.png',185,41,30);
    }else{
        $pdf->Image("$picture_file",114,15,25);
        $pdf->Image("$picture_file",6,15,25);
    }
//$pdf->Image('images/im_pdf/logo.png',185,41,30);
$pdf->Image('images/im_pdf/sing_head.png',210,171,65);
$pdf->Image('images/im_pdf/sing_stu.png',20,190,50);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($th, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', 18);
$pdf->Cell($the, 8, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);
$pdf->Cell($th-20, 8, '', 0, 0, 'C');
$pdf->Cell($th-80, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 17);
    $text = 'KHANSAMA PILOT GIRLS’ HIGH SCHOOL';
    $text = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $text);
$pdf->Cell($the, 8, $text, 0, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell($th, 6, '', 0, 0, 'C');
    $pdf->Cell($the, 6, '(Established-1979)', 0, 1, 'C');
    $pdf->Cell($th, 6, '', 0, 0, 'C');
    $pdf->Cell($the, 6, 'P.O. KHANSAMA, P.S. KHANSAMA, DIST. DINAJPUR.', 0, 1, 'C');
    $pdf->ln(5);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell($t, 6, 'S.L No. ', 0, 0, 'r');
    $pdf->Cell($tk, 6, $value->year . '/'.$value->roll, 0, 0, 'r');
    $pdf->Cell($the, 6, 'S.L No. ' . $value->year . '/'.$value->roll, 0, 1, 'r');

    $pdf->Cell($t, 6, 'Date ', 0, 0, 'r');
    $pdf->Cell($tk, 6, date('d/m/Y'), 0, 0, 'r');
    $pdf->Cell($the, 6, '', 0, 1, 'r');


//$pdf->SetFont('Arial', '', 12);
//$pdf->Cell($th-20, 8, $academy_info->s_name, 0, 0, 'C');
//$pdf->Cell($th-80, 8, '', 0, 0, 'C');
//$pdf->SetFont('Arial', '', 18);
//$pdf->SetTextColor(200,20,20);
//$pdf->Cell($the, 8, $academy_info->s_name, 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell($th-20, 8, 'TESTIMONIAL', 0, 0, 'C');
$pdf->Cell($th-80, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 26);
$pdf->Cell($the, 8, 'TESTIMONIAL', 0, 0, 'C');
$pdf->Cell($the, 8, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
//$pdf->Cell($t, 8, 'Serial No:', 0, 0, 'r');
//$pdf->Cell($tk, 8, '', 0, 1, 'r');

$pdf->Cell($t, 8, 'Name: ', 0, 0, 'r');
$pdf->Cell($tk, 8, $value->name, 0, 1, 'r');
$pdf->Cell($t, 8, 'Father: ',0, 0, 'r');
$pdf->Cell($tk+10, 8, $value->father_name,0, 0, 'r');
    $pdf->Cell(40, $h, 'This is to certify that '.'', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(120, $h, $value->name, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
$pdf->Cell($t, 8, 'Mother: ', 0, 0, 'r');
$pdf->Cell($tk, 8, $value->mother_name, 0, 0, 'r');
    $pdf->Cell(10, $h, 'D/O', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(70, $h, $value->father_name, 0, 0, 'l');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(10, $h, 'and', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(70, $h, $value->mother_name, 0, 0, 'l');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(10, $h, 'of', 0, 1, 'r');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($t, $h, 'Village: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->village, 0, 0, 'r');
    $pdf->Cell(15, $h, 'Village:', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(28, $h, $value->village, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(9, $h, 'P.O', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(29, $h, $value->post, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(16, $h, 'Upozilla:', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(29, $h, $value->sub_district, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(15, $h, 'District:', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(29, $h, $value->district, 0, 1, 'C');
//$pdf->Cell(60, $h, 'This is to certify that '.'', 0, 0, 'r');
    $pdf->SetFont('Arial', '', 12);
$pdf->Cell($t, $h, 'Post office: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->post, 0, 0, 'r');
    $pdf->Cell($the, $h, 'appeared at the S.S.C. Examination of the Board of Intermediate & Secondary Education,', 0, 1, 'r');
//$pdf->Cell(70, $h, 'Son/Daughter of', 0, 0, 'r');
//$pdf->Cell(90, $h, $value->father_name, 0, 1, 'l');
$pdf->Cell($t, $h, 'Upazilla:', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->sub_district, 0, 0, 'r');
    $pdf->Cell(72, $h, 'Dinajpur bearing Roll Khansama, No ', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(32, $h, $value->roll_g, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(72, $h, 'and passed the said examination', 0, 1, 'r');
//$pdf->Cell(70, $h, 'Mother\'s Name:', 0, 0, 'r');
//$pdf->Cell(90, $h, $value->mother_name, 0, 1, 'l');
$pdf->Cell($t, $h, 'District: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->district, 0, 0, 'r');
    $pdf->Cell(8, $h, '(in', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, $h, $value->group_r, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(55, $h, 'group) held in the month of', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, $h, $value->month_g, 0, 0, 'C'); //////// month
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(30, $h, 'in the year of', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, $h, $value->year, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
//$pdf->Cell(20, $h, 'of Village:', 0, 0, 'r');
//$pdf->Cell(60, $h, $value->village, 0, 0, 'C');
//$pdf->Cell(25, $h, 'Post office:', 0, 0, 'r');
//$pdf->Cell(55, $h, $value->post, 0, 1, 'C');
$pdf->Cell($t, $h, 'G.P.A: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->gpa_g, 0, 0, 'r');
    $pdf->Cell(38, $h, 'She secured GPA', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, $h, $value->gpa_g, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(110, $h, 'According to the Admission Register her date of birth is', 0, 1, 'r');
//$pdf->Cell(20, $h, 'Upozilla:', 0, 0, 'r');
//$pdf->Cell(60, $h, $value->sub_district, 0, 0, 'C');
//$pdf->Cell(20, $h, 'District:', 0, 0, 'r');
//$pdf->Cell(60, $h, $value->district, 0, 1, 'C');
$pdf->Cell($t, $h, 'Roll: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->roll_g, 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, $h, date('d/m/Y', strtotime($value->birth_bate)), 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, $h, 'and Registration No.', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, $h, $value->reg_no, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(25, $h, 'Session', 0, 0, 'r');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, $h, $value->year_g, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
//$pdf->Cell($the, $h, 'appeared at the Higher Secondary Certificate  Examination from this institution under', 0, 1, 'r');
$pdf->Cell($t, $h, 'Reg No: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->reg_no, 0, 0, 'r');
$pdf->Cell($the, $h, '', 0, 1, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('group') . ': ', 0, 0, 'r');
$pdf->Cell($tk+10, $h, $value->group_r, 0, 0, 'r');
    $pdf->Cell(160, $h, 'To the best of my knowledge she did not take part in any activity subversive of the', 0, 1, 'r');
//$pdf->Cell(20, $h, $value->year_g, 0, 0, 'C');
//$pdf->Cell(32, $h, ' Obtained G.P.A ', 0, 0, 'C');
//$pdf->Cell(32, $h, $value->gpa_g, 0, 0, 'C');
//$pdf->Cell(40, $h, 'His/Her Roll No. was ', 0, 0, 'C');
//$pdf->Cell(36, $h, $value->roll_g, 0, 1, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('year') . ': ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->year, 0, 0, 'r');
    $pdf->Cell(160, $h, 'state or of discipline during her study in this Institution.', 0, 1, 'r');
//$pdf->Cell(38, $h, 'and Registration No', 0, 0, 'r');
//$pdf->Cell(32, $h, $value->reg_no, 0, 0, 'C');
//$pdf->Cell(27, $h, 'of the session', 0, 0, 'r');
//$pdf->Cell(25, $h, $value->year, 0, 0, 'C');
//$pdf->Cell(5, $h, 'in', 0, 0, 'r');
//$pdf->Cell(33, $h, $value->group_r, 0, 1, 'C');
$pdf->Cell($t, $h, $this->lang->line('session'), 0, 0, 'r');
$pdf->Cell($tk, $h, $value->year_g, 0, 0, 'r');
    $pdf->Cell($the, $h, '', 0, 1, 'r');
$pdf->Cell($t, $h, 'Date of Birth: ', 0, 0, 'r');
$pdf->Cell($tk, $h, date('d/m/Y', strtotime($value->birth_bate)), 0, 0, 'r');
    $pdf->Cell($the, $h, 'I wish her every success in life.', 0, 1, 'r');
$pdf->Cell($t, $h, 'Mobile No:', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->mobile_number, 0, 0, 'r');
$pdf->Cell($the, $h, '', 0, 1, 'r');
$pdf->Cell($t+10, $h, '', 0, 0, 'r');
$pdf->Cell($tk+10, $h, '', 0, 0, 'r');
    $pdf->Cell($the, $h, '', 0, 1, 'r');
$pdf->Cell($t, $h, '',0,0,'C');
$pdf->Cell($tk, $h, '',0,0,'C');
if($value->date_g) {
    $pdf->Cell($the, $h, 'Date - ' . date('d/m/Y', strtotime($value->date_g)), 0, 1, 'r');
}else{
    $pdf->Cell($the, $h, 'Date - ' . date('d/m/Y'), 0, 1, 'r');
}
//$pdf->Cell($t, $h, '2',1,0,'C');
//$pdf->Cell($tk, $h, '1',0,0,'C');
//$pdf->Cell($th, $h, 'Dated: Nilphamari,', 0, 1, 'r');
//$pdf->Cell($t, $h, '',0,0,'C');
//$pdf->Cell($tk, $h, '',0,0,'C');
//$pdf->Cell($th, $h, 'The........................................', 0, 1, 'r');
}


$pdf->Output();

?>