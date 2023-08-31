<?php 
include "../config/conn.php";
$movieId = $_GET['id'];

global $conn;
$query = 'DELETE FROM movie_actor WHERE movie_id = :m_id';
$task = $conn->prepare($query);
$task->bindParam(":m_id", $movieId);
$task->execute();

$query = 'DELETE FROM movie_category WHERE movie_id = :m_id';
$task = $conn->prepare($query);
$task->bindParam(":m_id", $movieId);
$task->execute();

$query = 'DELETE FROM movie WHERE movie_id = :m_id';
$task = $conn->prepare($query);
$task->bindParam(":m_id", $movieId);
$task->execute();

$result = $task->fetch();
header('Location: ../index.php?page=moviesEdit');

?>