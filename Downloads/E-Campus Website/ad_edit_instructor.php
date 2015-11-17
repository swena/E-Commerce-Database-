<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name1 = (mysql_query("SELECT InstructorID FROM instructor"));
?>

<form  name="form2" action="ad_view_instructor.php" method="post" class="form1" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">Choose Instructor to view details</legend>
          
 <label  id="label">Instructor ID</label>
   <select name="name">
 <?php 
 while($name2 = mysql_fetch_array($name1))
 {

echo "<option value='".$name2['InstructorID']."'>".$name2['InstructorID']."</option>";
	 
 }?>
 </select>                                  

 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" value="View/Edit" class="button" > 
 </fieldset>   
</form>
<?php include 'inludes/Footer.php'; ?>