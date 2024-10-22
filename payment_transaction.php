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
                                    <a href="#new_trans" id="getTrans" data-toggle="modal" class="btn btn-sm btn-success pull-left"><i class="fa fa-plus"> Add New</i></a> <a href="./" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"> Back to Home</i></a> 
                                </div> 
            

 
                   
        
                            <div class="card">
                                <div class="card-header">
                                    <h4>Today's Transactions</h4>
                                </div>
                                <div class="card-body"  style="overflow: auto;">
                                   <table id="table-log" class="table table-bordered" >
                                        <thead>
                                          <tr> 
                                            <th>Date</th>
                                            <th>Receipt No.</th>
                                            <th>Payee</th>
                                            <th>Total Amount</th>
                                            <th>Entry By</th>
                                            <th>Action</th>
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 

                                          $query=mysqli_query($con,"SELECT *, sum(amount) as total from tbl_payment_transaction as pt inner join tbl_student as st inner join tbl_payments as tp inner join tbl_user as u  where pt.s_id=st.s_id and pt.p_id=tp.p_id and u.user_id=pt.added_by group by pt.receipt_no");
                                          while($row=mysqli_fetch_assoc($query)) { 
            ?>
                                          <tr>
                                            <td><?php echo date('m/d/Y',strtotime($row['date_of_payment']));?></td>
                                            <td><?php printf("%05d",$row['receipt_no'])?></td>
                                            <td><?php echo $row['fname'].' '.$row['lname']?></td>
                                           
                                              <td><?php echo $row['total']?>  </td>
                                              <td><?php echo $row['user_fulname']?></td>
                                              <td><a  onclick='window.open("receipt.php?receipt_no=<?php echo $row['receipt_no']?>","","width=900,height=600");' class="btn btn-sm"><i class="fa fa-print"></i> Reprint</a></td>
                                          </tr>

                                          <?php } ?>
                                         
                                        </tbody>
                                      </table>
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

                          <form method="GET" action="new-transaction.php" >
                              <div class="modal-header">
                              
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

                <script type="text/javascript">
                        $('#getTrans').click(function() {

                          
                            $.ajax({
                                url: "check-last.php",
                                data: {
                                    'abbr' : $('#getTrans').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result!=''){
                                  document.getElementById('transnum').innerHTML=data.result;
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
        