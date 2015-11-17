<?php
include 'inludes/init.php';
include 'inludes/Header_instructor.php';
include 'inludes/Footer.php';
// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("Home.php");
    exit();
} 
$name = mysql_fetch_array(mysql_query("SELECT * FROM instructor WHERE InstructorID=".$_SESSION['username']));

?>

<form method="post" class="form" style="margin: 150px 350px 150px 300px">
   <fieldset class="fieldset">
 <legend id="legend">About you</legend>
 <label  id="label">Instructor Name</label>
 <input id="input" name="name" type="text" maxlength="100" value="<?php echo $name['InstructorName']; ?>"> </input>          
 
 <label id="label">Instructor ID</label>
 <input  id="input" type="text" maxlength="100" value="<?php echo $name['InstructorID']; ?>"></input>                                  
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
 </fieldset>
</form>


