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
                                    <h4 class="pull-left">LIST OF UNPAID</h4> <a href="#" class="btn btn-sm btn-success pull-right"><i class="fa fa-print"> Print</i></a>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Year / Course</th>
                        <th>Unpaid</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $count=mysqli_query($con,"SELECT * from tbl_payments where status=1");
                      $num=mysqli_num_rows($count);
                      $query=mysqli_query($con,"SELECT * from tbl_student as s inner join tbl_educ_background as e inner join tbl_courses as c where e.s_id=s.s_id and c.c_id=e.c_id");
                      $i=0;

                      while ($row=mysqli_fetch_assoc($query)){
                        $query1=mysqli_query($con,"SELECT *,count(pt.p_id) as total_paid from tbl_student as s inner join tbl_payment_transaction as pt where pt.s_id=s.s_id and s.s_id='$row[s_id]'");
                        $row1=mysqli_fetch_assoc($query1);
                        if($row1['total_paid']<$num){
                          $step1=mysqli_query($con,"SELECT * from tbl_payments where p_id NOT IN(SELECT p_id from tbl_payment_transaction where s_id=$row[s_id])");
                          $n=mysqli_num_rows($step1);
                          while ($st1=mysqli_fetch_assoc($step1)) {
                            $a++;
                            if($n==$a){
                   
                                $unpaid.=$st1['title']." ";
                              
                            
                            }
                            else{
                              $unpaid.=$st1['title'].', ';
                            }
                            
                          }

                        


      
        
                        $i++;

                        ?>
                      <tr onclick="window.location.href = 'stud-profile.php?id=<?php echo $row['s_id']?>';" style="cursor: pointer;">
                        <td><?php echo $i;?></td>
                        <td> <?php echo utf8_encode($row['lname'].', '.$row['fname']);?> </td>
                        <td><?php echo strtoupper($row['c_abbr'].' - '.$row['yr_lvl']);?></td>

                        <td><?php echo $unpaid;?></td>
       
                      </tr>
                      <?php } $unpaid=""; $a=0;} ?>                 
                    
                    </tbody>
                  </table>

                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
        