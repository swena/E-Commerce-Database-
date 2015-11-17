<?php
include 'inludes/init.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE StudentID=".$_SESSION['username']));


$sname=$_POST['name'];

$dob=$_POST['dob'];
$gen=$_POST['gen'];
$p=$_POST['12per'];
$sch=$_POST['school'];
$boa=$_POST['board'];
$y=$_POST['12year'];
$height=$_POST['height'];
$mk=$_POST['mark'];
$bg=$_POST['bg'];
$cla=$_POST['cla'];
$pca=$_POST['pca'];
$ea=$_POST['ea'];
$sql=("UPDATE student SET Name='$sname', date_of_birth='$dob', Gender='$gen',Percentage='$p', Name_Of_School='$sch',Board='$boa', Year='$y',Height='$height',IdentificationMark='$mk' WHERE StudentID=".$_SESSION['username']);

if(isset($sql) && !empty($sql))
{
	echo "<!--" . $sql .	"--->";
	$result =  mysql_query($sql) or die("Invlaid" . mysql_error());
	include("Profile.php");
	
}

//mysqli_close($con);