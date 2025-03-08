<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab-2</title>
</head>

<body>
    <div>
        <?php

        $a = 0;
        $b = 0;

        for ($i = 0; $i <= 5; $i++) {
            $a += 10;
            $b += 5;
            echo "a = $a <br> b = $b <br>";
        }

        echo "End of the loop: a = $a, b = $b";
        ?>
    </div>
    <div>
        <?php
        $a = 0;
        $b = 0;
        $i = 0;

        while ($i <= 5) {
            $i++;
            $a += 10;
            $b += 5;
            echo "a = $a <br> b = $b <br>";
        }
        echo "End of the loop: a = $a, b = $b";
        ?>
    </div>
    <div>
        <?php

        $a = 0;
        $b = 0;
        $i = 0;


        do {
            $a += 10;
            $b += 5;
            echo "a = $a <br> b = $b <br>";
            $i++;
        }

        while ($i <= 5);

        echo "End of the loop: a = $a, b = $b";
        ?>

    </div>

</body>

</html>