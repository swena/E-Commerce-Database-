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

<form  name="form1" action="update.php" method="post" class="form" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">About you</legend>
 <label  id="label">Student Name</label>
 <input required id="input" name="name"  type="text" maxlength="100" value="<?php echo $name['Name']; ?>"><div id="name1"></div></input>
           
 
 <label id="label">Student ID</label>
 <input required  id="input" name="id"  type="text" maxlength="100" value="<?php echo $name['StudentID']; ?>"><div id="id1"></div></input>                                  
 
 <label  id="label">Date Of Birthdate</label>
 <input type="date" name="dob" value="<?php echo $name['date_of_birth']; ?>"><div id="dob1"></div></input>
 
 <label id="label">Gender</label>
 	<select  id="select" name="gen">                               
 		<option value="M" >Male</option>
 		<option value="F">Female</option>
 	</select>
    <div id="gender1"></div>
  </fieldset>
 <label  id="label">12% Percentage</label>
 <input id="input" name="12per" type="text" maxlength="100" value="<?php echo $name['Percentage']; ?>"><div id="12p1"></div></input>      
 
 <label  id="label">Name Of School</label>
 <input id="input" name="school" type="text" maxlength="120" value="<?php echo $name['Name_Of_School']; ?>"><div id="school1"></div></input>
 
 <label  id="label">Twelfth Board</label>
 <input id="input" name="board" type="text" maxlength="20" value="<?php echo $name['Board']; ?>"><div id="board1"></div></input>
 
 <label  id="label">Twelfth Year</label>
 <input id="input" name="12year" type="text" maxlength="20" value="<?php echo $name['Year']; ?>"><div id="12year1"></div></input> 
 
 
 <label  id="label">Height</label>
 <input id="input" name="height" type="text" maxlength="20" value="<?php echo $name['Height']; ?>"><div id="height1"></div></input>  
 
 <label  id="label">IdentificationMark</label>
 <input id="input" name="mark" type="text" maxlength="20" value="<?php echo $name['IdentificationMark']; ?>"><div id="mark1"></div></input> 
 
 <label  id="label">Blood Group</label>
 <br/>
 <input id="input" name="bg" type="text" maxlength="20"><div id="bg1"></div></input> 
 <br/>
 
 <label  id="label">Current Local Address</label>
 <br/>
 <textarea name="cla"  rows="2" cols="25" id="input" ><?php echo $name['Local_Address']; ?></textarea>
 <div id="cla1"></div>
 <br/>
 
 <label  id="label">Parent Communication Address</label>
 <textarea name="pca"  rows="2" cols="25" id="input"><?php echo $name['Permanent_Address']; ?></textarea>
  <div id="pca1"></div>
 <br/>
 
 <label  id="label">Emergency Address</label>
 <textarea name="ea" rows="2" cols="25" id="input"><?php echo $name['Emergency_Address']; ?></textarea>
   <div id="ea1"></div>
  <br/> 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>


