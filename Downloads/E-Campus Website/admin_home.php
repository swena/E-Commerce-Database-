<?php
include 'inludes/init.php';
include 'inludes/Header_admin.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
$name1 = mysql_fetch_array(mysql_query("SELECT first_name FROM admin WHERE username=".$_SESSION['username']));
echo $name1['first_name'];
?>

<table id="admin_box">
<tr><td><a href="ad_add_admin.php">Add Admin</a></td></tr>
<tr><td><a href="ad_add_instructor.php">Add Instructor</a></td><td><a href="ad_rem_instructor.php">Remove Instructor</a></td><td><a href="ad_edit_instructor.php">View/Edit Instructor</a></td></tr>
<tr><td><a href="ad_add_student.php">Add Student</a></td><td><a href="ad_rem_student.php">Remove Student</a></td><td><a href="ad_edit_student.php">View/Edit Student Detail</a></td></tr>
<tr><td><a href="ad_add_course.php">Add Course</a></td><td><a href="ad_rem_course.php">Remove Course</a></td><td><a href="ad_edit_course.php">View/Edit Course</a></td></tr>
<tr><td><a href="ad_add_semester.php">Add Semester</a></td></tr>
<tr><td><a href="ad_registeration_open.php">Reg. Open/Close</a></td></tr>
</table>

<?php include 'inludes/Footer.php'; ?>
