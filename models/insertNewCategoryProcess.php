<?php 
include "../config/conn.php";
include "functions.php";

$categoryName = $_POST["name"];

$errors = 0;
$categoryReg = "/^(?=[A-Z]).{1,40}$/";


if(!preg_match($categoryReg, $categoryName)){
    $errors++;
}

if($errors==0){
    global $conn;
    $maxID = getMaxId("category", "category_id");
    $newMaxId = $maxID+1;

    $query = "INSERT INTO category(category_id, category_name) VALUES(:id, :name)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":name", $categoryName);

    $result = $task->execute();
    
    if($result){
        header("Location: ../index.php?page=insertMovie");
        die();
    }
    
}

?>