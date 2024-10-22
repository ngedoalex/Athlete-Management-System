                        <div class="col-lg-2 col-xs-12"></div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                 
                            <div class="card" > 
                                      <div class="card-header">
                                    <h4 class="pull-left">Update</h4> <a href="view-athletes.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"> Back to Athletes</i></a>
                                </div> 
                              <form method="POST" action="save_up_athlete.php" enctype="multipart/form-data">
                      
                                <div class="card-body" >
                    <div class="col-lg-12 col-md-12 col-xs-12">

                      <!-- End Row -->
                      <div class="row">
                                          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <img id="uploadPreview" style="width: 150px; height: 150px; box-shadow: 1px 1px 10px 1px gray;" src="<?php echo $row['a_photo']?>" /><br><br>
                    <input type="hidden" name="current_photo" value="<?php echo $row['a_photo']?>">
                                        <input type="hidden" name="a_id" value="<?php echo $row['a_id']?>">

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
                          <input type="hidden" name="" id="a_id" value="<?=$_GET['id']?>">
                              <label>Full Name</label>
                              <input type="text" name="a_name" id="fname" class="form-control" placeholder="Enter fullname e.g. 'Ricardo Dalisay'" value="<?php echo $row['a_name']?>" required>   
                              <label>Athlete No.</label>
                              <input type="text" name="a_num" id="a_num" value="<?php echo $row['a_num']?>" class="form-control" placeholder="Athlete No." required>     
                              <label>Category</label>
                          <select class="form-control" name="a_category" required>
                            
                            <option Value="<?php echo $row['a_category']?>"><?php echo $row['a_category']?></option>
                            <?php if($row['a_category']=="Boys"){$category="Girls";}else{$category="Boys";}?>
                        <option Value="<?php echo $category?>"><?php echo $category?></option>
                          </select>
                                                        <label>Level</label>
                          <select class="form-control" name="a_level" required>
                        <option Value="<?php echo $row['a_level']?>"><?php echo $row['a_level']?></option>
                            <?php if($row['a_level']=="Secondary"){$category="Elementary";}else{$category="Secondary";}?>
                        <option Value="<?php echo $category?>"><?php echo $category?></option>
                          </select>
                          <label>Delegates</label>
                         <select data-placeholder="Choose a delegates" name="del_id" class="standardSelect" >
                            <option Value="<?php echo $row['del_id']?>"><?php echo $row['del_name']?></option>
                           <?php $del=mysqli_query($con,"SELECT * from tbl_delegates where event_id='$active_event_id' and del_id<>'$row[del_id]'"); while($dr=mysqli_fetch_assoc($del)){ ?>
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