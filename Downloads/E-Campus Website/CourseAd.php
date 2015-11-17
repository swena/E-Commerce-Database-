<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) 
{
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';
$s = $_GET['Semester'];
$name = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE StudentID=".$_SESSION['username']));
$p = $name['ProgID'];
$prg = mysql_fetch_array(mysql_query("SELECT ProgName FROM program WHERE ProgID='$p'"));
$sql = mysql_query("Select CourseNo from registers where AcadYear='" .$_GET['AcadYear'] ."' and Semester ='" .$_GET['Semester']. "'and StudentID =".$_SESSION['username']);
$sql1 = mysql_query("Select CourseNo from offers where AcadYear='" .$_GET['AcadYear'] ."' and Semester = \"$s \" ");

?>
<form class="formNew" style="margin: 150px 350px 200px 300px">
	
    <fieldset class="fieldset">
	<legend id="legend">Course Registration</legend><br />
<?php

$acad = $_GET['AcadYear'];
$semtr = $_GET['Semester'];
$studname = $name['Name'];
$t = $prg['ProgName'];
$studid = $_SESSION['username'];
$batch = $name['Batch'];
$reg_header =<<<EOD

 	<table align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	<tr>
        	<td colspan="6" align="center" id="cellcolor">Registration for this Semester</td>
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
$reg_details ="";
$reg_details .=<<<SMILE

		
		<table  align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	<tr>
        	<td colspan="5" align="center" id="cellcolor">Courses Registered for $semtr</td>
         </tr>
         <tr>
         	<td id="cellcolor">Semester</td>
            <td id="cellcolor">Title</td>
            <td id="cellcolor">Code</td>
			<td id="cellcolor">Credit</td>
			<td id="cellcolor">Register</td>
         </tr>
		 
SMILE;
while ($course = mysql_fetch_array($sql))
{
$coursecode=mysql_fetch_array(mysql_query("Select * from course where CourseNo='" .$course['CourseNo'] ."'"));

$cname = $coursecode['CourseName'];
$cno=$coursecode['CourseNo'];
$credit=$coursecode['Credit'];

$reg_details .=<<<SMILE

         <tr>
         	<td >$semtr</td>
            <td >$cname</td>
            <td >$cno</td>
			<td >$credit</td>
			<td >ACTIVE ADDED</td>
         </tr>
SMILE;
}
$reg_details .=<<<SMILE
<br /><br />
      
    	<tr>
        	<td colspan="5" align="center" id="cellcolor" width="800px" >Other Courses</td>
         </tr>
         <tr>
         	<td id="cellcolor">Sr. No.</td>
            <td id="cellcolor">Course</td>
			<td id="cellcolor">Code</td>
            <td id="cellcolor">Credits</td>
            <td id="cellcolor">Register</td>
		</tr>
SMILE;

$reg_details .=<<<SMILE
<tr>
          	<td>1.</td>
            <td>
			<select name ="Choosen_cr">
SMILE;
while($course1 = mysql_fetch_array($sql1))
{
$coursecode1=mysql_fetch_array(mysql_query("Select * from course where CourseNo='" .$course1['CourseNo'] ."'"));

$cname1 = $coursecode1['CourseName'];
$cno1=$coursecode1['CourseNo'];
$credit1=$coursecode1['Credit'];
$reg_details .=<<<SMILE
<option value="$cname1">$cname1 $cno1 $credit1</option>
SMILE;

}
$c= "Checkbox";
$num = "1";
$reg_footer = "</select>
</td>
<td></td>
<td></td>
<td><input type=$c value=$num/></td>
</tr>
</table>";

			
$reg =<<<END
	$reg_header
	$reg_details
	$reg_footer
END;

echo $reg;
            
?>


</fieldset>   
</form>