<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lehrer</title>
</head>

<body>
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>
        <?php foreach ($lehrerinklasse as $lehrer) { ?>
            <tr>
                <td><?= $lehrer->getVorname() ?></td>
                <td><?= $lehrer->getNachname() ?></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?aktion=alleKlassen">Klassen</a>
</body>

</html>