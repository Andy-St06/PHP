<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lehrer zu Klasse hinzufügen</title>
</head>

<body>
    <h1>Lehrer zu Klasse hinzufügen</h1>
    <p><?= $fehler ?></p>
    <form method="POST" action="">
        <label>
            Lehrer:<br>
            <select type="text" name="lehrer">
                <?php foreach ($alllehrer as $lehrer) { ?>
                    <option value="<?= $lehrer->getId() ?>"><?= $lehrer->getNachname() ?> <?= $lehrer->getVorname() ?></option>
                <?php } ?>
            </select>
        </label>
        <input name="klasseid" type="hidden" value="<?= $klasseid ?>">
        <br><br>
        <button type="submit">Speichern</button>
    </form>
    <a href="index.php?aktion=alleKlassen">zurück</a>
</body>

</html>