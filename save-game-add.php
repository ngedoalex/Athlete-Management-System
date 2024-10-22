
<?php
include 'session.php';
extract($_POST);
extract($_GET);

if($coach_new==""){
	$coach=$coach;
} else{
	$coach=$coach_new;
}

        $save=mysqli_query($con,"INSERT INTO `tbl_athlete_game`(`id`, `game_id`, `a_id`, `coach`) VALUES ('','$game_id','$a_id','$coach')")or die(mysqli_error($con));
       

if($save){
					
			header('location:'.$_SERVER['HTTP_REFERER']);
}


          

?>    
