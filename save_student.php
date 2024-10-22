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
        
        $save=mysqli_query($con,"INSERT into tbl_student VALUES('','$school_id','$fname','$lname','$gender','$bdate','$bplace','$address','$email_add','$guardian','$contact_no','$location')")or die(mysqli_error($con));
        $stud_id=mysqli_insert_id($con);

if($save){
					
			header('location:add_student.php?page=2&stud_id='.$stud_id);
}


          

?>    
