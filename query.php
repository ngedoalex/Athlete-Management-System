<table width="100%">
	

<?php
include('dbcon.php');
 $q2=mysqli_query($con,"SELECT * from tbl_delegates where del_name='Basilisa' order by del_name ASC "); //find all delegates
                          while ($r2=mysqli_fetch_assoc($q2)) {
                             $gold=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Gold' and a.a_category='Boys'");
                            
                            $rgold=mysqli_num_rows($gold);
                            while ($rg=mysqli_fetch_assoc($gold)) {
                            	# code...
                            	echo "{$rg['a_id']}<br>";
                            }

                            $silver=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Silver' and a.a_category='Boys'");
                             $rs=mysqli_fetch_assoc($silver);
                              $rsilver=mysqli_num_rows($silver);

                            $bronze=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Bronze' and a.a_category='Boys'");
                            $rb=mysqli_fetch_assoc($bronze);

                            $rbronze=mysqli_num_rows($bronze);   
 

                           // echo "<tr><td>{$r2['del_name']}</td><td>Gold:{$rgold}</td><td>Silver:{$rsilver}</td><td>Bronze:{$rbronze}</td></tr>";
                          ?>
                       
                        <?php }  ?>

</table>