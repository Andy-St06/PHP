<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schüler</title>
</head>

<body>
    <nav>
        <a href="index.php?aktion=alleRaum">Raum</a><br>
        <a href="index.php?aktion=alleKlassen">Klassen</a><br>
        <a href="index.php?aktion=alleLehrer">Lehrer</a><br>
        <a href="index.php?aktion=alleSchueler">Schueler</a>
    </nav>
    <h1>Alle Schüler</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>
        <?php foreach ($allschueler as $schueler) { ?>
            <tr>
                <td><?= $schueler->getId() ?></td>
                <td><?= $schueler->getVorname() ?></td>
                <td><?= $schueler->getNachname() ?></td>
                <td><?= $schueler->getGebutsdatum() ?></td>
                <td><a href="index.php?aktion=alleKlassen"><?= $schueler->getKlasse() ?></a></td>
            </tr>
        <?php } ?>
    </table>
    <nav>
        <a href="index.php?aktion=newSchueler">Neuen Schüler hinzufügen</a>
    </nav>
</body>

</html>