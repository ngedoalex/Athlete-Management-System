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
		if($key=="0"){
			$standing="Gold";
		} elseif($key=="1"){
			$standing="Silver";
		} elseif($key=="2"){
			$standing="Bronze";
		}

		$q=mysqli_query($con,"SELECT * from tbl_winner where game_id='$game_id' and standing_id='$standing'");
		$n=mysqli_num_rows($q);

			$query=mysqli_query($con,"SELECT * from tbl_athlete where a_id='$a_id'");
			$res=mysqli_fetch_assoc($query);
			$no=$res['a_num'];
		if($n>0){
			$save=mysqli_query($con,"UPDATE tbl_winner set a_id='$a_id', a_no='$no', remarks='$rec', lane='$lan' where standing_id='$standing' and game_id='$game_id'");
		}
		else{

		
			$save=mysqli_query($con,"INSERT INTO `tbl_winner`(`game_id`, `a_id`, `a_no`, `standing_id`, `remarks`,`lane`) VALUES ('$game_id','$a_id','$no','$standing','$rec','$lan')");
		}
			 
	}
}

if($save){
					
			header('location:'.$_SERVER['HTTP_REFERER']);
}


          

?>    
