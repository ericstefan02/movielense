<?php 

include "../config/conn.php";
include "functions.php";
session_start();
$user = "";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user']->user_id;
}
$limit = $_POST['limit'];  
$categories = $_POST['categories'];
$sortOrder = $_POST['sortOrder'];
$categoriesArray = array($categories);
$movies = getAllDataOfMovies($limit, $categoriesArray, $sortOrder);
$numberOfMovies = getNumberOfFilteredMovies($categoriesArray);
$movieData = array();
foreach($movies as $movie){
    array_push($movieData, $movie);
}
header('Content-Type: application/json');
echo json_encode([
    "movies" => $movieData,
    "user"=>$user,
    "number"=>$numberOfMovies
]);

?>