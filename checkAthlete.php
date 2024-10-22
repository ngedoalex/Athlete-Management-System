<?php
include('session.php');

	extract($_GET);
	if($type=="update"){
	$stmt =mysqli_query($con,"SELECT * FROM tbl_athlete a inner join tbl_delegates d WHERE a.a_num='$a_num' and a.a_id!='$a_id' and d.event_id='$active_event_id'");
	$num=mysqli_num_rows($stmt);
	} else{
	$stmt =mysqli_query($con,"SELECT * FROM tbl_athlete a inner join tbl_delegates d on a.del_id = d.del_id WHERE a.a_num='$a_num' and d.event_id='$active_event_id'");
	$num=mysqli_num_rows($stmt);
	}

	if($num>0){
	$response['result'] = true;
	 } 
	 else{
	 	$response['result'] = false;
	 }


echo json_encode($response);
?>