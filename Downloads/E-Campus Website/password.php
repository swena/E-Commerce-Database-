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

<form method="post" class="form" style="margin: 150px 350px 150px 300px" action="forgotpassword.php">
 <fieldset class="fieldset">
 <legend id="legend">Forgot Password</legend>
	Enter Your Email Id:
	<input type="text" name="email" />
	<input type="submit" value="Reset My Password" />
 </fieldset>   
</form>;