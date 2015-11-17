<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';

$sql1 = mysql_query("Select Batch from student where StudentID = ".$_SESSION['username']);
$batch = mysql_fetch_array($sql1);
extract($batch);
$sql2 = mysql_query("Select max(AcadYear) as max_acad from registers where StudentID =".$_SESSION['username']);
$row = mysql_fetch_array($sql2);
extract($row);
$sql3 = mysql_query("Select DISTINCT Semester , AcadYear from registers where AcadYear >= \"$Batch\" and  AcadYear <= \"$max_acad\" and StudentID =".$_SESSION['username']);
$sql4 = mysql_fetch_array(mysql_query("Select * from Semester WHERE Status=1"));
$an = $sql4['AcadYear'];
$sn = $sql4['Semester'];
echo $an;
echo $sn;
?>


<form class="form" style="margin: 150px 450px 200px 350px">
	<fieldset class="fieldset">
	<legend id="legend">Select</legend><br />
<?php
$semester_header =<<<EOD
 	<table align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="600px">
    	<tr>
        	<td id="sem1">Acad year</th>
            <td id="date1">Semester</th>
            <td id="submit1">Action</th>
        </tr>    
      
EOD;

$semester_details = '';
while ($sem = mysql_fetch_array($sql3))
{
	$sem1 = $sem['Semester'];
	$acad = $sem['AcadYear'];
$semester_details .=<<<DET

		<tr>
        	<td id="cellcolor">$acad </td>
            <td>$sem1</td>
            <td submit="button"><fieldset><a href= "regdetails.php?AcadYear=$acad&Semester=$sem1" class="button">EDIT</a> </fieldset></td>
        </tr>  
DET;
}

if(mysql_num_rows(mysql_query("Select * from Semester WHERE Status=1"))==1)
{
	$an = $sql4['AcadYear'];
	$sn = $sql4['Semester'];
$semester_details .=<<<DET
<h1><a href="reg_new.php?AcadYear=$an&Semester=$sn">Click Here to Register For New Semeter</a></h1>
DET;
}

$semester_footer="</table>";
$semester =<<<SEM
			$semester_header
			$semester_details
			$semester_footer
SEM;
echo $semester;
?>
      </fieldset>   
</form>

