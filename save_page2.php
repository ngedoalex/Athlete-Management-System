<?php
include 'session.php';
extract($_POST);
extract($_GET);
$year=date('Y');

        $save=mysqli_query($con,"INSERT into tbl_educ_background VALUES('','$sid','$yr_lvl','$sy','$year','$sem','$c_id')")or die(mysqli_error($con));


if($save){
					
			header('location:all-student.php?stud_id='.$sid);
}


          

?>    
