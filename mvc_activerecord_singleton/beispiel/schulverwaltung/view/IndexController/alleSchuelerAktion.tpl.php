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
                <!--TODO-->
                <td><a href=""><?= $schueler->getKlasse() ?></a></td>
            </tr>
        <?php } ?>
    </table>
    <nav>
        <a href="index.php?aktion=lehrerHinzufuegen">Neuen Lehrer hinzufügen</a>
    </nav>
</body>

</html>