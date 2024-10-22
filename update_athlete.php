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
                                        <li class=""><a href="all-student.php">Athlete</a></li>
                                        <li class="active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--##./################################## END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">
<?php $query=mysqli_query($con,"SELECT * from tbl_athlete a inner join tbl_delegates d where a.a_id='$_GET[id]' and d.del_id=a.del_id"); 
$row=mysqli_fetch_assoc($query); ?>
                      <?php include'update_form.php';?>



  <!--############################### END content ########################################-->
    </div><!-- End Right Panel -->

    <?php include'js.php';?>

            <script type="text/javascript">
                                    $('#a_num').blur(function() {
                                      var a_num=$('#a_num').val();
                                  var id=a_id=$('#a_id').val();
                                
                                if($('#a_num').val()===''){
  
                                } else{

                                  
                            //ajax request
                            $.ajax({
                                url: "checkAthlete.php",
                                data: {
                                    'a_num' : a_num, 'id':id,'type':'update'
                                },
                                dataType: 'json',
                                success: function(data) {
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