<?php
session_start();

if (!isset($_COOKIE['userName'])) {
    $path = '/';
    header("Location:$path");
}

function uploadImage(array $image): void
{
    $path = __DIR__ . "/../../uploads";
    if(!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $fileName = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], $path . "/" . $fileName);
}

$title = $_POST["title"];
$description = $_POST["description"];
$image = $_FILES["image"];

$verifiedFields = [];
$error = false;

if (!empty($title)) {
    $verifiedFields['title'] = $title;
} else {
    $error = "Ошибка введенных данных";
}

if (!empty($description)) {
    $verifiedFields['description'] = $description;
} else {
    $error = "Ошибка введенных данных";
}

if ($error) {
    $_SESSION['fields'] = $verifiedFields;
    $_SESSION['error'] = $error;
    $path = '/add-ticket.php';
    header("Location:$path");
} else {
    uploadImage($image);
}