<?php
function validateLogin(array $post): array {
    $errors = [];

    $email    = trim($post["login"] ?? '');
    $password = $post["password"] ?? '';

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email address.";
    }
    if (empty($password)) {
        $errors[] = "Password cannot be empty.";
    }

    return $errors;
}

function validateRegister(array $post): array {
    $errors = [];

    $fullName = trim($post["full_name"] ?? '');
    $username = trim($post["username"] ?? '');
    $email    = trim($post["email"] ?? '');
    $password = $post["password_register"] ?? '';
    $confirm  = $post["confirm_password"] ?? '';
    $country  = trim($post["country"] ?? '');

    if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $fullName)) {
        $errors[] = "Full name: only letters and spaces, 3-50 characters.";
    }
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $errors[] = "Username: letters, numbers, underscores only. 3-20 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email (e.g. you@example.com).";
    }
    if (empty($password)) {
        $errors[] = "Password cannot be empty.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must contain at least 1 uppercase letter.";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must contain at least 1 number.";
    } elseif (!preg_match('/[^a-zA-Z0-9]/', $password)) {
        $errors[] = "Password must contain at least 1 special character (!@#$%^&*).";
    }
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }
    if (empty($country)) {
        $errors[] = "Country is required.";
    }

    return $errors;
}
?>