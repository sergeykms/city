<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    session_destroy();
    $path = "/login.php";
} else {
    $path = "/";
}
header("Location:$path");

