<?php
$connect_error = "Connection problem.";
$connect_error_db = "Database not found.";
$con=mysql_connect('localhost','root','') or die($connect_error);
mysql_select_db('academic') or die($connect_error_db);
?>