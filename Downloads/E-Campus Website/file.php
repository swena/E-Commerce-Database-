<?php
include 'inludes/init.php';
include 'inludes/Header_instructor.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("Home.php");
    exit();
} 
?>
<head>
<title>UPLOAD STUDENT GRADES</title>
</head>
<body>
<form method="post" class="form" style="margin: 150px 350px 150px 300px" action="excel.php" enctype="multipart/form-data">
<fieldset class="fieldset">
<legend id="legend" align="center">UPLOAD GRADES</legend>
<table border="1" width="40%" align="center">
<tr >
<td colspan="2" align="center"><strong>UPLOAD GRADES</strong></td>
</tr>

<tr>
<td align="center">CSV/Excel File:</td><td><input type="file" name="file" id="file"></td></tr>

<tr >
<td colspan="2" align="center"><input type="submit" name="Import" value="Import"></td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>