<?php
// Подключение к базе данных
require_once __DIR__ . '/../db/db.php';

// Подключение к Redis
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// Получаем ID фильма из URL (например, details.php?id=1)
$movieId = $_GET['id'] ?? null;

if (!$movieId) {
    die("ID фильма не указан.");
}

// Получаем информацию о фильме из базы данных
try {
    $stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
    $stmt->execute([$movieId]);
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$movie) {
        die("Фильм не найден.");
    }
} catch (PDOException $e) {
    die("Ошибка при получении фильма: " . $e->getMessage());
}

// Увеличиваем количество просмотров в Redis для этого фильма
$redis->incr("movie:$movieId:views");

// Выводим информацию о фильме
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($movie['title']) ?></title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <div class="container">
        <h1><?= htmlspecialchars($movie['title']) ?></h1>
        <div class="movie-details">
            <img src="<?= htmlspecialchars($movie['poster'] ?? '/assets/images/default.jpg') ?>" alt="Постер"
                class="movie-poster">
            <div class="movie-info">
                <p><strong>Год:</strong> <?= htmlspecialchars($movie['year']) ?></p>
                <p><strong>Жанр:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                <p><strong>Режиссёр:</strong> <?= htmlspecialchars($movie['director']) ?></p>
                <p><strong>Описание:</strong> <?= htmlspecialchars($movie['description']) ?></p>
                <p><strong>Просмотры:</strong> <?= $redis->get("movie:$movieId:views") ?></p>
            </div>
        </div>
        <a href="index.php" class="btn">Вернуться на главную</a>
    </div>
</body>

</html>