       <?php $title="All Student"; include'head.php';
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
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class="active">Events</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">

                   <div class="col-lg-12" >
                            <div class="card" >
                                  <div class="card-header">
                                    <h4 class="pull-left">All Events</h4> <a href="#add_games" class="btn btn-sm btn-success pull-right" data-toggle="modal"><i class="fa fa-plus"> Add New Event</i></a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
              <table id="bootstrap-data-table" class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Level</th>
                        <th>Category</th>
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                      <?php $query=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id'");
                      $i=0;
                      while ($row=mysqli_fetch_assoc($query)) {
                        $i++;
                        ?>
                      <tr>
                        <td  onclick="window.location.href = 'view-games.php?id=<?php echo $row['game_id']?>';" style="cursor: pointer;"><?php echo $i;?></td>
                        <td  onclick="window.location.href = 'view-games.php?id=<?php echo $row['game_id']?>';" style="cursor: pointer;"><?php echo $row['game_name'];?></td>
                        <td  onclick="window.location.href = 'view-games.php?id=<?php echo $row['game_id']?>';" style="cursor: pointer;"><?php echo $row['level'];?></td>
                        <td  onclick="window.location.href = 'view-games.php?id=<?php echo $row['game_id']?>';" style="cursor: pointer;"><?php echo $row['category'];?></td>
                        
    

                        <td><a onclick="return confirm('Confirm deletion!');" href="del_games.php?game_id=<?php echo $row['game_id']?>" ><i class="fa fa-trash"></i></a></td>
                  
                      </tr>
                      <?php } ?>                 
                    
                    </tbody>
                  </table>

                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
               <div class="modal fade" id="add_games" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="GET" action="save-games.php" onsubmit="return confirm('Are you sure you want to submit? \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel"> <i class="fa fa-gamepad"></i> New Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
               
                                <label><b>Title</b></label>
                                <input type="text" name="game_name" class="form-control" placeholder="e.g. Long Jump">
                                <label><b>Category:</b> </label>
                                <input type="checkbox"  checked name="men">Boys <input type="checkbox" name="women" checked >Girls
                               
                                <label>&nbsp;&nbsp;<b>Level: </b></label>
                                <input type="checkbox"  checked name="elementary">Elementary <input type="checkbox" name="secondary" checked >Secondary
                  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>
    
    <?php include'js.php';?>
                    <script type="text/javascript">
                        $('#abbr').blur(function() {
                          var abbr=document.getElementById('abbr').value;
                            //ajax request
                            $.ajax({
                                url: "check-course.php",
                                data: {
                                    'abbr' : $('#abbr').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                        alert(abbr+' already exists!');
                                        document.getElementById('abbr').focus();
                                        document.getElementById('abbr').value="";
                                    }
                                    else{
                                       
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                        });
                    </script>
        