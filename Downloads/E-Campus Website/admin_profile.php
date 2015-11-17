<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name1 = mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='".$_SESSION['username']."'"));

?>

<form  name="form2" action="admin_update.php" method="post" class="form1" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">About you</legend>
          
 
 <label id="label">Name</label>
 <input required  id="input" name="name"  type="text" maxlength="100" value="<?php echo $name1['first_name']; ?>"><div id="name1"></div></input>                                  
 
 <label  id="label">Email</label>
 <input type="email" name="email" value="<?php echo $name1['email']; ?>"><div id="email1"></div></input>
 
 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>


<?php include 'inludes/Footer.php'; ?>