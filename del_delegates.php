<?php
include 'session.php';
extract($_GET);
$select=mysqli_query($con,"DELETE from tbl_delegates where del_id='$del_id'");

if($select){
					echo "<script type='text/javascript'>alert('successfully deleted!');</script>";
			echo "<script>document.location='all-delegates.php'</script>"; 
}
else{
			echo "<script type='text/javascript'>alert('Failed to delete!');</script>";
			echo "<script>document.location='all-delegates.php'</script>"; 
}

?>