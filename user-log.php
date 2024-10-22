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

                        
           
                                                <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>System User</h4>
                                </div>
                                <div class="card-body"  style="overflow: auto;">
                                   <table id="table-log" class="table table-bordered" >
                                        <thead>
                                          <tr>
                                            <th>Date/Time</th>
                                            <th>Details</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $query=mysqli_query($con,"SELECT * from tbl_history");
                                          while($row=mysqli_fetch_assoc($query)) { 
                                          ?>
                                          <tr>
                                            <td><?php echo date('m/d/y h:i:s', strtotime($row['h_date']))?></td>
                                            <td><?php echo $row['h_details']?></td>
                                          
              
           
   
                                          </tr>
                                          <?php } ?>
                                         
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                      </div>





                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    <?php include'js.php';?>
        