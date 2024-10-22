<?php
include 'session.php';
extract($_GET);
$address=mysqli_real_escape_string($con,$address);
$description=mysqli_real_escape_string($con,$description);
$title=mysqli_real_escape_string($con,$title);

$save=mysqli_query($con,"DELETE from tbl_event where event_status=1");

if($save){
	header('location:'.$_SERVER['HTTP_REFERER']);
}



?>