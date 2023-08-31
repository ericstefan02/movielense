<?php 
include "../config/conn.php";
include "functions.php";

$movie_id = $_POST["movie_id"];
$picture_id = $_POST["picture_Id"];
$movie_title = $_POST["movie_title"];
$movie_date = $_POST["movie_date"];
$movie_description = $_POST["movie_description"];
$movie_categories = $_POST["movie_categories"];
$movie_actors = $_POST["movie_actors"];

$errors = 0;
$movieTitleReg = "/^[A-Z][A-Za-z0-9 .]{0,38}[A-Za-z0-9]$/";

if(!preg_match($movieTitleReg, $movie_title)){
    $errors++;
}
if($movie_date==""){
    $errors++;
}
if($movie_description==""){
    $errors++;
}
if(count($movie_categories)==0){
    $errors++;
}
if(count($movie_actors)==0){
    $errors++;
}

if($errors==0){
    global $conn;

    $query = "DELETE FROM movie_category WHERE movie_id = :id";
    $task = $conn->prepare($query);
    $task->bindParam(":id", $movie_id);
    $result = $task->execute();

    $query = "DELETE FROM movie_actor WHERE movie_id = :id";
    $task = $conn->prepare($query);
    $task->bindParam(":id", $movie_id);
    $result = $task->execute();
    

    $query = "UPDATE movie SET movie_name = :name, movie_description = :description, date = :date, picture_id = :p_id WHERE movie_id = :m_id";

    $task = $conn->prepare($query);
    $task->bindParam(":m_id", $movie_id);
    $task->bindParam(":name", $movie_title);
    $task->bindParam(":description", $movie_description);
    $task->bindParam(":date", $movie_date);
    $task->bindParam(":p_id", $picture_id);


    $result = $task->execute();

    for($i = 0;$i<count($movie_categories);$i++){
        $queryForCategory = "INSERT INTO movie_category(movie_id, category_id) VALUES(:m_id, :c_id)";
        $taskForCategory = $conn->prepare($queryForCategory);
        $taskForCategory->bindParam(":m_id", $movie_id);
        $taskForCategory->bindParam(":c_id", $movie_categories[$i]);
        $categoryResult = $taskForCategory->execute();
    }
    for($k = 0; $k<count($movie_actors);$k++){
        $queryForActor = "INSERT INTO movie_actor(movie_id, actor_id) VALUES(:m_id, :a_id)";
        $taskForActor = $conn->prepare($queryForActor);
        $taskForActor->bindParam(":m_id", $movie_id);
        $taskForActor->bindParam(":a_id", $movie_actors[$k]);
        $actorResult = $taskForActor->execute();
    }
    if($result){
        header("Location: ../index.php?page=moviesEdit");
        die();
    }
    
}

?>