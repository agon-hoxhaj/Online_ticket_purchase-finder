<?php
session_start();
require "../Classes/User_class.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password_register"];
    
    $user = new User();
    $user->register(
        $_POST["full_name"], 
        $_POST["username"],
         $_POST["country"], 
         $email,
         $password, 
         "user");
    
    // Auto-login after registration
    if(User::login($email, $password)){
        header("Location: ../Pages/landing.php");
    } else {
        header("Location: ../Pages/index.php");
    }
    exit();
}

?>