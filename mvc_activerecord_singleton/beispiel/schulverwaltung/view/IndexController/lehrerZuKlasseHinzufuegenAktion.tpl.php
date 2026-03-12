<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lehrer zu Klasse hinzufügen</title>
</head>

<body>
    <h1>Lehrer zu Klasse hinzufügen</h1>

    <?php if (!empty($fehler)) : ?>
        <p><?= $fehler ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label>
            Lehrer:<br>
            <select type="text" name="lehrer">
                <?php foreach ($alllehrer as $lehrer) { ?>
                    <option value="<?= $lehrer->getId() ?>"><?= $lehrer->getNachname() ?> <?= $lehrer->getVorname() ?></option>
                <?php } ?>
            </select>
        </label>
        <br><br>
        <button type="submit">Speichern</button>
    </form>

    <a href="index.php?aktion=alleKlassen">zurück</a>
</body>

</html>