<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';
$user = $_SESSION['username'];

$name = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE StudentID=".$_SESSION['username']));
$p = $name['ProgID'];
$prg = mysql_fetch_array(mysql_query("SELECT ProgName FROM program WHERE ProgID='$p'"));
$sql = mysql_query("Select grade, CourseNo from registers where AcadYear='" .$_GET['AcadYear'] ."' and Semester ='" .$_GET['Semester']. "'and StudentID =".$_SESSION['username']);


?>

<form class="formNew" style="margin: 150px 350px 200px 300px" method="get">
	
    <fieldset class="fieldset">
	<legend id="legend">Grade Card</legend><br />
 <?php

$acad = $_GET['AcadYear'];
$semtr = $_GET['Semester'];

$studname = $name['Name'];

$t = $prg['ProgName'];
$studid = $_SESSION['username'];
$batch = $name['Batch'];

$res_header =<<<EOD

 	<table align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="600px">
    	<tr>
        	<td colspan="6" align="center" id="cellcolor">Details</td>
         </tr>
         <tr>
         	<td id="cellcolor">Name</td>
            <td>$studname</td>
            <td id="cellcolor">Program</td>
            <td>$t </td>
            <td id="cellcolor">Semester</td>
            <td>$semtr</td>
          </tr>
          <tr>
          	<td id="cellcolor">Student ID</td>
            <td>$studid</td>
            <td id="cellcolor">Batch</td>
            <td>$batch</td>
            <td id="cellcolor">Date</td>
            <td>26th March 2013</td>
         </tr>
		 </table>
		 <br /><br />
		 
EOD;

$res_details ="";
$res_details .=<<<SMILE
		<table  align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	<tr>
        	<td colspan="6" align="center" id="cellcolor">Result</td>
         </tr>
         <tr>
         	<td id="cellcolor">Course Title</td>
            <td id="cellcolor">Course Code</td>
            <td id="cellcolor">Credit</td>
			<td id="cellcolor">Grade</td>
			<td id="cellcolor">Grade Points</td>
			<td id="cellcolor">Remarks</td>
         </tr>
		 
SMILE;
$credit_sum = 0;
$grade_sum = 0;
$credit_reg = 0;
while ($c = mysql_fetch_array($sql))
{
$coursecode=mysql_fetch_array(mysql_query("Select * from course where CourseNo='" .$c['CourseNo'] ."'"));

$cname = $coursecode['CourseName'];
$cno=$coursecode['CourseNo'];
$credit=$coursecode['Credit'];
$grade=$c['grade'];
$credit_reg = $credit_reg + $credit;
if($grade!="F")
{
$credit_sum = $credit_sum + $credit;
}

if( $grade == "AA")
{
	$grade_pt = 10;
	
}
elseif( $grade == "AB")
{
	$grade_pt = 9;
	
}
elseif( $grade == "BB")
{
	$grade_pt = 8;
	
}
elseif( $grade == "BC")
{
	$grade_pt = 7;
	
}
elseif( $grade == "CC")
{
	$grade_pt = 6;
	
}
elseif( $grade == "CD")
{
	$grade_pt = 5;
	
}
elseif( $grade == "DD")
{
	$grade_pt = 4;
	
}
elseif( $grade == "DE")
{
	$grade_pt = 3;
	
}
elseif( $grade == "F")
{
	$grade_pt = 0;
	
}

$grade_pt1 = $grade_pt*$credit;
$grade_sum = $grade_sum + $grade_pt1 ;

$res_details .=<<<SMILE
         <tr>
         	<td >$cname</td>
            <td >$cno</td>
            <td >$credit</td>
			<td >$grade</td>
			<td >$grade_pt1</td>
SMILE;
if($grade != "F")
$res_details .=<<<SMILE
<td >PASSED</td>
</tr>
SMILE;
else
$res_details .=<<<SMILE
<td >FAILED</td>
</tr>
SMILE;
}

$res_close = "</table> </br> </br>";
$spi = ($grade_sum/$credit_sum);
if(mysql_fetch_array(mysql_query("SELECT * FROM result WHERE StudentID='$user' and AcadYear=$acad and Semester='$semtr'"))==0)
$in = mysql_query("INSERT INTO  result(StudentID, AcadYear, Semester,credit_reg, credit_earn, grade_earn,spi) VALUES ('$user', $acad, '$semtr',$credit_reg, $credit_sum, $grade_sum, $spi)");

/**********************Calculating CPI **********************************/
$result=mysql_query("Select * from result where  StudentID = \"$user\" ");

$ce = 0;
$ge = 0;
$cr = 0;
while ($ss = mysql_fetch_array($result))
{
	
	if($semtr=='Autumn')
	{
		
		$pre= $ss['AcadYear'];
		if($pre < $acad || ($ss['AcadYear']==$acad && $ss['Semester']=='Autumn'))
		{
			
	$ce = $ce + $ss['credit_earn'];
	$cr = $cr + $ss['credit_reg'];
	$ge = $ge + $ss['grade_earn'];
		
		}
	}
	else if($semtr=='Winter')
	{
		if($ss['AcadYear']<$acad || ($ss['AcadYear']==$acad && ($ss['Semester']=='Autumn' || $ss['Semester']=='Winter')))
		{
	$ce = $ce + $ss['credit_earn'];
	$cr = $cr + $ss['credit_reg'];
	$ge = $ge + $ss['grade_earn'];
		}
		
	}
	else if($semtr=='Summer')
	{
		if($ss['AcadYear']<=$acad)
		{
	$ce = $ce + $ss['credit_earn'];
	$cr = $cr + $ss['credit_reg'];
	$ge = $ge + $ss['grade_earn'];
		}
		
	}
	
}
$cpi = ($ge/$ce);
$res_spi ="";
$res_spi .=<<<CPI

		<table  align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	<tr>
        	<td colspan="4" align="center" id="cellcolor">Current Semester Performance</td>
			<td colspan="4" align="center" id="cellcolor">Cumulative Performance</td>
         </tr>
         <tr colspan="2">
         	<td id="cellcolor">Credits Registered</td>
            <td id="cellcolor">Credits Earned</td>
            <td id="cellcolor">Grade Points Earned</td>
			<td id="cellcolor">&nbsp;&nbsp;&nbsp;SPI&nbsp;&nbsp;&nbsp;</td>
			<td id="cellcolor">Credits Registered</td>
			<td id="cellcolor">Credits Earned</td>
			<td id="cellcolor">Grade Points Earned</td>
			<td id="cellcolor">&nbsp;&nbsp;&nbsp;CPI&nbsp;&nbsp;&nbsp;</td>
         </tr>
		 <tr colspan="2">
         	<td>$credit_reg</td>
            <td>$credit_sum</td>
            <td>$grade_sum</td>
			<td>&nbsp;&nbsp;&nbsp;$spi&nbsp;&nbsp;&nbsp;</td>
			<td >$cr</td>
			<td>$ce</td>
			<td>$ge</td>
			<td>&nbsp;&nbsp;&nbsp;$cpi&nbsp;&nbsp;&nbsp;</td>
         </tr>
		 
		 
CPI;

			

$res =<<<SEM
			$res_header
			$res_details
			$res_close
			$res_spi
SEM;
echo $res;

?>
</fieldset>
</form>
