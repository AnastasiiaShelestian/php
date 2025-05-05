<?php
$host = 'localhost'; // или другой хост
$dbname = 'movies_db'; // имя твоей базы данных
$user = 'root'; // имя пользователя (чаще всего root в локалке)
$pass = ''; // пароль, если есть

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>