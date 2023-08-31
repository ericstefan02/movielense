<?php 

include "../config/conn.php";
include "functions.php";
$categories = $_POST['categories'];
$numberOfMovies = getNumberOfFilteredMovies($categories);
header('Content-Type: application/json');
echo json_encode($numberOfMovies);

?>