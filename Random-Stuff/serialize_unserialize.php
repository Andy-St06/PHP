<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialize_unserialize</title>
</head>

<body>
    <?php

    $test = array("username" => "hugo", "password" => "hugo4life");
    define("FILE", "daten.txt");
    if (file_exists(FILE)) {
        $daten = unserialize(file_get_contents(FILE));
    }
    $daten[] = $test;
    file_put_contents(FILE, serialize($daten));
    ?>

</body>

</html>