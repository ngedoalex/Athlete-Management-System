     
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left" style="background: #28a745;"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                       

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cogs"> Settings</i>
                  
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification" style="border-bottom:gray 2px solid; background: #272c33; color:#000;"> 
                            <p class="red" style="color:white; font-size:14px;"> Choose an athletic meet to be used.</p>
 <?php $q=mysqli_query($con,"SELECT * from tbl_event"); 
 while($r=mysqli_fetch_assoc($q)){ 
 if($r['event_status']=="0"){
$url="active.php?event_id=".$r['event_id'];
 } else{$url="#";}?> 
         <a class="dropdown-item media" href="<?php echo $url;?>" style="color:white; border-top:1px solid white;">
      <i class="fa fa-tag text-warning"> </i> <?php echo $r['event_name']." ";?> &nbsp; 
      <?php if($r['event_status']=="0"){?> <i class="fa fa-times text-danger"></i>Inactive<?php } else{?><i class="fa fa-check text-success"></i>Active<?php } ?> </a>

    <?php } ?>
    <a class="dropdown-item media btn btn-xs btn-danger" href="#delete_comp" data-toggle="modal" style="color:white; border-top:1px solid white;" ><span class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Remove Totally</span></a>

 <a class="dropdown-item media btn btn-xs btn-success" href="#new_competition" data-toggle="modal" style="color:white; border-top:1px solid white;" ><span class="btn btn-sm btn-success"> <i class="fa fa-plus"></i>Add New</span></a>

    <a class="dropdown-item media btn btn-sm btn-block" href="#clear_db" data-toggle="modal" style="border-top:1px solid white;" ><span class="btn btn-sm btn-warning"> <i class="fa fa-database"></i>Clear Data</span></a>


                     
                     




                          </div>
                        </div>
                        
   <!-- <div class="dropdown for-notification ml-5">
                          <a class="btn btn-success" href="entry-result.php" >
                            <i class="fa fa-plus text-white"> Entry Game Result</i>
                  
                          </a>

                        </div> -->


                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right" style="color:#fff;">
                        <a href="logout.php" class="btn btn-sm btn-secondary" >
                            <i class="fa fa-arrow-right"> Logout</i>
                        </a>


                    </div>

 

                </div>
            </div>





        </header><!-- /header -->
                 <div class="modal fade" id="clear_db" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Clear Database</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="GET" action="empty_db.php" onsubmit="return confirm('Are you sure you want to clear all data?');">
                            <div class="modal-body">

                                <h6>Note: This action is not reversible! <br>Type "CONFIRM" to continue.</h6>
                                <input type="hidden" value="CONFIRM" name="" id="security">
                                <input type="password" value="" name="" id="clear_key" onkeyup="clear_check();" class="form-control">
           
                            </div>
                            <div class="modal-footer">
                               

                             <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                             <button type="submit" id="clear_db_button"  disabled="" class="btn btn-danger" >Confirm</button>
                            </div>
                          </form>
                                           <script type="text/javascript">
    function clear_check(){
        var security=document.getElementById('security').value;
        var code=document.getElementById('clear_key').value;
 
        if(code==security){
         document.getElementById('clear_db_button').disabled=false
        }
        else{
           document.getElementById('clear_db_button').disabled=true
           
        }
      }

 </script>

                        </div>
                    </div>
                </div>



         <div class="modal fade" id="new_competition" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Add New Athletic Meet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="GET" action="save_competition.php" onsubmit="return confirm('Are you sure you want to continue?');">
                            <div class="modal-body">
                              <label>Title</label>
                                <input type="text"  name="title" class="form-control text-center" placeholder="e.g. DIPAM 2018"><br>
                              <label>Description</label>
                                <input type="text"  name="description" class="form-control text-center" placeholder="e.g. Dinagat Islands Athletic Meet"><br>
                                <label>Venue : </label>
                                <textarea class="form-control text-center" name="address" placeholder="e.g. 'Cagdianao Sports Complex, Cagdianao, San Jose, Province of Dinagat Islands'"></textarea>
                                <label>Competition Period:</label>
                                <div class="row">
                                  <div class="col-md-6"> <label>From</label><br>
                                  <input type="date" name="from_date" class="form-control"></div>
                                 
                                  <div class="col-md-6"> <label>To</label><br>
                                  <input type="date" name="to_date" class="form-control">
                                </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                               

                             <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-danger" >Submit</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>





                <div class="modal fade" id="update_comp" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="GET" action="save_competition.php" onsubmit="return confirm('Are you sure you want to continue?');">
                            <div class="modal-body">
                              <label>Title</label>
                              <input type="hidden" name="type" value="Update">
                                <input type="text"  name="title" class="form-control text-center"value="<?php echo $er['event_name']?>" placeholder="e.g. DIPAM 2018"><br>
                              <label>Description</label>
                                <input type="text"  name="description"value="<?php echo $er['event_description']?>" class="form-control text-center" placeholder="e.g. Dinagat Islands Athletic Meet"><br>
                                <label>Venue : </label>
                                <textarea class="form-control text-center" name="address" placeholder="e.g. 'Cagdianao Sports Complex, Cagdianao, San Jose, Province of Dinagat Islands'"><?php echo $er['address']?></textarea>
                                <label>Competition Period:</label>
                                <div class="row">
                                  <div class="col-md-6"> <label>From</label><br>
                                  <input type="date" value="<?=$er['from_date']?>"  name="from_date" class="form-control"></div>
                                 
                                  <div class="col-md-6"> <label>To</label><br>
                                  <input type="date"  value="<?=$er['to_date']?>" name="to_date" class="form-control">
                                </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                               

                             <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-danger" >UPDATE</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>


<div class="modal fade" id="delete_comp" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">CONFIRM DELETION</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="GET" action="delete_comp.php" onsubmit="return confirm('Confirm deletion?');">
                            <div class="modal-body">
                              <h5 class="text-sm text-danger"> Warning<span class="fa fa-exclamation"> </span></h5>
                              <font class="text-danger">All records in this athletic meet will also be deleted!</font>
                            </div>
                            <div class="modal-footer">
                               

                             <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-danger" >Procceed Anyway..</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>
