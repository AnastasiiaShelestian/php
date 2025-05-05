<?php
require_once __DIR__ . '/../db/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID фильма не указан.");
}

try {
    // Подготовленный запрос для удаления фильма
    $stmt = $pdo->prepare("DELETE FROM movies WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: /");
    exit;
} catch (PDOException $e) {
    die("Ошибка при удалении: " . $e->getMessage());
}
?>