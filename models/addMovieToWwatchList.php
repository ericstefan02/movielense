<?php 
include "../config/conn.php";
$movieId = $_GET['movieId'];
$userId = $_GET['userId'];

global $conn;
$query = 'INSERT INTO watchlist (movie_id, user_id) VALUES (:m_id, :u_id)';
$task = $conn->prepare($query);
$task->bindParam(":m_id", $movieId);
$task->bindParam(":u_id", $userId);
$task->execute();

$result = $task->fetch();
header('Location: ../index.php');

?>