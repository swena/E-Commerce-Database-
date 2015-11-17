<?php
include 'inludes/init.php';
if(isset($_POST['password']))
{
$username = filter_input(INPUT_POST,'username');
//echo $username;
$password=md5(filter_input(INPUT_POST,'password'));
//echo $password;
$sql_1 = "select * from student where StudentID =\"$username\" and Password='$password' ";
$sql_2 = "select * from admin where username =\"$username\" and password=\"$password\" ";
$sql_3 = "select * from instructor where InstructorID =\"$username\" and Password=\"$password\" ";

$result_1=mysql_query($sql_1);
$result_2=mysql_query($sql_2);
$result_3=mysql_query($sql_3);
$count_1= mysql_num_rows($result_1);
$count_2= mysql_num_rows($result_2);
$count_3= mysql_num_rows($result_3);


if($count_1 == 1)
{
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	
	header("location:main page.php");
	
}
else if($count_2 == 1)
{
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	
	header("location:admin_home.php");
	
}
else if($count_3 == 1)
{
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	
	header("location:inst_Home.php");
	
}

else
{
	echo "ERROR";
	
}
}
	
?>
	
