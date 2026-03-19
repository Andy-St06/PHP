<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Raum hinzufügen</title>
</head>

<body>
    <h1>Raum hinzufügen</h1>
    <p><?= $fehler ?></p>
    <form method="post" action="">
        <label>
            Bezeichnung:<br>
            <input type="text" name="bezeichnung" value="<?= $bezeichnung ?>">
        </label>
        <br><br>
        <button type="submit">Speichern</button>
    </form>
    <a href="index.php?aktion=alleRaum">zurück</a>
</body>

</html>