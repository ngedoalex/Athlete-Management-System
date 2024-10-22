<?php
include 'session.php';

mysqli_query($con,"DELETE from tbl_delegates where event_id='$active_event_id'");
mysqli_query($con,"DELETE from tbl_games where event_id='$active_event_id'");
mysqli_query($con,"DELETE from tbl_winner where game_id=(SELECT game_id from tbl_games where event_id='$active_event_id')");
// mysqli_query($con,"DELETE from tbl_delegates where event_id='$active_event_id'");
header('location:'.$_SERVER['HTTP_REFERER']);
?>