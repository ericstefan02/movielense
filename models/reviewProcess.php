<?php 
include "../config/conn.php";
include "functions.php";

$movie_id = $_POST["movie_id"];
$user_id = $_POST["user_id"];
$grade = $_POST["gradeOfMovie"];
$text = $_POST["textOfReview"];

$errors = 0;

if($text==""){
    $errors++;
}

if($errors==0){
    global $conn;
    $maxID = getMaxId("review", "review_id");
    $newMaxId = $maxID+1;
    $currentDate = date("Y-m-d h:i:s");

    $query = "INSERT INTO review(review_id, text, grade, date, user_id, movie_id) VALUES(:id, :text, :grade, :date, :user, :movie)";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $newMaxId);
    $task->bindParam(":text", $text);
    $task->bindParam(":grade", $grade);
    $task->bindParam(":date", $currentDate);
    $task->bindParam(":user", $user_id);
    $task->bindParam(":movie", $movie_id);

    $result = $task->execute();

    if($result){
        $reviews = getMovieReviews($movie_id);
        header('Content-Type: application/json');
        echo json_encode($reviews);
    }
    
}

?>