<?php
declare(strict_types=1);
require_once __DIR__ . '/../../src/handlers.php';

$recipes = loadRecipes();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Все рецепты</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-gray-700 mb-8">Все рецепты</h1>

        <?php if (empty($recipes)): ?>
            <p class="text-center text-xl text-gray-500">Рецептов пока нет.</p>
        <?php else: ?>
            <ul class="space-y-6">
                <?php foreach ($recipes as $recipe): ?>
                    <li class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-800"><?= htmlspecialchars($recipe->title) ?></h2>
                        <p><strong class="text-gray-600">Категория:</strong> <?= htmlspecialchars($recipe->category) ?></p>
                        <p><strong
                                class="text-gray-600">Ингредиенты:</strong><br><?= nl2br(htmlspecialchars($recipe->ingredients)) ?>
                        </p>
                        <p><strong
                                class="text-gray-600">Описание:</strong><br><?= nl2br(htmlspecialchars($recipe->description)) ?>
                        </p>
                        <p><strong class="text-gray-600">Тэги:</strong>
                            <?= htmlspecialchars(implode(', ', $recipe->tags ?? [])) ?></p>
                        <p><strong class="text-gray-600">Шаги:</strong><br><?= nl2br(htmlspecialchars($recipe->steps)) ?></p>
                        <p><em class="text-gray-500">Добавлено: <?= $recipe->created_at ?? '—' ?></em></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <p class="text-center mt-6"><a href="../../index.php" class="text-indigo-600 hover:text-indigo-800">На
                главную</a></p>
    </div>
</body>

</html>