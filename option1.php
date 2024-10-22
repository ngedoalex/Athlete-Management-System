<?php
	
include'session.php';
	$delegates=mysqli_query($con,"SELECT * from tbl_delegates");
	while($del=mysqli_fetch_assoc($delegates)){
		$winner=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' ");
		$tbl_winner_count=mysqli_num_rows($winner);

		$g_win=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' and w.standing_id='Gold'");
		$win_gold=mysqli_num_rows($g_win);


		$s_win=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' and w.standing_id='Silver'");
		$win_silver=mysqli_num_rows($s_win);

		$b_win=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and a.del_id='$del[del_id]' and w.standing_id='Bronze'");
		$win_bronze=mysqli_num_rows($b_win);
		
		// ========================================================//

		// Check kung naa pa mas dako ug score
		if($tbl_winner_count<1){}else{

		$find=mysqli_query($con,"SELECT * from tbl_overall where total_gold>'$win_gold' and del_id<>'$del[del_id]'");
		$naa=mysqli_num_rows($find);

		if($naa>0){
			$status="Gold:".$win_gold." Pilde ky naay mas dghan ug gold";

		}
		else{ //ug way mulabaw sa total_gold
			
			$find2=mysqli_query($con,"SELECT * from tbl_overall where total_gold='$win_gold' and del_id<>'$del[del_id]'");
			$naa2=mysqli_num_rows($find2);
			if($naa2>0){//ug naay kaparehas ug gold

				$find3=mysqli_query($con,"SELECT * from tbl_overall where total_silver>'$win_silver' and total_gold='$win_gold' and del_id<>'$del[del_id]'");
				$naa3=mysqli_num_rows($find3);
				//if naay mas dghan ug silver
				if($naa3>0){
					$status='Daog tana! Gold:'.$win_gold.' Silver:'.$win_silver." pero naay mas daghan ug silver";
				}
				else{//ug walay mas daghan ug silver
					
					$find4=mysqli_query($con,"SELECT * from tbl_overall where total_bronze>'$win_bronze' and total_silver='$win_silver' and total_gold='$win_gold' and del_id<>'$del[del_id]'");
					$naa4=mysqli_num_rows($find4);
					if($naa4>0){

							$status='Gold:'.$win_gold.' Silver:'.$win_silver.' Bronze:'.$win_bronze." Daog na tana pero naay mas dghan ug bronze!";


					} else{
						$status='Gold:'.$win_gold.' Silver:'.$win_silver.' Bronze:'.$win_silver."Daog!";
						mysqli_query($con,"UPDATE tbl_overall set rank='Champion' where del_id='$del[del_id]'");
					}

				}


			}
			else{
				mysqli_query($con,"UPDATE tbl_overall set rank='Champion' where del_id='$del[del_id]'");
			}
			
		}

echo "<h3 style='background:{$del['del_color']}; color:black'>{$del['del_name']}-{$status}</h3>";


		$over=mysqli_query($con,"SELECT * from tbl_overall where del_id='$del[del_id]'");
		$n_over=mysqli_num_rows($over);

		if($n_over>0){


			mysqli_query($con,"UPDATE tbl_overall set total_gold='$win_gold',total_silver='$win_silver',total_bronze='$win_bronze' where del_id='$del[del_id]'");
		}
		else{
			mysqli_query($con,"INSERT INTO `tbl_overall`(`del_id`, `total_gold`, `total_silver`, `total_bronze`, `rank`) VALUES ('$del[del_id]','$win_gold','$win_silver','$win_bronze','')");
		}
	}
}
?>