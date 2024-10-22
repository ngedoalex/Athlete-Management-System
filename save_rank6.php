<?php
include 'session.php';
extract($_POST);
extract($_GET);
$year=date('Y');
$rank=0;
foreach ($a_id_rank as $key => $value) {
$rank++;

	# code...
$a_id=$value;
$rec=$record[$key];
$lan=$lane[$key];
if(empty($a_id))
		{
			
		}
	else{

		$q=mysqli_query($con,"SELECT * from tbl_top_6 where game_id='$game_id' and rank='$rank'");
		$n=mysqli_num_rows($q);

			$query=mysqli_query($con,"SELECT * from tbl_athlete where a_id='$a_id'");
			$res=mysqli_fetch_assoc($query);
			$no=$res['a_num'];
		if($n>0){
			$save=mysqli_query($con,"UPDATE tbl_top_6 set a_id='$a_id', a_no='$no', remarks='$rec',lane='$lan' where rank='$rank' and game_id='$game_id'");
		}
		else{
		
			$save=mysqli_query($con,"INSERT INTO `tbl_top_6`(`game_id`, `a_id`, `a_no`, `rank`, `remarks`,`lane`) VALUES ('$game_id','$a_id','$no','$rank','$rec','$lan')");
		}
			 
	}
}

if($save){
					
			header('location:'.$_SERVER['HTTP_REFERER']);
}


          

?>    
