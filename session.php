<?php session_start();

include'dbcon.php';
if(empty($_SESSION['admin_user_id'])){
	header('location:index.php');
}
extract($_SESSION);
$qq=mysqli_query($con,"SELECT * from tbl_event where event_status=1"); 
$rr=mysqli_fetch_assoc($qq);
$active_event=$rr['event_name'];
$active_event_id=$rr['event_id'];

$squery=mysqli_query($con,"SELECT * from tbl_user where user_id='$admin_user_id'");
$srow=mysqli_fetch_array($squery);
$user_id=$srow['user_id'];
$user_type=$srow['user_type'];
$user_fulname=$srow['user_fulname'];
 $settings=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'"); $set=mysqli_fetch_assoc($settings); 
 


?>