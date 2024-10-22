<?php
	
include'session1.php';
$query=mysqli_query($con,"SELECT * from tbl_winner where standing_id='Gold' group by a_id"); while ($row=mysqli_fetch_assoc($query)) { 
            
            $gold=mysqli_query($con,"SELECT * from tbl_winner where a_id='$row[a_id]' and standing_id='Gold'");
            $num_gold=mysqli_num_rows($gold);
            $num_gold=$num_gold*1000;

            $silver=mysqli_query($con,"SELECT * from tbl_winner where a_id='$row[a_id]' and standing_id='Silver'");
            $num_silver=mysqli_num_rows($silver);
            $num_silver=$num_silver*50;

            $bronze=mysqli_query($con,"SELECT * from tbl_winner where a_id='$row[a_id]' and standing_id='Bronze'");
            $num_bronze=mysqli_num_rows($bronze);
            $num_bronze=$num_bronze*1;

            $total_medal=$num_gold+$num_silver+$num_bronze;

            $check=mysqli_query($con,"SELECT * from tbl_athlete_overall where a_id='$row[a_id]'");
            $numcheck=mysqli_num_rows($check);
            if($numcheck>0){
            	mysqli_query($con,"UPDATE tbl_athlete_overall set total_points='$total_medal' where a_id='$row[a_id]'");
            } else{
            	mysqli_query($con,"INSERT into tbl_athlete_overall values('','$row[a_id]','$total_medal')");
            }

        }
       

?>