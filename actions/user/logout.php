<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie('userName', '', time() + (86400 * 30), "/");
    setcookie('userEmail', '', time() + (86400 * 30), "/");
    setcookie('userId', '', time() + (86400 * 30), "/");

    $path = "/login.php";
} else {
    $path = "/";
}
header("Location:$path");

