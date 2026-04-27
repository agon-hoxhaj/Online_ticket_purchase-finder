<?php
session_start();
require "../Classes/User_class.php";
require_once __DIR__ . "/validation_handler.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = validateRegister($_POST);

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../Pages/index.php");
        exit();
    }

    $email    = trim($_POST["email"]);
    $password = $_POST["password_register"];

    $user = new User();
    $user->register(
        trim($_POST["full_name"]),
        trim($_POST["username"]),
        trim($_POST["country"]),
        $email,
        $password,
        "user"
    );

    if(User::login($email, $password)){
        header("Location: ../Pages/landing.php");
    } else {
        $_SESSION["errors"] = ["Registration failed. Please try again."];
        header("Location: ../Pages/index.php");
    }
    exit();
}
?>