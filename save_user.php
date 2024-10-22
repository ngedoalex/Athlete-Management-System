<?php
include 'session.php';
extract($_GET);
extract($_POST);

$select=mysqli_query($con,"SELECT * from tbl_user where user_fulname='$fullname' and user_name='$username'");	
$num=mysqli_num_rows($select);
$username = mysqli_real_escape_string($con,$username);
$pass1 = mysqli_real_escape_string($con,$password);

$pass=md5($pass1);

$salt="a1Bz20ydqelm8m1wql";
$password=$salt.$pass;

echo "Name:{$fullname}<br>Username: {$username} <br><hr>Password: $password<br>";


if($num>0){
echo "Naa";

					echo "<script type='text/javascript'>alert('".$username." already exists!. Try something new.');</script>";
			echo "<script>document.location='users.php?fulname=".$fullname."&username=".$username."'</script>"; 
}
else{
	echo "Wala";
	$save=mysqli_query($con,"INSERT into tbl_user(user_fulname,user_name,user_pass,user_type,user_status) 
		VALUES('$fullname','$username','$password','$user_type','1')");
	if($save){
		echo "<script type='text/javascript'>alert('".$username." successfully added!');</script>";
			echo "<script>document.location='users.php'</script>"; 
		}
		else{
			echo "<script type='text/javascript'>alert('".$username." Error saving!');</script>";
			echo "<script>document.location='users.php'</script>"; 
		}
	}
						

?>