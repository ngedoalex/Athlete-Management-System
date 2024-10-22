<?php
include 'session.php';
extract($_GET);
$select=mysqli_query($con,"DELETE from tbl_games where game_id='$game_id'");

if($select){
					echo "<script type='text/javascript'>alert('successfully deleted!');</script>";
			echo "<script>document.location='all-games.php'</script>"; 
}
else{
			echo "<script type='text/javascript'>alert('Failed to delete!');</script>";
			echo "<script>document.location='all-games.php'</script>"; 
}

?>