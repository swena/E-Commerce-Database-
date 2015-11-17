<?php
include 'inludes/init.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 



$sname=$_POST['name'];
$email=$_POST['email'];
$sql=("UPDATE admin SET first_name='$sname', email='$email' WHERE username='".$_SESSION['username']."'");

if(isset($sql) && !empty($sql))
{
	echo "<!--" . $sql .	"--->";
	$result =  mysql_query($sql) or die("Invalid" . mysql_error());
	include("admin_profile.php");
	
}

//mysqli_close($con);