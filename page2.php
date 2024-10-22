<?php $query=mysqli_query($con,"SELECT * from tbl_student where s_id='$_GET[stud_id]'"); $row=mysqli_fetch_assoc($query); ?>
                        <div class="col-xl-2 col-lg-2 col-md-2"></div>
                        <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">
                 
                            <div class="card"  style="background: #c6f7bc;"> 
                                      <div class="card-header">
                                    <h4 class="pull-left"><?php echo $row['lname'].', '.$row['fname'];?></h4> 
                                </div> 
                              <form method="GET" action="save_page2.php" enctype="multipart/form-data">
                      
                                <div class="card-body" >

                                  <div class="row">
                                    <input type="hidden" name="sid" value="<?php echo $_GET['stud_id']?>">
                                    <div class="col-lg-4 pull-right"><center><img id="uploadPreview" style="width: 200px; height: 200px; box-shadow: 1px 1px 10px 1px gray;" src="<?php echo $row['s_photo']?>" /></center> </div>
                                    <div class="col-lg-8 pull-left"> 
                                    <div class="row">

    
                         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                          
                              <label><b>Course</b></label>

                          </div> 
                           <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                          
                             
                                  <select data-placeholder="Choose a Course..." class="standardSelect" autofocus="" name="c_id" >
                                    <option value=""></option>
                                    <?php $course=mysqli_query($con,"SELECT * from tbl_courses order by c_abbr ASC");
                                    while($res=mysqli_fetch_assoc($course)){ ?>
                                      <option value="<?php echo $res['c_id']?>"><?php echo $res['c_abbr']?></option>
                                    <?php } ?>
                                </select>
                          </div>
                                                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                          
                              <label><b>Year Level</b></label>

                          </div> 
                           <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                          
                             
                          <select class="form-control mb-2" name="yr_lvl">
                            <option Value="1">1st Year</option>
                        <option Value="2">2nd Year</option>
                         <option Value="3">3rd Year</option>
                          <option Value="4">4th Year</option>
                          </select>
                          </div> 
                               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                          
                              <label><b>Semester</b></label>

                          </div> 
                           <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                          
                             
                          <select class="form-control" name="sem">
                            <option Value="1st Semester">1st Semester</option>
                        <option Value="2nd Semester">2nd Semester</option>
                          </select>
                          </div> 
                           <div class="col-xl-12 col-lg-12 col-md-8 col-sm-12">
                          
                             
                          <button type="submit" class="btn btn-success btn-lg btn-flat btn-block mt-3">Complete</button>
                          </div> 

    
                      </div> <!-- End Row --></div>
                                  </div>



      

                 

                    
                                </div><!-- End Card Body -->

                           </form> 
                         </div>
               
                        </div>