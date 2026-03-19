<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lehrer hinzufügen</title>
</head>

<body>
    <h1>Lehrer hinzufügen</h1>
    <p><?= $fehler ?></p>
    <form method="post" action="">
        <label>
            Vorname:<br>
            <input type="text" name="vorname" value="<?= $vorname ?>">
        </label>
        <br>
        <label>
            Nachname:<br>
            <input type="text" name="nachname" value="<?= $nachname ?>">
        </label>
        <br><br>
        <button type="submit">Speichern</button>
    </form>
    <a href="index.php?aktion=alleLehrer">zurück</a>
</body>

</html>