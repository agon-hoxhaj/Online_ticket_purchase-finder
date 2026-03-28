<?php
require "../Classes/User_class.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["login"];
    $password = $_POST["password"];

    if(User::login($email, $password)){
        header("Location: ../Pages/landing.php");
    }else{
        header("Location: ../Pages/index.php");
    }

    exit();
}





?>