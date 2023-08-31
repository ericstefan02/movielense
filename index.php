<?php 

session_start();
include "views/fixed/head.php";

include "config/conn.php";
include "models/functions.php";
include "models/pageLog.php";

$page = "main";
if(isset($_GET['page'])){
  $page = $_GET['page'];
}
?>

<body>
    <?php
 
    include "views/fixed/header.php";
    switch ($page){

    case "main":
      include "views/pages/main.php";
      break;
    case "login":
      include "views/pages/login.php";
      break;
    case "register":
      include "views/pages/register.php";
      break;
    case "author":
      include "views/pages/author.php";
      break;
    case "movies":
      include "views/pages/movies.php";
      break;
    case "moviesEdit":
      include "views/pages/moviesEdit.php";
      break;
    case "newsEdit":
      include "views/pages/newsEdit.php";
      break;
    case "usersEdit":
      include "views/pages/usersEdit.php";
      break;
    case "insertMovie":
      include "views/pages/insertMovie.php";
      break;
    case "insertNews":
      include "views/pages/insertNews.php";
      break;
    case "insertUser":
      include "views/pages/insertUser.php";
      break;
    case "contact":
      include "views/pages/contact.php";
      break;
    case "movie":
      include "views/pages/movie.php";
      break;
    case "updateMovie":
      include "views/pages/updateMovie.php";
      break;
    case "updateNews":
      include "views/pages/updateNews.php";
      break;
     case "updateUser":
      include "views/pages/updateUser.php";
      break;
    case "panel":
      include "views/pages/panel.php";
      break;
    };

    

    include "views/fixed/footer.php";
    ?>
    <script src="assets/js/main.js"></script>
</body>