<?php
include('dbcon.php');

	$abbr=$_GET['abbr'];
	$standing=$_GET['standing'];
	$stmt =mysqli_query($con,"SELECT * FROM tbl_winner w inner join tbl_games g inner join tbl_athlete a WHERE w.game_id='$abbr' and w.standing_id='$standing' and w.game_id=g.game_id and a.a_id=w.a_id");
	$num=mysqli_num_rows($stmt);
	$row=mysqli_fetch_assoc($stmt);

	if($num>0){
	$response->result = $row['game_name'].'('.$row['level'].'-'.$row['category'].') '.$row['standing_id'].' medal already given to '.$row['a_name'].'.';
	 } 
	 else{
	 	$response->result = false;
	 }


echo json_encode($response);
?>