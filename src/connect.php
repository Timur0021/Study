<?php

$driver = "mysql";
$host = "localhost";
$db_name = "study";
$db_user = "root";
$db_pass = "password";
$charset = "utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
try {
    $pdo = new PDO(
        "$driver: host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}