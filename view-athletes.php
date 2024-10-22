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
                                        <li class="active">Athletes</li>
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
                                    <h4 class="pull-left">Athletes</h4> <a href="add_athlete.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"> Add New Athlete</i></a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
              <table id="table-athlete" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                       <!--  <th>#</th> -->
                        <th>Athlete No.</th>
                        <th>Fullname</th>
                        <th>Category</th>
                        <th>Level</th>
                        <th>Delegates</th>
                        <th><i class="fa fa-cogs"></i></th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($_GET['id']){
                        $query=mysqli_query($con,"SELECT * from tbl_athlete a inner join tbl_delegates d  on a.del_id = d.del_id where a.del_id='$_GET[id]' and d.del_id='$_GET[id]' and d.event_id='$active_event_id' order by a_num ASC");
                      } else{
                        $query=mysqli_query($con,"SELECT * from tbl_athlete a inner join tbl_delegates d  on a.del_id = d.del_id where a.del_id=d.del_id and d.event_id='$active_event_id'");
                      }
                      
                      
                      while ($row=mysqli_fetch_assoc($query)) {
                        $i++;
                        ?>
                      <tr  style="cursor: pointer;">
                        <!-- <td onclick="window.location.href = 'athlete-profile.php?id=<?php echo $row['s_id']?>';"><?php echo $i;?></td> -->
                        <td onclick="window.location.href = 'athlete-profile.php?id=<?php echo $row['s_id']?>';"><?php echo $row['a_num'];?></td>
                        <td onclick="window.location.href = 'athlete-profile.php?id=<?php echo $row['a_id']?>';"><img src="<?php echo $row['a_photo']?>" style="height:30px;" > <?php echo utf8_encode($row['a_name']);?></td>
                        <td onclick="window.location.href = 'athlete-profile.php?id=<?php echo $row['a_id']?>';"><?php echo $row['a_category'];?></td>

                        <td onclick="window.location.href = 'athlete-profile.php?id=<?php echo $row['a_id']?>';"><?php echo $row['a_level'];?></td>
                        <td onclick="window.location.href = 'athlete-profile.php?id=<?php echo $row['a_id']?>';"><?php echo $row['del_name'];?></td>
                     <td><a href="update_athlete.php?id=<?php echo $row['a_id']?>" onclick="return confirm('Are you sure you want to modify this athlete?')"><i class="fa fa-edit"></i></a></td>
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
        