<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/../hendlers.php';

// Получаем данные
$title = trim($_POST['title'] ?? '');
$category = trim($_POST['category'] ?? '');
$ingredients = trim($_POST['ingredients'] ?? '');
$description = trim($_POST['description'] ?? '');
$tags = $_POST['tags'] ?? [];
$steps = trim($_POST['steps'] ?? '');

$errors = [];

// Простая валидация
if ($title === '')
    $errors['title'] = 'Введите название';
if ($category === '')
    $errors['category'] = 'Выберите категорию';
if ($ingredients === '')
    $errors['ingredients'] = 'Введите ингредиенты';
if ($description === '')
    $errors['description'] = 'Введите описание';
if ($steps === '')
    $errors['steps'] = 'Введите шаги';

// При ошибках — сохраняем и перенаправляем
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    header('Location: ../../public/recipe/create.php');
    exit;
}

// Сохраняем рецепт
$recipe = [
    'title' => $title,
    'category' => $category,
    'ingredients' => $ingredients,
    'description' => $description,
    'tags' => $tags,
    'steps' => $steps,
    'created_at' => date('Y-m-d H:i'),
];

file_put_contents(__DIR__ . '/../../storage/recipes.txt', json_encode($recipe, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);

header('Location: ../../public/index.php');
exit;
