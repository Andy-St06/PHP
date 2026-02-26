<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nutzer Anlegen</title>
</head>

<body>
    <form action="index.php?aktion=neuerBenutzer" method="POST">
        <p><?= $fehler ?> </p>
        <label for="anrede">Anrede</label>
        <input for="anrede" type="text" name="anrede" require value="<?= $anrede ?>"><br>
        <label for="vorname">Vorame</label>
        <input for="vorname" type="text" name="vorname" require value="<?= $vorname ?>"><br>
        <label for="name">Nachname</label>
        <input for="name" type="text" name="name" require value="<?= $name ?>"><br>
        <label for="email">Email</label>
        <input for="email" type="email" name="email" require value="<?= $email ?>"><br>
        <label for="passwort">Passwort</label>
        <input type="text" name="passwort" require><br>
        <input type="submit">
    </form>

</body>

</html>