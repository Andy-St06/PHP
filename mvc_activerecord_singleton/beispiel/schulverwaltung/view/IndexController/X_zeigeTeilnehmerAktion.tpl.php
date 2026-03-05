<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Teilnehmer</title>
</head>

<body>
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Email</th>
            <th>Seminartermine</th>
            <th>Austreten</th>
        </tr>
        <?php foreach ($teilnehmer as $person) { ?>
            <tr>
                <td><?= $person->getVorname() ?></td>
                <td><?= $person->getName() ?></td>
                <td><?= $person->getEmail() ?></td>
                <td><a href="index.php?aktion=zeigeSeminare&id=<?= $person->getId() ?>">Seminare</a></td>
                <td><a href="index.php?aktion=entferneBenutzerAusSeminar&id=<?= $person->getId() ?>&id2=<?= $seminartermin->getID() ?>">X</a></td>
            </tr>   
        <?php } ?>
    </table>
</body>

</html>