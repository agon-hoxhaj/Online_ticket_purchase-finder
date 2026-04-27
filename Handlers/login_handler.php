<?php
require_once "../Classes/User_class.php";
require_once __DIR__ . "/validation_handler.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = validateLogin($_POST);

    if (!empty($errors)) {
        session_start();
        $_SESSION["errors"] = $errors;
        header("Location: ../Pages/index.php");
        exit();
    }

    $email       = trim($_POST["login"]);
    $password    = $_POST["password"];
    $remember_me = isset($_POST["remember"]);

    if(User::login($email, $password)){
        if ($remember_me) {
            setcookie('remember_email', $email, time() + 60*60*24*30, '/', '', false, true);
        }
        header("Location: ../Pages/landing.php");
    } else {
        session_start();
        $_SESSION["errors"] = ["Invalid email or password."];
        header("Location: ../Pages/index.php");
    }
    exit();
}
?>