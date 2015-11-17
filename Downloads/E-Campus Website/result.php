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

?>


<form class="form" style="margin: 150px 450px 200px 350px" method="get">
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
            <td submit="button"><fieldset><a href= "resultview.php?AcadYear=$acad&Semester=$sem1" class="button">View</a> </fieldset></td>
        </tr>  
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

