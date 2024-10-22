<script type="text/javascript">
window.print();
 setTimeout(window.close,750);
 // setTimeout(window.close, 0);
</script>


<?php include'session.php';?>
  <div style="background: white; width:12.5in; display: block; ">&nbsp;
    <img src="images/logo.jpg" style="height:80px; top:13px;margin-top:10px; position: absolute; left:350px; ">
  <font style="text-align: center; position: absolute; left:500px; top:30px;">
    Department of Education<br>
    CARAGA Administrative Region<br>
    Division of Dinagat Islands
  </font>
  <?php $eve=mysqli_query($con,"SELECT * from tbl_event where event_id='$active_event_id'");
  $res=mysqli_fetch_assoc($eve);
  $event_description=$res['event_description']; ?>
    <font style="text-align: center; position: absolute; left:345px; top:120px; font-size:20px;">
<B><?php echo strtoupper($event_description);?></B>
  </font>
  <div style="position: absolute; top:170px; width:13.1in">

  <?php 
  extract($_GET);
  if($print=="elem-boys"){
     $include="elem-men.php";
  }
  elseif($print=="elem-girls"){
    $include="elem-women.php";
  } elseif($print=="second-boys"){
    $include="second-men.php";
  }
  elseif($print=="second-girls"){
    $include="second-women.php";
  }
    elseif($print=="elem-final"){
    $include="elem-final.php";
  }
    elseif($print=="second-final"){
    $include="second-final.php";
  }
    elseif($print=="overall"){
    $include="overall-final.php";
  }
 
  include $include;?>
  <br>
<?php $sign=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'");
$sres=mysqli_fetch_assoc($sign); ?>
<table style="width:13.1in;">
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


</div>

