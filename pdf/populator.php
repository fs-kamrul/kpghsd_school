<?php
require_once ('phplib/db.php') ;

// Added by Junayeed on 4/7/2012 9:59AM
function getStudentGroupListCombo($grp = "")
{
   $sql = "SELECT grp FROM tbl_class GROUP BY grp";
   
   $result  = mysql_query($sql);
   
   $grpList = "<select name='group'>";
   
   while ( $row = mysql_fetch_array($result) )
   {
      if ($row['grp'] == $grp)
      {
         $grpList .= "<option value='" . $row['grp'] . "' selected>" .  $row['grp'] . "</option>";	
      }
      else
      {
      	 $grpList .= "<option value='" . $row['grp'] . "'>" .  $row['grp'] . "</option>";	
      }
   }
   
   $grpList .= "</select>";
   
   return $grpList;	
}



function getMemberStatus ($name="status", $id="status")
{
	$status = "<select name='" . $name . "' id='" . $id . "'>" .
				"<option>Faculty</option>
                <option>PhD Student</option>
                <option>MS Student</option>" ;
	return $status ;
}

function getSelectedMemberStatus ($s, $name="status", $id="status")
{
	$status = "<select name='" . $name . "' id='" . $id . "'>" ;
	if (strcmp ($s, "Faculty") == 0) 
		$status .= "<option selected>Faculty</option>" ;
	else 
		$status .= "<option>Faculty</option>" ;
	if (strcmp ($s, "PhD Student") == 0) 
		$status .= "<option selected>PhD Student</option>" ;
	else 
		$status .= "<option>PhD Student</option>" ;
	if (strcmp ($s, "MS Student") == 0) 
		$status .= "<option selected>MS Student</option>" ;
	else 
		$status .= "<option>MS Student</option>" ;
	return $status ;
}

function getTermCombo ($name="Term", $selected="")
{
	$term = "<select name='{$name}' id='{$name}'>";
	//$year = "<select name='year' id='year'>" ;	
	if (strcmp ($selected, "First Term") == 0)
		$term .= "<option selected>First Term</option>" ;
	else 
		$term .= "<option>First Term</option>" ;

	if (strcmp ($selected, "Second Term") == 0)
		$term .= "<option selected>Second Term</option>" ;
	else 
		$term .= "<option>Second Term</option>" ;

	if (strcmp ($selected, "Third Term") == 0)
		$term .= "<option selected>Third Term</option>" ;
	else 
		$term .= "<option>Third Term</option>" ;
 /*               New Added on 12/10/2007           */
	if (strcmp ($selected, "All Terms") == 0)
		$term .= "<option selected>All Terms</option>" ;
	else 
		$term .= "<option>All Terms</option>" ;

	return $term;
}

/*
function getSelectedTerm ($s, $name="term", $id="term")
{
	$term = "<select name='" . $name . "' id='" . $id . "'>" ;
	if (strcmp ($s, "First Term") == 0) 
		$term .= "<option selected>First Term</option>" ;
	else 
		$term .= "<option>Second Term</option>" ;
	if (strcmp ($s, "Second Term") == 0) 
		$term .= "<option selected>Second Term</option>" ;
	else 
		$term .= "<option>Second Term</option>" ;
	if (strcmp ($s, "Third Term") == 0) 
		$term .= "<option selected>Third Term</option>" ;
	else 
		$term .= "<option>Third Term</option>" ;

	return $term ;
}
*/

function getMonth ()
{
	$month = "<select name='month' id='month'>				
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
              </select>" ;
	return $month ;
}

