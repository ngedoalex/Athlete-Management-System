
<?php
include 'session.php';
extract($_POST);
extract($_GET);
$winner=mysqli_real_escape_string($con,$winner);
$q=mysqli_query($con,"SELECT * from tbl_athlete where a_name='$winner'");
$res=mysqli_fetch_assoc($q);
$a_id=$res['a_id'];
echo $tick;


        $save=mysqli_query($con,"INSERT INTO `tbl_winner`( `game_id`, `a_id`, `standing_id`) VALUES ('$game_id','$a_id','$tick')")or die(mysqli_error($con));
       

if($save){
					
			header('location:entry-result.php?save=ok');
}


          

?>    
