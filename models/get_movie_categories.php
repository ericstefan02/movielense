<?php 

include "../config/conn.php";
include "functions.php";
$id = $_POST['id'];
$categories = getMovieCategories($id);
$categoriesData = array();
foreach($categories as $category){
    array_push($categoriesData, $category);
}
header('Content-Type: application/json');
echo json_encode($categoriesData);

?>