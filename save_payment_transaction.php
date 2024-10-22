<?php
include 'session.php';
extract($_GET);

date_default_timezone_set('Asia/Manila');
$now=date('Y-m-d, h:i:s');

$get_receipt=mysqli_query($con,"SELECT max(receipt_no) as last_receipt from tbl_payment_transaction");
$result=mysqli_fetch_assoc($get_receipt);
$last_receipt=$result['last_receipt']+1;

$query=mysqli_query($con,"SELECT * from tbl_temp_trans where s_id='$s_id'");
while($row=mysqli_fetch_assoc($query)){


$p_id=$row['p_id'];




        	$save=mysqli_query($con,"INSERT into tbl_payment_transaction VALUES('','$last_receipt','$s_id','$p_id','$now','$now','1','$user_id')")or die(mysqli_error($con));
							
}
mysqli_query($con,"DELETE from tbl_temp_trans where s_id='$s_id'");
// if($save){
					
			echo "<script>document.location='receipt.php?receipt_no=".$last_receipt."'</script>"; 

// }
// else{

	
// 			echo "<script>document.location='payment_transaction.php?mess=error'</script>"; 
// }

          

?>    
