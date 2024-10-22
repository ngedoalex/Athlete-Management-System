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
                                        <li class=""><a href="admin.php">Search</a></li>
                                        <li class="active">Result</li>
                             
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-3">
                      <div class="row">
                        <div class="col-lg-4">
                    <section class="card">
                    <div class="twt-feed blue-bg">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="fa fa-user wtt-mark"></div>
                        <?php
                        $data= $_GET['cust_id'];

                        $query=mysqli_query($con,"SELECT * from customer where cust_id='$data'");
                        $row=mysqli_fetch_assoc($query);
                          $birthDate = date('m/d/Y',strtotime($row['bday']));
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
                        ?>
                        <div class="media">
                            <a href="#">
                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="../pages/<?php echo $row['cust_pic']?>">
                            </a>
                            <div class="media-body">
                                <h4 class="text-white display-6"><?php echo utf8_encode(strtoupper($row['cust_last'].' '.$row['cust_first']));?></h4>
                                 <p class="text-light"><em>Age : <?php echo $age;?></em><br><em><?php echo $row['occupation'];?></em></p>
                         
                            </div>
                        </div>

                    </div>
                    <div class="weather-category twt-category" style="margin-top:0px;">

              

                    <div class="twt-write col-sm-12" style="text-align: left; color:black; font-size:14px;">
                      <div class="row " style="font-size: 14px; border-bottom:1px dashed gray; margin-top:0px; padding:10px;">
                                                                 <div class="col-md-12">
                   <span style="color:black;">ADDRESS</span><br>

                   <span style="color: rgb(58, 158, 58); font-size:15px;"> <?php echo $row['cust_address']?></span><br>
                                      <span style="color:black;">CONTACT</span><br>

                   <span style="color: rgb(58, 158, 58); font-size:15px;"> <?php echo $row['cust_contact']?></span><br>
                                      <span style="color:black;">PERSON TO NOTIFY</span><br>

                   <span style="color: rgb(58, 158, 58); font-size:15px;"> <?php echo $row['cust_contact_person']?></span>
                 </div>  
                     </div>


                      <div class="row" style="font-size: 14px; border-bottom:1px dashed gray; margin-top:10px; padding:10px;">
                                         <div class="col-md-12">
                   <span style="color:black;">LOAN BALANCE</span><br>

                   <span style="color: rgb(58, 158, 58); font-size:20px;"> &#8369;<?php echo number_format($row['loan_balance'],2)?></span>
                 </div>  
               </div>
               <div class="row " style="font-size: 14px; border-bottom:1px dashed gray; margin-top:10px; padding:10px;">
                  <div class="col-md-12">
                   <span style="color:black;">HULAM ULI BALANCE</span><br>

                   <span style="color: rgb(58, 158, 58); font-size:20px;">&#8369; <?php echo number_format($row['hulam_uli_balance'],2)?></span>
                 </div>
               </div>

                    

                    </div>
                    <footer class="twt-footer">
                        
                    </footer>      
                  </div>
                </section>
                        </div>
           
                                                <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Transaction Record</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          
                                                <a class="nav-item nav-link active" id="nav-loan-tab" data-toggle="tab" href="#nav-loan" role="tab" aria-controls="nav-loan" aria-selected="true">Loan Details</a>
                                                <a class="nav-item nav-link" id="nav-hulam-uli-tab" data-toggle="tab" href="#nav-hulam-uli" role="tab" aria-controls="nav-profile" aria-selected="false">Hulam Uli</a>
                                                <a class="nav-item nav-link" id="nav-grocery-tab" data-toggle="tab" href="#nav-grocery" role="tab" aria-controls="nav-grocery" aria-selected="false">Grocery</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                                            <div class="tab-pane fade show active" id="nav-loan" role="tabpanel" aria-labelledby="nav-loan-tab" style="overflow: auto;">
 <table id="table3" class="table table-bordered table-striped">
                    <thead>
                         <tr style="font-size:14px; " valign="middle">
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">DATE</td>
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">LOAN AMOUNT</td>

                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">INTEREST 3%</td>
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">LOAN INSTALLMENT</td>
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">LOAN PAYMENT</td><td style="font-weight: bold; font-size:12px; padding:4px;" align="center">PAID ARREARS</td>
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">OUTSTANDING BALANCE</td>
                        
                        <td style="font-weight: bold; font-size:12px; padding:4px;" align="center">ARREARS</td>
                      
                        </tr>
                    </thead>
                    <tbody>
<?php
$num=0;
    $query=mysqli_query($con,"SELECT * from loan where cust_id='$row[cust_id]' and loan_amount>0 ");
    while($rowl=mysqli_fetch_array($query)){
    $num++;   

?>
                      <tr>
                        <td style="padding:4px; text-align:center; font-size:14px;"><?php echo date('m/d/y', strtotime($rowl['date_loan'],2))?></td>
                        <td style="padding:4px; text-align:center; font-size:14px;">
                          <?php if($rowl['type']=="Loan"){echo number_format($rowl['loan_amount'],2);} else{}?>
                        </td>
                        <td style="padding:4px; text-align:center; font-size:14px;"><?php echo number_format($rowl['paid_interest'],2);?>                          
                        </td>       
                        <td style="padding:4px; text-align:center; font-size:14px;"><?php echo number_format($rowl['loan_data'],2);?>                          
                        </td> 
                        <td style="padding:4px; text-align:center; font-size:14px;"> <?php if($rowl['type']=="Loan" and $num=="1"){echo number_format(0,2);} else{echo number_format($rowl['loan_amount'],2);}?>                          
                        </td> 
                             <td style="padding:4px; text-align:center; font-size:14px;"><?php echo number_format($rowl['loan_arrears'],2);?>                          
                        </td>
                         <td style="padding:4px; text-align:center; font-size:14px;"><?php echo number_format($rowl['loan_balance'],2);?>                          
                        </td> 
                                                 <td style="padding:4px; text-align:center; font-size:14px;"><?php echo number_format($rowl['arrears_remaining'],2);?>                          
                        </td> 
                     
             
                    

                      </tr>
                   
   
                 
<?php } ?>            
                    </tbody>
   

     
                  </table>

                                            </div>
                                            <div class="tab-pane fade" id="nav-hulam-uli" role="tabpanel" aria-labelledby="nav-hulam-uli-tab" style="overflow: auto;">
 

                                            </div>
                                               <div class="tab-pane fade" id="nav-grocery" role="tabpanel" aria-labelledby="nav-grocery-tab" style="overflow: auto;">
                                                
                      <table id="table4" class="table table-striped table-bordered" style="overflow: auto;">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Salary</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>$320,800</td>
                                          </tr>
                                         
                                        </tbody>
                                      </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>









                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    <?php include'js.php';?>
        