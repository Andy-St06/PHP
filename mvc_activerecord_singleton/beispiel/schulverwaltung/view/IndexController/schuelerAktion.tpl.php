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
            <th>Entfernen</th>
        </tr>
        <?php foreach ($schuelerinklasse as $schueler) { ?>
            <tr>
                <td><?= $schueler->getVorname() ?></td>
                <td><?= $schueler->getNachname() ?></td>
                <td><?= $schueler->getGebutsdatum() ?></td>
                <td><a href="index.php?aktion=schuelerEntfernen&id=<?= $schueler->getId() ?>&id2=<?= $_GET['id'] ?>">&times;</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?aktion=alleKlassen">Klassen</a>
</body>

</html>