                        <div class="col-lg-2 col-xs-12"></div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                 
                            <div class="card" > 
                                      <div class="card-header">
                                    <h4 class="pull-left">Add New Athlete</h4> <a href="view-athletes.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"> Back to Athletes</i></a>
                                </div> 
                              <form method="post" action="save_athlete.php" enctype="multipart/form-data">
                      
                                <div class="card-body" >
                    <div class="col-lg-12 col-md-12 col-xs-12">

                      <!-- End Row -->
                      <div class="row">
                                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <img id="uploadPreview" style="width: 150px; height: 150px; box-shadow: 1px 1px 10px 1px gray;" src="images/default.gif" /><br><br>
  <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" />


<script type="text/javascript">

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};
</script>
                          </div> 

                          <div class="ml-4 col-xl-7 col-lg-7 col-md-7 col-sm-12">
                          
                              <label>Full Name</label>
                              <input type="text" name="a_name" id="fname" class="form-control" placeholder="Enter fullname e.g. 'Ricardo Dalisay'" required autofocus="">  
                              <label>Athlete No.</label>
                              <input type="text" name="a_num" id="a_num" class="form-control" placeholder="Athlete No." required>    
                              <label>Category</label>
                          <select class="form-control" name="a_category" required>
                            <option Value="">Select Category</option>
                            <option Value="Boys">Boys</option>
                        <option Value="Girls">Girls</option>
                          </select>
                                                        <label>Level</label>
                          <select class="form-control" name="a_level" required>
                            <option Value="">Select Level</option>
                            <option Value="Elementary">Elementary</option>
                        <option Value="Secondary">Secondary</option>
                          </select>
                          <label>Delegates</label>
                         <select data-placeholder="Choose a delegates" name="del_id" class="standardSelect" >
                            <option Value="">Select Delegates</option>
                           <?php $del=mysqli_query($con,"SELECT * from tbl_delegates where event_id='$active_event_id'"); while($dr=mysqli_fetch_assoc($del)){ ?>
                            <option value="<?php echo $dr['del_id']?>"><?php echo $dr['del_name'];?></option> 
                          <?php } ?>
                          </select>
                          
                        </div>

                 
         
                                       
                                              </div> <!-- End Row -->
                    </div>
             
                
 

                        
                                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-2">
                  
 <button type="submit" class="btn btn-success btn-lg btn-flat btn-block"><i class="fa fa-save"></i> Save</button>
                          </div>      
                   
                         

                 

                    
                                </div><!-- End Card Body -->

                           </form> 
                         </div>
               
                        </div>