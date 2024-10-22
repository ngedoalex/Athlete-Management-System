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
            $query=mysqli_query($con,"SELECT * from tbl_athlete a inner join tbl_delegates d where a.del_id=d.del_id and d.event_id='$active_event_id' and a.a_id='$_GET[id]'");
            $row=mysqli_fetch_assoc($query);

            ?>

                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class=""><a href="./">Home</a></li>
                                        <li class=""><a href="view-athletes.php">Athletes</a></li>
                                        <li class="">Profile</li>
                                        <li class="active"><?php echo $row['a_name']?></li>
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
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Athlete Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="<?php echo $row['a_photo']?>" style="max-height:200px; max-width: 
                                    200px; box-shadow: 1px 1px 10px 1px gray;" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $row['a_num']?>, <?php echo $row['a_name']?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $row['del_name']?></div>
                                    <div class="location text-sm-center"><i class="fa fa-flag-o"></i> <?php echo $row['a_level'].'('.$row['a_category'].')'?></div><hr>
                                   
                                </div>
                             
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
                            </div>
                        </div>
                        </div>



                            <div class="col-xl-8" >
                            <div class="card" >
                                  <div class="card-header">
                                    <h4 class="pull-left"><i class="fa fa-gamepad"></i> Event Listed
                                    </h4>
                                    <a href="#add_game" data-toggle="modal" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add <?php echo $row['a_name']?>'s event</a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
                                    
                                    <table id="table-log" class="table table-bordered" >
                                        <thead>
                                          <tr> 
                                            <th>#</th>
                                             <th>Coach</th>
                                            <th>Event</th>
                                           <!--  <th>Rank</th> -->
                                            <th></th>
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                          $query1=mysqli_query($con,"SELECT * from tbl_athlete_game as ag inner join tbl_games as g where ag.a_id='$_GET[id]' and ag.game_id=g.game_id");
                                          while($row1=mysqli_fetch_assoc($query1)) { ?>
                                          <tr>
                                            <td><?php $i++; echo $i;?></td>
                                            <td><?php echo $row1['coach'];?></td>
                                            <td><?php echo $row1['game_name'];?></td>
                                        
                                            
                                           
                                              <!-- <td></td> -->
                                              <td> <a href="remove-mygame.php?id=<?php echo $row1['id']?>&a_id=<?php echo $_GET['id']?>" onclick="return confirm('Confirm deletion!')" ><i class="fa fa-trash"></i></a> | <a href="#update<?php echo $row1['id']?>" data-toggle="modal" ><i class="fa fa-pencil"></i></a>
                                              </td>
                                          </tr>
            <div class="modal fade" id="update<?=$row1['id']?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="GET" action="update_athlete_game.php" onsubmit="return confirm('Are you sure you want to submit? \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Update <?php echo $row1['game_name']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $row1['id']?>">
                                    <div class="col-md-12">
                                      <label>Coach</label>
                                      <input type="text" class="form-control" name="coach" value="<?=$row1['coach']?>"><br>
                                
                                  </div><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>
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

                          <form method="GET" action="save-game-add.php?a_id=<?php echo $_GET['id']?>" onsubmit="return confirm('Are you sure you want to submit? \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Add Game for <?php echo $row['a_name']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="a_id" class="form-control" value="<?php echo $_GET['id']?>">
                                    <div class="col-md-12">

      <label>Select /Add Coach  &nbsp;<a href="#" onclick="nonmember();" class="pull-right" id="non"><i class="fa fa-plus"></i></a></label><br>
     
              <div id="display_member" style="display: block;">
<select name="coach" class="standardSelect" style="width:100%;" placeholder="SELECT GAME">
  <option value="">Select coach for <?php echo $row['a_name']?></option>
                                 
       <?php

                                    $sqll = mysqli_query($con,"SELECT * from tbl_athlete_game group by coach");
                                    while($rowl=mysqli_fetch_array($sqll))
                                    {

                                  
      
                                         echo '<option value="'.$rowl['coach'].'">'.$rowl['coach'].'</option>';

                                   
       } ?>
  </select>
                        
       </div>
                   <div id="ifYes" style="display: none;">
                 <input type="text" class="form-control" id="coach_new" name="coach_new" placeholder="Enter Coach Name" />
                 <input type="hidden" id="val" class="form-control" name="" value="hide_me"  />
                    </div>
                    <script type="text/javascript">
                     
                      function nonmember(){
                        var val=document.getElementById('val').value
                        if(val=='hide_me'){
                          document.getElementById("display_member").style.display = "none";
                          document.getElementById("ifYes").style.display = "block";
                          document.getElementById("non").innerHTML= "<i class='fa fa-close'></i>";
                          document.getElementById('val').value='show_me';
                          document.getElementById('coach_new').value=''
                          document.getElementById('balance').value='0'
                        }else if(val=='show_me'){
                          document.getElementById("ifYes").style.display = "none";
                          document.getElementById("display_member").style.display = "block";
                          document.getElementById("non").innerHTML= "<i class='fa fa-plus'></i>";
                          document.getElementById('val').value='hide_me'
                          document.getElementById("coach_new").focus();
                        }
                        
                      }
                      
                    </script>
    </div>  
    <div class="col-md-12">
    <label>Select Event</label>
                               <select name="game_id" class="standardSelect" style="width:100%;" placeholder="SELECT GAME">
                                 
                                    <?php

                                    $sql = mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id' and level='$row[a_level]' and category='$row[a_category]' and game_id not in (SELECT game_id from tbl_athlete_game where a_id='$_GET[id]')");
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                      $count=mysqli_query($con,"SELECT * from tbl_winner where game_id='$row[game_id]'");
                                      $c=mysqli_num_rows($count);
      
                                         echo '<option value="'.$row['game_id'].'">'.$row['game_name'].'('.$row['level'].'-'.$row['category'].')'.'</option>';

                                   
                                    } ?>
                                    </select> </div>
                                
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
        