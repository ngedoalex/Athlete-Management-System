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
                                        <li class="">Home</li>
                                        <li class="active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-3">

       <?php
           $query=mysqli_query($con,"select * from customer where cust_id='8'")or die(mysqli_error());
           $res=mysqli_fetch_assoc($query);

       $string=utf8_encode($res['cust_last']);
    echo $string;

?>




                        </div>









                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    <?php include'js.php';?>
        