<?php

global $db;
session_start();

require_once __DIR__ . "/database/db.php";

$query = $db->prepare("SELECT * FROM tikets JOIN status ON tikets.status_id = status.id WHERE tikets.user_id = :user_id");
try {
    $query->execute([
        'user_id' => $_COOKIE['userId'],
    ]);
    $userTickets = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo $exception->getMessage();
}

?>

<!doctype html>
<html lang="ru">
<?php require_once __DIR__ . '/components/head.php' ?>
<body>
<?php require_once __DIR__ . '/components/header.php' ?>
<section class="main">
    <div class="container">
        <div class="row">
            <h2 class="display-6 mb-3">Мои заявки</h2>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once __DIR__ . '/templates/ticketCard.php';
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>