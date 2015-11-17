<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name1 =mysql_query("SELECT ProgID FROM program");


?>

<form  name="form1" action="" method="post" class="form1" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">Add Student</legend>
 <label  id="label">Student Name</label>
 <input required id="input" name="name"  type="text" maxlength="100" value=""><div id="name1"></div></input>
           
 
 <label id="label">Student ID</label>
 <input required  id="input" name="id"  type="text" maxlength="100" value=""><div id="id1"></div></input>                                  
<label id="label">Password</label>
 <input required  id="input" name="pass"  type="password" maxlength="100" value=""><div id="pass1"></div></input>                                  
<label id="label">Program ID</label>
  <select name="pid">
 <?php 
 while($name2 = mysql_fetch_array($name1))
 {

echo "<option value='".$name2['ProgID']."'>".$name2['ProgID']."</option>";
	 
 }?>
 </select>                                  
<label id="label">Batch</label>
 <input required  id="input" name="batch"  type="text" maxlength="100" value=""><div id="batch"></div></input>                                  

 
  <br/> 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>



<?php


$id=filter_input(INPUT_POST,'id');
$sname=filter_input(INPUT_POST,'name');
$password=md5(filter_input(INPUT_POST,'pass'));
//$p = md5($password, TRUE);
//echo $p;


$pid=$_POST['pid'];
$batch=$_POST['batch'];

$sql=("INSERT INTO student(StudentID, Password, Name, ProgID, Batch) VALUES ('$id','$password','$sname','$pid',$batch)");

mysql_query($sql);
//mysqli_close($con);

include 'inludes/Footer.php'; ?>