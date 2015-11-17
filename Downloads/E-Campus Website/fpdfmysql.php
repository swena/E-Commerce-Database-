<?php
ob_end_clean();
require('fpdf.php');

include 'inludes/init.php'; 
require 'Database/connect.php';

// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("Home.php");
    exit();
}

$s =  $_POST['Choosen_s'];
$crn= $_POST['Choosen_c'];
//Select the Studenta you want to show in your PDF file
$result=mysql_query("SELECT StudentID from registers where AcadYear=" .$_POST['Choosen_acad'] ." and Semester =\"$s\" and CourseNo = \"$crn\" ");


$number_of_students = mysql_numrows($result);

//Initialize the 1 columns and the total
$column_ID = "";
$total = 0;


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$code = $row["StudentID"];
	

	$column_ID= $column_ID.$code."\n";

}
mysql_close();



//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(30,6,'StudentID',1,0,'L',1);
$pdf->SetX(65);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(30,6,$column_ID,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(45);
	$pdf->MultiCell(120,6,'',1);
	$i = $i +1;
}

$pdf->Output();

?>
