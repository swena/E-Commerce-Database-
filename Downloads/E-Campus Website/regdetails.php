<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';

$name = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE StudentID=".$_SESSION['username']));
$p = $name['ProgID'];
$prg = mysql_fetch_array(mysql_query("SELECT ProgName FROM program WHERE ProgID='$p'"));
$sql = mysql_query("Select CourseNo from registers where AcadYear='" .$_GET['AcadYear'] ."' and Semester ='" .$_GET['Semester']. "'and StudentID =".$_SESSION['username']);

?>
<form class="formNew" style="margin: 150px 400px 200px 250px">
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
            <td>27th March 2013</td>
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
			<td >ACTIVE</td>
         </tr>
SMILE;
}
$reg_otherdetails="";
$reg_otherdetails .=<<<VAR
<br></br>
<table align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	  <tr>
        	<td colspan="5" align="center" id="cellcolor">Courses for Grade Improvement</td>
          </tr>
          <tr>
         	<td id="cellcolor">Sr. No.</td>
            <td id="cellcolor">Course Avaiable</td>
			<td>Code</td>
			<td>Credits</td>
            <td id="cellcolor">Register <input type="checkbox" value="2" /></td>
           </tr>
           <tr>
          	<td>1.</td>
            <td></td>
            <td></td>
			<td></td>
			<td></td>
            </tr>
            
            <tr>
          	<td>2.</td>
            <td></td>
			<td></td>
			<td></td>
            <td></td>
            </tr>
            
            <tr>
          	<td>3.</td>
            <td></td>
			<td></td>
			<td></td>
            <td></td>
            </tr>
            
            </table>
            
            <br /><br />
            
            <table  align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	     <tr>
        	<td colspan="3" align="center" id="cellcolor">Other Backlog Courses</td>
            </tr>
		 
            <tr>
         	<td id="cellcolor">Sr. No.</td>
            <td id="cellcolor">Backlog Course</td>
            <td id="cellcolor">Register <input type="checkbox" value="2" /></td>
            </tr>
			
           
			<tr>
          	<td>1.</td>
            <td></td>
            <td></td>
            </tr>
		 
		    
			<tr>
          	<td>2.</td>
            <td></td>
            <td></td>
            </tr>
            
            </table>
            
            <br /><br />
            <table  align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="800px">
    	<tr>
        	<td colspan="3" align="center" id="cellcolor">Audit Courses</td>
         </tr>
         <tr>
         	<td id="cellcolor">Sr. No.</td>
            <td id="cellcolor">Audit Course</td>
            <td id="cellcolor">Register <input type="checkbox" value="2" /></td>
         </tr>
          
		  
           <<tr>
          	<td>1.</td>
            <td></td>
            <td></td>
            </tr>
		 
		    
			<tr>
          	<td>2.</td>
            <td></td>
            <td></td>
            </tr>/table> 
           <br /><br />
        <table  align="center"  width="800px">
    	  <tr>
        	<td submit="button"><fieldset><a class="button">Go Back</a> </fieldset></td>
          </tr>
        </table>
VAR;

$reg_footer="</table>";
$reg =<<<SEM
			$reg_header
			$reg_details
			$reg_footer
			$reg_otherdetails
SEM;
echo $reg;
?>
      </fieldset>   
</form>


      