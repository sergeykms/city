<?php
$config = require_once __DIR__ . "/../config/db-config.php";
try {
    $db = new PDO("{$config['driver']}:host={$config['host']};dbname={$config['db-name']};port={$config['port']}", $config['user'], $config['password']);

} catch (\PDOException $exception) {
    require_once __DIR__ . '/../components/db-connect-error.php';
    die();
};

//const DB_HOST = "localhost";
//const DB_USER = "u2117300_admin";
//const DB_PASS = "123qweqaz";
//const DB_NAME = "u2117300_test";
//
//$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//try {
//    $db = new PDO('mysql:host=localhost;dbname=u2117300_test', 'u2117300_admin', '123qweqaz');
//} catch (\PDOException $exception) {
//    require_once __DIR__ . '/../components/db-connect-error.php';
//    die();
//};