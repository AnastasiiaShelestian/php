<?php
// Проверка, передан ли ID фильма
$id = $_GET['id'] ?? null;
if (!$id)
    die("ID фильма не указан");

// Подключение к Redis
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// Ключ для хранения счетчика просмотров
$viewsKey = "movie:$id:views";

// Увеличиваем счетчик просмотров в Redis
$redis->incr($viewsKey);

// Получаем текущие просмотры из Redis
$views = $redis->get($viewsKey);

// Подключаемся к MySQL для получения данных о фильме
$conn = new mysqli("localhost", "root", "", "movies_db");
$stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie)
    die("Фильм не найден");

// Закрываем подключение к MySQL
$stmt->close();
$conn->close();
?>

<h1><?= htmlspecialchars($movie['title']) ?></h1>
<p><strong>Жанр:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
<p><strong>Описание:</strong> <?= htmlspecialchars($movie['description']) ?></p>
<p><strong>Рейтинг:</strong> <?= $movie['rating'] ?? 'Не указан' ?></p>
<p><strong>Просмотров:</strong> <?= $views ?></p>

<a href="index.php">← Назад к списку</a>