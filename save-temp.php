<?php
include 'session.php';

extract($_GET);
        $save=mysqli_query($con,"INSERT into tbl_temp_trans VALUES('','$p_id','$s_id')");

if($save){
					
			header('location:new-transaction.php?s_id='.$s_id);

}
else{

	
			header('location:new-transaction.php?mess=error&s_id='.$s_id);
}

          

?>    
