<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Klassen</title>
</head>

<body>
    <table>
        <tr>
            <th>Klasse</th>
            <th>Schüler</th>
            <th>Lehrer</th>
            <th>Schüler Hinzufügen</th>
        </tr>
        <?php foreach ($allklasse as $klasse) { ?>
            <tr>
                <td><?= $klasse->getName() ?></td>
                <td><a href="index.php?aktion=schueler&id=<?= $klasse->getId() ?>">Schüler</a></td>
                <td><a href="index.php?aktion=lehrer&id=<?= $klasse->getId() ?>">Lehrer</a></td>
                <td><a href="index.php?aktion=schuelerHinzufuegen&id=<?= $klasse->getId() ?>">Hinzufügen</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>