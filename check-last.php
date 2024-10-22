<?php
include('dbcon.php');

	$abbr=$_GET['abbr'];
	$stmt =mysqli_query($con,"SELECT max(trans_id) as last from tbl_payment_transaction");
	$res=mysqli_fetch_assoc($stmt);
	$num=mysqli_num_rows($stmt);

	if($num>0){
		$last=$res['last']+1;
	$response->result = $last;
	 } 
	 else{
	 	$response->result = "";
	 }


echo json_encode($response);
?>