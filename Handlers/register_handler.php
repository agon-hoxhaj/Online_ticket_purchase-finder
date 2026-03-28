<?php
require "../Components/login-register_component.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $file = fopen("Users.txt", "a");

    $id = uniqid();
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password_register"];

    $data = "{$id};{$full_name};{$username};{$email};{$password}";
    fwrite($file, $data);
    header("Location: ../Pages/landing.php");
    exit();
}



?>