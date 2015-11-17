<?php
include 'inludes/init.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';

?>
<html>

<head>
<title>Change Password</title>
</head>

<body >

<form action='change-passwordck.php' method='post' class="form" style="margin: 150px 350px 200px 300px">
	<fieldset class="fieldset">
	<legend id="legend">Change Password</legend><br />



  <input type='hidden' name='todo' value='change-password'>

        <table align="center" bordercolordark="#0099FF" cellspacing="5" width="400px" style="margin-left:90px;">
        <br><br><br>
        <tr > 
        <td >&nbsp;New Password</td> 
        <td>
        <input type ='password' class='bginput' name='password' ></td>
        </tr>
        
        <tr> 
        <td >&nbsp;Re-enter New Password</td> 
        <td >
        <input type ='password' class='bginput' name='password2' ></td>
        </tr>
        
        <tr> 
        <td><input type='submit' value='Change Password'></td>
        <td><input type='reset' value='Reset'></td>
        </tr>
        
        
        </table>
		</form>
</fieldset >
</form>
</body>
</html>
