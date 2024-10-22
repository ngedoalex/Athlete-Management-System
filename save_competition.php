<?php
include 'session.php';
extract($_GET);
$address=mysqli_real_escape_string($con,$address);
$description=mysqli_real_escape_string($con,$description);
$title=mysqli_real_escape_string($con,$title);
if($type=="update"){
$save=mysqli_query($con,"UPDATE tbl_event set event_name='$title',event_description='$description',address='$address',from_date='$from_date',to_date='$to_date' where event_status=1");
} else{
	// echo "INSERT INTO `tbl_event`(`event_id`, `event_name`, `event_description`, `address`, `from_date`, `to_date`, `event_status`) VALUES ('','$title','$description','$address','$from_date','$to_date','1')";
	mysqli_query($con,"UPDATE tbl_event set event_status=0 where event_status=1");
$save=mysqli_query($con,"INSERT INTO `tbl_event`(`event_id`, `event_name`, `event_description`, `address`, `from_date`, `to_date`, `event_status`) VALUES ('','$title','$description','$address','$from_date','$to_date','1')");
}

if($save){
	header('location:'.$_SERVER['HTTP_REFERER']);
}



?>