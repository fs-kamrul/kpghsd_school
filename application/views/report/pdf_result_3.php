<?php


$pdf = new FPDF();
$pdf->FPDFA('L', 'mm', 'A4');
$grade = new Grade();
$pdf->Open();
//if (isset($main_data)) {
   
foreach ($main_data as $key => $value) {
    $pdf->AddPage();
    $h = 7;
    $th = 7;
    $the = 0;
    $a1=36;$b1=150;$a2=185;
//    $pdf->Image(base_url() . 'images/im_pdf/border2.jpg', 1, 1, 298);
    $pdf->Image(base_url() . 'images/im_pdf/logo.jpg', 130, 27, 33);
    $pdf->Image(base_url() . 'images/im_pdf/grd.PNG', 225, 23, 50);
    $pdf->Image(base_url() . 'images/im_pdf/footer_1.jpg', 10, 192, 270);
    //105.6-6.89
$pdf->Image('images/im_pdf/a5.jpg',$a1,$a2,30);
//if($value['photo']!=NULL){
//    $pdf->Image(base_url() . $value['photo'], 11, 6, 20);
//}  else {
//    $pdf->Image(base_url() . 'images/1.jpg', 11, 6, 20);
//}
    $picture_file = $value['photo'];
    if(!file_exists($picture_file)){
        $pdf->Image('images/im_pdf/default.jpg', 11, 6, 20);
    }else{
        $pdf->Image($picture_file, 11, 6, 20);
    }
//$pdf->Image('images/im_pdf/a2.jpg',$b1,$a2+6,30);

    $pdf->SetFont('Arial', '', 20);
    $pdf->Cell(277, 8, $academy_info->s_name, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 14);
    $pdf->Cell(277, 8, "Academic Transcript of Half-Yearly Examination " . $year, 0, 1, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(43, $h, 'Name of Student:', 0, 0, 'L');
    $pdf->Cell(60, $h, $value['name'], 0, 1, 'L');
    $pdf->Cell(43, $h, 'Father`s Name:', 0, 0, 'L');
    $pdf->Cell(60, $h, $value['father_name'], 0, 1, 'L');
    $pdf->Cell(43, $h, 'Mother`s Name:', 0, 0, 'L');
    $pdf->Cell(60, $h, $value['mother_name'], 0, 1, 'L');
    $pdf->Cell(15, $h, $this->lang->line('class') . ': ', 0, 0, '');
    $pdf->Cell(28, $h, $class, 0, 0, '');
    $pdf->Cell(21, $h, '' .  $this->lang->line('section') . ': ', 0, 0, '');
    $pdf->Cell(50, $h, $value['section'], 0, 1, '');
    $pdf->Cell(15, $h, 'Roll: ', 0, 0, '');
    $pdf->Cell(28, $h, $value['roll'], 0, 0, '');
    $pdf->Cell(21, $h, '' . $this->lang->line('group') . ': ', 0, 0, '');
    $pdf->Cell(50, $h, $group_r, 0, 0, '');
//    $pdf->Cell(115, $h-1, '', 0, 0, 'L');
    $pdf->Cell(25, $h-1, '' . $this->lang->line('student_id') . ':', 0, 0, 'L');
    $pdf->Cell(40, $h-1, $value['id'], 0, 1, 'L');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(23, $th, 'Subject Id', 1, 0, 'C');
    $pdf->Cell(50, $th, 'Name of Subjects', 1, 0, 'L');
    $pdf->Cell(39, $th, 'Mark', 1, 0, 'C');
    $pdf->Cell(25, $th, 'Total(100)', 1, 0, 'C');
    $pdf->Cell(28, $th, 'Highest Mark', 1, 0, 'C');
    $pdf->Cell(25, $th, 'Grade ', 1, 0, 'C');
    $pdf->Cell(27, $th, 'GPA Point', 1, 0, 'C');
    $pdf->Cell(30, $th, 'GPA (WAS)', 1, 0, 'C');
    $pdf->Cell(30, $th, 'GPA', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 11);

    $j = 0;
    foreach ($sub_info as $v_sub) {
//        if ($value[$v_sub['sub_name']]['add_f'] == null || $value[$v_sub['sub_name']]['add_f'] == 1 || $value[$v_sub['sub_name']]['add_f'] == 2) {
        if (isset($value['mark'][$v_sub['sub_name'] . "_mark"])) {    
        $j++;
        }
//        }
    }
    $i = $grade->num_j($j / 2);
    $j = 0;$sum2=0;$grou=0;$grou1=0;    //$grade->cut_plus($sum_t);
    foreach ($sub_info as $key1 => $value1) {
        if (isset($value['mark'][$value1['sub_name'] . "_mark"])) {
//        if ($v_sub->add_f == null || $v_sub->add_f == 1 || $v_sub->add_f == 2) {
            $pdf->Cell(23, $th, $value1['sub_code'], 1, 0, 'C');

            if ($value[$value1['sub_name']]['add_f'] == 1) {
                $pdf->Cell(50, $th, $value1['sub_name'] . " *", 1, 0, 'L');
            } elseif ($value[$value1['sub_name']]['add_f'] == 2) {
                $pdf->Cell(50, $th, $value1['sub_name'], 1, 0, 'L');
            }elseif ($value[$value1['sub_name']]['add_f'] == 3) {
                $pdf->Cell(50, $th, $value1['sub_name']." #", 1, 0, 'L');
            }
            if ($value[$value1['sub_name']]['add_fail'] == 1) {
                $sum=$value[$value1['sub_name']]['tota_mark'];
            }  else {
                $sum=0;
            }

                $sum1=$value[$value1['sub_name']]['tota_mark'];

            $sum2+=$value[$value1['sub_name']]['tota_mark'];
            $pdf->Cell(39, $th, '( ' . $grade->cut_plus_1($value[$value1['sub_name']]['to_mark']) . ' )', 1, 0, 'C');
            if($value1['add_group']==0){
//                $grou=0;
                $pdf->Cell(25, $th, $sum1, 1, 0, 'C');
            }elseif($value1['add_group']==1){
//                if ($value[$value1['sub_name']]['add_fail'] == 1) {
                    $grou+=$sum1;
//                }  else {
//                    $grou=0;
//            }
                $pdf->Cell(25, $th+7, "", "TLR", 0, 'C');
            }elseif($value1['add_group']==2){
                $grou+=$sum1;
                $grou2=$grou/2;
                $pdf->Cell(25, $th-7, substr($grou2,0,5), "FLR", 0, 'C');
                $grou=0;
            }

            $pdf->Cell(28, $th, $sub_info[$value1['sub_name']]['high_mark'], 1, 0, 'C');
//            $pdf->Cell(25, $th, $grade->getNumberGrade($sum), 1, 0, 'C');
//            $pdf->Cell(27, $th, $grade->getNumberPoint($sum), 1, 0, 'C');
            if($value1['add_group']==0){
                $pdf->Cell(25, $th, $grade->getNumberGrade($sum), 1, 0, 'C');
                $pdf->Cell(27, $th, $grade->getNumberPoint($sum), 1, 0, 'C');
            }elseif($value1['add_group']==1){
                $grou1+=$sum1;
                $pdf->Cell(25, $th+7, "", "TLR", 0, 'C');
                $pdf->Cell(27, $th+7, "", "TLR", 0, 'C');
            }elseif($value1['add_group']==2){
                $grou1+=$sum1;
                $pdf->Cell(25, $th-7, $grade->getNumberGrade($grou1/2), "FLR", 0, 'C');
                $pdf->Cell(27, $th-7, $grade->getNumberPoint($grou1/2), "FLR", 0, 'C');
                $grou1=0;
            }

            if ($j == $i) {
                $pdf->Cell(30, $th, $all_process[$value['id']]['gpa'], 0, 0, 'C');
                $pdf->Cell(30, $th, $all_process[$value['id']]['cgpa'], 0, 1, 'C');
            } else {
                $pdf->Cell(30, $th, '', 0, 0, 'C');
                $pdf->Cell(30, $th, '', 0, 1, 'C');
            }
            $j++;
            $the = $the + 6.96;
        }  else {
//            echo '1-';
//            exit();
        }
    }
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(23, $th, '', 0, 0, 'C');
    $pdf->Cell(50, $th, '', 0, 0, 'C');
    $pdf->Cell(39, $th, 'Total', 0, 0, 'C');
    $pdf->Cell(25, $th, $sum2, 0, 0, 'C');
    $pdf->Cell(28, $th, 'Position', 0, 0, 'C');
    $pdf->Cell(25, $th, $all_process[$value['id']]['position'], 0, 0, 'C');
    $pdf->Cell(27, $th, '', 0, 0, 'C');
    $pdf->Cell(30, $th, '', 0, 1, 'C');


    $pdf->Image(base_url() . 'images/_.PNG', 227, 65.77 + $the + 6.94, 60);
    $pdf->Image(base_url() . 'images/iii.png', 256.5, 74.3, 1, $the);
    $pdf->Image(base_url() . 'images/iii.png', 286.5, 74.3, 1, $the);
    $pdf->SetFont('Arial', '', 10);
//    $pdf->Cell(23, $th, '', 0, 0, 'C');
//    $pdf->Cell(104, $th, 'W.A.S. = Without Additional Subject', 0, 0, 'C');
//    $pdf->Cell(120, $th, 'G.P.A. = Grade Point Average', 0, 0, 'C');
//    $pdf->Cell(30, $th, '', 0, 1, 'C');
    $pdf->Cell(69.25, $th, '# = Not Gradable Subjects', 0, 0, 'C');
    $pdf->Cell(69.25, $th, 'W.A.S. = Without Additional Subject', 0, 0, 'C');
    $pdf->Cell(69.25, $th, 'G.P.A. = Grade Point Average', 0, 0, 'C');
    $pdf->Cell(69.25, $th, '* = Four Subject', 0, 1, 'C');
    
//    $pdf->SetY(-29.01);
//        $pdf->SetFont('Helvetica', 'I', 12);
//        $pdf->Cell(92.33, 6, 'Principal', 0, 0, 'C');
//        $pdf->Cell(92.33, 6, 'Signature Of Class Teacher', 0, 0, 'C');
//        $pdf->Cell(92.33, 6, 'Signature Of Guardian', 0, 1, 'C');
//        $pdf->Cell(92.33, 3, 'Collectorate Public School & College, Nilphamari', 0, 0, 'C');
}

$pdf->Output();
