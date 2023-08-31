<?php 

include "../config/conn.php";
include "functions.php";

$news = getNews();
$data = array();
foreach($news as $new){
    array_push($data, $new);
}
header('Content-Type: application/json');
echo json_encode($data);

?>