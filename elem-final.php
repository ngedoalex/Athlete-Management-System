              <style type="text/css">
               td{
                  padding:3px;
                }
                th{
                  text-align: center;
                }
              </style>
              <table id="" class="" border="1" style="border-collapse: collapse; " width="100%">
                    <thead>   
                      <tr><th colspan="5">ELEMENTARY FINAL <a onclick='window.open("print.php?print=elem-final","","width=1200,height=600");' class="btn btn-sm pull-right"><i class="fa fa-print"></i></a></th></tr>
                      <tr>
                        <th>DELEGATION</th>
                        <th>CATEGORY</th>
                        <th>GOLD</th>
                        <th>SILVER</th>
                        <th>BRONZE</th>
                  
                      </tr>


                            <tbody>
        
                                     <?php 
                      $query=mysqli_query($con,"SELECT * from tbl_delegates where event_id='$active_event_id' order by del_name ASC");
                      $num=mysqli_num_rows($query);
                      ?>
                                             <?php
                        
                        while($row=mysqli_fetch_assoc($query)){?>
                         <tr><td  rowspan="3" style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"><?php echo $row['del_name']?></td>
                          <td>Boys</td>
                          <td style="text-align: center;"> <?php $g=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Gold' and a.del_id='$row[del_id]' and a.a_category='Boys' and a.a_level='Elementary'"); $gnum=mysqli_num_rows($g); echo $gnum; ?></td>
                          <td style="text-align: center;"><?php $s=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Silver' and a.del_id='$row[del_id]' and a.a_category='Boys' and a.a_level='Elementary'"); $snum=mysqli_num_rows($s); echo $snum; ?></td>
                          <td style="text-align: center;"> <?php $b=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Bronze' and a.del_id='$row[del_id]' and a.a_category='Boys' and a.a_level='Elementary'"); $bnum=mysqli_num_rows($b); echo $bnum; ?></td>
                 
                          </tr>
                          <tr>
                          <td>Girls</td>
                        <td style="text-align: center;"> <?php $g=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Gold' and a.del_id='$row[del_id]' and a.a_category='Girls' and a.a_level='Elementary'"); $ggnum=mysqli_num_rows($g); echo $ggnum; ?></td>
                          <td style="text-align: center;"><?php $s=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Silver' and a.del_id='$row[del_id]' and a.a_category='Girls' and a.a_level='Elementary'"); $gsnum=mysqli_num_rows($s); echo $gsnum; ?></td>
                          <td style="text-align: center;"> <?php $b=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Bronze' and a.del_id='$row[del_id]' and a.a_category='Girls' and a.a_level='Elementary'"); $gbnum=mysqli_num_rows($b); echo $gbnum; ?></td>
                     
                          </tr>
                           <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; ">Total</td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"> <?php echo $gnum+$ggnum;?></td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"> <?php echo $snum+$gsnum;?></td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"> <?php echo $bnum+$gbnum;?></td>
                        
                        <?php }
                        ?>
                      
                    
                    </tbody>
                    <tfoot></tfoot>
                  </table>