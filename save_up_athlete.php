
<?php
include 'session.php';
extract($_POST);
extract($_GET);

     	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= mysqli_real_escape_string($con,addslashes($_FILES['image']['name']));

        $image_size= getimagesize($_FILES['image']['tmp_name']);
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"])){
        	$location="upload/" . $_FILES["image"]["name"];
        }
        else{
        	$location=$current_photo;
        }

        $save=mysqli_query($con,"UPDATE `tbl_athlete` SET `a_name`='$a_name',`a_photo`='$location',`a_category`='$a_category',`a_level`='$a_level',`del_id`='$del_id',`status`='1', `a_num`='$a_num' WHERE a_id='$a_id'")or die(mysqli_error($con));
       

if($save){
					
			header('location:view-athletes.php');
}


          

?>    
