<?php 

include "../config/conn.php";
include "functions.php";

$news_id = $_POST["id"];
$news_title = $_POST["news_title"];
$picture_id = $_POST["picture_id"];

$errors = 0;
$titleReg = "/^[A-Z][A-Za-z0-9: ]{0,50}[A-Za-z0-9]\.$/";


if(!preg_match($titleReg, $news_title)){
    $errors++;
}

if($errors==0){
    global $conn;
   
    $query = "UPDATE news SET news_title = :title, picture_id = :pic_id WHERE news_id = :id";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $news_id);
    $task->bindParam(":title", $news_title);
    $task->bindParam(":pic_id", $picture_id);

    $result = $task->execute();

    if($result){
        header("Location: ../index.php?page=newsEdit");
        die();
    }
    
}

?>