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
            $query=mysqli_query($con,"SELECT * from tbl_athlete where a_id='$_GET[id]'");
            $row=mysqli_fetch_assoc($query);

            ?>

                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class=""><a href="./">Home</a></li>
                                        <li class=""><a href="all-student.php">Students</a></li>
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
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Students Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="<?php echo $row['s_photo']?>" style="max-height:200px; max-width: 
                                    200px; box-shadow: 1px 1px 10px 1px gray;" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $row['lname'].', '.$row['fname']?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $row['address']?></div>
                                    <div class="location text-sm-center"><i class="fa fa-calendar"></i> <?php echo date('M. d, Y',strtotime($row['bdate']))?></div><hr>
                                    <div class="text-sm-center  "><i class="fa fa-inbox"></i>  <?php echo $row['email_add']?></div>
                                    <div class="text-sm-center  "><i class="fa fa-phone"></i>  <?php echo $row['contact_no']?></div>
                                    <div class="text-sm-center  "><i class="fa fa-user"></i>  <?php echo $row['guardian']?></div>
                                </div>
                                <hr>
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
                                    <h4><i class="fa fa-money"></i> Recent Payments</h4>
                                </div>
                                <div class="card-body" style="margin:2px; padding:2px;">
                                    
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

                                          $query=mysqli_query($con,"SELECT *, sum(amount) as total from tbl_payment_transaction as pt inner join tbl_student as st inner join tbl_payments as tp where pt.s_id=st.s_id and pt.p_id=tp.p_id and st.s_id='$_GET[id]' group by pt.receipt_no");
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
                                </div>
                        </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
        