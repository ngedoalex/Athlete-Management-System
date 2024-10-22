
<?php
include 'session.php';
extract($_POST);
extract($_GET);



        $save=mysqli_query($con,"DELETE from tbl_athlete_game where id='$id'")or die(mysqli_error($con));
       

if($save){
					
			header('location:'.$_SERVER['HTTP_REFERER']);
}


          

?>    
