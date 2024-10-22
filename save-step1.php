<?php
$myfile = fopen("configuration.php", "w") or die("Unable to open file!");
fwrite($myfile, $txt);
fclose($myfile);
?>