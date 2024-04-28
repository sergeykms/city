<?php

echo 'test register';

$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];

$error = [];

//(preg_match("([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)", $email)) || $error['email'] = true;
filter_var($email, FILTER_VALIDATE_EMAIL) || $error['email'] = true;
!empty($name) || ($error['name'] = true);
!empty($birthday) || ($error['birthday'] = true);
!empty($password) || ($error['password'] = true);
$passwordConfirm === $password || ($error['passwordConfirm'] = true);

if (!empty($error)) {
    header('Location: /register.php?error=true');
}


