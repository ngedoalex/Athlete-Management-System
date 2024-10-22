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
                      $query=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id' and level='Elementary' and category='Boys' order by game_name ASC");
                      $num=mysqli_num_rows($query);
                      ?>
                      
                      <tr>
                        <th colspan="<?php echo ($num*3)+4?>">ELEMENTARY ATHLETICS RESULT (BOYS) <a onclick='window.open("print.php?print=elem-boys","","width=1200,height=600");' class="btn btn-sm pull-right"><i class="fa fa-print"></i></a></th>
                      </tr>
                      <tr><th rowspan="4" valign="center">DELEGATES</th></tr>
                      
                   
                      <tr>
                        <th colspan="<?php echo ($num*3)+3?>" style="text-align: center;">EVENTS</th>
                      </tr>

                      <tr>
                        <?php
                        
                        while($row=mysqli_fetch_assoc($query)){
                          $game_name=$row['game_name'];
                          echo'<th style="font-size:12px;" colspan="3">'.$game_name.'</th>';
                        }
                        ?>
                        <th colspan="3" style="font-size:12px;">
                          Total
                        </th>
            
                      </tr>
                      <tr>
                  
                        <?php for($i=1; $i<=$num; $i++){ ?>
                          
                          <td style="font-size:13px;">G</td>
                          <td style="font-size:13px;">S</td>
                          <td style="font-size:13px;">B</td>

                        <?php }?>
                        <td style="font-size:12px;">G</td>
                        <td style="font-size:12px;">S</td>
                        <td style="font-size:12px;">B</td>
                          
                        </tr>

                            <tbody>
                        <?php
                        $q1=mysqli_query($con,"SELECT * from tbl_delegates where event_id='$active_event_id' order by del_name ASC");
                        while ($r1=mysqli_fetch_assoc($q1)) {
                        ?>
                        <tr>

                          <td style="background: <?=$r1['del_color']?>; color: black;"><font style=" color:<?php if($r1['del_color']=="#000000"){echo"white";} else{ echo "black; text-shadow: #fff 1px 1px 2px;"; }?>;"><?php echo $r1['del_name']?></font></td>
                          <?php $q2=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id' and level='Elementary' and category='Boys' order by game_name ASC"); //find all delegates
                          while ($r2=mysqli_fetch_assoc($q2)) {
                          ?>
                         
                          
                          <td  style="font-size:13px;"><!--GOLD-->
                            <?php $gold=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r1[del_id]' and w.a_id=a.a_id and standing_id='Gold' and w.game_id='$r2[game_id]' and a.a_category='Boys'");
                            $rg=mysqli_fetch_assoc($gold);
                            $rgold=mysqli_num_rows($gold); 
                            if($rgold>0){
                              echo"1";
                            } else{

                            }
                            $tot_gold+=$rgold;

                          ?></td>
                          <td  style="font-size:13px;">
                            <?php $silver=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r1[del_id]' and w.a_id=a.a_id and standing_id='Silver' and w.game_id='$r2[game_id]' and a.a_category='Boys'");
                            $rs=mysqli_fetch_assoc($silver);
                            $rsilver=mysqli_num_rows($silver); 
                            if($rsilver>0){
                              echo"1";
                            } else{
                              
                            }
                            $tot_silver+=$rsilver;
                          ?>
                          </td>
                          <td  style="font-size:13px;">
                            <?php $bronze=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$r1[del_id]' and w.a_id=a.a_id and standing_id='Bronze' and w.game_id='$r2[game_id]' and a.a_category='Boys'");
                            $rb=mysqli_fetch_assoc($bronze);
                            $rbronze=mysqli_num_rows($bronze); 
                            if($rbronze>0){
                              echo"1";
                            } else{
                              
                            }
                            $tot_bronze+=$rbronze;
                          ?>
                          </td>



                        <?php   

                          } 
                          ?>
                          <td style="background:<?php echo $r1['del_color'];?>"><?=$tot_gold;?></td>
                          <td style="background:<?php echo $r1['del_color'];?>"><?=$tot_silver;?></td>
                          <td style="background:<?php echo $r1['del_color'];?>"><?=$tot_bronze;?></td>
                        </tr>
                      <?php $tot_gold=0; $tot_silver=0; $tot_bronze=0;} ?>
                    
             
                

                      
                   
                        
    

               
                    
                    </tbody>
                    <tfoot></tfoot>
                  </table>