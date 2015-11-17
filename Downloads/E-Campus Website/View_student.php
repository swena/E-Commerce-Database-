<?php
include 'inludes/init.php';
include 'inludes/Header_instructor.php';
include 'inludes/Footer.php'; 

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("Home.php");
    exit();
} 
$ad=mysql_query("SELECT distinct AcadYear FROM offers WHERE InstructorID=".$_SESSION['username']);
$sm=mysql_query("SELECT distinct Semester FROM offers WHERE InstructorID=".$_SESSION['username']);
$cn=mysql_query("SELECT distinct CourseNo FROM offers WHERE InstructorID=".$_SESSION['username']);
?>
<form class="formNew" style="margin: 150px 350px 200px 300px" method="post" action="fpdfmysql.php">
	
    <fieldset class="fieldset">
	<legend id="legend">View Students</legend><br />
<?php
$view_header = "";
$view_header .=<<<FOD
<table align="center" bordercolordark="#0099FF" cellspacing="0" width="400px">
	<tr>
            <td align="center">
            <select name ="Choosen_acad">
            <option value="1">Select Acad Year</option>
FOD;
    while($year = mysql_fetch_array($ad))
	{
		$yr = $year['AcadYear'];
$view_header .=<<<FOD

            <option value="$yr"> $yr</option>
FOD;
}
$view_header .=<<<FOD
</select>
</td>
</tr>


<tr>
            <td align="center">
            <select name ="Choosen_s">
            <option value="1">Select Semester</option>
FOD;
    while($semestr = mysql_fetch_array($sm))
	{
		$se = $semestr['Semester'];
$view_header .=<<<FOD

            <option value="$se"> $se</option>
FOD;
}

$view_header .=<<<FOD
</select>
</td>
</tr>

<tr>
            <td align="center">
            <select name ="Choosen_c">
            <option value="1">Select CourseNo.</option>
FOD;
    while($course = mysql_fetch_array($cn))
	{
		$c = $course['CourseNo'];
$view_header .=<<<FOD

            <option value="$c"> $c</option>
FOD;
}
echo $view_header;
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


	
    
