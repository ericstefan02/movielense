<?php
    session_start();
    if(isset($_POST['submitButton'])){
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        // provera

        include "../config/conn.php";
        include "functions.php";

        $loggedUser = logging($username, md5($password));


        // var_dump($ulogovanKorisnik);
        if($loggedUser){
            $_SESSION['user'] = $loggedUser;
            include "userLog.php";

            if($loggedUser->role_name == "user"){
                header("Location: ../index.php");
                die();
            }
            else{
                header("Location: ../index.php");
                die();
            }
        }
        else{
            $_SESSION['loggingError'] = "Greška prilikom logovanja.";
            header("Location: ../login.php");
            die();
        }
    }
    else{
        header("Location: ../login.php");
    }
?>