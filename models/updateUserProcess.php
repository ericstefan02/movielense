<?php 
include "../config/conn.php";
include "functions.php";

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$roleId = $_POST['roleId'];
$userId = $_POST['userId'];
$newPassword = $_POST['newPassword'];

$passwordToEnter = $password;
if($newPassword=="true"){
    $passwordToEnter = md5($password);
}

$errors = 0;
$usernameRegex = "/^[a-zA-Z]{3}[a-zA-Z0-9_]{0,17}$/";
$passReg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
$emailReg = "/^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/";

if(!preg_match($usernameRegex, $username)){
    $errors++;
}
if(!preg_match($emailReg, $email)){
    $errors++;
}

if($errors==0){
    global $conn;

    $query = "UPDATE user SET email = :email, username = :username, password = :password, role_id = :role WHERE user_id = :id";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $userId);
    $task->bindParam(":email", $email);
    $task->bindParam(":username", $username);
    $task->bindParam(":password", $passwordToEnter);
    $task->bindParam(":role", $roleId);


    $result = $task->execute();

    if($result){
        header("Location: ../index.php?page=usersEdit");
        die();
    }
    
}

?>