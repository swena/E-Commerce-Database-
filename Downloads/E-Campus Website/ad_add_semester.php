<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 

?>

<form  name="form2" action="" method="post" class="form1" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">Add Semester</legend>
          
 
 <label id="label">Semester</label>
 <input required  id="input" name="sem"  type="text" maxlength="100" value=""><div id="sem1"></div></input>                                  
 
 <label  id="label">Academic Year</label>
 <input type="text" name="ayear" value=""><div id="ayear"></div></input>
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>
<?php 
$sem=$_POST['sem'];
$ayear=$_POST['ayear'];
$sql=("INSERT INTO semester (AcadYear, Semester)
VALUES ($ayear, '$sem')");
mysql_query($sql);
?>
<?php include 'inludes/Footer.php'; ?>