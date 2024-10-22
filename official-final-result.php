<script type="text/javascript">

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
  .page-break {}

}
  </style>
<?php include'session.php';?>

<a href="" class="hide" onclick="window.print();
setTimeout(window.close,0);" style="width:250px; margin-top:30px; background: gray; color:white; padding:10px;">Print</a>

<?php


$sign=mysqli_query($con,"SELECT * from tbl_settings where event_id='$active_event_id'");
$sres=mysqli_fetch_assoc($sign);
  $query=mysqli_query($con,"SELECT * from tbl_games where event_id='$active_event_id'");
  while($row=mysqli_fetch_assoc($query)){ ?>

  <div  class="page-break" >
    <div style="width:8.4in; height:6.2in; background: white;">
          <div style="border: 0px solid black;height: auto;margin-top: 0.14in;">
         <div style="position: absolute; float: left;">
              
         </div>   
                  <div style="position: absolute; float: right;">
              <img src="images/logo.jpg" style="height:60px; float:right; margin-left:550px; position:absolute; margin-bottom:20px;">
         </div>  

      <center>

      <font>Republic of the Philippines</font><br>
        Department of Education<br>
         PROVINCE OF DINAGAT ISLANDS<br>
        
        <br>
  <br>
  <font style="font-size:15px; font-weight: bolder;">OFFICIAL FINAL RESULTS - DIPAM 2018</font><br><font>
    Date:<font style="border-bottom:1px solid black; padding-right:20px; padding-left: 10px;"><?php echo date('F d, Y')?></font>
  </font><br><br>

      </center>
 <table width="100%">
<tr align="left">
    <td>Event: <font style="border-bottom:1px solid black; padding-left:10px; padding-right:50px;"><?php echo $row['game_name']?></font></td>
    <td>Event No.: <font style="border-bottom:1px solid black; padding-left:10px; padding-right:50px;"><?php echo $sres['sign2']?></font></td>
    <td width="5%"><font style="">Elem</font></td> 
      <td><font style="">Sec</font></td>
    <td width="5%"> <font style="">Boys</font></td>
    <td> <font style="">Girls</font></td>

    </tr>
    
    <tr>
      
   <td></td>
   <td></td>
    <td><?php if($row['level']=="Elementary"){ $checkb="checked.png";} else{ $checkb="unchecked.png"; }?>
    <img src="images/<?php echo $checkb?>" style="height: 20px;" >
    </td>
    <td>
     <?php if($row['level']=="Secondary"){ $checkb="checked.png";} else{ $checkb="unchecked.png"; }?>
     <img src="images/<?php echo $checkb?>" style="height: 20px;" >
    </td>

     <td><?php if($row['category']=="Boys"){ $checkb="checked.png";} else{ $checkb="unchecked.png"; $padding="padding:4px;";}?>
     <img src="images/<?php echo $checkb?>" style="height: 20px;" >
    </td>
   <td><?php if($row['category']=="Girls"){ $checkb="checked.png";} else{ $checkb="unchecked.png"; }?>
   <img src="images/<?php echo $checkb?>" style="height: 20px;" >
    </td>
  </tr>
  <tr align="center">
    <td></td>
    <td></td>
    <td></td>
  </tr>
          </table>


          <table style="width:100%; border-collapse: collapse;" border="1">
     
            <tr align="center">
              
              <th rowspan="2">NO.</th>
              <th rowspan="2">NAME OF ATHLETE</th>
           
              <th rowspan="2">HEIGHT/TIME/DISTANCE<BR>SCORE/POINTS  </th>
              <th colspan="3">MEDAL EARNED</th>
              <th rowspan="2">DELEGATION</th>
              <th rowspan="2">COACH/ ASST. COACH</th>
            </tr>
            <tr>
             
              <th>G</th>
              <th>S</th>
              <th>B</th>
            </tr>
<?php for($i=1; $i<=6; $i++){
  $q=mysqli_query($con,"SELECT * from tbl_top_6 as t6 inner join tbl_athlete as a inner join tbl_delegates as d where t6.game_id='$row[game_id]' and t6.rank='$i' and a.a_id=t6.a_id and d.del_id=a.del_id");
  $r=mysqli_fetch_assoc($q);
  $iii++;

  ?>
              <tr align="center">
                
                <td><?php echo $iii;?>&nbsp;</td>
                <td><?php echo $r['a_name'];?></td>
                <td><?php echo $r['remarks'];?></td>
          
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $r['del_name'];?></td>
                <td><?php echo $r['coach'];?></td>
              </tr>
 <?php } ?>
 
            
          </table>
          <table style="margin-top:20px;">
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
</div>
<?php } ?>






