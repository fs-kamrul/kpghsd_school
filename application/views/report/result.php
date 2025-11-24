<?php


$pdf = new FPDF();
$pdf->FPDFA('P', 'mm', 'A4');
$grade = new Grade();
$pdf->Open();
foreach ($all_reg as $v_reg) {
    $pdf->AddPage();
    $h = 7;
    $th = 7;
    $the = 0;
    $pdf->Image(base_url() . 'images/im_pdf/border2.jpg', 1, 1, 298);
    $pdf->Image(base_url() . 'images/im_pdf/logo.jpg', 130, 27, 35);
    $pdf->Image(base_url() . 'images/im_pdf/grd.PNG', 225, 25, 50);
    $pdf->Image(base_url() . 'images/im_pdf/footer.JPG', 20, 188, 250);
    //105.6-6.89

    $pdf->SetFont('Arial', '', 20);
    $pdf->Cell(277, 8, 'Collectorate Public School & College, Nilphamari ', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 14);
    $pdf->Cell(277, 8, "Academic Transcript of " . $term . " Examination " . $v_reg->year, 0, 1, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(40, $h, 'Name of Student:', 0, 0, 'L');
    $pdf->Cell(60, $h, $v_reg->name, 0, 1, 'L');
    $pdf->Cell(40, $h, 'Father`s Name:', 0, 0, 'L');
    $pdf->Cell(60, $h, $v_reg->father_name, 0, 1, 'L');
    $pdf->Cell(40, $h, 'Mother`s Name:', 0, 0, 'L');
    $pdf->Cell(60, $h, $v_reg->mother_name, 0, 1, 'L');
    $pdf->Cell(15, $h, $this->lang->line('class') . ': ', 0, 0, '');
    $pdf->Cell(33, $h, $v_reg->class, 0, 0, '');
    $pdf->Cell(21, $h, '' .  $this->lang->line('section') . ': ', 0, 0, '');
    $pdf->Cell(50, $h, $v_reg->section, 0, 1, '');
    $pdf->Cell(15, $h, 'Roll: ', 0, 0, '');
    $pdf->Cell(33, $h, $v_reg->roll, 0, 0, '');
    $pdf->Cell(21, $h, '' . $this->lang->line('group') . ': ', 0, 0, '');
    $pdf->Cell(50, $h, $v_reg->group_r, 0, 1, '');
    $pdf->Cell(100, $h, '', 0, 0, 'L');
    $pdf->Cell(25, $h, '' . $this->lang->line('student_id') . ':', 0, 0, 'L');
    $pdf->Cell(40, $h, $v_reg->id, 0, 1, 'L');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(23, $th, 'Subject Id', 1, 0, 'C');
    $pdf->Cell(50, $th, 'Name of Subjects', 1, 0, 'C');
    $pdf->Cell(54, $th, 'Mark', 1, 0, 'C');
    $pdf->Cell(30, $th, 'Total(100)', 1, 0, 'C');
    $pdf->Cell(30, $th, 'Grade ', 1, 0, 'C');
    $pdf->Cell(30, $th, 'GPA Point', 1, 0, 'C');
    $pdf->Cell(30, $th, 'GPA (WAS)', 1, 0, 'C');
    $pdf->Cell(30, $th, 'GPA', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 11);
    $sub = $this->sr_model->sub_name_result($term, $v_reg->all_reg_id);
    $j = 0;
    foreach ($sub as $v_sub) {
        if ($v_sub->add_f == null || $v_sub->add_f == 1 || $v_sub->add_f == 2) {
            $j++;
        }
    }
    $i = $grade->num_j($j / 2);
    $j = 0;
    foreach ($sub as $v_sub) {

        $total_mark = $this->sr_model->sub_mark_result($term, $v_reg->all_reg_id, $v_sub->sub_id);
        $sum = 0;
        $sum_t = "";
        foreach ($total_mark as $v_total_mark) {
            $sum = $sum + $v_total_mark->mark;
            $sum_t = $v_total_mark->mark . " + " . $sum_t;
        }
        $sum = (100 / $v_sub->sub_mark) * $sum;

        if ($v_sub->add_f == null || $v_sub->add_f == 1 || $v_sub->add_f == 2) {
            $pdf->Cell(23, $th, $v_sub->sub_code, 1, 0, 'C');
            if ($v_sub->add_f == 1) {
                $pdf->Cell(50, $th, $v_sub->sub_name . " *", 1, 0, 'C');
            } else {
                $pdf->Cell(50, $th, $v_sub->sub_name, 1, 0, 'C');
            }
            $pdf->Cell(54, $th, '( ' . $grade->cut_plus($sum_t) . ' )', 1, 0, 'C');
            $pdf->Cell(30, $th, $sum, 1, 0, 'C');
            $pdf->Cell(30, $th, $grade->getNumberGrade($sum), 1, 0, 'C');
            $pdf->Cell(30, $th, $grade->getNumberPoint($sum), 1, 0, 'C');
            if ($j == $i) {
                $pdf->Cell(30, $th, $position_r[$v_reg->all_reg_id]['cgp'], 0, 0, 'C');
                $pdf->Cell(30, $th, $position_r[$v_reg->all_reg_id]['gp'], 0, 1, 'C');
            } else {
                $pdf->Cell(30, $th, '', 0, 0, 'C');
                $pdf->Cell(30, $th, '', 0, 1, 'C');
            }
            $j++;
            $the = $the + 6.96;
        }
    }
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(23, $th, '', 0, 0, 'C');
    $pdf->Cell(50, $th, '', 0, 0, 'C');
    $pdf->Cell(54, $th, 'Total', 0, 0, 'C');
    $pdf->Cell(30, $th, $position_r[$v_reg->all_reg_id]['total_num'], 0, 0, 'C');
    $pdf->Cell(30, $th, 'Position', 0, 0, 'C');
    $pdf->Cell(30, $th, $position_r[$v_reg->all_reg_id]['position'], 0, 0, 'C');
    $pdf->Cell(30, $th, '', 0, 0, 'C');
    $pdf->Cell(30, $th, '', 0, 1, 'C');

    $pdf->Image(base_url() . 'images/iii.png', 256.5, 85.3, 1, $the);
    $pdf->Image(base_url() . 'images/iii.png', 286.5, 85.3, 1, $the);

    $pdf->Image(base_url() . 'images/__.PNG', 227, 77.76 + $the + 6.94, 60);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(23, $th, '', 0, 0, 'C');
    $pdf->Cell(104, $th, 'W.A.S. = Without Additional Subject', 0, 0, 'C');
    $pdf->Cell(120, $th, 'G.P.A. = Grade Point Average', 0, 0, 'C');
    $pdf->Cell(30, $th, '', 0, 1, 'C');
}

$pdf->Output();
