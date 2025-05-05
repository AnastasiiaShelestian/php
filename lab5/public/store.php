<?php
require_once __DIR__ . '/../db/db.php';

// Получение и очистка данных
$title = trim($_POST['title'] ?? '');
$year = (int) ($_POST['year'] ?? 0);
$genre = trim($_POST['genre'] ?? '');
$director = trim($_POST['director'] ?? '');
$description = trim($_POST['description'] ?? '');
$poster = trim($_POST['poster'] ?? '');

if ($title && $year && $genre && $director && $description) {
    try {
        $stmt = $pdo->prepare("INSERT INTO movies (title, year, genre, director, description, poster)
                               VALUES (:title, :year, :genre, :director, :description, :poster)");
        $stmt->execute([
            'title' => $title,
            'year' => $year,
            'genre' => $genre,
            'director' => $director,
            'description' => $description,
            'poster' => $poster ?: null,
        ]);
        header("Location: /");
        exit;
    } catch (PDOException $e) {
        die("Ошибка при добавлении фильма: " . $e->getMessage());
    }
} else {
    die("Пожалуйста, заполните все поля.");
}
