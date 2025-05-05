<?php

require_once '../vendor/autoload.php';

// Подключение к Redis
try {
    $redis = new Predis\Client();
    $redis->connect('127.0.0.1', 6379);
} catch (Exception $e) {
    die("Ошибка при подключении к Redis: " . $e->getMessage());
}

// Подключение к базе данных
require_once __DIR__ . '/../db/db.php';

try {
    // Получаем все фильмы из базы данных
    $stmt = $pdo->prepare("SELECT * FROM movies ORDER BY id DESC");
    $stmt->execute();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Ошибка при получении фильмов: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Список фильмов</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <div class="container">
        <h1>Список фильмов</h1>

        <div style="text-align: center; margin-bottom: 20px;">
            <a href="/add.php" class="btn">Добавить фильм</a>
        </div>

        <?php if (!empty($movies)): ?>
            <div class="movie-list">
                <?php foreach ($movies as $movie): ?>
                    <div class="movie-card">
                        <img src="<?= htmlspecialchars($movie['poster'] ?? '/assets/images/default.jpg') ?>" alt="Постер">
                        <h2><?= htmlspecialchars($movie['title']) ?></h2>
                        <p><strong>Год:</strong> <?= htmlspecialchars($movie['year']) ?></p>
                        <p><strong>Жанр:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
                        <p><strong>Режиссёр:</strong> <?= htmlspecialchars($movie['director']) ?></p>
                        <p><strong>Описание:</strong> <?= htmlspecialchars($movie['description']) ?></p>

                        <?php
                        // Получаем количество просмотров из Redis для этого фильма
                        $views = $redis->get("movie:{$movie['id']}:views");
                        $views = $views ? $views : 0; // Если просмотров нет, устанавливаем в 0
                        ?>

                        <div class="actions">
                            <a href="/edit.php?id=<?= $movie['id'] ?>" class="btn small">Редактировать</a>
                            <a href="/delete.php?id=<?= $movie['id'] ?>" class="btn small danger">Удалить</a>
                            <a href="details.php?id=<?= $movie['id'] ?>" class="btn small">Подробнее</a>
                            <p><strong>Количество просмотров: </strong><?= $views ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Фильмы не найдены.</p>
        <?php endif; ?>
    </div>
</body>

</html>