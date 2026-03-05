<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schüler</title>
</head>

<body>
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Geburtsdatum</th>
        </tr>
        <?php foreach ($schuelerinklasse as $schueler) { ?>
            <tr>
                <td><?= $schueler->getVorname() ?></td>
                <td><?= $schueler->getNachname() ?></td>
                <td><?= $schueler->getGebutsdatum() ?></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?aktion=alleKlassen">Klassen</a>
</body>

</html>