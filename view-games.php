     <?php $title="Athlete Profile"; include'head.php';
       if($user_type=="admin"){include'side_panel.php';}
       else{
        include'user-side-pabel.php';
       }


       ?>
       <div id="right-panel" class="right-panel">
            <?php         if($user_type=="admin"){include'header.php';}
       else{
        include'user-header.php';
       }
 ?>
                    <!--######################################## BREADCRUMBS ######################################-->
            <?php
            $query=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id' and game_id='$_GET[id]'");
            $row=mysqli_fetch_assoc($query);

            $count=mysqli_query($con,"SELECT * from tbl_athlete_game where game_id='$_GET[id]'");
            $num_players=mysqli_num_rows($count);

            ?>

                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class=""><a href="./">Home</a></li>
                                        <li class=""><a href="all-student.php">Students</a></li>
                                        <li class="">Profile</li>
                                        <li class="active"><?php echo $row['game_name']?></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">





                        <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-gamepad"></i><strong class="card-title pl-2">Event Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
               
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $row['game_name']?></h5>
                                
                                    <div class="location text-sm-center"><i class="fa fa-flag-o"></i> <?php echo $row['level'].'('.$row['category'].')'?></div><br><h2 class="text-center"><?php echo $num_players?></h2><hr>
                                   
                                </div>
                             
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-user"></i> No. of Players </a>
                      
                                </div>
                            </div>
                        </div>
                        </div>



                            <div class="col-xl-8" >
                            <div class="card" >
                                  <div class="card-header">
                                    <h4 class="pull-left"><i class="fa fa-gamepad"></i> All Players
                                    </h4>
                                    <a href="#add_game" data-toggle="modal" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Player</a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
                                    
                                    <table id="table-log" class="table table-bordered" >
                                        <thead>
                                          <tr> 
                                            <th>#</th>
                                             <th>Athlete #</th>
                                            <th>Name / Delegates</th>
                                            <th>Rank</th>
                                            <th></th>
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                          $query1=mysqli_query($con,"SELECT * from tbl_athlete_game as ag inner join tbl_games as g inner join tbl_athlete as a inner join tbl_delegates as d where d.event_id='$active_event_id' and ag.game_id='$_GET[id]' and ag.game_id=g.game_id and a.a_id=ag.a_id and a.del_id=d.del_id");
                                          while($row1=mysqli_fetch_assoc($query1)) { ?>
                                          <tr>
                                            <td><?php $i++; echo $i;?></td>
                                            <td><?php echo $row1['no'];?></td>
                                            <td><?php echo $row1['a_name']." / ".$row1['del_name'];?></td>
                                        
                                            
                                           
                                              <td></td>
                                              <td> <a href="remove-mygame.php?id=<?php echo $row1['id']?>&a_id=<?php echo $_GET['id']?>" onclick="return confirm('Confirm deletion!')" ><i class="fa fa-trash"></i></a></td>
                                          </tr>

                                          <?php } ?>
                                         
                                        </tbody>
                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
                   <div class="modal fade" id="add_game" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="POST" action="save-game-add.php?game_id=<?php echo $_GET['id']?>" onsubmit="return confirm('Are you sure you want to submit? \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Add Player for <?php echo $row['game_name']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                     
                                <label>Athlete No:</label>
                                <input type="text" name="athlete_no" class="form-control" placeholder="0001" autofocus="" required=""><br>
                                <label>Select Player</label>
                               <select name="a_id" class="standardSelect" style="width:100%;" >
                                 
                                    <?php

                                    $sql = mysqli_query($con,"SELECT * from tbl_athlete where a_level='$row[level]' and a_category='$row[category]'");
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                 
      
                                         echo '<option value="'.$row['a_id'].'">'.$row['a_name'].'</option>';

                                   
                                    } ?>
                                    </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>
    <?php include'js.php';?>
        