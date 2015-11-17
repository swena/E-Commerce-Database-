<?php

$connect_error = "Connection problem.";
$connect_error_db = "Database not found.";
$con=mysql_connect('localhost','root','') or die($connect_error);
mysql_select_db('academic') or die($connect_error_db);

$name = $_POST['name'];
echo $name;
$id = mysql_fetch_array(mysql_query("select * from student where StudentID= \" $name\" "));

$id = $id['EmailID'];
echo $id;
$pass = $id['Password'];
echo $pass;
$to      = $id;
$subject = 'changing password';
$message = $pass;
$from = "root@localhost.com";
$headers = "From:" . $from;

mail($to, $subject, $message, $headers);
echo "mail sent";

?>