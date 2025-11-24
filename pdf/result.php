<?php

require_once './Db_Connect.php';
require_once '../fpdf/fpdf.php';
require './grade.php';

//$pdf=new FPDF('L','mm','A4');
//		$h=7; $th=7;
                
if(isset($_POST['btr_Result']))
{
    $dbobj1 = new Db_Connect();
    $sql1="SELECT DISTINCT all_reg_id,term  FROM v_mark_show WHERE vclass='$_POST[class]' and vyear='$_POST[year]' 
	and vsection='$_POST[section]' and term='$_POST[term]'";
    $result1= mysql_query($sql1);
	//$row1 = mysql_fetch_assoc($result1);
	//print_r($row1);
	
	

$pdf=new FPDF('L','mm','A4');
		$h=7; $th=7;
while ($row1 = mysql_fetch_assoc($result1)) {
$stu=$row1['all_reg_id'];
    $sql2="SELECT DISTINCT all_reg_id,subject FROM v_mark_show WHERE vclass='$_POST[class]' and vyear='$_POST[year]' 
	and vsection='$_POST[section]' and term='$_POST[term]' and all_reg_id='$stu'";
    $result2= mysql_query($sql2);
 
                
$pdf->AddPage();
//$pdf->Image('school_logo.jpg',1,1,300);
//$pdf->Image('a.jpg',90,80,100);
$pdf->Image('../images/im_pdf/logo.jpg',120,33,35);
//$pdf->Image('signature.jpg',10,188,260);

//$pdf->Image('grd.PNG',220,15,60);




$pdf->SetFont('Arial', '', 14);
$pdf->Cell(10, 10, 'Reg No: '.$row1['all_reg_id']);
$pdf->SetFont('Arial', '', 20);

$pdf->Cell(250, 8, 'KHANSAMA PILOT GIRLS\' HIGH SCHOOL', 0, 1, 'C');
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(220, 8, 'Khansama, Dinajpur', 0, 1, 'C');
$pdf->Cell(250, 8, "Academic Transcript of ".'exam_name'." Examination ".'year_s', 0, 1, 'C');
$pdf->Cell(250, $h, 'Name of Student: '.'person_name');
$pdf->Ln();
$pdf->Cell(250, $h, 'Father`s Name: '.'father_name');
$pdf->Ln();
$pdf->Cell(250, $h, 'Mother`s Name: '.'mother_name');
$pdf->Ln();
$pdf->Cell(40, $h, $this->lang->line('class') . ': '.'class');
$pdf->Cell(50, $h, '' .  $this->lang->line('section') . ': '.'section');
$pdf->Ln();
$pdf->Cell(40, $h, 'Class Roll: '.'roll');

$pdf->Cell(50, $h, 'Group: '.'groupa');



$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(60, $th, 'Name of Subjects', 1, 0, 'C');
$pdf->Cell(30, $th, $row1['term'], 1, 0, 'C');
$pdf->Cell(30, $th, 'Theatrical', 1, 0, 'C');
$pdf->Cell(30, $th, '' . $this->lang->line('total_mark') .'', 1, 0, 'C');
$pdf->Cell(30, $th, 'Grade ', 1, 0, 'C');
$pdf->Cell(30, $th, 'GPA Point', 1, 0, 'C');
$pdf->Cell(30, $th, 'GPA (WAS)', 1, 0, 'C');
$pdf->Cell(30, $th, 'GPA', 1, 0, 'C');
$pdf->Ln();

$i=0;
$total_all="";
$gpk=0;
while ($row2 = mysql_fetch_assoc($result2)) {
 
	$sub=$row2['subject'];
    $sql3="SELECT DISTINCT all_reg_id,subject,mark FROM v_mark_show WHERE vclass='$_POST[class]' and vyear='$_POST[year]' 
	and vsection='$_POST[section]' and term='$_POST[term]'
             and all_reg_id='$stu' and subject='$sub' order by mark DESC" ;
    $result3= mysql_query($sql3);
	
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(60, $th, $row2['subject'], 1, 0, 'C');
$mark="";
$total="";
while ($row3 = mysql_fetch_assoc($result3)) {
$mark=$row3['mark']."+".$mark;
$mak=$row3['mark'];
$total=$mak+$total;
}
$total_all=$total+$total_all;
$pdf->Cell(30, $th, cut_plus($mark), 1, 0, 'C');

$pdf->Cell(30, $th, 'obn', 1, 0, 'C');
$pdf->Cell(30, $th, $total, 1, 0, 'C');
$pdf->Cell(30, $th, getNumberGrade($total), 1, 0, 'C');

$pdf->Cell(30, $th, getNumberPoint($total), 1, 0, 'C');
$pdf->Cell(30, $th, '$gpawas', 1, 0, 'C');
$pdf->Cell(30, $th, '$gpa', 1, 0, 'C');
$pdf->Ln();
$gpk=getNumberPoint($total)+$gpk;
$i++;
}
$gk=$gpk/$i;
$pdf->Cell(60, $th, '', 0, 0, 'C');
$pdf->Cell(30, $th, '' .  $this->lang->line('total') . ':', 0, 0, 'C');
$pdf->Cell(30, $th, '', 0, 0, 'C');
$pdf->Cell(30, $th, $total_all, 0, 0, 'C');
$pdf->Cell(30, $th, getLetterGrade($gk), 0, 0, 'C');
$pdf->Cell(30, $th, num_point($gk), 0, 0, 'C');
$pdf->Cell(30, $th, '', 0, 0, 'C');
$pdf->Cell(30, $th, '', 0, 1, 'C');

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(200, $th, 'W.A.S. = Without Additional Subject', 0, 0, 'C');
$pdf->Cell(50, $th, 'G.P.A. = Grade Point Average', 0, 0, 'C');
   
}
$pdf->Output();
}
?> 