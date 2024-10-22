<script type="text/javascript">
window.print();
 setTimeout(window.close,750);
 // setTimeout(window.close, 0);
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
extract($_GET);
 for ($s=1; $s <=3; $s++) { 
  if ($s===1) {
    $standing="Gold";
  } elseif ($s===2) {
    $standing="Silver";
  } else{
     $standing="Bronze";
  }
 ?> 
  <div  class="page-break" >
          <div style="border: 0px solid black;height: auto;margin-top: 0.14in;">
    <img src="<?=$set['event_logo']?>" style="height:80px; float:left; margin-left:20%; position:absolute; margin-bottom:20px;"><br>
      <center>
      <font style="font-family:Times New Roman; font-size:16px;"><?=nl2br($set['event_heading'])?></font><br><font style="font-family:Times New Roman; font-size:15px;">
        <?=nl2br($set['event_sub_heading'])?>
      </font>
        
        <br>
  <br>

      </center>
      <h3 align="center" style="font-weight: bolder;"><?php $event_description=$row['standing_id'];  echo strtoupper($_GET['level'].' '.$_GET['category'])?> BOYS - <?php echo strtoupper($standing);?> MEDALIST</h3>

<table style="width:100%; border-collapse: collapse;" border="1">
  <tr>
    <td>#</td>
    <td>Athlete No.</td>
    <td>Athlete Name</td>
    <td>Delegates</td><td>Total Medals</td>
    <td><?=$standing?> Medal Earned </td>
    <td>Coach</td>
  </tr> 
  <tbody>
    <?php
    // echo "SELECT * from tbl_medalist w inner join tbl_athlete a inner join tbl_delegates d where w.medal_type='$standing' and w.a_id=a.a_id and a.del_id=d.del_id and d.event_id='$active_event_id' and a.a_level='$level' and a.a_category='Boys' order by w.total_medal DESC";
    $query1=mysqli_query($con,"SELECT * from tbl_medalist w inner join tbl_athlete a inner join tbl_delegates d where w.medal_type='$standing' and w.a_id=a.a_id and a.del_id=d.del_id and d.event_id='$active_event_id' and a.a_level='$level' and a.a_category='Boys' order by w.total_medal DESC");
    while ($row1=mysqli_fetch_array($query1)) {

       $query2=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_games g inner join tbl_athlete_game ag where w.a_id='$row1[a_id]' and w.game_id=g.game_id and ag.game_id=w.game_id and ag.a_id='$row1[a_id]' and standing_id='$standing'");
            $rows=mysqli_num_rows($query2);
      $p++;
      ?>
      <tr>
        <td rowspan="<?=$rows+1?>"><?=$p?></td>
    <td rowspan="<?=$rows+1?>"><?=$row1['a_num']?></td>
    <td rowspan="<?=$rows+1?>"><?=$row1['a_name']?></td>
    <td rowspan="<?=$rows+1?>" align="center"><?=$row1['del_name']?></td>
    <td rowspan="<?=$rows+1?>" align="center"> <?=$row1['total_medal']?></td>

      </tr>

            <?php while($row2=mysqli_fetch_assoc($query2)){ $a++; ?>
            <tr>

              <td ><?=$row2['game_name']?></td>

              <td ><?=$row2['coach']?></td>

            </tr>
            <?php } //end sa second while loop?>
     
    <?php } $p=0; ?>
  </tbody>
</table>
  </div>
            <table style="margin-top:20px;">
<?php $sign=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'");
$sres=mysqli_fetch_assoc($sign); 
?>
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
<?php } ?>









 <?php 
extract($_GET);
 for ($s=1; $s <=3; $s++) { 
  if ($s===1) {
    $standing="Gold";
  } elseif ($s===2) {
    $standing="Silver";
  } else{
     $standing="Bronze";
  }
 ?> 
  <div  class="page-break" >
          <div style="border: 0px solid black;height: auto;margin-top: 0.14in;">
    <img src="<?=$set['event_logo']?>" style="height:80px; float:left; margin-left:20%; position:absolute; margin-bottom:20px;"><br>
      <center>
      <font style="font-family:Times New Roman; font-size:16px;"><?=nl2br($set['event_heading'])?></font><br><font style="font-family:Times New Roman; font-size:15px;">
        <?=nl2br($set['event_sub_heading'])?>
      </font>
        
        <br>
  <br>

      </center>
      <h3 align="center" style="font-weight: bolder;"><?php $event_description=$row['standing_id'];  echo strtoupper($_GET['level'].' '.$_GET['category'])?> GIRLS - <?php echo strtoupper($standing);?> MEDALIST</h3>

<table style="width:100%; border-collapse: collapse;" border="1">
  <tr>
    <td>#</td>
    <td>Athlete No.</td>
    <td>Athlete Name</td>
    <td>Delegates</td>
    <td><?=$standing?> Medal Earned </td>
    <td>Total Medals</td>
    <td>Coach</td>


  </tr> 
  <tbody>
    <?php
    $query1=mysqli_query($con,"SELECT * from tbl_medalist w inner join tbl_athlete a inner join tbl_delegates d where w.medal_type='$standing' and w.a_id=a.a_id and a.del_id=d.del_id and d.event_id='$active_event_id' and a.a_level='$level' and a.a_category='Girls' order by w.total_medal DESC");
    while ($row1=mysqli_fetch_array($query1)) {

       $query2=mysqli_query($con,"SELECT * from tbl_winner w inner join tbl_games g inner join tbl_athlete_game ag where w.a_id='$row1[a_id]' and w.game_id=g.game_id and ag.game_id=w.game_id and ag.a_id='$row1[a_id]' and standing_id='$standing'");
            $rows=mysqli_num_rows($query2);
      $p++;
      ?>
      <tr>
        <td rowspan="<?=$rows+1?>"><?=$p?></td>
    <td rowspan="<?=$rows+1?>"><?=$row1['a_num']?></td>
    <td rowspan="<?=$rows+1?>"><?=$row1['a_name']?></td>
    <td rowspan="<?=$rows+1?>" align="center"><?=$row1['del_name']?></td>
    <td rowspan="<?=$rows+1?>" align="center"> <?=$row1[total_medal]?></td>

      </tr>

            <?php while($row2=mysqli_fetch_assoc($query2)){ $a++; ?>
            <tr>

              <td ><?=$row2['game_name']?></td>

              <td ><?=$row2['coach']?></td>

            </tr>
            <?php } //end sa second while loop?>
     
    <?php } $p=0; ?>
  </tbody>
</table>
  </div>
            <table style="margin-top:20px;">
<?php $sign=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'");
$sres=mysqli_fetch_assoc($sign); 
?>
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
<?php } ?>




