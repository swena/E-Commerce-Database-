<?php
include 'inludes/init.php';
/// make sure user is logged in
if (!$_SESSION['username']) {
    $loginError = "You are not logged in.";
    include("Home.php");
    exit();
}  if($_FILES['file']['name']=='') echo "nothing ";

$path= 'C:/xampp/htdocs/WEB/marks/'.$_FILES['file']['name'];
 echo $path;
      move_uploaded_file($_FILES['file']['tmp_name'],
      "C:/xampp/htdocs/WEB/marks/".$_FILES['file']['name']);
	  
 $excel_readers = array(
    'Excel5' , 
    'Excel2003XML' , 
    'Excel2007'
);
 
include('Classes/PHPExcel.php');
include("Classes/PHPExcel/Writer/CSV.php");
include("Classes/PHPExcel/Writer/Excel5.php");

set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'Classes/PHPExcel/IOFactory.php';
$reader = PHPExcel_IOFactory::createReader('Excel5');
$reader->setReadDataOnly(true);
$excel = $reader->load($path);
 
$writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
$writer->setDelimiter('|');
$writer->save('data1.csv');
	
$insert_query="LOAD DATA LOCAL INFILE 'data1.csv' INTO TABLE registers FIELDS TERMINATED BY '|' ENCLOSED BY '\"' LINES TERMINATED BY '\r\n' 
(StudentID,AcadYear,Semester,CourseNo,grade,@var) set RegDate=NOW()";
$result=mysql_query($insert_query) or die("Import Error: " . mysql_error());
?>
	 
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     