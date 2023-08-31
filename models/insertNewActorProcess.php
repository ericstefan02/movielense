<?php 
include "../config/conn.php";
include "functions.php";

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];


$errors = 0;
$nameAndLastNameReg = "/^([A-ZČĆŠŽĐ][a-zčćšžđ]+)\s*([A-ZČĆŠŽĐ][a-zčćšžđ]+(\s)*)*$/";


if(!preg_match($nameAndLastNameReg, $firstName)){
    $errors++;
}
if(!preg_match($nameAndLastNameReg, $lastName)){
    $errors++;
}
if($errors==0){
    global $conn;
    $maxID = getMaxId("actor", "actor_id");
    $newMaxId = $maxID+1;

    $query = "INSERT INTO actor(actor_id, actor_name, actor_lastname) VALUES(:id, :name, :lastname)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":name", $firstName);
    $task->bindParam(":lastname", $lastName);


    $result = $task->execute();
    
    if($result){
        header("Location: ../index.php?page=insertMovie");
        die();
    }
    
}

?>