<?php
//require_once ('phplib/db.php') ;

				/*****************************************************************
				This file contains various functions regarding grade calculations
				******************************************************************/

function getLetterGradeFromTotal($total_marks){
	$db = new DB () ;
	$conn = $db->getConnection () ;
	if (!$conn)
		return "<br> Connection to databsae no established </br>" ;		
		
	$sql = "select * from tbl_grade_details tgd, tbl_grade tg where tgd.grade_id = tg.grade_id and tg.ending_date = '0000-00-00'" ;
	//echo $total_marks ;
	$record_set = mysql_query ($sql, $conn) ;
	if ($record_set)
	{
		$i = 0 ;
		while ( $record = mysql_fetch_assoc ($record_set) )
		{
			//$grade_list [$i][0] = $record["grade_id"] ;
			$grade_list [$i][1] = $record["letter_grade"] ;
			$grade_list [$i][2] = $record["lower_limit"] ;
			$grade_list [$i][3] = $record["upper_limit"] ;
			//$grade_list [$i][4] = $record["grade_point"] ;
			
			//echo "<br/>" . $grade_list[$i][0] . "  " . $grade_list[$i][1] . "  " 
				//. $grade_list[$i][2] . "  "	. $grade_list[$i][3] . "  " . $grade_list[$i][4] . " <br/>" ;
			$i++ ;
		}
		$no_of_grades = $i ;
		
	} // $record-set for grade details
	//print_r ($grade_list);
	
	for ($i=0; $i<$no_of_grades; $i++){
		if ( $total_marks >= $grade_list [$i][2] && $total_marks <= $grade_list [$i][3]){
			
			break;//echo $grade_list [$i][1];
			
		}
	}
	return $grade_list [$i][1];
}
function getNumberGrade ($num)
{
	if ($num >= 80 && $num <= 100)
		return "A+" ;
	else if ( $num >= 70 && $num < 80)
		return "A" ;
	else if ( $num >= 60 && $num < 70)
		return "A-" ;
	else if ( $num >= 50 && $num < 60)
		return "B" ;
	else if ( $num >= 40 && $num < 50)
		return "C" ;
	else if ( $num >= 33 && $num < 40)
		return "D" ;
	else 
		return "F" ;

}
function getNumberPoint ($num)
{
	if ($num >= 80 && $num <= 100)
		return 5 ;
	else if ( $num >= 70 && $num < 80)
		return 4 ;
	else if ( $num >= 60 && $num < 70)
		return 3.5 ;
	else if ( $num >= 50 && $num < 60)
		return 3 ;
	else if ( $num >= 40 && $num < 50)
		return 2 ;
	else if ( $num >= 33 && $num < 40)
		return 1 ;
	else 
		return 0 ;

}
function cut_plus($plush){
	$plus=strlen($plush);
	$plusa=substr($plush,0,$plus-1);
	return $plusa;
}
function num_point($plush){
	$plus=strlen($plush);
	$plusa=substr($plush,0,4);
	return $plusa;
}

function getLetterGrade ($gpa)
{
	if ($gpa == 5)
		return "A+" ;
	else if ( $gpa >= 4 && $gpa < 5)
		return "A" ;
	else if ( $gpa >= 3.5 && $gpa < 4)
		return "A-" ;
	else if ( $gpa >= 3 && $gpa < 3.5)
		return "B" ;
	else if ( $gpa >= 2 && $gpa < 3)
		return "C" ;
	else if ( $gpa >= 1 && $gpa < 2)
		return "D" ;
	else 
		return "F" ;

}

