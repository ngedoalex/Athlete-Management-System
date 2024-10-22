<?php
include 'session.php';
extract($_GET);
extract($_POST);

        
        $save=mysqli_query($con,"UPDATE tbl_delegates set del_name='$del_name',del_color='$del_color' where del_id='$id'");

if($save){
					
			echo "<script>document.location='all-delegates.php'</script>"; 
}


          

?>    
