<?php
	
include'session1.php';
 for ($s=1; $s <=3; $s++) { 
  if ($s===1) {
    $standing="Gold";
  } elseif ($s===2) {
    $standing="Silver";
  } else{
     $standing="Bronze";
  }


$query=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_games g inner join tbl_athlete a inner join tbl_delegates d where w.standing_id='$standing' and w.a_id>0 and w.game_id=g.game_id and g.event_id='$active_event_id' and w.a_id=a.a_id and a.del_id=d.del_id and d.event_id='$active_event_id' group by w.a_id");
    while ($row=mysqli_fetch_array($query)) { 
$query1=mysqli_query($con,"SELECT count(standing_id) as total from tbl_winner where a_id='$row[a_id]' and standing_id='$standing'");
$row1=mysqli_fetch_array($query1);


$check=mysqli_query($con,"SELECT * from tbl_medalist where a_id='$row[a_id]' and medal_type='$standing'");
$num=mysqli_num_rows($check);
if($num>0){
	mysqli_query($con,"UPDATE tbl_medalist set total_medal='$row1[total]' where a_id='$row[a_id]' and medal_type='$standing'");
    	}
    	else{
    		mysqli_query($con,"INSERT INTO `tbl_medalist`(`md_id`, `a_id`, `total_medal`, `medal_type`) VALUES ('','$row[a_id]','$row1[total]','$standing')");
    	}
	}
}
?>