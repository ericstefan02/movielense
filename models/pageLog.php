<?php
$ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];
$user = isset($_SESSION['user']) ? $_SESSION['user']->username : "Not logged in";
$line = $ip.'__' .$user.'__'. $page.'__' .date('Y-m-d H:i:s')."\n";
file_put_contents("data/pagelog.txt", $line, FILE_APPEND);
?>