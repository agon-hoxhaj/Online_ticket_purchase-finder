<?php
session_start();
require_once __DIR__ . "/../Classes/User_class.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name       = trim($_POST["full_name"]);
    $email           = trim($_POST["email"]);
    $country         = trim($_POST["country"]);
    $new_password    = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    $errors = [];

    if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $full_name)) {
        $errors[] = "Full name: only letters and spaces, 3-50 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email.";
    }
    if (empty($country)) {
        $errors[] = "Country cannot be empty.";
    }
    if (!empty($new_password)) {
        if (strlen($new_password) < 8) {
            $errors[] = "Password must be at least 8 characters.";
        } elseif (!preg_match('/[A-Z]/', $new_password)) {
            $errors[] = "Password must contain at least 1 uppercase letter.";
        } elseif (!preg_match('/[0-9]/', $new_password)) {
            $errors[] = "Password must contain at least 1 number.";
        } elseif (!preg_match('/[^a-zA-Z0-9]/', $new_password)) {
            $errors[] = "Password must contain at least 1 special character.";
        } elseif ($new_password !== $confirm_password) {
            $errors[] = "Passwords do not match.";
        }
    }

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../Pages/profile.php");
        exit();
    }
    $file  = __DIR__ . "/../Server_data/Users.txt";
    $lines = file($file);
    $updated = [];

    foreach ($lines as $line) {
        $parts = explode(";", trim($line), 7);
        if ($parts[0] === $_SESSION["user-id"]) {
            $parts[1] = $full_name;
            $parts[3] = $country;
            $parts[4] = $email;
            if (!empty($new_password)) {
                $parts[5] = password_hash($new_password, PASSWORD_DEFAULT);
            }
            $line = implode(";", $parts);
        }
        $updated[] = $line;
    }

    file_put_contents($file, implode(PHP_EOL, $updated) . PHP_EOL);
    $_SESSION["full-name"] = $full_name;
    $_SESSION["email"]     = $email;
    $_SESSION["country"]   = $country;
    $_SESSION["success"]   = "Profile updated successfully!";

    header("Location: ../Pages/profile.php");
    exit();
}
?>