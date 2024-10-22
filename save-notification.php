<?php
include 'session.php';
extract($_GET);
extract($_POST);
date_default_timezone_set('Asia/Manila');
$date_added=date('Y-m-d, h:i:s');

        $query=mysqli_query($con,"SELECT * from tbl_user where user_name='$username'");
        $res=mysqli_fetch_assoc($query);
        $id=$res['user_id'];
        $fulname=$res['user_fulname'];

        if($type=="forget-pass"){
        	$description=$fulname.' requesting to change password.';
        }
        $save=mysqli_query($con,"INSERT into tbl_notification VALUES('','$id','$description','$date_added','1')");

if($save){
					
			header('location:index.php?error=forgot');
}


          

?>    
