<?php
session_unset();
?>
<head>
<title>Academic Web Portal</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript">
function validateUrPw()
{
	document.getElementById("name1").innerHTML="";
	document.getElementById("password1").innerHTML="";
	
	var flag= true;
	var name= document.form1.username.value;
	var password= document.form1.password.value;
	
	if(name.length!=9){
			document.getElementById("name1").innerHTML="Invalid ID "
			
			flag = false;
			
		}
		if(name.length==9){
			//document.getElementById("pincode1").innerHTML="Invalid "
			if(isNaN(name))
			{
			document.getElementById("name1").innerHTML="Invalid ID, it Should be Numeric."
			flag = false;
			}
		}
	
	

}
</script>
</head>

<body>

<br/>
<br/>
<br/>
<div id="login">
<span id="secure_login">SECURE LOGIN</span>
<br/>
<br/>
<form name="form1" action="Login.php" method="post" class="form-1" onSubmit="return validateUrPw(this)">
    <p class="field">
        <input required type="text" name="username" placeholder="Username" align="middle">
        
        <i><img id="ic1" src="images/user.png" width="20" height="20" style="margin-top:10px" /></i>
        <div id="name1" ></div>
        
    </p>
        <p class="field">
        <input required type="password" name="password" placeholder="Password" align="middle">
        
        <i><img id="ic2" src="images/Lock.png" width="20" height="20" style="margin-top:10px" /></i>
        <div id="password1" ></div>
    </p>        
    <p class="submit">
        <input type="image" src="images/button.png" alt="Submit" width="65" height="65">
    </p>
</form>
</div>
<div id="logo1">
<table id="footer2">
    <tr> 
      <td height="2"><img src="images/images.jpg" width="700" height="1"></td>
    </tr>
    <tr> 
      <td> 
        <div align="center"><br><font size="2">
          <font color="#FFFFFF">&copy; 2013 DA-IICT, Near</font><font color="#000000"> Indroda Circle, Ahmedabad-Gandhinagar Highway, Gandhinagar 
          - 382 009, Gujarat, India.<br>
          Designed, developed and maintained by G-47, 2013.</font>
         </font></div>
      </td>
    </tr>
  </table>
</div>
</body>
