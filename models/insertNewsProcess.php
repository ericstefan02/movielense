<?php 
include "../config/conn.php";
include "functions.php";

$news_title = $_POST["news_title"];
$picture_id = $_POST["picture_id"];

$errors = 0;
$titleReg = "/^[A-Z][A-Za-z0-9 ]{0,50}[A-Za-z0-9]\.$/";


if(!preg_match($titleReg, $news_title)){
    $errors++;
}

if($errors==0){
    global $conn;
    $maxID = getMaxId("news", "news_id");
    $newMaxId = $maxID+1;

    $query = "INSERT INTO news(news_id, news_title, picture_id) VALUES(:id, :title, :pictureId)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":title", $news_title);
    $task->bindParam(":pictureId", $picture_id);

    $result = $task->execute();

    if($result){
        header("Location: ../index.php?page=newsEdit");
        die();
    }
    
}

?>