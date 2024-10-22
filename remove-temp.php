<?php
include 'session.php';

extract($_GET);
        $delete=mysqli_query($con,"DELETE from tbl_temp_trans where temp_id='$temp_id'");

if($delete){
					
			header('location:new-transaction.php?s_id='.$s_id);

}
else{

	
			header('location:new-transaction.php?mess=error&s_id='.$s_id);
}

          

?>    
