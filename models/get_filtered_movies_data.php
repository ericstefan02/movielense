<?php 

include "../config/conn.php";
include "functions.php";
$filterText = $_POST['textFilter'];  
$movies = getFilteredMovies($filterText);
$data = array();
foreach($movies as $movie){
    array_push($data, $movie);
}
header('Content-Type: application/json');
echo json_encode($data);

?>