<?php
include('dbcon.php');

	$abbr=$_GET['abbr'];
	$stmt =mysqli_query($con,"SELECT * FROM tbl_user WHERE user_name='$abbr'");
	$num=mysqli_num_rows($stmt);
	if($num>0){
	$response->result = true;
	 } 
	 else{
	 	$response->result = false;
	 }


echo json_encode($response);
?>