// JavaScript Document

	function validateprofile() {
	document.getElementById("name1").innerHTML="";
	document.getElementById("id1").innerHTML="";
	document.getElementById("12p1").innerHTML="";
	document.getElementById("school1").innerHTML="";
	document.getElementById("board1").innerHTML="";
	document.getElementById("height1").innerHTML="";
	document.getElementById("mark1").innerHTML="";
	document.getElementById("bg1").innerHTML="";
	/*document.getElementById("second_contact_number1").innerHTML="";
	document.getElementById("email1").innerHTML="";
	document.getElementById("website1").innerHTML="";*/
	
	
	var flag= true;
	var name= document.form1.name.value;
	var id= document.form1.id.value;
	//var 12per=document.form1.12per.value;
	var school=document.form1.school.value;
	var board=document.form1.board.value;
	var height=document.form1.height.value;
	var mark=document.form1.mark1.value;
	var bg=document.form1.bg1.value;
	var cla=document.form1.cla1.value;
	var pca= document.form1.pca1.value;
	var ea= document.form1.ea1.value;
	/*var txtEmail=document.form1.email.value;
	var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
	var atrate=/[@]/;
	var dot=/[.]/;
	var n1=txtEmail.indexOf("@");
	var n2=txtEmail.lastIndexOf(".");*/


		if(name.length>2){
			document.getElementById("name1").innerHTML="Name should be less than 30 characters."
			flag = false;
		}
		if(id.length!=9){
			
				document.getElementById("id1").innerHTML="Please Enter 9 digit ID."
				flag = false;
			
		}
		if(id.length==9){
			if(isNaN(id))
					 {
				document.getElementById("id1").innerHTML="ID should be Numeric."
				flag = false;
					 }
			
		}
		if(school.length>30){
			document.getElementById("school1").innerHTML="School Name should be less than 30 characters."
			flag = false;
		}
		if(board.length>30){
			document.getElementById("board1").innerHTML="Board Name should be less than 30 characters."
			flag = false;
		}
		if(height.length>11){
			
				document.getElementById("height1").innerHTML="Height should be of less than 11 digits."
				flag = false;
			
		}
		if(height.length==9){
			if(isNaN(height))
					 {
				document.getElementById("height1").innerHTML="Height should be Numeric."
				flag = false;
					 }
			
		}
		if(mark.length>30){
			
				document.getElementById("mark1").innerHTML="Height should be of less than 30 characters."
				flag = false;
			
		}
		if(mark.length<30){
			if(isNaN(mark))
					 {
			
				document.getElementById("mark1").innerHTML="Height should be of less than 30 characters."
				flag = false;
					 }
		}
		if(bg.length>5){
			
				document.getElementById("bg1").innerHTML="Blood Group should be less than 5 Characters."
				flag = false;
			
		}
		if(cla.length>30){
			document.getElementById("cla1").innerHTML="Local Address Name should be less than 30 characters."
			flag = false;
		}
		if(pca.length>30){
			document.getElementById("pca1").innerHTML="Permanenet Address Name should be less than 30 characters."
			flag = false;
		}
		if(ea.length>30){
			document.getElementById("ea1").innerHTML="Emergency Address Name should be less than 30 characters."
			flag = false;
		}
	/*	if(city.length>50){
			document.getElementById("city1").innerHTML="City Length should be less than 50."
			flag = false;
		}
		if(pincode.length!=6){
			document.getElementById("pincode1").innerHTML="Invalid Pincode "
			if(isNaN(pincode))
			{
			document.getElementById("pincode1").innerHTML="Invalid Pincode."
			flag = false;
			}
		}
		if(pincode.length==6){
			//document.getElementById("pincode1").innerHTML="Invalid "
			if(isNaN(pincode))
			{
			document.getElementById("pincode1").innerHTML="Invalid Pincode."
			flag = false;
			}
		}
		
		if(country.length>200){
			document.getElementById("l_name1").innerHTML="Country Name should be less than 200."
			flag = false;
		}
		if(fcp.length>200){
			document.getElementById("first_contact_person1").innerHTML="Name should be less than 200."
			flag = false;
		}
		if(fcn.length!=10 || fcn.length!=11){
			document.getElementById("first_contact_number1").innerHTML="Contact Number should be of 10 digits."
			if(isNaN(fcn))
			{
			document.getElementById("first_contact_number1").innerHTML="Contact Number should be of 10 digits."
			flag = false;
			}
		}
		if(fcn.length==10 || fcn.length==11){
			//document.getElementById("first_contact_number1").innerHTML="Contact Number should be of 10 digits."
			if(isNaN(fcn))
			{
			document.getElementById("first_contact_number1").innerHTML="Contact Number should be of 10 digits."
			flag = false;
			}
		}
		if(scp.length>200){
			document.getElementById("second_contact_person1").innerHTML="Name should be less than 200."
			flag = false;
		}
		if(scn.length!=10 || scn.length!=11){
			if(isNaN(scn))
					 {
			document.getElementById("second_contact_number1").innerHTML="Country Name should be less than 200."
			flag = false;
					 }
		}
		if(email.length>200){
			document.getElementById("email1").innerHTML="Email Name should be less than 200."
			flag = false;
		}
		if(web.length>200){
			document.getElementById("web1").innerHTML="Website Name should be less than 200."
			flag = false;
		}
			if(!email.match(atrate))
	{
		document.getElementById("email1").innerHTML="*Invalid Email address";
		flag=false;
	}
	if(!email.match(dot))
	{
		document.getElementById("email1").innerHTML="*Invalid Email address";
		flag=false;
	}
	if(email.match(illegalChars))
	{
		document.getElementById("email1").innerHTML="*Invalid Email address";
		flag=false;
	}
	if(n1<1)
	{
		document.getElementById("email1").innerHTML="*Invalid Email address";
		flag=false;
	}	
    if(n2-n1 <2)
	{
		document.getElementById("email1").innerHTML="*Invalid Email address";
		flag=false;
	}
	if(!email.match(atrate))
	{
		document.getElementById("email1").innerHTML="*Invalid Email address";
		flag=false;
	}*/
	return flag;
}
