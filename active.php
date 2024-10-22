<?php
include 'session.php';
extract($_GET);
extract($_POST);
$q=mysqli_query($con,"UPDATE tbl_event set event_status=1 where event_id='$event_id'");
if($q){
	mysqli_query($con,"UPDATE tbl_event set event_status=0 where event_id!='$event_id'");
	header('location:'.$_SERVER['HTTP_REFERER']);	
}	


?>