function getSelectedMonth ($m = '')
{
	if (empty ($m))
	{
	   $m = date('F');
	}
	
	$month = "<select name='month' id='month'>" ;
	if (strcmp ($m, "January") == 0) 
		$month .= "<option selected>January</option>" ;
	else 
		$month .= "<option>January</option>" ;
	if (strcmp ($m, "February") == 0) 
		$month .= "<option selected>February</option>" ;
	else 
		$month .= "<option>February</option>" ;
	if (strcmp ($m, "March") == 0) 
		$month .= "<option selected>March</option>" ;
	else 
		$month .= "<option>March</option>" ;
	if (strcmp ($m, "April") == 0) 
		$month .= "<option selected>April</option>" ;
	else 
		$month .= "<option>April</option>" ;
	if (strcmp ($m, "May") == 0) 
		$month .= "<option selected>May</option>" ;
	else 
		$month .= "<option>May</option>" ;
	if (strcmp ($m, "June") == 0) 
		$month .= "<option selected>June</option>" ;
	else 
		$month .= "<option>June</option>" ;
	if (strcmp ($m, "July") == 0) 
		$month .= "<option selected>July</option>" ;
	else 
		$month .= "<option>July</option>" ;
	if (strcmp ($m, "August") == 0) 
		$month .= "<option selected>August</option>" ;
	else 
		$month .= "<option>August</option>" ;
	if (strcmp ($m, "September") == 0) 
		$month .= "<option selected>September</option>" ;
	else 
		$month .= "<option>September</option>" ;
	if (strcmp ($m, "October") == 0) 
		$month .= "<option selected>October</option>" ;
	else 
		$month .= "<option>October</option>" ;
	if (strcmp ($m, "November") == 0) 
		$month .= "<option selected>November</option>" ;
	else 
		$month .= "<option>November</option>" ;
	if (strcmp ($m, "December") == 0) 
		$month .= "<option selected>December</option>" ;
	else 
		$month .= "<option>December</option>" ;
	$month .= "</select>" ;
	
	return $month ;
}

function getYearCombo ($name = "Year", $beg_year = 2000, $end_year = 2050, $selected=2006)
{
	$year = "<select name='{$name}' id='{$name}'>";
	//$year = "<select name='year' id='year'>" ;	

	for ($i = $beg_year; $i <= $end_year; ++$i)
		if ($i == $selected)
			$year .= "<option selected>" . $i . "</option>"	;
		else
			$year .= "<option>" . $i . "</option>"	;

	$year .= "</select>" ;

	return $year ;
}

function getMonthCombo ($name = "Month", $selected = "")
{
	$month = "<select name='{$name}' id='{$name}'>";
	//$year = "<select name='year' id='year'>" ;	

	for ($i = 1; $i <= 12; ++$i)
		if ( strcmp ($selected, $i) == 0)
			$month .= "<option selected>" . $i . "</option>"	;
		else 
			$month .= "<option>" . $i . "</option>"	;
	$month .= "</select>" ;

	return $month ;
}

function getDayCombo ($name = "Day", $selected = "")
{
	$day = "<select name='{$name}' id='{$name}'>";
	//$year = "<select name='year' id='year'>" ;	

	for ($i = 1; $i <= 31; ++$i)
		if ( strcmp ($selected, $i) == 0)
			$day .= "<option selected>" . $i . "</option>"	;
		else
			$day .= "<option>" . $i . "</option>"	;
	$day .= "</select>" ;

	return $day ;
}

function getSelectedYear ($y='', $beg_year = 2010, $end_year = 2050)
{
	if (empty($y) )
	{
	   $y = date('Y');	
	}
	
	$year = "<select name='year' id='year'>" ;	

	for ($i = $beg_year; $i <= $end_year; ++$i)
	{
		if ($i == $y)
			$year .= "<option selected>" . $i . "</option>"	;
		else
			$year .= "<option>" . $i . "</option>"	;
	}
	$year .= "</select>" ;

	return $year ;
}

function getCountry ()
{
	// when modify also give an entry to getSelectedCountry () function
	$country[] = "..." ;
	$country[] = "Bangladesh" ;
	$country[] = "India" ;
	$country[] = "Pakistan" ;
	$country[] = "China" ;
	$country[] = "United States" ;
	$country[] = "United Kingdom" ;
	$country[] = "Canada" ;
	$country[] = "Japan" ;
	$country[] = "Australia" ;
	$country[] = "Italy" ;
	$country[] = "Greece" ;
	
	sort ($country, SORT_STRING) ;
	$n = count ($country) ;
	
	$str = "<select name='country' id='country'>" ;
	for ($i = 0; $i < $n; ++$i)
		$str .= "<option>" . $country[$i] . "</option>" ;

	$str .= "</select>" ;
	
	return $str ;
}

