<?php
include 'session.php';


$query1=mysqli_query($con,"SELECT *,sum(amount) as total from tbl_payment_transaction as pt inner join tbl_student as st inner join tbl_payments as tp where pt.s_id=st.s_id and pt.p_id=tp.p_id and pt.receipt_no='$_GET[receipt_no]'");
$row=mysqli_fetch_assoc($query1)


          

?>  
<div style="width:8.5in; min-width: 8.5in;">
	<?php for($i=1; $i<=2; $i++){
		if($i=="1"){
			$copy="Student Copy";
		} else{
			$copy="Office Copy";
		}
		?>

<div style="width: 4in; margin-right:5px; margin-left:0px;  float:left; padding:5px; <?php if($i=="1"){?> border-right:1px dashed gray;<?php }?>">

	<div style="margin-left:3.4in; font-size: 10px;  "><?php echo $copy;?></div>
	<div>
		
	</div>
<div style="float:left;">
	<img src="images/djemfcst-logo.png" style="height:60px; margin-left:10px;margin-top:6px;">
</div>
 <div style="float: left; width:80%; margin-left: 5px; text-align: center; font-size: 12px;"><br>
 	<font style="">DON JOSE ECLEO MEMORIAL FOUNDATION <br>COLLEGE OF SCIENCE AND TECHNOLOGY</font><br>
 	<font style="font-size: 12px;"><i>Justiniana Edera, San Jose, Dinagat Islands</i><br>&nbsp;</font>
 </div>

<table border="1" style="border-collapse: collapse; " width="100%" cellpadding="2">
	<tr>
		<th colspan="4">OFFICIAL RECEIPT</th>
	</tr>
	<tr>
		<td colspan="3"><b>Name:</b> <?php echo $row['lname'].', '.$row['fname']?> </td>
		
		<td colspan="1"><b> Course/Yr:</b> </td>
		
	</tr>
		<tr>
		<td colspan="3"><b>Date/Time:</b> <?php echo date('m/d/y', strtotime($row['date_of_payment']))?> </td>
		
		<td colspan="1"><b> OR #:</b><?php printf('%06d', number_format($_GET['receipt_no']));?> </td>
		
	</tr>
	<tr>
		<th colspan="3">Payment for</th>
		
		<th colspan="1"> Amount </th>
		
	</tr>
	<?php
	$query=mysqli_query($con,"SELECT * from tbl_payment_transaction as pt inner join tbl_student as st inner join tbl_payments as tp where pt.s_id=st.s_id and pt.p_id=tp.p_id and pt.receipt_no='$_GET[receipt_no]'");
	 while($row1=mysqli_fetch_assoc($query)){?>
		<tr>
		<td colspan="3" align="center"><?php echo $row1['title']?></td>
		
		<td colspan="1" align="center"> &#8369;<?php echo number_format($row1['amount'],2)?> -</td>
		
		</tr>
	<?php  } $total=$row['total']; ?>
		<tr>
		<th colspan="3" align="right">TOTAL</th>
		
		<th colspan="1" align="center"> &#8369;<?php echo number_format($total,2)?> -</th>
		
	</tr>


		
	</tr>

</table>
<div style="text-align: right;"><br><u><?php echo $user_fulname;?></u><br><b>Cashier</b></div>

</div>	




	<?php } ?>
	
</div>  
