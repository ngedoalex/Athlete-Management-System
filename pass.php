<?php
$pass1="admin";
$pass=md5($pass1);
$salt="a1Bz20ydqelm8m1wql";
$password=$salt.$pass;
echo$password;
?>