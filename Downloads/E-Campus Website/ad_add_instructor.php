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
 <legend id="legend">Add Instructor</legend>
          
 
 <label id="label">Instructor ID</label>
 <input required  id="input" name="id"  type="text" maxlength="100" value=""><div id="id1"></div></input>                                  
 
 <label  id="label">Instructor Name</label>
 <input type="text" name="name" value=""><div id="name1"></div></input>
 
 <label  id="label">Password</label>
 <input type="password" name="pass1" value=""><div id="pass1"></div></input>
 
 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>
<?php 
$sname=filter_input(INPUT_POST,'name');
$id=filter_input(INPUT_POST,'id');
$pass=md5(filter_input(INPUT_POST,'pass1'));
$sql=("INSERT INTO instructor (InstructorID, Password, InstructorName)
VALUES ('$id','$pass','$sname')");
mysql_query($sql);
?>
<?php include 'inludes/Footer.php'; ?>