function getSelectedCountry ($c="empty")
{
	// when modify also give an entry to getCountry () function
	$country[] = "..." ;
	$country[] = "Bangladesh" ;
	$country[] = "India" ;
	$country[] = "Pakistan" ;
	$country[] = "China" ;
	$country[] = "United States" ;
	$country[] = "United Kingdom" ;
	$country[] = "Canada" ;
	$country[] = "Japan" ;
	$country[] = "Australia" ;
	$country[] = "Italy" ;
	$country[] = "Greece" ;
	
	sort ($country, SORT_STRING) ;
	$n = count ($country) ;
	
	$str = "<select name='country' id='country'>" ;
	for ($i = 0; $i < $n; ++$i)
		if (strcmp ($c, $country[$i]) == 0)
			$str .= "<option selected>" . $country[$i] . "</option>" ;
		else
			$str .= "<option>" . $country[$i] . "</option>" ;

	$str .= "</select>" ;
	
	return $str ;
}

function getState ()
{
	// when modify also give an entry to getSelectedState() function
	$states[] = "..." ;
	$states[] = "Michigan" ;
	$states[] = "Newyork" ;
	$states[] = "Arizona" ;
	$states[] = "Alabama" ;
	$states[] = "Mississipi" ;
	$states[] = "Texas" ;
	$states[] = "California" ;
	$states[] = "Illinois" ;
	$states[] = "Ohio" ;
	$states[] = "North Carolina" ;
	$states[] = "South Carolina" ;
	
	
	sort ($states, SORT_STRING) ;
	$n = count ($states) ;
	
	$str = "<select name='state' id='state'>" ;
	for ($i = 0; $i < $n; ++$i)
		$str .= "<option>" . $states[$i] . "</option>" ;

	$str .= "</select>" ;
	
	return $str ;
}

function getSelectedState ($c="...")
{
	// when modify also give an entry to getCountry () function
	$states[] = "..." ;
	$states[] = "Michigan" ;
	$states[] = "Newyork" ;
	$states[] = "Arizona" ;
	$states[] = "Alabama" ;
	$states[] = "Mississipi" ;
	$states[] = "Texas" ;
	$states[] = "California" ;
	$states[] = "Illinois" ;
	$states[] = "Ohio" ;
	$states[] = "North Carolina" ;
	$states[] = "South Carolina" ;
	
	sort ($states, SORT_STRING) ;
	$n = count ($states) ;
	
	$str = "<select name='state' id='state'>" ;
	for ($i = 0; $i < $n; ++$i)
		if (strcmp ($c, $states[$i]) == 0)
			$str .= "<option selected>" . $states[$i] . "</option>" ;
		else
			$str .= "<option>" . $states[$i] . "</option>" ;

	$str .= "</select>" ;
	
	return $str ;
}

function getClassCombo($name="Class", $selected=""){
	$class[] = "One" ;
	$class[] = "Two" ;
	$class[] = "Three" ;
	$class[] = "Four" ;
	$class[] = "Five" ;
	$class[] = "Six" ;
	$class[] = "Seven" ;
	$class[] = "Eight" ;
	$class[] = "Nine" ;
	$class[] = "Ten" ;
	$class[] = "Eleven" ;
	$class[] = "Twelve" ;
	$class[] = "BA" ;
	
	$n = count($class);
	
	$strClass="<select name='{$name}' id='{$name}'>";
	for($i=0; $i<$n; $i++){
		if (strcmp ($selected, $class[$i]) == 0)
			$strClass .="<option selected>". $class[$i] ."</option>";
		else
			$strClass .="<option>". $class[$i] ."</option>";
	}
	$strClass.="</select>";
	
	return $strClass;
}

function getSectionCombo($name="Section", $selected=""){
	$arLevel[] = "A";
	$arLevel[] = "B";
	$arLevel[] = "C";
	$arLevel[] = "D";
	$arLevel[] = "SHAPLA";
	$arLevel[] = "PADMA";
		
	$n = count($arLevel);

	$strSection="<select name='{$name}' id='{$name}'>";
	for($i=0; $i<$n; $i++){
		if (strcmp ($selected, $arLevel[$i]) == 0)
			$strSection.="<option selected>".$arLevel[$i]."</option>";
		else 
			$strSection.="<option>".$arLevel[$i]."</option>";
	}
	$strSection.="</select>";
	return $strSection;
}

