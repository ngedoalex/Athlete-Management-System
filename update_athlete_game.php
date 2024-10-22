
<?php
include 'session.php';
extract($_POST);
extract($_GET);



        $save=mysqli_query($con,"UPDATE `tbl_athlete_game` SET `coach`='$coach' WHERE id='$id'")or die(mysqli_error($con));
       

if($save){
					
			header('location:'.$_SERVER['HTTP_REFERER']);
}

          

?>    
