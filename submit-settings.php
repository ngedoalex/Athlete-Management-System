
<?php
include 'session.php';


extract($_POST);
$q=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'");
$n=mysqli_num_rows($q);

     	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= mysqli_real_escape_string($con,addslashes($_FILES['image']['name']));

        $image_size= getimagesize($_FILES['image']['tmp_name']);
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"])){
        	$event_logo="upload/" . $_FILES["image"]["name"];
        }
        else{
        	$event_logo="images/logo.jpg";
        }

if($n>0){
$save=mysqli_query($con,"UPDATE `tbl_settings` SET `sign1`='$sign1',`designation1`='$designation1',`sign2`='$sign2',`designation2`='$designation2',`sign3`='$sign3',`designation3`='$designation3',`sign4`='$sign4',`designation4`='$designation4',event_logo='$event_logo',event_heading='$heading', event_sub_heading='$sub_heading' WHERE event_id='$active_event_id'");
} else{
	$save=mysqli_query($con,"INSERT INTO `tbl_settings`(`id`, `sign1`, `designation1`, `sign2`, `designation2`, `sign3`, `designation3`, `sign4`, `designation4`, `event_id`,`event_logo`,`event_heading`,`event_sub_heading`) VALUES ('','$sign1','$designation1','$sign2','$designation2','$sign3','$designation3','$sign4','$designation4','$active_event_id','$event_logo','$heading','$sub_heading')");
}



			


					
header('location:'.$_SERVER['HTTP_REFERER']);




          

?>    
