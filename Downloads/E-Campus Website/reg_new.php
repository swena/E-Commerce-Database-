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
$user = $_SESSION['username'];
echo $s;
$a = $_GET['AcadYear'];
echo $a;
$name = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE StudentID=".$_SESSION['username']));
$p = $name['ProgID'];
$prg = mysql_fetch_array(mysql_query("SELECT ProgName FROM program WHERE ProgID='$p'"));



?>
<form action="" class="formNew" style="margin: 150px 350px 200px 300px">
	
    <fieldset class="fieldset">
	<legend id="legend">Registration For New Semester</legend><br />
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

$reg_details .=<<<SMILE
<tr>
          	<td>1.</td>
            <td>
			<select name ="Choosen0">
<option value=""></option>
SMILE;
$sql1 = mysql_query("Select CourseNo from offers where AcadYear=" .$_GET['AcadYear'] ." and Semester = \"$s\" ");
$sql2 = mysql_query("Select CourseNo from offers where AcadYear=" .$_GET['AcadYear'] ." and Semester = \"$s\" ");

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
$num = "0";
$reg_details .=<<<SMILE
</select>
</td>
<td></td>
<td></td>
<td><input type=$c name=$num value=$num></td>
</tr>
<tr>
          	<td>2.</td>
            <td>
			<select name ="Choosen1">
<option value=""></option>
SMILE;
while($course2 = mysql_fetch_array($sql2))
{
$coursecode2=mysql_fetch_array(mysql_query("Select * from course where CourseNo='" .$course2['CourseNo'] ."'"));

$cname2 = $coursecode2['CourseName'];
$cno2=$coursecode2['CourseNo'];
$credit2=$coursecode2['Credit'];
$reg_details .=<<<SMILE
<option value="$cname2">$cname2 $cno2 $credit2</option>
SMILE;

}
$c= "Checkbox";
$num = "1";
$reg_footer = "</select>
</td>
<td></td>
<td></td>
<td><input type=$c name=$num value=$num></td>
</tr>
<tr>";




			
$reg =<<<END
	$reg_header
	$reg_details
	$reg_footer
END;

echo $reg;
           
?>
<td>
<input type="submit" align="center" id="cellcolor" ></td>
</tr>
</table>
</fieldset>   
</form>

<?php
$values = explode(' ',$_POST['Choosen$i']);
			  echo $values[1];
$i = 0;
while($i<2)
{
	if(isset($_POST['$i']))
	{	
			  $values = explode(' ',$_POST['Choosen$i']);
			  echo $values[1];
			  $sql = mysql_query("INSERT INTO registers(StudentID, AcadYear, Semester, CourseNo) VALUES ('$user',$a,'$s','$values[1]')") or die(mysql_error());
	}
	$i = $i-1;
}
include("Registration.php");
?>
			  