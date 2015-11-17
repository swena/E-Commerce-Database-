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
$try=mysql_query("Select Semester from registers where StudentID = ".$_SESSION['username']);
$sem = mysql_fetch_array($try);
extract($sem);
$sql2 = mysql_query("Select max(AcadYear) as max_acad from registers where StudentID =".$_SESSION['username']);
$row = mysql_fetch_array($sql2);
extract($row);

$sql4 = mysql_query("Select DISTINCT Semester, AcadYear from registers where AcadYear >= \"$Batch\" and  AcadYear <= \"$max_acad\" and StudentID =".$_SESSION['username']);


?>
	
	<form action="feedetails.php" class="feeform" style="margin: 150px 250px 200px 400px" method="post">
	<fieldset class="fieldset">
	<legend id="legend">&nbsp;&nbsp;Fee Receipts&nbsp;&nbsp;</legend><br /><br /><br />
<?php
//$Semester I= $batch['Batch'];

//$Semester II= $batch[]

$fee_header = "";
$fee_header .=<<<FOD
<table align="center" bordercolordark="#0099FF" cellspacing="0" width="400px">
	<tr>
            <td align="center">
            <select name ="Choosen_sem">
            <option value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
FOD;


while ($fee = mysql_fetch_array($sql4))
{
	$fee1 = $fee['Semester'];
	//echo $fee1;
	$acad1 = $fee['AcadYear'];
	if($sem['Semester']=='Autumn')
{
	$SemesterII= $sem['Semester'];
}
else 
{
	$SemesterIII=  $sem['Winter'];
}
	//echo $acad1;
	//$Semester=$acad1:$fee1;
	//$Semester=$fee1($acad1);
	
$fee_header .=<<<FOD
		<option value="$acad1:$fee1"> $fee1($acad1)</option>
			
			
FOD;
}
echo $fee_header;
?>
</select>
</td> 
            
<td id="button">
			<fieldset>
			<input type="submit" name="submit" />
 			</fieldset>
			</td>  
            </tr>
			</table>


	


      </fieldset>   
</form>


