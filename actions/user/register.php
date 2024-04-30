<?php

global $db;
session_start();

require_once __DIR__ . "/../../database/db.php";
$config = require_once __DIR__ . "/../../config/app_config.php";

$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$name = trim($_POST['name']);
$birthday = $_POST['birthday'];

$verifiedFields = [];

$error = false;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $verifiedFields['email'] = $email;
} else {
    $error = "Ошибка введенных данных";
}

if (preg_match("/^(?=.*[A-zА-я])[A-zА-я ]+$/", $name) && !empty($name)) {
    $verifiedFields['name'] = $name;
} else {
    $error = "Ошибка введенных данных";
}

$d = DateTime::createFromFormat('Y-m-d', $birthday);
if ($d && $d->format('Y-m-d') == $birthday) {
    $verifiedFields['birthday'] = $birthday;
} else {
    $error = "Ошибка введенных данных";
}

if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/", $password)) {
    $verifiedFields['password'] = true;
} else {
    $error = "Ошибка введенных данных";
}

if ($password === $passwordConfirm) {
    $verifiedFields['passwordConfirm'] = $name;
} else {
    $error = "Ошибка введенных данных";
}

if ($error) {
    $_SESSION['fields'] = $verifiedFields;
    $_SESSION['error'] = $error;
    $path = '/register.php';
    header("Location:$path");
} else {
    $query = $db->prepare("INSERT INTO users (email, password, name, birth_date, group_id) VALUES (:email, :password, :name, :birth_date, :group_id)");
    try {
        $query->execute([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'name' => $name,
            'birth_date' => $birthday,
            'group_id' => $config['defaultUserGroup']
        ]);
        unset($_SESSION['fields']);
        unset($_SESSION['error']);
        $path = '/login.php';
        header("Location:$path");
    } catch (PDOException $exception) {
        $_SESSION['fields'] = $verifiedFields;
        $errorCode = $exception->getCode();
        if ($errorCode == 23000) {
            echo "Пользователь с таким e-mail уже зарегистрирован";
            $_SESSION['error'] = "Пользователь с таким e-mail уже зарегистрирован";
        } else {
            $_SESSION['error'] = "Что-то пошло не так";
        }
        $path = '/register.php';
        header("Location:$path");
    }
}



