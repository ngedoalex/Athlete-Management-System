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
                                        <li class="active">Delegates</li>
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
                                    <h4 class="pull-left">All Delegates</h4> <a href="#add_course" class="btn btn-sm btn-success pull-right" data-toggle="modal"><i class="fa fa-plus"> Add New Delegates</i></a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Delegates</th>
                        <th>No. of Athletes</th>
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                      <?php $query=mysqli_query($con,"SELECT * from tbl_delegates where event_id='$active_event_id' order by del_name ASC");
                      $i=0;
                      while ($row=mysqli_fetch_assoc($query)) {
                        $c=mysqli_query($con,"SELECT * from tbl_athlete where del_id='$row[del_id]'");
                        $num=mysqli_num_rows($c);
                        $i++;
                        ?>
                      <tr  style="cursor: pointer; background: <?php echo $row['del_color']?>">
                        <td class="text-white" style="cursor: pointer;"   onclick="window.location.href = 'view-athletes.php?id=<?php echo $row['del_id']?>';"><?php echo $i;?></td>
                        <td style="cursor: pointer;text-shadow: #fff 1px 1px 1px; color:black;"  onclick="window.location.href = 'view-athletes.php?id=<?php echo $row['del_id']?>';"><?php echo $row['del_name'];?></td>
    

                        <td style="cursor: pointer;text-shadow: #fff 1px 1px 1px; color:black;"  onclick="window.location.href = 'view-athletes.php?id=<?php echo $row['del_id']?>';"><?php echo $num;?></td>
                        <td class="text-white"><a href="#edit<?php echo $row['del_id']?>" data-toggle="modal"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Confirm deletion!');" href="del_delegates.php?del_id=<?php echo $row['del_id']?>" ><i class="fa fa-trash"></i></a></td>
                  
                      </tr>

<div class="modal fade" id="edit<?php echo $row['del_id']?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="POST" action="updadte-delegates.php?id=<?php echo $row['del_id']?>" onsubmit="return confirm('Are you sure you want to submit? \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">New Delegates</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
               
                                <label>Name of Delegates</label>
                                <input type="text" name="del_name" class="form-control" placeholder="e.g. San Jose" value="<?php echo $row['del_name'];?>">
                                <label>Delegates Color</label>
                                <input type="color" style="height:30px;" name="del_color" class="form-control" placeholder="e.g. San Jose" value="<?php echo $row['del_color']?>">
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
                      <?php } ?>                 
                    
                    </tbody>
                  </table>

                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
               <div class="modal fade" id="add_course" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="GET" action="save-delegates.php" onsubmit="return confirm('Are you sure you want to submit? \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">New Delegates</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
               
                                <label>Name of Delegates</label>
                                <input type="text" name="del_name" class="form-control" placeholder="e.g. San Jose">
                                <label>Delegates Color</label>
                                <input type="color" style="height:30px;" name="del_color" class="form-control" placeholder="e.g. San Jose">
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
                    