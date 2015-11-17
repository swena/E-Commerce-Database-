<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
} 
$name1 = (mysql_query("SELECT * FROM semester"));
?>

<form  name="form2" action="" method="post" class="form1" onsubmit="return validateprofile()" style="margin: 150px 350px 150px 300px">
 <fieldset class="fieldset">
 <legend id="legend">Choose Semester to activate/deactivate link</legend>
          
 <label  id="label">Semester</label>
   <select name="name1">
 <?php 
 while($name2 = mysql_fetch_array($name1))
 {

echo "<option value='".$name2['Semester']." ".$name2['AcadYear']."'>".$name2['Semester']." ".$name2['AcadYear']."</option>";
	 
 }?>
 </select>                                  
                                 
 
                            
 <fieldset class="fieldset">   
 <input type="submit" name="submit1" value="Activate" class="button" ><input type="submit" name="submit2" value="Deactivate" class="button" > 
 </fieldset>   
</form>
<?php 

if(isset($_POST['submit1']))
{
$sname=$_POST['name1'];
$a=explode(" ", $sname);
$sql1=mysql_query("SELECT * FROM semester");
$sql3=mysql_query("SELECT * FROM semester WHERE Status=1");
$me=mysql_fetch_array($sql3);
$count_1= mysql_num_rows($sql3);
while($sql2=mysql_fetch_array($sql1))
{
	if($count_1==0)
	{
		if($sql2['AcadYear']==$a[1] && $sql2['Semester']==$a[0])
		{
			
			$b="UPDATE semester SET Status=1 WHERE AcadYear=$a[1] and Semester='$a[0]'";
			mysql_query($b);
		}
	}
	
}
if($count_1!=0)
	{
		echo "<h2>Sorry ".$me['Semester']." ".$me['AcadYear']." Semester already activated.</h2>";
	}
}
else if(isset($_POST['submit2']))
{
$sname=$_POST['name1'];
$a=explode(" ", $sname);
$sql1=mysql_query("SELECT * FROM semester");
while($sql2=mysql_fetch_array($sql1))
{
		if($sql2['AcadYear']==$a[1] && $sql2['Semester']==$a[0])
		{
			$b="UPDATE semester SET Status=0 WHERE AcadYear=$a[1] and Semester='$a[0]'";
			mysql_query($b);
		}
	}
}

$sql=("DELETE FROM course WHERE CourseNo='$sname'");
mysql_query($sql);
?>
<?php include 'inludes/Footer.php'; ?>