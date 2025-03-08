<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>

<body>
    <?php
    $today = date("l", strtotime("now"));
    $isDayOfWeekOdd = $today == "Monday" or $today == "Wedensday" or $today == "Friday";
    $isDayOfWeekEven = !($isDayOfWeekOdd or $today == "Sunday");
    ?>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Worcing hours</th>
        </tr>
        <tr>
            <td>John Styles</td>
            <th><?php echo $isDayOfWeekOdd ? "8:00-12:00" : "Нерабочий день" ?></th>
        </tr>
        <tr>
            <td>Jane Doe</td>
            <th><?php echo $isDayOfWeekEven ? "12:00-16:00" : "Нерабочий день" ?></th>
        </tr>

</body>

</html>