function getGroupCombo($name="Group", $selected=""){
	$group[] = "None";
	$group[] = "Science";
	$group[] = "Humanities";
	$group[] = "Business Studies";
	$group[] = "Commerce";
	$group[] = "Arts";

	
	$n = count($group);

	$strGroup = "<select name='{$name}' id='{$name}'>";
	for($i=0; $i<$n; $i++){
		if (strcmp ($selected, $group[$i]) == 0)
			$strGroup .="<option selected>".$group[$i]."</option>";
		else 
			$strGroup .="<option>".$group[$i]."</option>";
	}
	$strGroup .="</select>";
	return $strGroup ;
}

function getLevelCombo($name="Level", $selected=""){
	$arLevel[] = "Primary";
	$arLevel[] = "Secondary";
	$arLevel[] = "College";

	$n = count($arLevel);
	
//	$strLevel="<select name='{$name}' id='{$name}'>";


	for($i=0; $i<$n; $i++){
		if (strcmp($selected, $arLevel[$i]) == 0)
			$strLevel.="<option selected>".$arLevel[$i]."</option>";
		else 
			$strLevel.="<option>".$arLevel[$i]."</option>";
	}
//	$strLevel.="</select>";
	return $strLevel;

}

function getReligionCombo ($name="Religion", $selected = "")
{
	$religion[] = "Islam";
	$religion[] = "Hindu";
	$religion[] = "Christian";
	$religion[] = "Buddist";
	$religion[] = "Other";

	$n = count($religion);
	
	$strReligion = "<select name='{$name}' id='{$name}'>" ;
	for($i=0; $i<$n; $i++){
		if (strcmp($selected, $religion[$i]) == 0)
			$strReligion .= "<option selected>".$religion[$i]."</option>";
		else 
			$strReligion .= "<option>".$religion[$i]."</option>";
	}
	$strReligion .= "</select>" ;
	return $strReligion ;
}

function getGenderCombo ($name="Gender", $selected = "")
{
	
	$gender[] = "Male";
	$gender[] = "Female";
	

	$n = count($gender);
	
	$strgender = "<select name='{$name}' id='{$name}'>" ;
	for($i=0; $i<$n; $i++){
		if (strcmp($selected, $gender[$i]) == 0)
			$strgender .= "<option selected>".$gender[$i]."</option>";
		else 
			$strgender .= "<option>".$gender[$i]."</option>";
	}
	$strgender .= "</select>" ;
	return $strgender ;
}

function getDesignationCombo($name="Designation",$selected=""){
	$designation[] = "Principal";
	$designation[] = "Vice Principal";
	$designation[] = "Asst Professor";
	$designation[] = "Lecturer";
	$designation[] = "Asst Headmaster";
	$designation[] = "Asst Teacher";
	$designation[] = "Office Assistant";
		
	$n = count($designation);

	$strDesignation="<select name='{$name}' id='{$name}'>";
	for($i=0; $i<$n; $i++){
		if (strcmp($selected, $designation[$i]) == 0)
			$strDesignation .= "<option selected>".$designation[$i]."</option>";
		else 
			$strDesignation .= "<option>".$designation[$i]."</option>";
	}
	$strDesignation.="</select>";
	return $strDesignation;
}

