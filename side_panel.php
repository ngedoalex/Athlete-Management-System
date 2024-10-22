    <style type="text/css">
              .navbar .navbar-nav li > a {
        background: none !important;
        color: #c8c9ce !important;
        display: inline-block;
        font-family: 'Tahoma';
        font-size: 15px;
        line-height: 30px;
        padding: 10px 0;
        position: relative;
        width: 100%; 
    }
.user-area .user-menu .nav-link {
    color: #fbfbfb;
    display: block;
    font-size: 14px;
    line-height: 22px;
    padding: 5px 0;
}
    </style>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#update_comp" data-toggle="modal"><?php if(empty($event_title)){ echo "N/A";}  else { echo $event_title;}?></a>
                <a class="navbar-brand hidden" href="./"><span class="fa fa-desktop fa-sm"></span></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="./"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li class="menu-item">
                        <a href="all-delegates.php" > <i class="menu-icon fa fa-pagelines"></i>Delegates</a>
         
                    </li>
                      <li class="menu-item">
                        <a href="all-games.php" > <i class="menu-icon fa fa-gamepad"></i>Events</a>
         
                    </li>
                    <li class="menu-item">
                        <a href="view-athletes.php" > <i class="menu-icon fa fa-group"></i>Athletes</a>
         
                    </li>

                <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-trophy"></i>Entry Results</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="entry-top6.php">Entry Top 8</a></li>
                            <li><i class="fa fa-table"></i><a href="entry-final.php">Entry Final Result</a></li>
                      
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-print"></i>Reports</a>
                        <ul class="sub-menu children dropdown-menu">  
                            <li><i class="fa fa-table"></i>
                               <a onclick='window.open("print-event.php","","width=1200,height=1200");' href=""> Print Events</a>
                            </li>
                         
                            <li><i class="fa fa-table"></i><a href="elem-result.php">Elementary Result</a></li>
                            <li><i class="fa fa-table"></i><a href="second-result.php">Secondary Result</a></li>
                            <li><i class="fa fa-table"></i><a href="final-result.php">Final Result</a></li>

                          
                                                        <li><i class="fa fa-table"></i>
                               <a onclick='window.open("print-official-result-per-event.php","","width=1200,height=1200");' href=""> Official Result (Top 8)</a>
                            </li>
                              <li><i class="fa fa-table"></i>
                               <a onclick='window.open("print-official-final-3.php","","width=1200,height=1200");' href=""> Official Result (FINAL 3)</a>
                            </li>
                              <li><i class="fa fa-table"></i>
                               <a onclick='window.open("print-medalist.php?level=Elementary","","width=1200,height=1200");' href=""> Medalist (Elementary)</a>
                            </li>
                                <li><i class="fa fa-table"></i>
                               <a onclick='window.open("print-medalist.php?level=Secondary","","width=1200,height=1200");' href=""> Medalist (Secondary)</a>
                            </li>
                                               <li><i class="fa fa-table"></i>
                               <a onclick='window.open("print-qualifier.php","","width=1200,height=1200");' href=""> Qualifiers</a>
                            </li>
                            <li><i class="fa fa-cogs"></i><a href="#settings" data-toggle="modal">Printable Settings</a></li>
                        </ul>
                    </li>
   <!--                   <li class="menu-item">
                        <a href="user-log.php" > <i class="menu-icon fa fa-users"></i>User Log</a>
         
                    </li> -->

                    <li class="menu-item">
                        <a href="#about" data-toggle="modal" > <i class="menu-icon fa fa-info"></i>About Us</a>
         
                    </li>


                  
                </ul>

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
         <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">About</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="GET" action="submit-query.php">
                            <div class="modal-body">

                                <h6>Developer: Mark Patric Mendoza<br>Email: markpatricmendoza123@gmail.com<br>Facebook: <a href="https:facebook.com/imarkpatric" target="_blank">https://facebook.com/imarkpatric</a><br>Contact No.:09090118661</h6>
           
                            </div>
                            <div class="modal-footer">
                               

                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true" data-backdrop="static">
                
  
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Forms Settings</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="submit-settings.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <?php $settings=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'"); $set=mysqli_fetch_assoc($settings); ?>
                               <div class="form-group col-md-6">
                                 <label>Header Logo</label><br>
                    <img id="uploadPreview1" style="width: 150px; height: 150px; box-shadow: 1px 1px 10px 1px gray;" src="<?=$set['event_logo']?>" /><br><br>
  <input id="uploadImage1" type="file" name="image" onchange="PreviewImage();" />


<script type="text/javascript">

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview1").src = oFREvent.target.result;
    };
};
</script>
 </div>
                              <div class="form-group col-md-6">
                                 <label>Heading</label>
                                 <textarea class="form-control text-center" placeholder="Enter heading" name="heading"><?php echo $set['event_heading']?></textarea>

                             </div>
                                                           <div class="form-group col-md-6">
                                 <label>Sub Heading</label>
                                 <textarea class="form-control text-center" name="sub_heading" placeholder="Enter sub heading"><?php echo $set['event_sub_heading']?></textarea>

                             </div>

                             <div class="form-group col-md-6">
                                 <label>Signatory 1</label>
                                 <input type="text" value="<?php echo $set['sign1']?>" name="sign1" class="form-control">

                             </div>
                              <div class="form-group col-md-6">
                                 <label>Designation 1</label>
                                 <input type="text" value="<?php echo $set['designation1']?>" name="designation1" class="form-control">

                             </div>
    
                                 <div class="form-group col-md-6">
                                 <label>Signatory 2</label>
                                 <input type="text" value="<?php echo $set['sign2']?>" name="sign2" class="form-control">

                             </div>
                              <div class="form-group col-md-6">
                                 <label>Designation 2</label>
                                 <input type="text" value="<?php echo $set['designation2']?>" name="designation2" class="form-control">

                             </div>
                                 <div class="form-group col-md-6">
                                 <label>Signatory 3</label>
                                 <input type="text" value="<?php echo $set['sign3']?>" name="sign3" class="form-control">

                             </div>
                              <div class="form-group col-md-6">
                                 <label>Designation 3</label>
                                 <input type="text" value="<?php echo $set['designation3']?>" name="designation3" class="form-control">

                             </div>
                                                              <div class="form-group col-md-6">
                                 <label>Prepared by</label>
                                 <input type="text" value="<?php echo $set['sign4']?>" name="sign4" class="form-control">

                             </div>
                              <div class="form-group col-md-6">
                                 <label>Designation</label>
                                 <input type="text" value="<?php echo $set['designation4']?>" name="designation4" class="form-control">

                             </div>

                          
           
                            </div>
                            <div class="modal-footer">
                               

                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="Submit" class="btn btn-success" >Submit</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>


