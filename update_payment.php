<?php
include 'session.php';
extract($_POST);

        $update=mysqli_query($con,"UPDATE tbl_payments set title='$payment_name', description='$remarks', amount='$amount' where p_id='$_GET[id]'");

if($update){
					
			echo "<script>document.location='payments.php?mess=update'</script>"; 

}
else{

	
			echo "<script>document.location='payments.php?mess=error'</script>"; 
}

          

?>    
