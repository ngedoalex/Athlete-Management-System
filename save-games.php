
<?php
include 'session.php';


extract($_GET);
		if($men=="on"){
			if($elementary=="on"){
				$save=mysqli_query($con,"INSERT INTO `tbl_games`(`game_name`, `level`, `category`, `event_id`) VALUES ('$game_name','Elementary','Boys','$active_event_id')");

			}
			if($secondary=="on"){
				$save=mysqli_query($con,"INSERT INTO `tbl_games`(`game_name`, `level`, `category`, `event_id`) VALUES ('$game_name','Secondary','Boys','$active_event_id')");

			}

		}
		if($women=="on"){
			if($elementary=="on"){
				$save=mysqli_query($con,"INSERT INTO `tbl_games`(`game_name`, `level`, `category`, `event_id`) VALUES ('$game_name','Elementary','Girls','$active_event_id')");

			}
			if($secondary=="on"){
				$save=mysqli_query($con,"INSERT INTO `tbl_games`(`game_name`, `level`, `category`, `event_id`) VALUES ('$game_name','Secondary','Girls','$active_event_id')");
				
			}

		}
        


					
			header('location:all-games.php?mess=success');




          

?>    
