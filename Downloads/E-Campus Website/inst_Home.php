<?php
include 'inludes/init.php';
include 'inludes/Header_instructor.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
$name = mysql_fetch_array(mysql_query("SELECT InstructorName FROM instructor WHERE InstructorID=".$_SESSION['username']));
?>
<h1 id="heading">Welcome......<?php echo $name['InstructorName']; ?>
</h1>   
<?php include 'inludes/Footer.php'; ?>
