<?php 

ini_set('error_reporting', E_ALL & ~E_WARNING);


function getNewestMovies(){
    global $conn;

    $query = "SELECT DISTINCT m.movie_name, m.date, mp.url, m.movie_id FROM movie m JOIN movie_category mc ON m.movie_id = mc.movie_id JOIN category c ON mc.category_id = c.category_id JOIN movies_pictures mp ON m.picture_id = mp.picture_id ORDER BY m.date DESC LIMIT 3 ";

    $movies = $conn->query($query);
    return $movies;
}

function getBestMovies(){
    global $conn;

    $query = "SELECT m.movie_name, mp.url, m.movie_id, AVG(r.grade) AS 'grade' FROM movie m JOIN review r ON m.movie_id = r.movie_id JOIN movies_pictures mp ON m.picture_id = mp.picture_id GROUP BY m.movie_name ORDER BY grade DESC LIMIT 5";
    
    $movies = $conn->query($query);
    return $movies;
}

function getMovieCategories($id){
    global $conn;

        $query = "SELECT c.category_name FROM movie m JOIN movie_category mc ON m.movie_id = mc.movie_id JOIN category c ON c.category_id = mc.category_id WHERE m.movie_id = :id";
        $task = $conn->prepare($query);
        $task->bindParam(":id", $id);
        $task->execute();
        $categories = $task->fetchAll();

        return $categories;
}

function getMovieActors($id){
    global $conn;

        $query = "SELECT a.actor_name, a.actor_lastname FROM actor a JOIN movie_actor ma ON a.actor_id = ma.actor_id JOIN movie m ON m.movie_id = ma.movie_id WHERE m.movie_id = :id";
        $task = $conn->prepare($query);
        $task->bindParam(":id", $id);
        $task->execute();
        $actors = $task->fetchAll();

        return $actors;
}

function getMovieReviews($id){
    global $conn;

        $query = "SELECT u.username, r.date, r.grade, r.text FROM movie m JOIN review r ON m.movie_id = r.movie_id JOIN user u ON r.user_id = u.user_id WHERE m.movie_id = :id ORDER BY r.date DESC";
        $task = $conn->prepare($query);
        $task->bindParam(":id", $id);
        $task->execute();
        $reviews = $task->fetchAll();

        return $reviews;

}

function getSimilarMovies($id){
    global $conn;

        $query = "SELECT DISTINCT mp.url, m.movie_id FROM movie m JOIN movies_pictures mp ON m.picture_id = mp.picture_id JOIN movie_category mc ON m.movie_id = mc.movie_id WHERE mc.category_id IN (SELECT category_id FROM movie_category WHERE movie_id = :id) AND m.movie_id != :id ORDER BY RAND() LIMIT 4";
        $task = $conn->prepare($query);
        $task->bindParam(":id", $id);
        $task->execute();
        $similarMovies = $task->fetchAll();

        return $similarMovies;

}

function getMovie($id){
    global $conn;

        $query = "SELECT m.movie_name, m.movie_description, mp.url, AVG(r.grade) AS 'grade' FROM movie m JOIN movies_pictures mp ON m.picture_id = mp.picture_id JOIN review r ON r.movie_id = m.movie_id WHERE m.movie_id = :id";
        $task = $conn->prepare($query);
        $task->bindParam(":id", $id);
        $task->execute();
        $movie = $task->fetch();

        return $movie;
}

function getFooterLinks(){
    global $conn;

        $query = "SELECT * FROM navigation_items WHERE item_type IS NULL OR item_type = 'f'";

        $links = $conn->query($query);
        return $links;
}

function getHeaderLinks(){
    global $conn;

        $query = "SELECT * FROM navigation_items WHERE item_type IS NULL OR item_type = 'h'";

        $links = $conn->query($query);
        return $links;

}

function getNews(){
    global $conn;

    $query = "SELECT n.news_title, np.url FROM news n JOIN news_pictures np ON n.picture_id = np.picture_id LIMIT 5";

    $news = $conn->query($query);
    return $news;

}

function getUsernames(){
    global $conn;

    $query = "SELECT username FROM user";

    $usernames = $conn->query($query);
    return $usernames;
}

function getMaxId($tableName, $idName){
    global $conn;
    $query = "SELECT MAX($idName) AS maxid FROM $tableName";
    $task = $conn->query($query);
    $row = $task->fetch();
    return $row->maxid;
}

function logging($username, $password){
    global $conn;
        $query = "SELECT * FROM user u JOIN roles r ON u.role_id = r.role_id  WHERE u.username = :username AND u.password = :password";

        $task = $conn->prepare($query);
        $task->bindParam(":username", $username);
        $task->bindParam(":password", $password);

        $task->execute();

        $user = $task->fetch();

        return $user;
}
function checkIfUserHasAlreadyReviewdMovie($user, $movie){
    global $conn;
        $query = "SELECT * FROM review WHERE user_id = $user AND movie_id = $movie";
        $reviewNum = $conn->query($query);
        return $reviewNum;
}
function getUserWatchlist($userId){
    global $conn;
        $query = "SELECT * FROM user u JOIN watchlist w ON u.user_id = w.user_id JOIN movie m ON w.movie_id = m.movie_id JOIN movies_pictures mp ON m.picture_id = mp.picture_id WHERE u.user_id = $userId";
        $watchlist = $conn->query($query);
        return $watchlist;
}

