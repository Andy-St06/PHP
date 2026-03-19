<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schüler hinzufügen</title>
</head>

<body>
    <h1>Schüler zur Klasse hinzufügen</h1>
    <h3><?=  $klasse->getName() ?></h3>
    <p><?= $fehler ?></p>
    <form method="post" action="">
        <label>
            Schüler:<br>
            <select type="text" name="schuelerid">
                <?php foreach ($allschueler as $schueler) { ?>
                    <option value="<?= $schueler->getId() ?>"><?= $schueler->getVorname() ?> <?= $schueler->getNachname() ?></option>
                <?php } ?>
            </select>
        </label>
        <input type="hidden" name="klasseid" value="<?= $klasse->getId() ?>">
        <br><br>
        <button type="submit">Speichern</button>
    </form>
    <a href="index.php?aktion=alleKlassen">zurück</a>
</body>
</html>