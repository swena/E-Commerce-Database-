<?php
include 'inludes/init.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 



$name=$_POST['name'];
$id=$_POST['id'];
$pass=$_POST['pass'];
$hide=$_POST['hide'];
$sql=("UPDATE instructor SET InstructorID='$id', InstructorName='$name', Password='$pass' WHERE InstructorID='".$hide."'");
if(isset($sql) && !empty($sql))
{
	echo "<!--" . $sql .	"--->";
	$result =  mysql_query($sql) or die("Invalid" . mysql_error());
	include("ad_edit_instructor.php");
	
}

?>