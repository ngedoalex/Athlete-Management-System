<?php
include 'session.php';
extract($_GET);

        
        $save=mysqli_query($con,"INSERT INTO `tbl_delegates`(`del_id`, `del_name`, `del_color`, `event_id`, `status`) VALUES ('','$del_name','$del_color','$active_event_id','1')");
        $id=mysqli_insert_id($con);

if($save){
	include_once'refresh-result.php';
					
			echo "<script>document.location='all-delegates.php'</script>"; 
}


          

?>    
