<?php 
include 'inludes/init.php';
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("home.php");
    exit();
}
include 'inludes/Header.php';
include 'inludes/Footer.php';
$values = explode(':',$_POST['Choosen_sem']);
//echo $values[0];
//echo $values[1];

$fee = mysql_fetch_array(mysql_query("SELECT * from fee where AcadYear=\"$values[0]\" and Semester =\"$values[1]\" and StudentID =".$_SESSION['username']));
$fee2 = mysql_fetch_array(mysql_query("SELECT * from registers where AcadYear=" .$_GET['AcadYear'] ." and Semester =" .$_GET['Semester']."and StudentID =".$_SESSION['username']));

?>

<form class="form" style="margin: 150px 450px 200px 350px">
	<fieldset class="fieldset">
	<legend id="legend">Fee Details</legend><br />
<?php
$rno = $fee['Reciept_No'];
$sid = $_SESSION['username'];
$sem = $_GET['Semester'];
$tfee = $fee['Tution_Fee'];
$regfee = $fee['Registration_Fee'];
$hfee = $fee['Hostel_Fee'];
$elecfee = $fee['Electricity_Fee'];
$lfee = $fee['Late_Fee'];
$tfee = $fee['Total_Fee'];
$ins = $fee['Insurance'];
$excpay = $fee['Excess_Pay'];
$camount = $fee['Cash Amount'];
$chqamount = $fee['Cheque Amount'];
$chno = $fee['Cheque_No'];
$chd = $fee['Cheque_Date'];
$bnk = $fee['Bank'];
$batch = $_GET['AcadYear'];

$feedetails_header =<<<FOD
    <table align="center" bordercolordark="#0099FF" border="1" cellspacing="0" width="600px">
    	<tr>
        	<td id="cellcolor">Student ID</td>
            <td>$sid</td>
        </tr>
        <tr>
        	<td id="cellcolor">Program</td>
            <td>$prog</td>
        </tr>
		<tr>
        	<td id="cellcolor">Batch</td>
            <td>$batch</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Semester</td>
            <td>$sem</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Student Name</td>
            <td>$sname</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Receipt No</td>
            <td>$rno</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Tution Fee</td>
            <td>$tfee</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Registration Fee</td>
            <td>$regfee</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Electricity Fee</td>
            <td>$elecfee</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Excess Payment</td>
            <td>$excpay</td>
        </tr> 
		<tr>
        	<td id="cellcolor">Late Fee</td>
            <td>$lfee</td>
        </tr>
		<tr>
        	<td id="cellcolor">Total Fee</td>
            <td>$tfee</td>
        </tr> 
		<tr>
        	<td></td>
            <td></td>
        </tr> 
		<tr>
        	<td id="cellcolor">Cash Amount</td>
            <td>$camount</td>
        </tr> 
		<tr>
        	<td id="cellcolor">DD/Cheque Amount</td>
            <td>$chqamount</td>
        </tr> 
		<tr>
        	<td id="cellcolor">DD/Cheque(s) No.</td>
            <td>$chno</td>
        </tr> 
		<tr>
        	<td id="cellcolor">DD/Cheque Date</td>
            <td>$chd</td>
        </tr> 
		<tr>
        	<td id="cellcolor">DD/Cheque Issuing Bank</td>
            <td>$bnk</td>
        </tr> 
	</table>
FOD;
$feede =<<<FEE
			$feedetails_header
			
FEE;
echo $feede;

?>
</fieldset>
</form>	