<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lehrer</title>
</head>

<body>
    <nav>
        <a href="index.php?aktion=alleRaum">Raum</a><br>
        <a href="index.php?aktion=alleKlassen">Klassen</a><br>
        <a href="index.php?aktion=alleLehrer">Lehrer</a><br>
        <a href="index.php?aktion=alleSchueler">Schueler</a>
    </nav>
    <h1>Alle Lehrer</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>
        <?php foreach ($alllehrer as $lehrer) { ?>
            <tr>
                <td><?= $lehrer->getId() ?></td>
                <td><?= $lehrer->getVorname() ?></td>
                <td><?= $lehrer->getNachname() ?></td>
            </tr>
        <?php } ?>
    </table>
    <nav>
        <a href="index.php?aktion=lehrerHinzufuegen">Neuen Lehrer hinzufügen</a>
    </nav>
</body>

</html>