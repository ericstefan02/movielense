<?php 

include "../config/conn.php";
include "functions.php";

$usernames = getUsernames();
$data = array();
foreach($usernames as $username){
    array_push($data, $username);
}
header('Content-Type: application/json');
echo json_encode($data);

?>