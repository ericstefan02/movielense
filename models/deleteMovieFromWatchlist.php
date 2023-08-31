<?php 
include "../config/conn.php";
$movieId = $_GET['movieId'];
$userId = $_GET['userId'];

global $conn;
$query = 'DELETE FROM watchlist WHERE movie_id = :m_id AND user_id = :u_id';
$task = $conn->prepare($query);
$task->bindParam(":m_id", $movieId);
$task->bindParam(":u_id", $userId);
$task->execute();

$result = $task->fetch();
header('Location: ../index.php');

?>