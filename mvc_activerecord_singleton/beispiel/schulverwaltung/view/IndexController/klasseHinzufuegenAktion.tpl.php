<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schüler hinzufügen</title>
</head>

<body>
    <h1>Neue Klasse erstellen</h1>

    <?php if (!empty($fehler)) : ?>
        <p><?= $fehler ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>
            Name:<br>
            <input type="text" name="name" value="<?= $name ?>">
        </label>
        <br>
        <label>
            Raum:<br>
            <select id="raum_id" name="raum_id">
                <?php foreach ($allraum as $raum) { ?>
                    <option value="<?= $raum->getId() ?>"><?= $raum->getBezeichnung() ?></option>
                    <?php } ?>
            </select>
        </label>
        <br>
        <label>
            klassenlehrer:<br>
            <select id="klassenlehrer" name="klassenlehrer">
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