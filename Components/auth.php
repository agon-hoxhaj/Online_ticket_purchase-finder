<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Auto-login from cookie if no session
if (!isset($_SESSION["user-id"]) && isset($_COOKIE["remember_email"])) {
    $file = __DIR__ . "/../Server_data/Users.txt";
    if (file_exists($file)) {
        foreach (file($file) as $line) {
            $line_split = explode(";", trim($line));
            if ($line_split[4] == $_COOKIE["remember_email"]) {
                $_SESSION["user-id"]   = $line_split[0];
                $_SESSION["full-name"] = $line_split[1];
                $_SESSION["username"]  = $line_split[2];
                $_SESSION["country"]   = $line_split[3];
                $_SESSION["email"]     = $line_split[4];
                $_SESSION["user-type"] = $line_split[6];
                break;
            }
        }
    }
}
?>