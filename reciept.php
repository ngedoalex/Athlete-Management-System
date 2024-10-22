<?php
include 'session.php';


$query=mysqli_query($con,"SELECT * from tbl_payment_transaction as pt inner join tbl_student as st inner join tbl_payments as tp where pt.s_id=st.s_id and pt.p_id=tp.p_id and pt.trans_id='$_GET[trans_id]'");
$row=mysqli_fetch_assoc($query);
          

?>    
