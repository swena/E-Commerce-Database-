<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
$name = mysql_fetch_array(mysql_query("SELECT Name FROM student WHERE StudentID=".$_SESSION['username']));
?>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/sideHover.css"  />
    <link rel="stylesheet" type="text/css" href="css/Profile.css" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
</head>
<body id="bg">

<div id="container">
	<b><ul id="nav">
		<li id="selected"><a href="main page.php">HOME</a></li>
		<li><a href="Profile.php">PROFILE</a></li>
		<li><a href="Registration.php">REGISTRATION</a></li>
		<li><a href="CourseAd.php">COURSE ADJUSTMENT</a></li>
		<li><a href="result.php">RESULT</a></li>
        <li><a href="Fees.php">FEES</a></li>
        <li><a href="change-password.php">CHANGE PASSWORD</a></li>
        <li><a href="Logout.php">LOGOUT</a></li>
	</ul></b>
</div>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.spasticNav.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.sweet-menu-1.0.js"></script>
<script type="text/javascript" src="js/jquery.sweet-menu-min-1.0.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

<script type="text/javascript">
$('#nav').spasticNav();
$(selector).sweetMenu();
</script>

<div id="main">

<ul id="navigationMenu">
    <li>
	    <a class="home" href="http://daiict.ac.in" target="_blank">
            <span>DAIICT OffICIAL WEBSITE</span>
        </a>
    </li>
    
    <li>
    	<a class="about" href="http://placement.daiict.ac.in" target="_blank">
            <span>PLACEMENT CORNER</span>
        </a>
    </li>
    
    <li>
	     <a class="services" href="http://resourcecentre.daiict.ac.in/" target="_blank">
            <span>RESOURCE CENTRE</span>
         </a>
    </li>
    
    <li>
    	<a class="portfolio" href="http://hostel.daiict.ac.in" target="_blank">
            <span>HOSTEL</span>
        </a>
    </li>
    
    <li>
    	<a class="contact" href="#" target="_blank">
            <span>REACH US</span>
        </a>
    </li>
</ul>
    
</div>

<h1 id="heading">Welcome......<?php echo $name['Name']; ?>
</h1>   


<table id="footer1">
    <tr> 
      <td height="2"><img src="images/images.jpg" width="700" height="1"></td>
    </tr>
    <tr> 
      <td> 
        <div align="center"><br><font size="2">
          &copy; 2013 DA-IICT, Near Indroda Circle, Ahmedabad-Gandhinagar Highway, Gandhinagar 
          - 382 009, Gujarat, India.<br>
          Designed, developed and maintained by G-47, 2013.
         </font></div>
      </td>
    </tr>
  </table>



</body>
</html>
