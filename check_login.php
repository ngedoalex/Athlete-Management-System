<?php
session_start();
error_reporting(0);
extract($_POST);
include 'dbcon.php';
$pass1 = mysqli_real_escape_string($con,$password);
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d h:i:s');
$pass=md5($pass1);
$salt="a1Bz20ydqelm8m1wql";
$password=$salt.$pass;
//echo "SELECT * from tbl_user where user_name='$username' and user_pass='$password' and user_status='1'";
$query=mysqli_query($con,"SELECT * from tbl_user where user_name='$username' and user_pass='$password' and user_status='1'");
$row=mysqli_fetch_assoc($query);
$num=mysqli_num_rows($query);
if($num>0){
	if($row['user_type']=="admin"){
		$details=$row['user_fulname']." has logged on the system ";
		mysqli_query($con,"INSERT into tbl_history values('','$row[user_id]','$details','$date')");
		$_SESSION['admin_user_id']=$row['user_id']; 
		header('location:admin.php');
	}
	else{
	$details=$row['user_fulname']." has logged on the system ";
		mysqli_query($con,"INSERT into tbl_history values('','$row[user_id]','$details','$date')");		
		$_SESSION['admin_user_id']=$row['user_id'];
		header('location:user-dashboard.php');
	}
	
}
else{

	header('location:index.php?username='.$username.'&error=mismatch');
}
?>