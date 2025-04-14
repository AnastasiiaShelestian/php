<?php

$dir = "image/";

$files = scandir($dir);

if ($files === false) {
    return;
}


//echo "<pre>";
//print_r($files);
//echo "</pre>";

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANETS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header,
        footer {
            background-color: rgb(26, 5, 101);
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        nav {
            background-color: rgb(35, 9, 128);
            overflow: hidden;
            text-align: center;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            display: inline-block;
        }

        nav a:hover {
            background-color: rgb(42, 11, 152);
        }

        .planets {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 20px;
            justify-content: center;
        }

        .planets img {
            width: 300px;
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: 3px solidrgb(53, 51, 46);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>

    <header>
        <h1>Planets</h1>
    </header>

    <nav>
        <a href="#">Planets</a>
        <a href="#">About us </a>
        <a href="#">Contacts</a>
    </nav>

    <div class="planets">
        <?php
        for ($i = 0; $i < count($files); $i++) {
            if (($files[$i] != ".") && ($files[$i] != "..")) {
                $path = $dir . "/" . $files[$i]; ?>
                <img border='1' src=<?php echo $path ?>>
                <?php
            }
        }
        ?>
    </div>


    <footer>
        <p>© 2025</p>
    </footer>

</body>

</html>