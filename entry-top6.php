       <?php $title="Entry Magic Six"; include'head.php';
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


                    <!--######################################## BREADCRUMBS ######################################-->
                    <div class="breadcrumbs">

                        <div class="col-sm-12">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="">Home</li>
                                        <li class="">Entry Result</li>
                                        <li class="active">Top 6</li>
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
                                    <h4 class="pull-left">Entry Top 8</h4>
                                </div>
        
                                <div class="card-body" style="margin:2px; padding:2px;">
                                  <div class="col-lg-6 col-md-12 col-sm-12">
                                    <table class="table" id="table1">
                                    <thead>
                                      <tr>
                                        <th>Game Title</th>
                                   
                                      </tr>
                                    </thead>
                                    <tbody>
                    <?php $query=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id'");
                      $i=0;
                      while ($row=mysqli_fetch_assoc($query)) {
                        $i++;
                        ?>
                      <tr onclick="window.location.href = 'entry-top6.php?game_id=<?php echo $row['game_id']?>';" style="cursor: pointer;">
   
                        <td ><?php echo $row['game_name'];?> - <?php echo $row['level'];?> <?php echo $row['category'];?></td>
                        
    

                     
                  
                      </tr>
                      <?php } ?>  
                                    </tbody>
                                  </table>
                                  </div>
                                  <div class="col-lg-6 col-md-12 col-sm-12" style="box-shadow: #000 4px 4px 10px; padding:10px 10px;">
                                    <form method="GET" action="save_rank6.php" onsubmit="check();">
                                      <input type="hidden" name="game_id" value="<?php echo $_GET['game_id']?>">
                                    <table class="table">
                                      <?php $query1=mysqli_query($con,"SELECT * from tbl_games where game_id='$_GET[game_id]' and event_id='$active_event_id'");
                                      $row1=mysqli_fetch_assoc($query1); ?>
                                      <thead>
                                        <tr class="bg-success text-white">
                                          <th colspan="4"><?php if (!empty($_GET['game_id'])){?>Game: <?php echo $row1['game_name']?> -
                                          <?php echo $row1['level']?> <?php echo $row1['category']?><?php } else{ echo "PLEASE SELECT GAME"; }?></th>
                                        </tr>
                                      </thead>
                                      <?php if(!empty($_GET['game_id'])){
                                       

                                        ?>
                                      <tbody>
                                        <tr>
                                          <th>Rank</th>
                                          <th>Athlete</th>
                                          <th>Official Record</th>
                                          <th>Lane No.</th>
                                        </tr>
                                        <?php for($rank=1; $rank<=8; $rank++){
                                          $find=mysqli_query($con,"SELECT * from tbl_top_6 as t6 inner join tbl_athlete as a inner join tbl_delegates as d where t6.game_id='$_GET[game_id]' and t6.rank='$rank' and a.a_id=t6.a_id and a.del_id=d.del_id and d.event_id='$active_event_id' ");
                                          $fres=mysqli_fetch_assoc($find);
                                          $a_id=$fres['a_id'];
                                          $record=$fres['remarks'];
                                          $lane=$fres['lane'];
                                          $fnum=mysqli_num_rows($find);
 ?>
                                        <tr>
                                     <td><?php echo $rank?></td> <td>
                                      <select class="standardSelect" id="rank1" name="a_id_rank[]" required="">
                                        <?php if($fnum>0){ echo "<option value={$fres['a_id']}>{$fres['a_no']}-{$fres['a_name']}</option>"; } else{ echo "<option >Select Athlete</option>";} ?>
                                        <?php $sel=mysqli_query($con,"SELECT * from tbl_athlete as a inner join tbl_athlete_game as ag inner join tbl_delegates as d where ag.game_id='$_GET[game_id]' and ag.a_id=a.a_id and ag.a_id!='$a_id' and a.del_id=d.del_id and d.event_id='$active_event_id'");
                                          while($res=mysqli_fetch_assoc($sel) ){ ?>
                                            <option value="<?php echo $res['a_id']?>"><?php echo $res['a_num']?> - <?php echo $res['a_name'];?></option><?php } ?></td>
                                           <td><input type="text" name="record[]" class="" style="width:100%;" value="<?php echo $record?>" ></td>
                                           <td><input type="text" name="lane[]" class="" style="width:100%;" value="<?php echo $lane?>" ></td>
                                        </tr>
                                      <?php } ?>
                                         

                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th colspan="4"><button type="submit"  class="btn btn-success btn-lg btn-block">SUBMIT </button></th>
                                        </tr>
                                      </tfoot>
                                    <?php } else{}?>
                                      
                                    </table>
   
                        </form>
                                  </div>
     
            
                            
                                 
                                </div>
                              </div>
                    
                      </div>


    </div><!-- End Right Panel -->

        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script type="text/javascript">

function check(){
  var rank1=$('#rank1').chosen().val()
  var rank2=$('#rank2').chosen().val()
  var rank3=$('#rank3').chosen().val()
  var rank4=$('#rank4').chosen().val()
  var rank5=$('#rank5').chosen().val()
  var rank6=$('#rank6').chosen().val()
  if(rank1!=rank2){
  }else{
    
    mess='Error: Duplicate athlete!';
    alert(mess)


  }


}

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
        