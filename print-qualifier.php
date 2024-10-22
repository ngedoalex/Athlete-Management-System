<script type="text/javascript">
window.print();
 setTimeout(window.close,750);
</script>

<style type="text/css">
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }
    #display table, #display th, #display td {
        border: .1em solid #000;
    }
    body, #display table, #display th, #display td {
        color: #000;
        background-color: #fff;
        font-size: 13px;
    }

    #display table {
        display: table;
        border-collapse: separate;
        border-spacing: 2px;
        border-color: grey;
        padding: 10px;

    }
    td{
      padding:4px;
    }
    td{
      text-align: center;
    }
/*    @media all {
  .page-break { display: none; }
}*/

@media print {
    td{
      padding:4px;
    }
  .hide{display: none;}
  .page-break { display: block; page-break-before: always; }

}
  </style>
<?php include'session.php';?>

<a href="" class="hide" onclick="window.print();
setTimeout(window.close,0);" style="width:250px; margin-top:30px; background: gray; color:white; padding:10px;">Print</a>

<?php

     for ($iii=1; $iii <=4; $iii++) { 
            if($iii===1){
              $level="Elementary";
              $category="Boys";

            }elseif($iii===2){
              $level="Elementary";
              $category="Girls";
            }
            elseif($iii===3){
              $level="Secondary";
              $category="Boys";
            }
            elseif($iii===4){
              $level="Secondary";
              $category="Girls";
            }
         

  $query=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id'");
  while($row=mysqli_fetch_assoc($query)){ ?>

  <div  class="page-break" >
          <div style="border: 0px solid black;height: auto;margin-top: 0.14in;">
    <img src="<?=$set['event_logo']?>" style="height:80px; float:left; margin-left:20%; position:absolute; margin-bottom:20px;"><br>
      <center>
            <font style="font-family:Times New Roman; font-size:16px;"><?=nl2br($set['event_heading'])?></font><br><font style="font-family:Times New Roman; font-size:15px;">
        <?=nl2br($set['event_sub_heading'])?>
      </font>
        <br>
  <br>
 <?php $eve=mysqli_query($con,"SELECT * from tbl_event where event_id='$active_event_id'");
          $res=mysqli_fetch_assoc($eve);
          $event_description=$res['event_description']; ?>
      </center>
      <h3 align="center" style="font-weight: bolder;"><?php echo strtoupper($event_description);?></h3>
      <h3 align="center">Qualifiers <?=$level.' ( '.$category.' )'?></h3>


          <table style="width:100%; border-collapse: collapse;" border="1">
           <tr>
             <th>No.</th>
             <th>ATHLETE NO.</th>
             <th>NAME</th>
             <th>EVENT</th>
             <th>MEDAL EARNED</th>
             <th>TIME/DISTANCE</th>
             <th>RANK</th>
             <th>DELEGATION</th>
             <th>COACH</th>
           </tr>
           <?php 

           $query=mysqli_query($con,"SELECT * from tbl_athlete a inner join tbl_athlete_overall w inner join tbl_delegates d where d.event_id='$active_event_id' and w.a_id=a.a_id and d.del_id=a.del_id and a.a_category='$category' and a.a_level='$level' order by total_points desc"); while ($row=mysqli_fetch_assoc($query)) { $i++;
            $query2=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_games g inner join tbl_athlete_game ag where w.a_id='$row[a_id]' and w.game_id=g.game_id and ag.game_id=w.game_id and ag.a_id='$row[a_id]'");
            $num2=mysqli_num_rows($query2);
            ?>
            <tr id="d">
              <td rowspan="<?=$num2+1?>"><?=$i?></td>
              <td rowspan="<?=$num2+1?>"><?=$row['a_num']?></td>
               <td rowspan="<?=$num2+1?>"><?=$row['a_name']?></td>
               <td></td>
                <td></td>
                <td></td>
                <td rowspan="<?=$num2+1?>"><?=$i?></td>
                <td rowspan="<?=$num2+1?>"><?=$row['del_name']?></td>
                <td></td>
            </tr>
            <?php while($row2=mysqli_fetch_assoc($query2)){ $a++; ?>
            <tr>
              <td ><?=$row2['game_name']?></td>
              <td ><?=$row2['standing_id']?></td>
              <td ><?=$row2['remarks']?></td>
              <td ><?=$row2['coach']?></td>

            </tr>
            <?php } //end sa second while loop?>
  

          <?php } //end sa first while loop?>
          </table>
  </div>
            <table style="margin-top:20px;">
              <?php $sign=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'");
$sres=mysqli_fetch_assoc($sign); ?>
                           <tr align="center">
    <td><font style="border-bottom:1px solid black; padding-left:50px; padding-right:50px;"><?php echo $sres['sign1']?></font></td>
    <td><font style="border-bottom:1px solid black; padding-left:50px; padding-right:50px;"><?php echo $sres['sign2']?></font></td>
    <td><font style="border-bottom:1px solid black; padding-left:50px; padding-right:50px;"><?php echo $sres['sign3']?></font></td>
  </tr>
    <tr align="center">
    <td><?php echo $sres['designation1']?></td>
    <td><?php echo $sres['designation2']?></td>
    <td><?php echo $sres['designation3']?></td>
  </tr>
          </table>
</div>
<?php }  } ?>




