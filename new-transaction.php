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
       <style type="text/css">
         label{
          text-transform: uppercase;
          padding-top:4px;
         }
       </style>

                    <!--######################################## BREADCRUMBS ######################################-->
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class=""><a href="payment.php">Payments</a></li>
                                        <li class="active">Add New Payments</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##./################################## END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">

                        <div class="col-xl-12 col-lg-12 col-sm-12">
                 
                            <div class="card"> 
                                      <div class="card-header">
                                     <a href="payment_transaction.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"> Back to All Transactions</i></a> 
                                </div> 



 
                    <?php $query=mysqli_query($con,"SELECT * from tbl_student where s_id='$_GET[s_id]'");
                    $res=mysqli_fetch_assoc($query); ?>
    
                            <div class="card ">

                                <div class="card-body">
                               <div class="col-xl-4 col-lg-4 col-sm-12">
                                   <table  class="table" >
                                        <thead>
                                          <tr>
                                            <th colspan="2">ALL</th>
                                          </tr>
                                          <tr> 
                                            <th>Bayrunon</th>
                                          <!--   <th>Description</th> -->
                                            <th>Amount</th>
                                            <!-- <th>Status</th> -->
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                          $query=mysqli_query($con,"SELECT * from tbl_payments where p_id NOT IN(SELECT p_id from tbl_temp_trans where s_id='$_GET[s_id]')");
                                          while($row=mysqli_fetch_assoc($query)) { 
                                            $q=mysqli_query($con,"SELECT * from tbl_payment_transaction where p_id='$row[p_id]' and s_id='$_GET[s_id]'");
                                            $r=mysqli_fetch_assoc($q);
                                            $n=mysqli_num_rows($q);
                                            if($n>0){
                                              $status="paid";
                                              $class="success";
                                            }
                                            else{
                                              $status="unpaid";
                                              $class="warning";
                                            }
            ?>
                                          <tr class="" <?php if($n>0){ echo'style="color:gray;"'; } else{?> onclick="window.location.href = 'save-temp.php?p_id=<?php echo $row['p_id']?>&s_id=<?php echo $_GET['s_id']?>';" style="cursor: pointer; color:green;" <?php } ?>>
                                            
                                            <td><?php echo $row['title']?></td>
                                            <!-- <td><?php echo $row['description']?></td> -->
                                           
                                              <td><?php echo $row['amount']; if($n>0){ echo" Paid &check;";}?></td>
                                              <!-- <td><?php echo $status;?></td> -->

                                          </tr>

                                          <?php } ?>
                                         
                                        </tbody>
                                      </table>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-xl-7 col-lg-7 col-sm-12">
                                   <table  class="table" >
                                        <thead>
                                          <?php
                                          $get_receipt=mysqli_query($con,"SELECT max(receipt_no) as last_receipt from tbl_payment_transaction");
                                        $result=mysqli_fetch_assoc($get_receipt);
                                        $last_receipt=$result['last_receipt']+1;
?>
                                          <tr>
                                            <th colspan="3">TRANSACTION NO. : <?php printf("%05d",$last_receipt)?></th>
                                          </tr>
                                          <tr> 
                                            <th>Bayrunon</th>
                                          <!--   <th>Description</th> -->
                                            <th>Amount</th>
                                            <th>Action</th>
                                            <!-- <th>Status</th> -->
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                          $query=mysqli_query($con,"SELECT * from tbl_temp_trans as tt inner join tbl_payments as tp where tt.s_id='$_GET[s_id]' and tp.p_id=tt.p_id");
                                          while($row=mysqli_fetch_assoc($query)) { 
                                          $total+=$row['amount'];
            ?>
                                          <tr class="" >
                                            
                                            <td><?php echo $row['title']?></td>
                                            
                                           
                                              <td><?php echo $row['amount']; ?></td>
                                               <td><a href="remove-temp.php?temp_id=<?php echo $row['temp_id']?>&s_id=<?php echo $_GET['s_id']?>"><i class="fa fa-remove"></i></a></td>
                                          

                                          </tr>

                                          <?php } ?>
                                          <tr style="background: #f7c940;"><th>TOTAL</th><td colspan="2"><?php echo "&#8369; ".number_format($total,2) ?></td></tr>
                                         
                                        </tbody>

                                      <tfoot>
                                        <tr>
                                          <td colspan="3"><a href="save_payment_transaction.php?s_id=<?php echo $_GET['s_id']?>" class="btn btn-lg btn-primary btn-block" onclick="return confirm('Are you sure you want to PRINT this transaction? \n Warning: This is not reversible.\n Click OK to PRINT, Cancel to review.')"> Print Transaction</a></td>
                                        </tr>
                                      </tfoot>
                                      </table>
                                </div>
                            </div>
                          </div>




                 

                    
                                </div><!-- End Card Body -->

              
                        </div>



  <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
                  <script type="text/javascript">

function view_price(){
   var id=document.getElementById('payment').value;
  var amount=id.toString().split("|");
  amount=amount[1];
  document.getElementById('amount').value=amount
}

  function add_comma(){
        var amount = document.getElementById('amount').value;
        amount=amount.replace(/,/g , "");
     var parts=amount.toString().split(".");

     parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g,",");
     amount=parts.join(".");
document.getElementById('amount').value=amount

    }
                    </script>

<div class="modal fade" id="new_trans" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="POST" action="new-transaction.php" onsubmit="return confirm('Are you sure you want to proceed?. \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <?php $query?>
                                <h5 class="modal-title" id="staticModalLabel">Transaction No.:<font id="transnum"></font></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <label id="">Student Name:</label> 
                                                         <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1"  name="s_id">
                                <option value="">Select</option>
                                 <?php $query=mysqli_query($con,"SELECT * from tbl_student");
                                          while($row=mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $row['s_id'];?>"><?php echo strtoupper($row['lname'].' ,'.$row['fname']);?></option>
                                  <?php } ?>
          
                                </select>
                              
                 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="submit" class="btn btn-primary">Proceed</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>


        