function getAllMovies(){
    global $conn;
        $query = "SELECT * FROM movie m JOIN movies_pictures mp ON m.picture_id = mp.picture_id";
        $allMovies = $conn->query($query);
        return $allMovies;
}

function getAllNews(){
    global $conn;
        $query = "SELECT * FROM news n JOIN news_pictures np ON n.picture_id = np.picture_id";
        $allNews = $conn->query($query);
        return $allNews;
}
function getAll($tableName){
    global $conn;
        $query = "SELECT * FROM $tableName";
        $all = $conn->query($query);
        return $all;
}
function getAllWithId($tableName, $idName, $id){
    global $conn;
        $query = "SELECT * FROM $tableName WHERE $idName = $id";
        $all = $conn->query($query);
        return $all;
}
function getThisMovieActors($id){
    global $conn;
    $query = "SELECT * FROM movie_actor WHERE movie_id = $id";
        $all = $conn->query($query);
        return $all;
}
function getThisMovieCategories($id){
    global $conn;
    $query = "SELECT * FROM movie_category WHERE movie_id = $id";
        $all = $conn->query($query);
        return $all;
}
function getFilteredMovies($text){

    global $conn;
    $query = "SELECT m.movie_name, p.url, m.movie_id FROM movie m JOIN movies_pictures p ON m.picture_id = p.picture_id WHERE LOWER(m.movie_name) LIKE '$text%'";
        $all = $conn->query($query);
        return $all;

}
define ("MOVIE_OFFSET", 10);
function getAllDataOfMovies($limit = 0, $categories = [], $sortOrder = 1){
    global $conn;
    if($categories[0] == ""){
        $categories = [];
        $allCategories = getAll("category");
        foreach($allCategories as $category){
            array_push($categories, $category->category_id);
        }
    }
    $sortText;
    switch($sortOrder){
        case 1:
            $sortText = "m.movie_name ASC";
            break;
        case 2:
            $sortText = "m.date DESC";
            break;
        case 3:
            $sortText = "m.date ASC";
            break;
        case 4:
            $sortText = "grade DESC";
            break;
        case 5:
            $sortText = "grade ASC";
            break;
        default:
            $sortText = "m.movie_name ASC";
            break;
    }
    $categoryString = implode(",", $categories);
    $query = "SELECT m.movie_name, mp.url, m.movie_id, AVG(r.grade) AS 'grade' FROM movie m JOIN review r ON m.movie_id = r.movie_id JOIN movies_pictures mp ON m.picture_id = mp.picture_id JOIN movie_category mc ON m.movie_id = mc.movie_id WHERE mc.category_id IN ($categoryString) GROUP BY m.movie_name ORDER BY $sortText LIMIT :limit, :offset";
    $task = $conn->prepare($query);
    $limit = ((int) $limit) * MOVIE_OFFSET;
    $task->bindValue(":limit", $limit, PDO::PARAM_INT);
    $offset = MOVIE_OFFSET;
    $task->bindValue(":offset", $offset, PDO::PARAM_INT);
    $task->execute();
    $movies = $task->fetchAll();
    return $movies;
}
function getNumberOfFilteredMovies($categories=[]){
    global $conn;
    if($categories[0] == ""){
        $categories = [];
        $allCategories = getAll("category");
        foreach($allCategories as $category){
            array_push($categories, $category->category_id);
        }
    }
    $categoryString = implode(",", $categories);
    $query = "SELECT COUNT(DISTINCT m.movie_name) AS 'num' FROM movie m JOIN movie_category mc ON m.movie_id = mc.movie_id WHERE mc.category_id IN ($categoryString)";
    $task = $conn->prepare($query);
    $task->execute();
    $number = $task->fetch();
    return $number;
}
function getMostWatchedMovies(){
    global $conn;

    $query = "SELECT m.movie_name, mp.url, m.movie_id, AVG(r.grade) AS 'grade' FROM movie m JOIN review r ON m.movie_id = r.movie_id JOIN movies_pictures mp ON m.picture_id = mp.picture_id GROUP BY m.movie_name ORDER BY COUNT(r.movie_id) DESC LIMIT 5";
    
    $movies = $conn->query($query);
    return $movies;
}
function getMoviesNumber(){
    global $conn;

    $query = "SELECT COUNT(*) AS 'number' FROM movie";
    
    $number = $conn->query($query)->fetch();
    return $number;
}
function getNumberOfPages(){
    $numberOfMovies = getMoviesNumber();
    $numberOfPages = ceil($numberOfMovies->number/MOVIE_OFFSET);
    return $numberOfPages;
}
function getAdminData(){
    global $conn;

    $query = "SELECT * FROM user u JOIN roles r ON u.role_id = r.role_id WHERE r.role_name = 'admin'";
    
    $adminData = $conn->query($query)->fetch();
    return $adminData;
}
function getUsersWithRole(){
    global $conn;

    $query = "SELECT * FROM user u JOIN roles r ON u.role_id = r.role_id";
    
    $usersData = $conn->query($query)->fetchAll();
    return $usersData;
}

function getThisUser($id){
    global $conn;

    $query = "SELECT * FROM user u WHERE user_id = :id";

    $task = $conn->prepare($query);
    $task->bindParam(":id", $id);
    $task->execute();
    $user = $task->fetch();
    return $user;
}
function createSmallerPictureName($name){
    list($picName, $ext) = explode(".", $name);
    $picName.="cropped";
    $newPictureName = $picName.'.'.$ext;
    return $newPictureName;
    
}
?>