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
 <legend id="legend">Add Course</legend>
          
 
 <label id="label">Course Code</label>
 <input required  id="input" name="id"  type="text" maxlength="100" value=""><div id="id1"></div></input>                                  
 
 <label  id="label">Course Name</label>
 <input type="text" name="name" value=""><div id="name"></div></input>
 
 <label  id="label">Credits</label>
 <input type="text" name="credit" value=""><div id="credit"></div></input>
 
 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>
<?php 
$sname=$_POST['name'];
$id=$_POST['id'];
$credit=$_POST['credit'];
$sql=("INSERT INTO course (CourseNo, CourseName, Credit)
VALUES ('$id','$sname',$credit)");
mysql_query($sql);
?>
<?php include 'inludes/Footer.php'; ?>