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
                      <?php 
                      $query=mysqli_query($con,"SELECT * from tbl_delegates WHERE event_id='$active_event_id' order by del_name ASC");
                      $num=mysqli_num_rows($query);
                      ?>
                      
                      <tr>
                        <th colspan="<?php echo ($num*3)+1?>">SECONDARY ATHLETICS RESULT (BOYS) <a onclick='window.open("print.php?print=second-boys","","width=1200,height=600");' class="btn btn-sm pull-right"><i class="fa fa-print"></i></a></th>
                      </tr>
                      <tr><th rowspan="4" valign="center">Event</th></tr>
                      
                   
                      <tr>
                        <th colspan="<?php echo $num*3?>" style="text-align: center;">DELEGATES</th>
                      </tr>

                      <tr>
                        <?php
                        
                        while($row=mysqli_fetch_assoc($query)){
                          echo"<th colspan='3' style='background:{$row['del_color']}; text-shadow: #fff 1px 0 10px;'>{$row['del_name']}</th>";
                        }
                        ?>
            
                      </tr>
                      <tr>
                  
                        <?php for($i=1; $i<=$num; $i++){ ?>
                          
                          <td style="font-size:13px;">Gold</td>
                          <td style="font-size:13px;">Silver</td>
                          <td style="font-size:13px;">Bronze</td>

                        <?php }?>

                          
                        </tr>

                            <tbody>
                        <?php
                        $q1=mysqli_query($con,"SELECT * from tbl_games where category='Boys' and level='Secondary' and event_id='$active_event_id'");
                        while ($r1=mysqli_fetch_assoc($q1)) {
                        ?>
                        <tr>

                          <td><?php echo $r1['game_name']?></td>
                          <?php $q2=mysqli_query($con,"SELECT * from tbl_delegates WHERE event_id='$active_event_id' order by del_name ASC"); //find all delegates
                          while ($r2=mysqli_fetch_assoc($q2)) {
                          ?>
                         
                          
                          <td  style="font-size:13px;"><!--GOLD-->
                            <?php $gold=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Gold' and w.game_id='$r1[game_id]' and a.a_category='Boys'");
                            $rg=mysqli_fetch_assoc($gold);
                            $rgold=mysqli_num_rows($gold); 
                            echo $rg['a_name'];
                            $tot_gold+=$rgold;

                          ?></td>
                          <td  style="font-size:13px;">
                            <?php $silver=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Silver' and w.game_id='$r1[game_id]' and a.a_category='Boys'");
                            $rs=mysqli_fetch_assoc($silver);
                            $rsilver=mysqli_num_rows($silver); echo $rs['a_name'];
                            $tot_silver+=$rsilver;
                          ?>
                          </td>
                          <td  style="font-size:13px;">
                            <?php $bronze=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Bronze' and w.game_id='$r1[game_id]' and a.a_category='Boys'");
                            $rb=mysqli_fetch_assoc($bronze);
                            $rbronze=mysqli_num_rows($bronze); echo $rb['a_name'];
                            $tot_bronze+=$rbronze;
                          ?>
                          </td>


                        <?php   

                          } 
                          ?>
                        </tr>


                      <?php } ?>
                      <tr><th>Total</th>
                        <?php $q2=mysqli_query($con,"SELECT * from tbl_delegates WHERE event_id='$active_event_id' order by del_name ASC"); //find all delegates
                          while ($r2=mysqli_fetch_assoc($q2)) {
                             $gold=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a inner join tbl_games g where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Gold' and a.a_category='Boys' and g.game_id=w.game_id and g.level='Secondary'");
                            $rg=mysqli_fetch_assoc($gold);
                            $rgold=mysqli_num_rows($gold);

                            $silver=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a inner join tbl_games g where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Silver' and a.a_category='Boys' and g.game_id=w.game_id and g.level='Secondary'");
                             $rs=mysqli_fetch_assoc($silver);
                              $rsilver=mysqli_num_rows($silver);

                            $bronze=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a inner join tbl_games g where a.del_id='$r2[del_id]' and w.a_id=a.a_id and standing_id='Bronze' and a.a_category='Boys' and g.game_id=w.game_id and g.level='Secondary'");
                            $rb=mysqli_fetch_assoc($bronze);
                            $rbronze=mysqli_num_rows($bronze);   
 

                           echo "<td>{$rgold}</td><td>{$rsilver}</td><td>{$rbronze}</td>";
                          ?>
                       
                        <?php }  ?>
                      </tr>                    
                    </tbody>
                    <tfoot>
                  </tfoot>
                  </table>