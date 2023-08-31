<?php 
include "../config/conn.php";
include "functions.php";


$targetDir = "../assets/img/movies/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

$errors = 0;

$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    echo "Image uploaded!";

    $originalImage = imagecreatefromjpeg($targetFile);

    $originalWidth = imagesx($originalImage);
    $originalHeight = imagesy($originalImage);

    $newHeight = (int) ($originalHeight * 648 / $originalWidth);

    $resizedImage = imagecreatetruecolor(648, $newHeight);

    imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, 648, $newHeight, $originalWidth, $originalHeight);

    $cropWidth = 648;
    $cropHeight = 957;

    $cropX = 0;
    $cropY = ($newHeight - $cropHeight) / 2;

    $croppedImage = imagecrop($resizedImage, ['x' => $cropX, 'y' => $cropY, 'width' => $cropWidth, 'height' => $cropHeight]);

    $originalFileName = basename($_FILES["image"]["name"]);
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $croppedFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . "cropped." . $extension;
    $croppedFilePath = $targetDir . $croppedFileName;
    imagejpeg($croppedImage, $croppedFilePath, 90);

    imagedestroy($originalImage);
    imagedestroy($resizedImage);
    imagedestroy($croppedImage);
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
    $maxID = getMaxId("movies_pictures", "picture_id");
    $newMaxId = $maxID+1;

    $query = "INSERT INTO movies_pictures(picture_id, url) VALUES(:id, :url)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":url", $imageName);

    $result = $task->execute();
    
    if($result){
        header("Location: ../index.php?page=insertMovie");
        die();
    }
    
}

?>