<?php
global $db;
session_start();

require_once __DIR__ . "/../../database/db.php";
$config = require_once __DIR__ . "/../../config/app_config.php";

if (!isset($_COOKIE['userId'])) {
    $path = '/';
    header("Location:$path");
}

function uploadImage(array $image): string
{
    try {
        $path = __DIR__ . "/../../uploads";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $fileName = uniqid() . '-' . $image['name'];
        move_uploaded_file($image['tmp_name'], $path . "/" . $fileName);
    } catch (Exception $exception) {
        echo $exception->getMessage();
        $fileName = false;
    }
    return $fileName;
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
    $fileName = uploadImage($image);
    if ($fileName) {
        $query = $db->prepare("INSERT INTO tikets (title, description, image, status_id, user_id) VALUES (:title, :description, :image, :status_id, :user_id)");
        try {
            $query->execute([
                'title' => $title,
                'description' => $description,
                'image' => 'uploads/' . $fileName,
                'status_id' => $config['defaultTicketStatus'],
                'user_id' => $_COOKIE['userId']
            ]);
            unset($_SESSION['fields']);
            unset($_SESSION['error']);
            $path = '/my-tickets.php';
            header("Location:$path");
        } catch (PDOException $exception) {
//            echo $exception->getMessage();
            $_SESSION['fields'] = $verifiedFields;
            $_SESSION['error'] = "Ошибка при записи в базу данных";
            $path = '/add-ticket.php';
            header("Location:$path");
        }
    } else {
        $_SESSION['fields'] = $verifiedFields;
        $_SESSION['error'] = "Что-то пошло не так";
        $path = '/add-ticket.php';
        header("Location:$path");
    }
}