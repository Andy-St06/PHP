<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Raum</title>
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
            <th>Bezeichnung</th>
        </tr>
        <?php foreach ($allraum as $raum) { ?>
            <tr>
                <td><?= $raum->getId() ?></td>
                <td><?= $raum->getBezeichnung() ?></td>
            </tr>
        <?php } ?>
    </table>
    <nav>
        <a href="index.php?aktion=raumHinzufuegen">Neuen Raum hinzufügen</a>
    </nav>
</body>

</html>