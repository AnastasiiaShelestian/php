<?php
declare(strict_types=1);

// Подключаем вспомогательные функции
require_once __DIR__ . '/../src/handlers.php';

// Загружаем рецепты
$recipes = loadRecipes();
$latestRecipes = array_slice($recipes, -2); // последние два рецепта
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Recipe Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-orange-100 via-pink-100 to-red-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl p-10 max-w-lg w-full text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">🍽️ Книга рецептов</h1>
        <p class="text-gray-600 mb-8">Храни, добавляй и делись своими любимыми рецептами</p>

        <div class="space-y-4">
            <a href="recipe/create.php"
                class="block w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                ➕ Добавить рецепт
            </a>
            <a href="recipe/index.php"
                class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                📖 Посмотреть рецепты
            </a>
        </div>
    </div>
</body>

</html>