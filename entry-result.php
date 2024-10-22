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
.chosen-container-single .chosen-single {
    height: 40px;

    border-radius: 3px;
    border: 1px solid #CCCCCC;
}
.chosen-container-single .chosen-single span {
    padding-top: 10px;
}
.chosen-container-single .chosen-single div b {
    margin-top: 10px;
}
.check
{
    opacity:0.5;
  color:#996;
}
.box{
    margin-bottom:5px;
}
.radio-btn {
background: #d7d8e0;
  padding: 14px;
  width: 100px;
  display: inline-block;
  text-align: center;
  cursor: pointer;
}
.radio-btn input[type=radio] {
  visibility: hidden;
  width: 0;
  margin: 0;
  line-height: 16px;
  transition: all 0.2s ease;
}
.radio-btn input[type=radio]:checked {
  width: 10px;
  transition: all 0.2s ease;

}
.radio-btn input[type=radio]::after {
  content: " ";
  font-size: 0px;
  transition: all 0.1s ease;
} 
.radio-btn input[type=radio]:checked::after {
  visibility: visible;
  content: " ";
  font-size: 16px;
  transition: all 0.1s ease;
}

 </style>
                    <!--######################################## BREADCRUMBS ######################################-->
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class="active">Games</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--#################################### END BREADCRUMBS ############################################## -->
                    <!--############################################ CONTENT ######################################-->
                    <div class="content mt-1">
                      <div class="col-lg-12">
                          <div class="container">
                                               
                            <div class="card" >
                                  <div class="card-header">
                                    <h4 class="pull-left">Result Entry Form</h4> <a href="#add_games" class="btn btn-sm btn-success pull-right" data-toggle="modal"><i class="fa fa-plus"> Add New Games</i></a>
                                </div>
        
                                <div class="card-body" style="margin:2px; padding:2px;">
                                <table class="" style="width:40%;">
                                  <form method="POST" id="thisform" >
                                 
                                      <tr>
                                    <th>Game</th>
          
                                  </tr>
                             
                               
                                    <tr>
                                      <td><select name="game_id" class="country " style="width:100%;">
                                    <option value="0">Select Games</option>
                                    <?php

                                    $sql = mysqli_query($con,"SELECT * from tbl_games");
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                      $count=mysqli_query($con,"SELECT * from tbl_winner where game_id='$row[game_id]'");
                                      $c=mysqli_num_rows($count);
                                      if($c>2){

                                      } else{
                                         echo '<option value="'.$row['game_id'].'">'.$row['game_name'].'('.$row['level'].'-'.$row['category'].')'.'</option>';
                                      }
                                   
                                    } ?>
                                    </select></td>
         
                                    </tr>
                              
                           
                                      <tr>
                                
                                    <th>Winner</th>
                              
                                  </tr>
                     
                    
                                    <tr>
                                      
                                      <td id="city">
                                        <input type="" name="" style="height:40px; width:100%;">
                                      </td>
                                
                                    </tr>
                     
                       
                                      <tr>
                         
                                    <th>Standing</th>
                                  </tr>
               
                 
                                    <tr>
                                    
                                      <td>  
    <input type="hidden" name="" id="game_id">
    <label class="radio-btn"><input type="radio" name="tick" id="g"   value="Gold"   /><img src="images/gold.png" style="" id="gold">Gold</label>
    <label class="radio-btn"><input type="radio" name="tick" id="s" value="Silver" /><img src="images/silver.png" style="" id="silver">Silver</label>
    <label class="radio-btn"><input type="radio" name="tick" id="b" value="Bronze" /><img src="images/bronze.png" style="" id="bronze">Bronze</label>
    
                                      </td>
                                    </tr>
                                    <tr>
                                      <td id="save"><button class="btn btn-primary btn-block"  type="submit">Save</button></td>
                                    </tr>
                                  </form>
                           
                                
                                  
                                </table>
                            
                                 
                                </div>
                              </div>
                    
                      </div>


    </div><!-- End Right Panel -->

        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script type="text/javascript">


$(document).ready(function()
{
$('.country').chosen().change(function () {
var country_id=$(this).val();
var post_id = 'id='+ country_id;
document.getElementById('game_id').value=country_id


$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(cities)
{

$('#city').html(cities);
$('#tags').focus();

} 

});

});
  
});

</script>
    <?php include'js.php';?>
                    <script type="text/javascript">
                           $('#gold').click(function() {
                          
                            //ajax request
                            $.ajax({
                                url: "check-game.php",
                                data: {
                                    'abbr' : $('#game_id').val(),
                                    'standing':'Gold'
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                        alert(data.result);
                                        $('input[type=radio]').removeAttr('checked');

                                        

                                   
                                    }
                                    else{
                                       
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                        });
                 $('#silver').click(function() {
                          
                            //ajax request
                            $.ajax({
                                url: "check-game.php",
                                data: {
                                    'abbr' : $('#game_id').val(),
                                    'standing':'Silver'
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                        alert(data.result);
                                   
                                    }
                                    else{
                                       
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                        });
                         $('#bronze').click(function() {
                          
                            //ajax request
                            $.ajax({
                                url: "check-game.php",
                                data: {
                                    'abbr' : $('#game_id').val(),
                                    'standing':'Bronze'
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                        alert(data.result);

                                   
                                    }
                                    else{
                                       
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                        });

                    </script>
        