<?php
session_start();
require_once "../Classes/User_class.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["login"];
    $password = $_POST["password"];
    $remember_me = isset($_POST["remember"]);


    if(User::login($email, $password)){
        if (isset($remember_me)) {
             setcookie('remember_email', $email, time() + 60*60*24*30, '/', '', true, true);
            }

        header("Location: ../Pages/landing.php");   
    } else {
        header("Location: ../Pages/index.php");
    }

    exit();
}
?>