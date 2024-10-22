<?php
include('dbcon.php');

	$school_id=$_GET['school_id'];
	$stmt =mysqli_query($con,"SELECT * FROM tbl_student WHERE school_id='$school_id'");
	$num=mysqli_num_rows($stmt);
	if($num>0){
	$response->result = true;
	 } 
	 else{
	 	$response->result = false;
	 }


echo json_encode($response);
?>