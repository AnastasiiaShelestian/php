<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$formData = $_SESSION['form_data'] ?? [];
session_unset();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Добавить рецепт</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-md mt-8">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Добавить рецепт</h1>
        <form action="../../src/handlers/handle_create.php" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Название рецепта</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="<?= htmlspecialchars($formData['title'] ?? '') ?>">
                <div class="text-red-500 text-xs"><?= $errors['title'] ?? '' ?></div>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Категория</label>
                <select name="category" id="category"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php
                    $categories = ['Завтрак', 'Обед', 'Ужин'];
                    foreach ($categories as $cat):
                        $selected = ($formData['category'] ?? '') === $cat ? 'selected' : '';
                        ?>
                        <option value="<?= $cat ?>" <?= $selected ?>><?= $cat ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-red-500 text-xs"><?= $errors['category'] ?? '' ?></div>
            </div>

            <div class="mb-4">
                <label for="ingredients" class="block text-sm font-medium text-gray-700">Ингредиенты</label>
                <textarea name="ingredients" id="ingredients" rows="5"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?= htmlspecialchars($formData['ingredients'] ?? '') ?></textarea>
                <div class="text-red-500 text-xs"><?= $errors['ingredients'] ?? '' ?></div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <textarea name="description" id="description" rows="5"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?= htmlspecialchars($formData['description'] ?? '') ?></textarea>
                <div class="text-red-500 text-xs"><?= $errors['description'] ?? '' ?></div>
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700">Тэги</label>
                <select name="tags[]" id="tags" multiple
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php
                    $tagOptions = ['Быстро', 'Постное', 'Веган'];
                    foreach ($tagOptions as $tag):
                        $selected = in_array($tag, $formData['tags'] ?? []) ? 'selected' : '';
                        ?>
                        <option value="<?= $tag ?>" <?= $selected ?>><?= $tag ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="steps" class="block text-sm font-medium text-gray-700">Шаги приготовления</label>
                <textarea name="steps" id="steps" rows="5"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Каждый шаг с новой строки"><?= htmlspecialchars($formData['steps'] ?? '') ?></textarea>
                <div class="text-red-500 text-xs"><?= $errors['steps'] ?? '' ?></div>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Отправить</button>
        </form>
        <p class="mt-4 text-center"><a href="../../index.php" class="text-indigo-600 hover:text-indigo-800">Назад</a>
        </p>
    </div>
</body>

</html>ы