<?php

global $db;
session_start();

require_once __DIR__ . "/../../database/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$verifiedFields = [];

$error = false;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $verifiedFields['email'] = $email;
} else {
    $error = "Ошибка введенных данных";
}

if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/", $password)) {
    $verifiedFields['password'] = true;
} else {
    $error = "Ошибка введенных данных";
}

if ($error) {
    $_SESSION['fields'] = $verifiedFields;
    $_SESSION['error'] = $error;
    $path = '/login.php';
    header("Location:$path");
} else {
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    try {
        $query->execute([
            'email' => $email
        ]);
        $currentUser = $query->fetch(PDO::FETCH_ASSOC);
        if (!empty($users) && password_verify($password, $users['password'])) {
            unset($_SESSION['fields']);
            unset($_SESSION['error']);
            $_SESSION['auth'] = true;
            echo "Успешно";
        } else {
            $_SESSION['fields'] = $verifiedFields;
            $_SESSION['error'] = "Ошибка ввода логина или пароля. Попробуйте еще раз";
            $_SESSION['user'] = $currentUser;
            $path = '/';
            header("Location:$path");
        }
    } catch (PDOException $exception) {
        $_SESSION['fields'] = $verifiedFields;
        $_SESSION['error'] = "Что-то пошло не так";
        $path = '/login.php';
        header("Location:$path");
    }
}