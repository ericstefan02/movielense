<?php 
include "../config/conn.php";
$newsId = $_GET['id'];

global $conn;
$query = 'DELETE FROM news WHERE news_id = :n_id';
$task = $conn->prepare($query);
$task->bindParam(":n_id", $newsId);
$task->execute();

$result = $task->fetch();
header('Location: ../index.php?page=newsEdit');

?>