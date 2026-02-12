<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Benutzer</title>
</head>

<body>
    <table>
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Email</th>
            <th>password</th>
            <th>edit</th>
        </tr>
        <?php foreach ($allbenutzer as $person) { ?>
            <tr>
                <td><?= $person->getVorname() ?></td>
                <td><?= $person->getName() ?></td>
                <td><?= $person->getEmail() ?></td>
                <td><?= $person->getPasswort() ?></td>
                <td><a href="index.php?">edit</a></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php?aktion=neuerBenutzer">neuer Benutzer anlegen</a>
</body>

</html>