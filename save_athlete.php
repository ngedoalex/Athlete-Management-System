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
        	$location="images/default.gif";
        }
        
        $save=mysqli_query($con,"INSERT INTO `tbl_athlete`(`a_id`,`a_num`, `a_name`, `a_photo`, `a_category`, `a_level`, `del_id`, `status`) VALUES ('','$a_num','$a_name','$location','$a_category','$a_level','$del_id','1')")or die(mysqli_error($con));
        $id=mysqli_insert_id($con);
       

if($save){
					
			header('location:athlete-profile.php?id='.$id);
}


          

?>    
