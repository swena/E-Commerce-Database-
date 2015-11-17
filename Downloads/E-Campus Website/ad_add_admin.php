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
 <legend id="legend">Add Admin</legend>
          
 
 <label id="label">Name</label>
 <input required  id="input" name="name"  type="text" maxlength="100" value=""><div id="name1"></div></input>                                  
 
 <label  id="label">Email</label>
 <input type="email" name="email" value=""><div id="email1"></div></input>
 <label id="label">Username</label>
 <input required  id="input" name="uname"  type="text" maxlength="100" value=""><div id="uname1"></div></input>                                  
 
 <label  id="label">Password</label>
 <input type="password" name="pass1" value=""><div id="pass1"></div></input>
 
 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>
<?php 
$sname=filter_input(INPUT_POST,'name');
$email=filter_input(INPUT_POST,'email');
$uname=filter_input(INPUT_POST,'uname');
$pass=md5(filter_input(INPUT_POST,'pass1'));
$sql=("INSERT INTO admin (username, password, first_name, email)
VALUES ('$uname','$pass','$sname','$email')");
mysql_query($sql);
?>
<?php include 'inludes/Footer.php'; ?>