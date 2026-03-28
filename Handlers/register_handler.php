<?php
require "../Classes/User_class.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = new User();
    $user->register(
        $_POST["full_name"], 
        $_POST["username"],
         $_POST["email"], 
         $_POST["password_register"], 
         "user");
    header("Location: ../Pages/index.php");  //qon user-in per login page pas regjistrimit
    exit();
}

?>