function getDistrictCombo ($name="District", $selected = "")
{
	$district[] = "Nilphamari";
	$district[] = "Kurigram";
	$district[] = "Lalmonirhat";
	$district[] = "Rangpur";
	$district[] = "Gaibandha";
	$district[] = "Dinajpur";
	$district[] = "Panchagor";
	$district[] = "Thakurgaon";	
	$district[] = "Dhaka";
	$district[] = "Comilla" ;
	$district[] = "Rajshahi" ;
	$district[] = "Khulna" ;
	$district[] = "Jessore" ;
	$district[] = "Chittagong" ;
	$district[] = "Kushtia" ;
	$district[] = "Mymanshing" ;
	$district[] = "Shylet" ;
	$district[] = "Barisal" ;
	$district[] = "Pabna" ;
	$district[] = "Jamalpur" ;

	$n = count($district);
	
	$strDistrict = "<select name='{$name}' id='{$name}'>" ;
	for($i=0; $i<$n; $i++){
		if (strcmp($selected, $district[$i]) == 0)
			$strDistrict .= "<option selected>".$district[$i]."</option>";
		else 
			$strDistrict .= "<option>".$district[$i]."</option>";
	}
	$strDistrict .= "</select>" ;
	return $strDistrict ;
}

function getQualificationCombo ($name="Qualification", $selected = "")
{
	$qualification[] = "B.Sc.";
	$qualification[] = "B.A.";
	$qualification[] = "B.Com.";
	$qualification[] = "B.Ss.";
	$qualification[] = "M.Sc.";
	$qualification[] = "M.A.";
	$qualification[] = "M.Com";
	$qualification[] = "M.Ss.";
	$qualification[] = "Kamil";
	$qualification[] = "Fazil";
	$qualification[] = "Kabbo Tirtho";

	$n = count($qualification);
	
	$strQualification = "<select name='{$name}' id='{$name}'>" ;
	for($i=0; $i<$n; $i++){
		if (strcmp($selected, $qualification[$i]) == 0)
			$strQualification .= "<option selected>".$qualification[$i]."</option>";
		else 
			$strQualification .= "<option>".$qualification[$i]."</option>";
	}
	$strQualification .= "</select>" ;
	return $strQualification ;
}

function getAdministratorCombo($name="Administrator", $selected=""){
	$administrator[] = "NONE" ;
	$administrator[] = "ADMIN" ;
	$administrator[]  = "RESULT" ;
	$administrator[]  = "FINANCE" ;
	
	$strAdministrator="<select name='{$name}' id='{$name}'>";
	for($i=0; $i<4; $i++){
		
		if (strcmp($selected, $administrator[$i]) == 0)
			$strAdministrator .="<option selected>". $administrator[$i] ."</option>";
		else 
			$strAdministrator .= "<option>".$administrator[$i]."</option>";
	}
	$strAdministrator.="</select>";
	
	return $strAdministrator;
}

/*****               populators from database information    *****************************************/

function getPresentTeacherCombo ($name="Teacher", $selected = "")
{
	$db = new DB () ;
	$conn = $db->getConnection () ;
	$strTeacher = "<select name='{$name}' id='{$name}'>" ;
	
	if ($conn)
	{
		$sqlstr = "select name from tbl_teacher where leaving_date = '0000-00-00'" ;
		//echo ("getting teacher info <br/>" . $sqlstr . "<br/>") ;
		$result = mysql_query ($sqlstr, $conn) ;			
		if ($result)
		{
			while ( $row = mysql_fetch_assoc ($result) )
			{
			  	if (strcmp ($row['name'], $selected) == 0) 
					$strTeacher .= "<option selected>". $row['name'] ."</option>";
				else 
					$strTeacher .= "<option>". $row['name'] ."</option>";

			}			
		} //$result
	} // $conn
	$strTeacher .= "</select>" ;
	return $strTeacher ;
}

function getAdditionalSubjectCombo ($name="Add_combo", $class = "", $group = "None", $selected = "")
{
	initdb () ;

	$str = "<select name='{$name}' id='{$name}'>" ;

	$sql = "select subject_id, title from tbl_subject where class = '$class' and grp = '$group' and additional = 1" ;
	$rs = mysql_query ($sql) ;
	while ($row = mysql_fetch_assoc ($rs))
	{
			  	if (strcmp ($row['title'], $selected) == 0) 
					$str .= "<option selected>". $row[subject_id] . "-" . $row['title'] ."</option>";
				else 
					$str .= "<option>". $row[subject_id] . "-" . $row['title'] ."</option>";	
	}
	$str .= "</select>" ;
	return $str ;
	
}
/*********************************************/
/*
Alabama
Alaska
Arizona
Arkansas
California

*/
?>