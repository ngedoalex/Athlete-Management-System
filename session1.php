<?php 

include'dbcon.php';
$qq=mysqli_query($con,"SELECT * from tbl_event where event_status=1"); 
$rr=mysqli_fetch_assoc($qq);
$active_event=$rr['event_name'];
$active_event_id=$rr['event_id'];

 


?>