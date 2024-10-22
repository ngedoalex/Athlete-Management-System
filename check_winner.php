<?php
include('dbcon.php');
	$abbr=$_POST['id'];
	$stmt =mysqli_query($con,"SELECT * FROM tbl_winner where game_id='$abbr'");
	$num=mysqli_num_rows($stmt);
	if($num>0){
while($row=mysqli_fetch_assoc($stmt)){

	
if($row['standing_id']=="Gold"){$gold="1";}
	else{ } 
 if($row['standing_id']=="Silver"){$silver="1";}
	else{ } 
if($row['standing_id']=="Bronze"){ $bronze="1";}
	else{ } 
} }
if($gold=="1"){ }else{?>


<label class="radio-btn"><input type="radio" name="tick"    value="Gold"  /><img src="images/gold.png" style="" id="gold">Gold</label>
<?php } if($silver=="1"){ } else{?>
<label class="radio-btn"><input type="radio" name="tick"  value="Silver" /><img src="images/silver.png" style="" id="silver">Silver</label>
<?php } if($bronze=="1"){?>
<label class="radio-btn"><input type="radio" name="tick"  value="Bronze" /><img src="images/bronze.png" style="" id="bronze">Bronze</label>
<?php }?>



