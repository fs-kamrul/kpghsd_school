<?php


$pdf = new FPDF('L', 'mm', 'A4');
//$pdf->FPDFA('L', 'mm', 'A4');
		$h=7; $th=100;$the=180;$t=28;$tk=82;
foreach ($main_a as $key => $value) {
$pdf->AddPage();
$pdf->Image('images/im_pdf/school_logo1.jpg',110,10,180);
$pdf->Image('images/im_pdf/a.jpg',150,80,100);
$pdf->Image('images/im_pdf/dot.png',170,77,110);
$pdf->Image('images/im_pdf/dot.png',155,84,125);
$pdf->Image('images/im_pdf/dot.png',154,91,126);
$pdf->Image('images/im_pdf/dot1.png',140,98,60);
$pdf->Image('images/im_pdf/dot1.png',140,105,60);
$pdf->Image('images/im_pdf/dot1.png',225,98,55);
$pdf->Image('images/im_pdf/dot1.png',215,105,65);
//..................
$pdf->Image('images/im_pdf/dot2.png',120,126,20);
$pdf->Image('images/im_pdf/dot2.png',173,125,27);
$pdf->Image('images/im_pdf/dot2.png',245,125,35);
//..................
$pdf->Image('images/im_pdf/dot2.png',160,132,30);
$pdf->Image('images/im_pdf/dot2.png',218,133,25);
$pdf->Image('images/im_pdf/dot2.png',247,132,33);
//..................
$pdf->Image('images/im_pdf/dot2.png',180,139,35);

    $picture_file = $academy_info->logo;
    if(!file_exists($picture_file)){
        $pdf->Image('images/im_pdf/logo.png',185,41,30);
    }else{
        $pdf->Image("$picture_file",185,41,30);
    }
//$pdf->Image('images/im_pdf/logo.png',185,41,30);
$pdf->Image('images/im_pdf/signature1.jpg',210,175,65);
$pdf->Image('images/im_pdf/signature1.jpg',20,175,70);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($th, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', 18);
$pdf->Cell($the, 8, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);
$pdf->Cell($th-20, 8, 'OFFICE OF THE PRINCIPAL', 0, 0, 'C');
$pdf->Cell($th-80, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', 14);
$pdf->Cell($the, 8, 'OFFICE OF THE PRINCIPAL', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell($th-20, 8, $academy_info->s_name, 0, 0, 'C');
$pdf->Cell($th-80, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', 18);
$pdf->SetTextColor(200,20,20);
$pdf->Cell($the, 8, $academy_info->s_name, 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($th-20, 8, 'TESTIMONIAL', 0, 0, 'C');
$pdf->Cell($th-80, 8, '', 0, 0, 'C');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell($the, 8, 'TESTIMONIAL', 0, 0, 'C');
$pdf->Cell($the, 8, '', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($t, 8, 'Serial No:', 0, 0, 'r');
$pdf->Cell($tk, 8, '', 0, 1, 'r');
$pdf->Cell($t, 8, 'Name: ', 0, 0, 'r');
$pdf->Cell($tk, 8, $value->name, 0, 1, 'r');
$pdf->Cell($t, 8, 'Father: ',0, 0, 'r');
$pdf->Cell($tk, 8, $value->father_name,0, 1, 'r');
$pdf->Cell($t, 8, 'Mother: ', 0, 0, 'r');
$pdf->Cell($tk, 8, $value->mother_name, 0, 1, 'r');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell($t, $h, 'Village: ', 0, 0, 'r');
$pdf->Cell($tk+10, $h, $value->village, 0, 0, 'r');
$pdf->Cell(60, $h, 'This is to certify that '.'', 0, 0, 'r');
$pdf->Cell(90, $h, $value->name, 0, 1, 'l');
$pdf->Cell($t, $h, 'Post office: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->post, 0, 0, 'r');
$pdf->Cell(70, $h, 'Son/Daughter of', 0, 0, 'r');
$pdf->Cell(90, $h, $value->father_name, 0, 1, 'l');
$pdf->Cell($t, $h, 'Upazilla:', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->sub_district, 0, 0, 'r');
$pdf->Cell(70, $h, 'Mother\'s Name:', 0, 0, 'r');
$pdf->Cell(90, $h, $value->mother_name, 0, 1, 'l');
$pdf->Cell($t, $h, 'District: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->district, 0, 0, 'r');
$pdf->Cell(20, $h, 'of Village:', 0, 0, 'r');
$pdf->Cell(60, $h, $value->village, 0, 0, 'C');
$pdf->Cell(25, $h, 'Post office:', 0, 0, 'r');
$pdf->Cell(55, $h, $value->post, 0, 1, 'C');
$pdf->Cell($t, $h, 'G.P.A: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->gpa_g, 0, 0, 'r');
$pdf->Cell(20, $h, 'Upozilla:', 0, 0, 'r');
$pdf->Cell(60, $h, $value->sub_district, 0, 0, 'C');
$pdf->Cell(20, $h, 'District:', 0, 0, 'r');
$pdf->Cell(60, $h, $value->district, 0, 1, 'C');
$pdf->Cell($t, $h, 'Roll: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->roll_g, 0, 0, 'r');
$pdf->Cell($the, $h, 'appeared at the Higher Secondary Certificate  Examination from this institution under', 0, 1, 'r');
$pdf->Cell($t, $h, 'Reg No: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->reg_no, 0, 0, 'r');
$pdf->Cell($the, $h, 'the  Secondary  and  Higher  Secondary  Education  Board, Dinajpur, held in the year', 0, 1, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('group') . ': ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->group_r, 0, 0, 'r');
$pdf->Cell(20, $h, $value->year_g, 0, 0, 'C');
$pdf->Cell(32, $h, ' Obtained G.P.A ', 0, 0, 'C');
$pdf->Cell(32, $h, $value->gpa_g, 0, 0, 'C');
$pdf->Cell(40, $h, 'His/Her Roll No. was ', 0, 0, 'C');
$pdf->Cell(36, $h, $value->roll_g, 0, 1, 'r');
$pdf->Cell($t, $h, '' . $this->lang->line('session') . ': ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->year, 0, 0, 'r');
$pdf->Cell(38, $h, 'and Registration No', 0, 0, 'r');
$pdf->Cell(32, $h, $value->reg_no, 0, 0, 'C');
$pdf->Cell(27, $h, 'of the session', 0, 0, 'r');
$pdf->Cell(25, $h, $value->year, 0, 0, 'C');
$pdf->Cell(5, $h, 'in', 0, 0, 'r');
$pdf->Cell(33, $h, $value->group_r, 0, 1, 'C');
$pdf->Cell($t, $h, 'Date of Birth: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->birth_bate, 0, 0, 'r');
$pdf->Cell(58, $h, 'group. His/Her date of Birth is', 0, 0, 'r');
$pdf->Cell(39, $h, $value->birth_bate, 0, 0, 'r');
$pdf->Cell($the, $h, '. He/she bears an excellent moral', 0, 1, 'r');
$pdf->Cell($t, $h, 'Mobile No: ', 0, 0, 'r');
$pdf->Cell($tk, $h, $value->mobile_number, 0, 0, 'r');
$pdf->Cell($the, $h, 'Character. So  far I know, he/she  never  took  part in  any  activity  subversive  to the', 0, 1, 'r');
$pdf->Cell($t, $h, ' ', 0, 0, 'r');
$pdf->Cell($tk, $h, ' ', 0, 0, 'r');
$pdf->Cell($the, $h, 'state or of discipline during the period of his/her study in this institution.', 0, 1, 'r');
$pdf->Cell($t+10, $h, 'Student signature:', 0, 0, 'r');
$pdf->Cell($tk, $h, '', 0, 0, 'r');
$pdf->Cell($the, $h, 'I wish his/her every success in life.', 0, 1, 'r');
$pdf->Cell($t, $h, '',0,0,'C');
$pdf->Cell($th, $h, '', 0, 1, 'r');
$pdf->Cell($t, $h, '',0,0,'C');
$pdf->Cell($tk, $h, '',0,0,'C');
$pdf->Cell($th, $h, 'Dated: Nilphamari,', 0, 1, 'r');
$pdf->Cell($t, $h, '',0,0,'C');
$pdf->Cell($tk, $h, '',0,0,'C');
$pdf->Cell($th, $h, 'The........................................', 0, 1, 'r');
}


$pdf->Output();

?>