<?php 
include "../config/conn.php";
include "functions.php";

$targetDir = "../assets/img/news/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

$errors = 0;

$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    echo "Image uploaded!";
  } else {
    $errors++;
    echo "Error uploading image.";
  }
} else {
    $errors++;
    echo "Please upload a valid image file.";
}

if($errors==0){
    $imageName = basename($_FILES["image"]["name"]);
    global $conn;
    $maxID = getMaxId("news_pictures", "picture_id");
    $newMaxId = $maxID+1;

    $query = "INSERT INTO news_pictures(picture_id, url) VALUES(:id, :url)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":url", $imageName);

    $result = $task->execute();
    
    if($result){
        header("Location: ../index.php?page=insertNews");
        die();
    }
    
}

?>