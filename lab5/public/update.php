<?php
require_once __DIR__ . '/../db/db.php';

$title = trim($_POST['title'] ?? '');
$year = (int) ($_POST['year'] ?? 0);
$genre = trim($_POST['genre'] ?? '');
$director = trim($_POST['director'] ?? '');
$description = trim($_POST['description'] ?? '');
$poster = trim($_POST['poster'] ?? '');
$id = (int) ($_POST['id'] ?? 0);

// Валидация данных
if (!$title || !$year || !$genre || !$director || !$description) {
    die("Заполните все обязательные поля.");
}

try {
    // Подготовленный запрос для обновления фильма
    $stmt = $pdo->prepare("UPDATE movies 
                           SET title = :title, year = :year, genre = :genre, director = :director, 
                               description = :description, poster = :poster 
                           WHERE id = :id");
    $stmt->execute([
        'title' => $title,
        'year' => $year,
        'genre' => $genre,
        'director' => $director,
        'description' => $description,
        'poster' => $poster ?: null,
        'id' => $id,
    ]);
    header("Location: /");
    exit;
} catch (PDOException $e) {
    die("Ошибка при обновлении: " . $e->getMessage());
}
?>