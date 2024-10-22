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


          <table style="width:100%; border-collapse: collapse;" border="1">
            <tr>
              <th colspan="5"><?php echo strtoupper($row['game_name']." ".$row['level'].' '.$row['category']);?></th>
            </tr>
            <tr>
              <td><b>ATHLETE NO.</b></td>
              <td><b>ATHLETE NAME</b></td>
              <td><b>DELEGATES</b></td>
              <td><b>TIME</b></td>
            </tr>
            <?php $quer=mysqli_query($con,"SELECT * from tbl_athlete_game as ag inner join tbl_athlete as a inner join tbl_delegates as d where ag.a_id=a.a_id and d.del_id=a.del_id and ag.game_id='$row[game_id]' and d.event_id='$active_event_id' order by d.del_name,a.a_name ASC");
            while($rrow=mysqli_fetch_assoc($quer)){ ?>
              <tr>
                <td><?php echo $rrow['a_num'];?></td>
                <td><?php echo $rrow['a_name'];?></td>
                <td><?php echo $rrow['del_name'];?></td>
                <td></td>
              </tr>
            <?php }?>
            
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
<?php } ?>




