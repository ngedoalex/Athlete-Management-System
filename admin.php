       <?php $title="Dashboard"; include'head.php';
       include'side_panel.php';

       ?>
       <div id="right-panel" class="right-panel">
            <?php  include'header.php'; ?>
                    <!--######################################## BREADCRUMBS ######################################-->
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">
                        <div class="col-lg-12"><?php $e=mysqli_query($con,"SELECT * from tbl_event where event_id='$active_event_id'"); $er=mysqli_fetch_assoc($e); ?>
                            
                            <div class="card">
                            
                                 
                                <?php 
                                $game_count=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id'");
                                 $game_count=mysqli_num_rows($game_count);

                                $game_done=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_games g where w.game_id=g.game_id and g.event_id='$active_event_id'  group by w.game_id");
                                 $done_count=mysqli_num_rows($game_done);
                                

                                $num1=$done_count;
                                $num2=$game_count;
                                $percentage = ($num1 > 0 && $num2 > 0) ? (intval($num1) / intval($num2)) * 100 : 0;
                                ?>
                                <div class="bg-success text-white card-header"><h3 class=""><i class="fa  fa-bar-chart-o"></i> &nbsp;<?php if(empty($event_title)){ echo "Error: Select or Add New Athletic Meet!";}  else { echo $event_title;}?></h3>              
                            <div class="progress progress-xs mt-3" style="height: 15px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percentage . "%"; ?>;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><center style="color:white;"> Event Progress: <?php echo number_format($percentage) . "%"; ?></center>
                            </div>
                                <div class="card-body">
                                    

<?php $sq1 = mysqli_query($con,"SELECT * from  tbl_delegates where event_id='$active_event_id'");
$snum=mysqli_num_rows($sq1);

 ?>

                        <div class="col-xl-4 col-lg-6">
                             <a href="all-delegates.php">
                        <div class="card">
                            <div class="p-0 clearfix">
                                <i class="fa fa-sitemap bg-danger p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-danger mb-0 pt-3"><?php echo $snum;?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">NO. OF DELEGATES</div>
                            </div>
                        </div>
                        </a>
                         <a href="#">

                        <div class="card">
                            <?php $q1 = mysqli_query($con,"SELECT * from tbl_athlete a inner join tbl_delegates d where a.del_id=d.del_id and d.event_id='$active_event_id'");
                                $cnum=mysqli_num_rows($q1);?>
                            <div class="p-0 clearfix">
                                <i class="fa fa-group bg-info p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-info mb-0 pt-3"><?php echo $cnum;?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">NO. OF ATHLETES</div>
                            </div>
                        </div>
                        </a>
                     <a href="#">

                        <div class="card">
                            <?php $q1 = mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id'");
                                $cnum=mysqli_num_rows($q1);?>
                            <div class="p-0 clearfix">
                                <i class="fa fa-gamepad bg-warning p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-warning mb-0 pt-3"><?php echo $cnum;?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">NO. OF EVENTS</div>
                            </div>
                        </div>
                        </a>

                        <a href="#">

                        <div class="card">
                            <?php $q1 = mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_games g where w.game_id=g.game_id and g.event_id='$active_event_id'  group by w.game_id");
                                $cnum=mysqli_num_rows($q1);?>
                            <div class="p-0 clearfix">
                                <i class="fa fa-check bg-success p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-success mb-0 pt-3"><?php echo $cnum;?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">COMPLETED EVENTS</div>
                            </div>
                        </div>
                        </a>
                                                

                 
                        </div>



                        <div class="col-lg-8" >
                            <div class="card" >
                               
                                <div class="card-body" style="margin:2px; padding:2px;">
                          <?php
                            $quer=mysqli_query($con,"SELECT * from tbl_delegates where event_id='$active_event_id' order by del_name ASC");
                           while($res=mysqli_fetch_assoc($quer)){
                            
                            $color.='"'.$res['del_color'].'",';

                            $q2=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$res[del_id]' and w.a_id=a.a_id and w.standing_id='Gold'");
                            $g_count=mysqli_num_rows($q2);

                            $q3=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$res[del_id]' and w.a_id=a.a_id and w.standing_id='Silver'");
                            $s_count=mysqli_num_rows($q3);

                            $q4=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_athlete a where a.del_id='$res[del_id]' and w.a_id=a.a_id and w.standing_id='Bronze'");
                            $b_count=mysqli_num_rows($q4);


                            $delegates.='"'.$res['del_name'].'",';
                            $gold.='"'.$g_count.'",';
                            $silver.='"'.$s_count.'",';
                            $bronze.='"'.$b_count.'",';

                           }
            
                          
                            ?>
                                     <canvas id="chart" ></canvas>

                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
                                </div>

                            </div>
                        </div>

                        </div>


    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
        