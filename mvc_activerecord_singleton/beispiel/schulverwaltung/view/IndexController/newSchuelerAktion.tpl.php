<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schüler hinzufügen</title>
</head>

<body>
    <h1>Neuen Schüler erstellen</h1>
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
        <br>
        <label>
            Geburtsdatum:<br>
            <input type="date" name="geburtsdatum" value="<?= $geburtsdatum ?>">
        </label>
        <br>
        <label>Klasse:<br>
            <select id="klasse" name="klasse">
                <?php foreach ($allKlasse as $klasse) { ?>
                    <option value="<?= $klasse->getId() ?>"><?= $klasse->getName() ?></option>
                <?php } ?>
            </select>
        </label>
        <br><br>
        <button type="submit">Speichern</button>
    </form>
    <a href="index.php?aktion=alleSchueler">zurück</a>
</body>

</html>