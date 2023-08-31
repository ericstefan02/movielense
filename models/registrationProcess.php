<?php 
include "../config/conn.php";
include "functions.php";

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$roleId = $_POST['roleId'];
if(!$roleId){
    $roleId = 2;
}


$errors = 0;
$usernameRegex = "/^[a-zA-Z]{3}[a-zA-Z0-9_]{0,17}$/";
$passReg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
$emailReg = "/^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/";

if(!preg_match($usernameRegex, $username)){
    $errors++;
}
if(!preg_match($passReg, $password)){
    $errors++;
}
if(!preg_match($emailReg, $email)){
    $errors++;
}

if($errors==0){
    global $conn;
    $maxID = getMaxId("user", "user_id");
    $newMaxId = $maxID+1;
    $hiddenPassword = md5($password);

    $query = "INSERT INTO user(user_id, email, username, password, role_id) VALUES(:id, :email, :username, :password, :role)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":email", $email);
    $task->bindParam(":username", $username);
    $task->bindParam(":password", $hiddenPassword);
    $task->bindParam(":role", $roleId);


    $result = $task->execute();

    if($result){
        $page = $_SERVER['HTTP_REFERER'];
        if(strpos($page, "register")){
            header("Location: ../index.php?page=login");
        }
        else if(strpos($page, "insertUser")){
            header("Location: ../index.php?page=usersEdit");
        }
        die();
    }
    
}

?>