function getGradePoint ($str="")
{
	if (strcmp ($str, "A+") == 0)
		return 5 ;
	else if (strcmp ($str, "A") == 0)
		return 4 ;
	else if (strcmp ($str, "A-") == 0)
		return 3.5 ;
	else if (strcmp ($str, "B") == 0)
		return 3 ;
	else if (strcmp ($str, "C") == 0)
		return 2 ;
	else if (strcmp ($str, "D") == 0)
		return 1 ;
	else if (strcmp ($str, "F") == 0)
		return 0 ;
	else
		return 0 ;
}
function teacherGradesSubjectByClass ($teacher_id, $subject_id, $class_id, $term_id)
{
	//echo $teacher_id . "  " . $subject_id . "  " . $class_id . "  " . $term_id ;
	//echo "$teacher_id,  $subject_id, $class_id, $term_id" ;
	$db = new DB () ;
	$conn = $db->getConnection () ;
	if (!$conn)
		return "<br> Connection to databsae no established </br>" ;			
	
	// check if final exam is over. If so then grade else give error message
	$sqlStr = "select * from tbl_test where class_id = " . $class_id . " and exam_id = 0 and subject_id = " 
				. $subject_id . " and term_id = " . $term_id ;
	
	$result = mysql_query ($sqlStr, $conn) ;			

	if ($result)
		if (mysql_num_rows($result) == 0)	// if final exam is not graded i.e. zero record
			return "<br> Final exam is not graded, please try latter </br>" ;			

	// check if teacher takes the corresponding subject
	$sqlStr = "select * from tbl_teacher_subject where teacher_id = '" . $teacher_id . "' and class_id = " . 
				$class_id . " and subject_id = " . $subject_id ;
	$result = mysql_query ($sqlStr, $conn) ;			
	//echo $sqlStr ;
	if ($result)
		if (mysql_num_rows($result) == 0)	// if final exam is not graded i.e. zero record
			return "<br>No corresponding information found, please try latter </br>" ;			
		else	// take no_of_tests and no_of_best_tests information
		{
			$row = mysql_fetch_assoc ($result) ;
			$no_of_tests = $row["no_of_tests{$term_id}"] ;
			$no_of_best_tests = $row["no_of_best_tests{$term_id}"] ;
			if ($no_of_best_tests > $no_of_tests )
				return "<br><b>Class test rule is not valid, please try from Grade button</b></br>" ;			
		}

	/****** get grade table from tbl_grade details ************************************/
	$sql = "select * from tbl_grade_details tgd, tbl_grade tg where tgd.grade_id = tg.grade_id and tg.ending_date = '0000-00-00'" ;
	//echo $sql ;
	$record_set = mysql_query ($sql, $conn) ;
	if ($record_set)
	{
		$i = 0 ;
		while ( $record = mysql_fetch_assoc ($record_set) )
		{
			$grade_list [$i][0] = $record["grade_id"] ;
			$grade_list [$i][1] = $record["letter_grade"] ;
			$grade_list [$i][2] = $record["lower_limit"] ;
			$grade_list [$i][3] = $record["upper_limit"] ;
			$grade_list [$i][4] = $record["grade_point"] ;
			
			//echo "<br/>" . $grade_list[$i][0] . "  " . $grade_list[$i][1] . "  " 
				//. $grade_list[$i][2] . "  "	. $grade_list[$i][3] . "  " . $grade_list[$i][4] . " <br/>" ;
			$i++ ;
		}
		$no_of_grades = $i ;
	} // $record-set for grade details
	else
		return "<b> Errors in grading system initialization </b>" ;

	// for all students do grading
	$sqlStr = "select student_id from tbl_student_subject where class_id = " . $class_id . " and subject_id = " . $subject_id ;
	//echo $sqlStr ;
	$result = mysql_query ($sqlStr, $conn) ;			
	if ($result)
	{
		while ( $row = mysql_fetch_assoc ($result) )
		{
			$student_id = $row["student_id"] ;
			$sql = "select exam_id, total_marks, obtained_marks from tbl_test tt, tbl_student_test tst where "
					. "tst.student_id = '" . $student_id . "' and tst.test_id = tt.test_id and tt.class_id = " 
					. $class_id . " and tt.subject_id = " . $subject_id . " and term_id = ". $term_id . " order by exam_id asc" ;
			$res = mysql_query ($sql, $conn) ;			
			if ($res)
			{
				$n = 0 ;
				$final_mark = 0 ;	// if final exam not given
				while ( $test_record = mysql_fetch_assoc ($res) )
				{					
					if ($test_record["exam_id"] == 0)	// means final exam out of 80						
					{
						if ($test_record["obtained_marks"]) 
							$final_mark = ( $test_record["obtained_marks"] * 80) / $test_record["total_marks"] ;
					}
					else
						$class_tests[$n++] = ($test_record["obtained_marks"] * 20) / $test_record["total_marks"] ;
				}
				
				if ($class_tests)
					rsort ($class_tests, SORT_NUMERIC) ;
				$i = $sum = 0 ;
				while ($i < $no_of_best_tests && $i < $n)
					$sum += $class_tests[$i++] ;
				//echo $sum . " ll " . $no_of_best_tests ;		// out of 20				
				if ($no_of_best_tests > 0) 
					$sum = $sum / $no_of_best_tests ;		// out of 20
				else
					$sum = 0 ;
				$total_mark = ceil ($final_mark + $sum) ; 		// out of 100
				
				//$grade = getLetterGrade ($total_mark) ;
				for ($i = 0; $i < $no_of_grades; ++$i)
					if ( $total_mark >= $grade_list[$i][2] && $total_mark <= $grade_list[$i][3])
					{
						$grade_id = $grade_list[$i][0] ;					
						$grade = $grade_list[$i][1] ; 
						break ;
					}
				
				
				
				//echo $final_mark . "<br/>" . $sum . "<br/>"  ;
				if ( $term_id == 1 )
					$sql = "update tbl_student_subject set first_term_class_test = " . round ($sum, 2). ", first_term_final_mark = "
							. round ($final_mark, 2) . ", first_term_total_mark = " . $total_mark . ", grade_id = " 
							. $grade_id . ", first_term_grade = '" . $grade . "' where student_id = '"
							. $student_id . "' and class_id = " . $class_id . " and subject_id = " . $subject_id ;
				else if ( $term_id == 2 )					
					$sql = "update tbl_student_subject set second_term_class_test = " . round ($sum, 2) . ", second_term_final_mark = "
							. round ($final_mark, 2) . ", second_term_total_mark = " . $total_mark . ", grade_id = " 
							. $grade_id . ", second_term_grade = '" . $grade . "' where student_id = '"
							. $student_id . "' and class_id = " . $class_id . " and subject_id = " . $subject_id ;					
				else if ( $term_id == 3 )					
					$sql = "update tbl_student_subject set third_term_class_test = " . round ($sum, 2) . ", third_term_final_mark = "
							. round ($final_mark, 2) . ", third_term_total_mark = " . $total_mark . ", grade_id = " 
							. $grade_id . ", third_term_grade = '" . $grade . "' where student_id = '"
							. $student_id . "' and class_id = " . $class_id . " and subject_id = " . $subject_id ;									
				///echo $sql ;
				mysql_query ($sql, $conn) or die (" Grade Update not Successfull".mysql_error());
			}	// if $res
		}	// while ($row)
		return "<b> Grades successfully updated </br>" ;
	}	// if ($result
}

