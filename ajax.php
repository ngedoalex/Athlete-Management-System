

<?php
/*
Author: Ngedo Alex Saul
*/

include('session.php');
if($_POST['id']){
	$id=$_POST['id'];
	$select=mysqli_query($con,"SELECT * FROM tbl_games WHERE game_id='$id'");
	$res=mysqli_fetch_assoc($select);
	if($id==0){
		
		}else{
			$sql = mysqli_query($con,"SELECT * FROM tbl_athlete WHERE a_level='$res[level]' and a_category='$res[category]'");
			while($row = mysqli_fetch_array($sql)){
				$tags.='"'.$row['a_name'].'",';
				}
			}
		}

?>
  <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery.js"></script>
  <script src="jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [<?php echo $tags?>];
    $( "#tags" ).autocomplete({
      source: availableTags
    });

  } );
  function sel(){
    var winner=document.getElementById('tags').value;
    document.getElementById('thisform').action="save-result.php?winner="+winner;
  }
  </script>

 


  <input id="tags" name="a_id" onblur="sel();" style="height:40px; width:100%;">

 
 

