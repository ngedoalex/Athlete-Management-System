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

           
                                                <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                     
                                                    <div class="box-header">
                  <?php
                  $md5=md5("unlocked");
                  
                  if($_GET['lock']==$md5){
                    $lock="ok-circle";
                  } else{ $lock="lock";}?>
                  <h4 class="box-title pull-left">All Members </h4>
                  <div class="pull-right"><b>Legend:  </b>                 
                  <font style="min-width:20px; background:rgb(51, 255, 119);">&nbsp;&nbsp;&nbsp;&nbsp;</font> Active
                  <font style="min-width:20px; background:rgb(255, 128, 128); ">&nbsp;&nbsp;&nbsp;&nbsp;</font> Inactive
                <font style="min-width:10px; background:#fff; border:1px solid black">&nbsp;&nbsp;&nbsp;&nbsp;</font> No Active Loan
                <font style="min-width:20px; background:red; border-radius: 1.5em;">&nbsp;&nbsp;&nbsp;&nbsp;</font> Non-Member
</div>
                </div><!-- /.box-header -->
                                </div>
                                <div class="card-body">
                                

   

 <table id="table3" class="table table-bordered table-striped">
     
                    <thead>
                      <tr style="font-size:12px;">
                        <th>#</th>
                        
                      <th>Full Name</th>
                       <th>Share Capital</th>
                        <th>Loan Balance</th>
                        <th>Arrears</th>
                        <th>Hulam Uli Balance</th>  
                        <th>Savings Deposit</th>
                
            
                      </tr>
                    </thead>
                    <tbody>
<?php
    $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from customer order by cust_last")or die(mysqli_error());
    $a=0;
    while($row=mysqli_fetch_array($query)){
    $cid=$row['cust_id'];
    $loan_balance=$row['loan_balance'];
        $hulam_uli_balance=$row['hulam_uli_balance'];
        $share_capital=$row['share_capital'];
        $arrears=$row['arrears'];
    $a++;
//check Loan
               
               if($loan_balance>0){
                 $check=mysqli_query($con,"SELECT * from loan where cust_id='$row[cust_id]' and loan_id=(SELECT max(loan_id) from loan where cust_id='$row[cust_id]' and type='Loan')");
                 $res=mysqli_fetch_array($check);
                 $today=date('Y-m-d');
                 // $last_months = date("Y-m-d",strtotime($today. " -3 months"));
                  $plus_months = date("Y-m-d",strtotime($res['date_loan']. " +2 months"));
                 $due_date=date('Y-m-d',strtotime($res['due_date']));
                if(date('Y-m-d')>date('Y-m-d',strtotime($plus_months))){
                 $check1=mysqli_query($con,"SELECT * from loan where type='Loan Receivables' and date_loan<='$plus_months' and cust_id='$row[cust_id]'"); 
                 $num=mysqli_num_rows($check1);
                if($num>0){ $active="0";} else{ $active="1";}
                } else{
                  $active="0";
                }
               
                 

                 
                 if($active=="0"){
                   $back="rgb(51, 255, 119)";
                   $color="black";
                 }
                 else{
                   $back="rgb(255, 128, 128)";
                   $color="black";
                 }
               }
               else{
                $back="#fff";
                $color="black";
               }
               //end check loan
//check hulam uli
               
               if($hulam_uli_balance>0){
                 $check12=mysqli_query($con,"SELECT * from hulam_uli where cid='$row[cust_id]' and hulam_id=(SELECT max(hulam_id) from hulam_uli where cid='$row[cust_id]' and type='New Hulam')");
                 $res1=mysqli_fetch_array($check12);
                 $today=date('Y-m-d');
                 // $last_months = date("Y-m-d",strtotime($today. " -3 months"));
                  $plus_months1 = date("Y-m-d",strtotime($res1['hulam_date']. " +2 months"));

                if(date('Y-m-d')>date('Y-m-d',strtotime($plus_months1))){
                 $check11=mysqli_query($con,"SELECT * from hulam_uli where type='Hulam Uli' and hulam_date<='$plus_months1' and hulam_date>='$res1[hulam_date]' and cid='$row[cust_id]'"); 
                 $num11=mysqli_num_rows($check11);
                if($num11>0){ $active1="0";} else{ $active1="1";}

                } 
                else{
                  $active1="0";
                }
               
                 

                 
                 if($active1=="0"){
                   $back1="rgb(51, 255, 119)";
                   $color="black";
                 }
                 else{
                   $back1="rgb(255, 128, 128)";
                   $color="black";
                 }
               }
               else{
                $back1="";
                $color="black";
               }
               //end check hulam uli
                     
?>
                      <tr style="font-size:12px;">
              <td><?php echo $a;?></td>

                        <td><img style="width:20px; height:20px;" alt="" src="../pages/<?php echo $row['cust_pic']?>"><font style="min-width:20px; background:<?php if($row['type']=="non_member"){ echo "red"; } else{ echo ""; }?>; border-radius: 2em;">&nbsp;&nbsp;&nbsp;&nbsp;</font> <a style="color: <?php echo $color?>;" href="result.php?cust_id=<?php echo $row['cust_id']?>"><?php echo utf8_encode($row['cust_last']);?>, 
                        <?php echo utf8_encode($row['cust_first']);?></a></td>
                        <!-- 
                        <td><a  style="color: <?php echo $color?>;" href="result.php?cust_id=<?php echo $row['cust_id']?>"><?php echo $row['cust_address'];?></a></td> -->
<td><a  style="color: <?php echo $color?>;" href="result.php?cust_id=<?php echo $row['cust_id']?>"><?php echo number_format($share_capital,2);?></a></td>
             <td style="background:<?php echo $back?>; "><a style="color: <?php echo $color?>;" href="result.php?cust_id=<?php echo $row['cust_id']?>"><?php echo number_format($loan_balance,2);?></a></td>

             <td style="background:<?php echo $back1?>; "><a style="color: <?php echo $color?>;" href="result.php?cust_id<?php echo $row['cust_id']?>" ><?php echo number_format($arrears,2);?></a></td>
              <td style="background:<?php echo $back1?>; "><a style="color: <?php echo $color?>;" href="result.php?iust_id<?php echo $row['cust_id']?>" ><?php echo number_format($hulam_uli_balance,2);?></a></td>

            <td><a  style="color: <?php echo $color?>;" href="result.php?cust_id=<?php echo $row['cust_id']?>"><?php echo number_format($row['savings_deposit'],2);?></a></td>
      

                      </tr>




 <!--end of modal-->      
                 
<?php $i++;}
?>    
  



                    </tbody>

                  </table>

     
      

                                            </div>
       
                                          

          
                                        
                                        </div>

                                    </div>
                                </div>
                 
             

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    <?php include'js.php';?>
        