       <?php $title="User"; include'head.php';
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
                                        <li class=""><a href="admin.php">Home</a></li>
                                        <li class=""><a href="users.php">User</a></li>
                                        <li class="active">Add New User</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-3">
                      <div class="row">
                        <div class="col-lg-4">
                                        <div class="card">
                                          <form method="GET" action="save_user.php">
                      <div class="card-header"><strong>Add New User</strong></div>
                      <div class="card-body card-block">
                        <div class="form-group"><label for="company" class=" form-control-label">Fullname</label>
                          <input type="text" id="company" name="fullname" value="<?php echo $_GET['fulname']?>" placeholder="Enter User's Fullname" class="form-control"></div>
                        <div class="form-group"><label for="vat" class=" form-control-label">Username</label>
                          <input type="text" id="vat" name="username" placeholder="Enter User's Username" class="form-control"></div>
                        <label for="street" class=" form-control-label">Password</label>
                            <div class="input-group">
                              
                          <input type="password" id="password" name="password" placeholder="Enter desired password" class="form-control">
                          <div class="input-group-addon">
                                  <input type="checkbox" onclick="showPass()"><font style="size:11px;"> Show</font>
                            </div>
                           </div>



                        <div class="form-group">
                          <label for="country" class=" form-control-label">User Type</label>
                          <select class="form-control" name="user_type" required="">
                            <option value="">Select type of User</option>
                          <option value="Admin">Admin</option>
                          <option value="Encoder">Encoder</option>
                        </select>

                      </div>
                       <div class="row">
                        <div class="col-md-12">
                          
                            <button type="reset" class="btn btn-default btn-sm pull-left">
                               <i class="fa fa-refresh"></i> Clear
                            </button>
                           
                            <button type="submit" class="btn btn-primary btn-sm pull-right">
                              <i class="fa fa-check-square-o"></i> Submit
                            </button>
                        </div>
                      </div>
                      </div> 
                    </form>
                      </div>
                     
                    </div>
                        
           
                                                <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>System User</h4>
                                </div>
                                <div class="card-body"  style="overflow: auto;">
                                   <table id="table1" class="table table-bordered" >
                                        <thead>
                                          <tr>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                            <th>User Type</th>
                                            <th>Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $query=mysqli_query($con,"SELECT * from tbl_user");
                                          while($row=mysqli_fetch_assoc($query)) { 
                                            if($row['user_status']=="1"){
                                              $btn="success";
                                              $status="Active";
                                              $change="Deactivate";
                                            } else{ $btn="secondary";
                                            $status="Inactive";
                                            $change="Activate";
                                          }?>
                                          <tr>
                                            <td><?php echo $row['user_fulname']?></td>
                                            <td><?php echo $row['user_name']?></td>
                                            <td><?php echo $row['user_type']?></td>
                                            <td>                             
                                  <div class="btn-group">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-<?php echo $btn?> btn-sm"><?php echo $status;?></button>
                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                  
                                      <a class="dropdown-item" href="change_status.php?user_id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure you want to <?php echo $change?> <?php echo $row['name']?> \n Click OK to confirm, Cancel to abort');"><?php echo $change;?></a>
                                          <a class="dropdown-item" href="delete_user.php?user_id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['name']?> \n Click OK to confirm deletion, Cancel to abort');">Update</a>
                                      <a class="dropdown-item" href="delete_user.php?user_id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['name']?> \n Click OK to confirm deletion, Cancel to abort');">Delete</a>
                                    </div>
                                  </div>
                               </td>
                                          </tr>
                                          <?php } ?>
                                         
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                      </div>



<script type="text/javascript">
  function showPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>



                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    <?php include'js.php';?>
        