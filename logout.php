<?php 
	session_start();
include'dbcon.php';
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d h:i:s');
extract($_SESSION);
echo $admin_user_id;
$squery=mysqli_query($con,"SELECT * from tbl_user where user_id='$admin_user_id'");
$srow=mysqli_fetch_array($squery);
$user_id=$srow['user_id'];

$details=$srow['user_fulname']." has logged out.";
	
				session_destroy();
header('location:index.php');
		

?>