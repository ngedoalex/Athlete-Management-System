       <?php $title="All Student"; include'head.php';
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
 ?>
       <style type="text/css">
         label{
          text-transform: uppercase;
          padding-top:4px;
         }
       </style>

                    <!--######################################## BREADCRUMBS ######################################-->
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class=""><a href="all-student.php">Student</a></li>
                                        <li class="activep">Add New Student</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##./################################## END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">
                      <?php if($_GET['page']=="2"){ include'page2.php';} else{ include'page1.php';}?>



  <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->
    
    <?php include'js.php';?>
                  <script type="text/javascript">
                        $('#school_id').blur(function() {
                            //ajax request
                            $.ajax({
                                url: "checkId.php",
                                data: {
                                    'school_id' : $('#school_id').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                        alert('School ID exists!');
                                        document.getElementById('school_id').focus();
                                        document.getElementById('school_id').value="";
                                    }
                                    else{
                                       
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                        });


                              $('#a_num').blur(function() {
                                if($('#a_num').val()===''){

                                } else{


                            //ajax request
                            $.ajax({
                                url: "checkAthlete.php",
                                data: {
                                    'a_num' : $('#a_num').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                  console.log(data.result)
                                    if(data.result){
                                        alert('Athlete number exists!\nTry again.');
                                        document.getElementById('a_num').focus();
                                        document.getElementById('a_num').value="";
                                    }
                                    else{
                                       
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                          }
                        });
                    </script>
        