function teacherGradesSubjectByStudent ($teacher_id, $subject_id, $class_id, $term_id, $student_id)
{
	//echo $teacher_id . "  " . $subject_id . "  " . $class_id . "  " . $term_id ;
	$db = new DB () ;
	$conn = $db->getConnection () ;
	if (!$conn)
		return "<br> Connection to databsae no established </br>" ;			
	
	// check if final exam is over. If so then grade else give error message
	/*************************************************************************
	// assumed that final grade has been given
	$sqlStr = "select * from tbl_test where class_id = " . $class_id . " and exam_id = 0 and subject_id = " 
				. $subject_id . " and term_id = " . $term_id ;
	$result = mysql_query ($sqlStr, $conn) ;			

	if ($result)
		if (mysql_num_rows($result) == 0)	// if final exam is not graded i.e. zero record
			return "<br> Final exam is not graded, please try latter </br>" ;			
	**********************************************************************************/
	
	// check if teacher takes the corresponding subject
	$sqlStr = "select * from tbl_teacher_subject where teacher_id = '" . $teacher_id . "' and class_id = " . 
				$class_id . " and subject_id = " . $subject_id ;
	$result = mysql_query ($sqlStr, $conn) ;			
	if ($result)
		if (mysql_num_rows($result) == 0)	// if final exam is not graded i.e. zero record
			return "<br>No corresponding information found, please try latter </br>" ;			
		else	// take no_of_tests and no_of_best_tests information
		{
			$row = mysql_fetch_assoc ($result) ;
			$no_of_tests = $row["no_of_tests{$term_id}"] ;
			$no_of_best_tests = $row["no_of_best_tests{$term_id}"] ;
			if ($no_of_best_tests  > $no_of_tests)
				return "<br> <b>Grade is not updated, Please update grade by clicking on 'Grade' button </b></br></br>" ;			
		}

	/****** get grade table from tbl_grade details ************************************/
	$sql = "select * from tbl_grade_details tgd, tbl_grade tg where tgd.grade_id = tg.grade_id and tg.ending_date = '0000-00-00'" ;
	//echo $sql ;
	$record_set = mysql_query ($sql, $conn) ;
	if ($record_set)
	{
		$i = 0 ;
		while ( $record = mysql_fetch_assoc ($record_set) )
		{
			$grade_list [$i][0] = $record["grade_id"] ;
			$grade_list [$i][1] = $record["letter_grade"] ;
			$grade_list [$i][2] = $record["lower_limit"] ;
			$grade_list [$i][3] = $record["upper_limit"] ;
			$grade_list [$i][4] = $record["grade_point"] ;
			
			//echo "<br/>" . $grade_list[$i][0] . "  " . $grade_list[$i][1] . "  " 
				//. $grade_list[$i][2] . "  "	. $grade_list[$i][3] . "  " . $grade_list[$i][4] . " <br/>" ;
			$i++ ;
		}
		$no_of_grades = $i ;
	} // $record-set for grade details
	else
		return "<b> Errors in grading system initialization </b>" ;

	//****************************** for single student do grading *****************************/
	$sql = "select tt.exam_id, tt.total_marks, tst.obtained_marks from tbl_test tt, tbl_student_test tst where "
					. "tst.student_id = '" . $student_id . "' and tst.test_id = tt.test_id and tt.class_id = " 
					. $class_id . " and tt.subject_id = " . $subject_id . " and tt.term_id = ". $term_id . " order by exam_id asc" ;
	$res = mysql_query ($sql, $conn) ;
	if ($res)
	{
		$n = 0 ;
		$final_mark = 0 ;	// if final exam not given
		while ( $test_record = mysql_fetch_assoc ($res) )
		{
			if ($test_record["exam_id"] == 0)	// means final exam out of 80			
			{
				if ($test_record["obtained_marks"])	// if final exam no given by this student
					$final_mark = ( $test_record["obtained_marks"] * 80) / $test_record["total_marks"] ;
			}
			else
				$class_tests[$n++] = ($test_record["obtained_marks"] * 20) / $test_record["total_marks"] ;
		}
		//echo $n ;
		if ($class_tests)
			rsort ($class_tests, SORT_NUMERIC) ;
			
		$i = $sum = 0 ;
		while ($i < $no_of_best_tests && $i < $n)
			$sum += $class_tests[$i++] ;

		if ($no_of_best_tests > 0)
			$sum = $sum / $no_of_best_tests ;		// out of 20
			
		$total_mark = ceil ($final_mark + $sum) ; 		// out of 100
				
		//$grade = getLetterGrade ($total_mark) ;
		for ($i = 0; $i < $no_of_grades; ++$i)
			if ( $total_mark >= $grade_list[$i][2] && $total_mark <= $grade_list[$i][3])
			{
				$grade_id = $grade_list[$i][0] ;					
				$grade = $grade_list[$i][1] ; 
				break ;
			}
				
				
				
		if ( $term_id == 1 )
			$sql = "update tbl_student_subject set first_term_class_test = " . round ($sum, 2) . ", first_term_final_mark = "
					. round ($final_mark, 2) . ", first_term_total_mark = " . $total_mark . ", grade_id = " 
					. $grade_id . ", first_term_grade = '" . $grade . "' where student_id = '"
					. $student_id . "' and class_id = " . $class_id . " and subject_id = " . $subject_id ;
		else if ( $term_id == 2 )					
			$sql = "update tbl_student_subject set second_term_class_test = " . round ($sum, 2) . ", second_term_final_mark = "
					. round ($final_mark, 2) . ", second_term_total_mark = " . $total_mark . ", grade_id = " 
					. $grade_id . ", second_term_grade = '" . $grade . "' where student_id = '"
					. $student_id . "' and class_id = " . $class_id . " and subject_id = " . $subject_id ;					
		else if ( $term_id == 3 )					
			$sql = "update tbl_student_subject set third_term_class_test = " . round ($sum, 2) . ", third_term_final_mark = "
					. round ($final_mark, 2) . ", third_term_total_mark = " . $total_mark . ", grade_id = " 
					. $grade_id . ", third_term_grade = '" . $grade . "' where student_id = '"
					. $student_id . "' and class_id = " . $class_id . " and subject_id = " . $subject_id ;					

		mysql_query ($sql, $conn) ;
	}
}
?>