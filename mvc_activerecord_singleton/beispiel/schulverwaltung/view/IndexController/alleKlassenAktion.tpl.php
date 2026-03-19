<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Klassen</title>
</head>

<body>
    <nav>
        <a href="index.php?aktion=alleRaum">Raum</a><br>
        <a href="index.php?aktion=alleKlassen">Klassen</a><br>
        <a href="index.php?aktion=alleLehrer">Lehrer</a><br>
        <a href="index.php?aktion=alleSchueler">Schueler</a>
    </nav>
    <h1>Alle Klassen</h1>
    <table>
        <tr>
            <th>Klasse</th>
            <th>Schüler</th>
            <th>Hinzufügen</th>
            <th>Lehrer</th>
            <th>Hinzufügen</th>
        </tr>
        <?php foreach ($allklasse as $klasse) { ?>
            <tr>
                <td><?= $klasse->getName() ?></td>
                <td><a href="index.php?aktion=schueler&id=<?= $klasse->getId() ?>">Schüler</a></td>
                <td><a href="index.php?aktion=schuelerHinzufuegen&id=<?= $klasse->getId() ?>">Hinzufügen</a></td>
                <td><a href="index.php?aktion=lehrer&id=<?= $klasse->getId() ?>">Lehrer</a></td>
                <td><a href="index.php?aktion=lehrerZuKlasseHinzufuegen&id=<?= $klasse->getId() ?>">Hinzufügen</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?aktion=klasseHinzufuegen">Neue Klasse hinzufügen</a>
</body>

</html>