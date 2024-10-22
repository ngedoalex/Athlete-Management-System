<?php
	
include'session1.php';
	$delegates=mysqli_query($con,"SELECT * from tbl_delegates");
	while($del=mysqli_fetch_assoc($delegates)){
	
		$winner=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' ");
		$tbl_winner_count=mysqli_num_rows($winner);

		$g_win=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' and w.standing_id='Gold'");
		$win_gold=mysqli_num_rows($g_win);
		$win_gold=$win_gold*1000;


		$s_win=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' and w.standing_id='Silver'");
		$win_silver=mysqli_num_rows($s_win);
		$win_silver=$win_silver*50;

		$b_win=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' and w.standing_id='Bronze'");
		$win_bronze=mysqli_num_rows($b_win);
		$win_bronze=$win_bronze*1;
		$total=$win_bronze+$win_silver+$win_gold;
		// ========================================================//





		$over=mysqli_query($con,"SELECT * from tbl_overall where del_id='$del[del_id]'");
		$n_over=mysqli_num_rows($over);


		if($n_over>0){


			mysqli_query($con,"UPDATE tbl_overall set total_gold='$win_gold',total_silver='$win_silver',total_bronze='$win_bronze',total='$total' where del_id='$del[del_id]'");
		}
		else{

			mysqli_query($con,"INSERT INTO `tbl_overall`(`del_id`, `total_gold`, `total_silver`, `total_bronze`, `total`) VALUES ('$del[del_id]','$win_gold','$win_silver','$win_bronze','$total')");
		}
	}
		// $find=mysqli_query($con,"SELECT * from tbl_overall order by total DESC LIMIT 3");
		// while($fi=mysqli_fetch_assoc($find)){
		// 	$i++;
		// 	echo $fi['del_id'].'-'.$i."<br>";
		// }
?>