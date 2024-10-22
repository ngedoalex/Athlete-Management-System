<?php
include 'session.php';
extract($_POST);
$amount=str_replace(",", "", $amount);

        $save=mysqli_query($con,"INSERT into tbl_payments VALUES('','$payment_name','$remarks','$amount','1','$deadline')");

if($save){
					
			echo "<script>document.location='payments.php?mess=success'</script>"; 

}
else{

	
			echo "<script>document.location='payments.php?mess=error'</script>"; 
}   

          

?>    
