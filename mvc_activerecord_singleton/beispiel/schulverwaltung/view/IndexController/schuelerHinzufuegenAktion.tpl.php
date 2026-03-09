<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schüler hinzufügen</title>
</head>

<body>
    <h1>Schüler zur Klasse hinzufügen</h1>

    <?php if (!empty($fehler)) : ?>
        <p><?= $fehler ?></p>
    <?php endif; ?>

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
        <br>
        <label>
            Geburtsdatum:<br>
            <input type="date" name="geburtsdatum" value="<?= $geburtsdatum ?>">
        </label>
        <br><br>
        <button type="submit">Speichern</button>
    </form>

    <a href="index.php?aktion=schueler&id=<?= $klasse->getId() ?>">zurück</a>
</body>

</html>