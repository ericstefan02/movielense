<?php
$ip = $_SERVER['REMOTE_ADDR'];
$user = $_SESSION['user']->username;
$line = $ip.'__'.$user.'__'.date('Y-m-d H:i:s')."\n";
file_put_contents("../data/userLog.txt", $line, FILE_APPEND);
?>