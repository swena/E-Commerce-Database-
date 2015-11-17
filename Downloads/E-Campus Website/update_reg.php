<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) 
{
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';