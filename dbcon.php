<?php 
error_reporting(1);
$con = mysqli_connect("localhost","root","","database");

// Check connection
if (!$con)
  {
  echo "Failed to connect to MySQL: " . mysqli_error($con);
  }

  date_default_timezone_set("Asia/Manila"); 
  
 ;
?>

