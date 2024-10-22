<?php
include 'session.php';
extract($_GET);
$select=mysqli_query($con,"DELETE from tbl_user where user_id='$user_id'");

if($select){
					echo "<script type='text/javascript'>alert('User successfully deleted!');</script>";
			echo "<script>document.location='users.php'</script>"; 
}
else{
			echo "<script type='text/javascript'>alert('Failed to delete!');</script>";
			echo "<script>document.location='users.php'</script>"; 
}

?>