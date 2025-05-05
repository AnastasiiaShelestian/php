<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Добавить фильм</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <div class="container">
        <h1>Добавить фильм</h1>
        <form action="/store.php" method="POST">
            <label>Название:
                <input type="text" name="title" required>
            </label>
            <label>Год:
                <input type="number" name="year" required>
            </label>
            <label>Жанр:
                <input type="text" name="genre" required>
            </label>
            <label>Режиссёр:
                <input type="text" name="director" required>
            </label>
            <label>Описание:
                <textarea name="description" required></textarea>
            </label>
            <label>Постер (ссылка):
                <input type="text" name="poster">
            </label>
            <button type="submit" class="btn">Сохранить</button>
            <a href="/" class="btn">Назад</a>
        </form>
    </div>
</body>

</html>