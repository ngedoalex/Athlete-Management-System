       <?php $title="Dashboard"; include'head.php';
       include'user-side-pabel.php';

       ?>
       <div id="right-panel" class="right-panel">
            <?php  include'user-header.php'; ?>
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



<?php $q1 = mysqli_query($con,"SELECT * from tbl_courses");
$cnum=mysqli_num_rows($q1); ?>

                        <div class="col-xl-4 col-lg-6">
                             <a href="all-student.php">
                        <div class="card">
                            <div class="p-0 clearfix">
                                <i class="fa fa-group bg-danger p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-danger mb-0 pt-3">5</div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">NO. OF STUDENTS</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                          <a href="#">
                        <div class="card">
                            <div class="p-0 clearfix">
                                <i class="fa fa-folder-open bg-warning p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-warning mb-0 pt-3"><?php echo $cnum;?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">NO. OF COURSES</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <a href="#">
                        <div class="card">
                            <?php  $query=mysqli_query($con,"SELECT *, sum(tp.amount) as total from tbl_payment_transaction as pt inner join  tbl_payments as tp where pt.p_id=tp.p_id");
$res=mysqli_fetch_assoc($query);
$total=$res['total'];

?>   

                            <div class="p-0 clearfix">
                                <i class="fa fa-money bg-info p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                                <div class="h5 text-info mb-0 pt-3">&#8369;<?php echo number_format($total,2) ?></div>
                                <div class="text-muted text-uppercase font-weight-bold font-xs small">MY COLLECTION</div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-xl-9">
                                                    <div class="card">
                                <div class="card-header">
                                    <h4>Recent Transactions</h4>
                                </div>
                                <div class="card-body"  style="overflow: auto;">
                                   <table id="table-log" class="table table-bordered" >
                                        <thead>
                                          <tr> 
                                            <th>Date</th>
                                            <th>Receipt No.</th>
                                            <th>Payee</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                          $query=mysqli_query($con,"SELECT *, sum(amount) as total from tbl_payment_transaction as pt inner join tbl_student as st inner join tbl_payments as tp where pt.s_id=st.s_id and pt.p_id=tp.p_id and pt.added_by='$user_id' group by pt.receipt_no order by date_added DESC");
                                          while($row=mysqli_fetch_assoc($query)) { 
            ?>
                                          <tr>
                                            <td><?php echo date('m/d/Y',strtotime($row['date_of_payment']));?></td>
                                            <td><?php printf("%05d",$row['receipt_no'])?></td>
                                            <td><?php echo $row['fname'].' '.$row['lname']?></td>
                                           
                                              <td><?php echo $row['total']?>  </td>
                                              <td><a  onclick='window.open("receipt.php?receipt_no=<?php echo $row['receipt_no']?>","","width=900,height=600");' class="btn btn-sm"><i class="fa fa-print"></i> Reprint</a></td>
                                          </tr>

                                          <?php } ?>
                                         
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                    </div>


                    <div class="col-xl-3">
                                                    <div class="card">
                                <div class="card-header">
                                    <h4>Deadlines</h4>
                                </div>
                                <div class="card-body" style="overflow-y: scroll; max-height: 350px;">
                                    <?php
                                    $now=date('Y-m-d');
                                    $minus3=date('Y-m-d',strtotime($now."-3 days"));
                                    $plus5=date('Y-m-d',strtotime($now."+5 days"));
        $bd=mysqli_query($con,"SELECT * FROM tbl_payments WHERE deadline>='$minus3' and deadline<='$plus5' order by deadline ASC")or die(mysqli_error());
              while($rowb=mysqli_fetch_array($bd)){
                $deadline=date('F d, Y',strtotime($rowb['deadline']));
             if ($rowb['deadline']>$now) {
               $alert="warning";
               $time="Deadline for ".$rowb['title']." will be on ".$deadline;
              } elseif ($rowb['deadline']<$now) {
                $alert="danger";
                $time="Deadline for ".$rowb['title'].": Last ".$deadline;
              }
              else{
                $alert="info";
                $time="Today is ".$rowb['title']." deadline";
              }

            ?>
                              
                                                            
                             <p class="alert alert-<?php echo $alert;?>" style="margin:10px;"><?php echo $time;?>  </p>
                          
                              
                                
                     
                          <?php }?>
                                </div>
                            </div>
                    </div>
                                              







                    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
        