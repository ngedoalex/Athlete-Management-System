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
                                        <li class="active">Student</li>
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
                                    <h4 class="pull-left">All Students</h4> <a href="add_student.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"> Add New Student</i></a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Fullname</th>
                        <th>Year / Course</th>
                        <th>Contact</th>
                        <th>Guardian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $query=mysqli_query($con,"SELECT * from tbl_student as s inner join tbl_educ_background as e inner join tbl_courses as c where e.s_id=s.s_id and c.c_id=e.c_id");
                      while ($row=mysqli_fetch_assoc($query)) {
                        ?>
                      <tr onclick="window.location.href = 'stud-profile.php?id=<?php echo $row['s_id']?>';" style="cursor: pointer;">
                        <td><?php echo $row['school_id'];?></td>
                        <td><img src="<?php echo $row['s_photo']?>" style="height:30px;" > <?php echo utf8_encode($row['lname'].', '.$row['fname']);?></td>
                        <td><?php echo strtoupper($row['c_abbr'].' - '.$row['yr_lvl']);?></td>

                        <td><?php echo $row['contact_no'];?></td>
                        <td><?php echo $row['guardian'];?></td>
                      </tr>
                      <?php } ?>                 
                    
                    </tbody>
                  </table>

                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
        