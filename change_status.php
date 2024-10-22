<?php
include 'session.php';
extract($_GET);
$select=mysqli_query($con,"SELECT * from tbl_user where user_id='$user_id'");
$res=mysqli_fetch_assoc($select);
$status=$res['user_status'];


if($status=="0"){
				$q=mysqli_query($con,"UPDATE tbl_user set user_status='1' where user_id='$user_id'");
				if($q){
					echo "<script type='text/javascript'>alert('".$res['name']." Activated successfully!.');</script>";
					echo "<script>document.location='users.php'</script>"; 
				} else{
					echo "<script type='text/javascript'>alert('Unable to update! Please try again.');</script>";
					echo "<script>document.location='users.php'</script>"; 
				}
				}


else{
				$q=mysqli_query($con,"UPDATE tbl_user set user_status='0' where user_id='$user_id'");
				if($q){
					echo "<script type='text/javascript'>alert('".$res['name']." Deactivated successfully! .');</script>";
					echo "<script>document.location='users.php'</script>"; 
				} else{
					echo "<script type='text/javascript'>alert('Unable to update! Please try again.');</script>";
					echo "<script>document.location='users.php'</script>"; 
				}
				}


?>