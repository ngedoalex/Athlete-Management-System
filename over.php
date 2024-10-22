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
                      <tr><th colspan="6">ATHLETIC FINAL RESULTS <a onclick='window.open("print.php?print=overall","","width=1200,height=600");' class="btn btn-sm pull-right"><i class="fa fa-print"></i></a></th></tr>
                      <tr>
                        <th>DELEGATION</th>
                        <th>CATEGORY</th>
                        <th>GOLD</th>
                        <th>SILVER</th>
                        <th>BRONZE</th>
                        <th>RANK</th>
                      </tr>


                            <tbody>
        
                                     <?php 
                      $query=mysqli_query($con,"SELECT * from tbl_delegates order by del_name ASC");
                      $num=mysqli_num_rows($query);

                       $query1=mysqli_query($con,"SELECT * from tbl_delegates order by del_name ASC");
                  while($row1=mysqli_fetch_assoc($query1)){
            
                          

                              $g=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and standing_id='Gold' and a.del_id='$row1[del_id]'");
                              $ng=mysqli_fetch_assoc($g);
                              $total_gold=mysqli_num_rows($g);

                             $s=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and standing_id='Silver' and a.del_id='$row1[del_id]'");
                              $ns=mysqli_fetch_assoc($s);
                              $total_silver=mysqli_num_rows($s);

                              $b=mysqli_query($con,"SELECT * from tbl_winner as w inner join tbl_athlete as a where w.a_id=a.a_id and standing_id='Bronze' and a.del_id='$row1[del_id]'");
                              $nb=mysqli_fetch_assoc($b);
                              $total_bronze=mysqli_num_rows($b);
                              
                              if($total_gold>0){
                              $winner_result[]=$total_gold;
                              $winner_id[]=$row1['del_id'];
                            }

                          }


                      while($row=mysqli_fetch_assoc($query)){?>
                         <tr><td  rowspan="3" style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"><?php echo $row['del_name']?></td>
                          <td>Boys</td>
                          <td style="text-align: center;"> <?php $g=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Gold' and a.del_id='$row[del_id]' and a.a_category='Boys'"); $gnum=mysqli_num_rows($g); echo $gnum; ?></td>
                          <td style="text-align: center;"><?php $s=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Silver' and a.del_id='$row[del_id]' and a.a_category='Boys'"); $snum=mysqli_num_rows($s); echo $snum; ?></td>
                          <td style="text-align: center;"> <?php $b=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Bronze' and a.del_id='$row[del_id]' and a.a_category='Boys'"); $bnum=mysqli_num_rows($b); echo $bnum; ?></td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;" rowspan="3">
                            <!--COUNT TOTAL GOLD EACH DELEGATES-->

              <?php $winner = max($winner_result);
              $key = array_search($winner, $winner_result);
              $id = array_search($winner, $winner_id);
              if($winner_id[$key]==$row['del_id']){
                echo "Gold";
              }
               ?>
                            </td>
                 
                          </tr>
                          <tr>
                          <td>Girls</td>
                        <td style="text-align: center;"> <?php $g=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Gold' and a.del_id='$row[del_id]' and a.a_category='Girls'"); $ggnum=mysqli_num_rows($g); echo $ggnum; ?></td>
                          <td style="text-align: center;"><?php $s=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Silver' and a.del_id='$row[del_id]' and a.a_category='Girls'"); $gsnum=mysqli_num_rows($s); echo $gsnum; ?></td>
                          <td style="text-align: center;"> <?php $b=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where w.a_id=a.a_id and w.standing_id='Bronze' and a.del_id='$row[del_id]' and a.a_category='Girls'"); $gbnum=mysqli_num_rows($b); echo $gbnum; ?></td>
                          
                     
                          </tr>
                           <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; ">Total</td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"> <?php $gtotal= $gnum+$ggnum; echo $gtotal?></td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"> <?php $stotal= $snum+$gsnum; echo $stotal?></td>
                          <td style="background:<?php echo $row['del_color']?>; text-shadow: #fff 1px 0 10px; text-align: center;"> <?php $btotal= $bnum+$gbnum; echo $btotal?></td>
            
                        
                        <?php }
                      
                        ?>
                      
                    
                    </tbody>
                    <tfoot></tfoot>
                  </table>              
              
