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
                                        <li class=""><a href="all-student.php">Payments</a></li>
                                        <li class="activep">Add New Payments</li>
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
                                    <h4 class="pull-left">Mga Bayrunon</h4> <a href="#add_new" class="btn btn-sm btn-success pull-left ml-4" data-toggle="modal"><i class="fa fa-plus"> Add New</i> </a> 

                                    <a href="./" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"> Back to Home</i></a>
                                </div> 
                                                        <?php if($_GET['mess']=="success"){?>
                                      <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">Success!</span>
                                                New Bayrunon successfully added.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                      <?php } elseif($_GET['mess']=="update"){?>
                                        <div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
                                            <span class="badge badge-pill badge-info">Updated!</span>
                                                Successfully Updated.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } elseif($_GET['mess']=="error"){?>

                              <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-danger">Error!</span>
                                                Unable to save.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php } ?>

                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2 mb-2">
        
            
      
                   
                                   <table id="table1" class="table table-bordered" >
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Remarks</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $query=mysqli_query($con,"SELECT * from tbl_payments");
                                          while($row=mysqli_fetch_assoc($query)) { 
                                            if($row['status']=="1"){
                                              $btn="success";
                                              $status="Active";
                                              $change="Deactivate";
                                            } else{ $btn="secondary";
                                            $status="Inactive";
                                            $change="Activate";
                                          }?>
                                          <tr>
                                            <td><?php echo $row['title']?></td>
                                            <td><?php echo $row['description']?></td>
                                            <td><?php echo $row['amount']?></td>
                                              
                                            <td>                             
                                  <div class="btn-group">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-<?php echo $btn?> btn-sm"><?php echo $status;?></button>
                                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                  
                                      <a class="dropdown-item" href="change_status.php?user_id=<?php echo $row['user_id']?>" onclick="return confirm('Are you sure you want to <?php echo $change?> <?php echo $row['name']?> \n Click OK to confirm, Cancel to abort');"><?php echo $change;?></a>
                                          <a class="dropdown-item" href="#"  data-target="#update<?php echo $row['p_id']?>" data-toggle="modal"> Update</a>
      
                                    </div>
                                  </div>
                               </td>
                                          </tr>

                <div class="modal fade" id="update<?php echo $row['p_id']?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content"><form method="post" action="update_payment.php?id=<?php echo $row['p_id']?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel"><?php echo $row['title']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
                            <div class="modal-body">
                                        <label>Name of Bayrunon</label>
                                 <input type="text" name="payment_name" class="form-control" placeholder="e.g. Red Cross" value="<?php echo $row['title']?>" >

                                  
                                        <label>Remarks</label>
                                 <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks" id="" value="<?php echo $row['description']?>">
            
  
                          
                              <label>Amount</label>
               <input type="text" name="amount" class="form-control" placeholder="e.g. 50" id=""  value="<?php echo $row['amount']?>">
                    
 
                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>





                                          <?php } ?>
                                         
                                        </tbody>
                                      </table>
              
                 

                    
                                </div><!-- End Card Body -->

                         
                         </div>
               
                        </div>



  <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
                  <script type="text/javascript">



  function add_comma(){
        var amount = document.getElementById('amount').value;
        amount=amount.replace(/,/g , "");
     var parts=amount.toString().split(".");

     parts[0]=parts[0].replace(/\B(?=(\d{3})+(?!\d))/g,",");
     amount=parts.join(".");
document.getElementById('amount').value=amount

    }


                        $('#school_id').blur(function() {
                            //ajax request
                            $.ajax({
                                url: "checkId.php",
                                data: {
                                    'school_id' : $('#school_id').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                        alert('School ID exists!');
                                        document.getElementById('school_id').focus();
                                        document.getElementById('school_id').value="";
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
                    <div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">                             


<div class="card">
  <div class="card-header">Add New</div>
  <div class="card-body">
     <form method="POST" onsubmit="return confirm('Are you sure you want to save?')" action="save_payment.php?type=payment" enctype="multipart/form-data">
                                  <div class="row">
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    
                                        <label>Name of Bayrunon</label>
                                 <input type="text" name="payment_name" class="form-control" placeholder="e.g. Red Cross" id="payment_name" required="">

                                    
                                  </div>
                                </div> 
                      <!-- End Row -->
                      <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          
                             
                                        <label>Remarks</label>
                                 <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks" id="remarks">
                          
                        </div>

                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          
                              <label>Amount</label>
               <input type="text" name="amount" class="form-control" placeholder="e.g. 50" id="amount" oninput="add_comma();"><br>
                          </div>  

                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          
                              <label>Deadline</label>
               <input type="date" name="deadline" class="form-control" placeholder="e.g. 50" ><br>
                          </div> 
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                         <button class="btn btn-success btn-block btn-lg" >
                          <i class="ti ti-save"></i>
                           Save
                         </button> 
                    <br>
                          </div> </div>
                        </form>
  </div>
</div>


                      </div>
                    </div>
                  </div>
                    
                           
