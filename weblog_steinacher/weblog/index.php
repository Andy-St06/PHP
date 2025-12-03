<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();

// In Blogs werden Einträge immer in umgekehrter Reihenfolge angezeigt
$eintraege = hole_eintraege(true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Einträge</title>
</head>

<body>

    <div id="gesamt">

        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>

        <div id="inhalt">

            <?php foreach ($eintraege as $i => $e): ?>
                <h1><?php echo htmlspecialchars($e['titel']); ?></h1>
                <?php echo nl2br(htmlspecialchars($e['inhalt'])); ?>

                <p class="eintrag_unten">
                    <span>
                        geschrieben von
                        <?php echo $e['vorname']; ?>
                        <?php echo $e['nachname']; ?>
                        am <?= get_Date(strtotime($e['erstellt_am'])) ?>
                        um <?= get_Time(strtotime($e['erstellt_am'])); ?>
                        <?php if (darf_tun($e['nickname'])) { ?>
                            <a href="loesche_eintrag.php?id=<?= $e['id'] ?>">X</a>
                            <a href="edit_eintrag.php?id=<?= $e['id'] ?>">E</a>
                        <?php } ?>
                    </span>
                </p>
            <?php endforeach; ?>

        </div>

        <div id="menu">
            <?php
            /**
             * Zeige das Login-Formular, wenn der Benutzer noch nicht eingeloggt ist,
             * ansonsten das Hauptmenu.
             */
            if (ist_eingeloggt()) {
                require 'includes/hauptmenu.php';
            } else {
                require 'includes/loginformular.php';
            }
            ?>
        </div>

        <div id="fuss">
            Das ist das Ende
        </div>

    </div>

</body>

</html>