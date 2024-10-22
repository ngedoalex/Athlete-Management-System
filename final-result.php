       <?php $title="Final Result"; include'head.php';
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
       include_once'refresh-result.php';
 ?>
                    <!--######################################## BREADCRUMBS ######################################-->
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class="active">Result</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">

                   <div class="col-lg-12" >
                            <div class="card">
                                <div class="card-header">
                                    <h4>Final Result</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">   
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Elementary</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Secondary</a>
                                 <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-third" role="tab" aria-controls="nav-profile" aria-selected="false">Overall</a>
                                          
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <?php include'elem-final.php';?>

                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                               
                                              <?php include'second-final.php';?>
                                            </div>
                                         <div class="tab-pane fade" id="nav-third" role="tabpanel" aria-labelledby="nav-profile-tab">
                                               
                                              <?php include'overall-final.php';?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        <!--/.col-->

                    </div> <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
 
    
    <?php include'js.php';?>

        