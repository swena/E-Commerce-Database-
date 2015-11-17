<?php
include 'inludes/init.php';
include 'inludes/Header.php';
include 'inludes/Footer.php';
// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name = mysql_fetch_array(mysql_query("SELECT * FROM student WHERE StudentID=".$_SESSION['username']));

?>
