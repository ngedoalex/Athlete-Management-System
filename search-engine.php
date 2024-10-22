       <?php $title="Dashboard"; include'head.php';
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
                                        <li class=""><a href="admin.php">Find Member</a></li>
                                   
                             
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
                                    <h4>Search Member</h4>
                                </div>
                                <div class="card-body">
                                    
 <table id="table3" class="table table-bordered table-striped">
                    <thead>
                         <tr style="font-size:14px; " valign="middle">
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">#</td>
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">NAME</td>

                        </tr>
                    </thead>
                    <tbody>
<?php
$num=0;
    $query=mysqli_query($con,"SELECT * from customer order by cust_last ASC");
    while($rowl=mysqli_fetch_array($query)){
    $num++;   

?>
                      <tr>
                            <td style="padding:4px; text-align:center; font-size:14px;"><?php echo $num?></td>
                        <td style="padding:4px; text-align:center; font-size:14px;"><a href="result.php?cust_id=<?php echo $rowl['cust_id']?>"><?php echo utf8_decode(strtoupper($rowl['cust_last'].', '.$rowl['cust_first']))?></a></td>
                       
                     
             
                    

                      </tr>
                   
   
                 
<?php } ?>            
                    </tbody>
   

     
                  </table>

                                        

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>









                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    <?php include'js.php';?>
        