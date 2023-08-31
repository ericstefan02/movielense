<?php 
include "../config/conn.php";
include "functions.php";

$userMail = $_POST["userMail"];
$subjectName = $_POST["subjectName"];
$mailText = $_POST["mailText"];

$errors = 0;
$subjectRegex = "/^[A-Za-z0-9\s\.,\?!@#$%^&*()\-+=]{1,100}$/";
$emailReg = "/^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/";


if(!preg_match($emailReg, $userMail)){
    $errors++;
}
if(!preg_match($subjectRegex, $subjectName)){
    $errors++;
}
if($mailText==""){
    $errors++;
}
if($errors==0){
    $adminMail = getAdminData()->email;
    $to = $adminMail;
    $subject = $subjectName;
    $message = $mailText;

    $headers = "From: ".$userMail."\r\n";
    $headers .= "Reply-To: ".$userMail."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
    echo "Email sent successfully.";
    } else {
    echo "Failed to send email.";
    }
}

?>