<?php 

include "../config/conn.php";

$id = $_GET['id'];

global $conn;

$query = "DELETE FROM user WHERE user_id = :id";
$task = $conn->prepare($query);
$task->bindParam(":id", $id);
$task->execute();

header("Location: ../index.php?page=usersEdit");

?>