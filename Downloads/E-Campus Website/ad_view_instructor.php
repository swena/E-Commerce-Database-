<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';?>
 <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/ext.js" type="text/javascript"></script>
 <?php
 
// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 

?>

<?php 
$sname=$_POST['name'];
$name1 = mysql_fetch_array(mysql_query("SELECT * FROM instructor WHERE InstructorID='$sname'"));
?>
<form  name="form2"  action="ad_inst_update.php" method="post" class="form1"  enctype="multipart/form-data" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">Instructor Details</legend>
 <table>
 <tr><td>Instructor Name: </td><td><?php echo $name1['InstructorName'];?></td><td><input name="name" id="inst_name" type="text" value="<?php echo $name1['InstructorName'];?>"></td><td><input type="button" value="Edit" id="b1"></td></tr>
 <tr><td>Instructor ID: </td><td><?php echo $name1['InstructorID'];?></td><td><input  name="id" id="inst_id" type="text" value="<?php echo $name1['InstructorID'];?>"></td><td><input type="button" value="Edit" id="b2"></td></tr>
 <tr><td>Password: </td><td></td><td><input name="pass" type="password"  id="inst_pass" value="<?php echo $name1['Password'];?>"></td><td><input type="button" value="Edit" id="b3"></td></tr>
 <tr><td colspan="3"><input type="hidden" name="hide" value="<?php echo $sname; ?>"></td></tr>
 </table>                   
 <fieldset class="fieldset">   
 <input type="submit" name="submit" class="button" > 
 </fieldset>   
</form>

<?php include 'inludes/Footer.php'; ?>