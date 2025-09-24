<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personen Ausgabe</title>
</head>

<body>

    <table border="bold">
        <tr>
            <th>Number</th>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>
        <?php foreach ($personen as $key => $person) { ?><tr>
                <td><?= ++$key; ?></td>
                <td><?= $person["Vorname"]; ?></td>
                <td><?= $person["Nachname"]; ?></td>
            </tr>
        <?php } ?>
    </table>  
    <hr>
     <table border="bold">
        <tr>
            <th>Number</th>
            <th>Vorname</th>
        </tr>
        <?php foreach ($vorname as $key => $value) { ?><tr>
                <td><?= ++$key; ?></td>
                <td><?= $value; ?></td>
            </tr>
        <?php } ?>
    </table>  
</body>

</html>