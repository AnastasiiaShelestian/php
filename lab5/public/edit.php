<?php
require_once __DIR__ . '/../db/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID фильма не указан.");
}

try {
    // Подготовленный запрос для получения фильма
    $stmt = $pdo->prepare("SELECT * FROM movies WHERE id = ?");
    $stmt->execute([$id]);
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$movie) {
        die("Фильм не найден.");
    }
} catch (PDOException $e) {
    die("Ошибка при получении фильма: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Редактировать фильм</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <div class="container">
        <h1>Редактировать фильм</h1>
        <form action="/update.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($movie['id']) ?>">

            <label>Название:
                <input type="text" name="title" value="<?= htmlspecialchars($movie['title']) ?>" required>
            </label>
            <label>Год:
                <input type="number" name="year" value="<?= htmlspecialchars($movie['year']) ?>" required>
            </label>
            <label>Жанр:
                <input type="text" name="genre" value="<?= htmlspecialchars($movie['genre']) ?>" required>
            </label>
            <label>Режиссёр:
                <input type="text" name="director" value="<?= htmlspecialchars($movie['director']) ?>" required>
            </label>
            <label>Описание:
                <textarea name="description" required><?= htmlspecialchars($movie['description']) ?></textarea>
            </label>
            <label>Постер (ссылка):
                <input type="text" name="poster" value="<?= htmlspecialchars($movie['poster']) ?>">
            </label>

            <button type="submit" class="btn">Обновить</button>
            <a href="/" class="btn">Назад</a>
        </form>
    </div>
</body>

</html>