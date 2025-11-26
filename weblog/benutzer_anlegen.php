<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();
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
            <form action="benutzer_erstellen" method="post">
                <p><label id="benutzername">Benutzername: </label><input type="text" name="benutzername" id="benutzername" /></p>
                <p><label id="vorname">Vorname: </label><input type="text" name="vorname" id="vorname" /></p>
                <p><label id="nachname">Nachname: </label><input type="text" name="nachname" id="nachname" /></p>
                <p><label id="passwort">Passwort: </label><input type="password" name="passwort" id="passwort" /></p>
                <p><input type="submit" value="Registrieren" class="button" /></p>
            </form>
        </div>

        <div id="menu">
            <?php
            /**
             * Zeige das Login-Formular, wenn der Benutzer noch nicht eingeloggt ist,
             * ansonsten das Hauptmenu.
             */

            require 'includes/loginformular.php';

            ?>
        </div>

        <div id="fuss">
            Das ist das Ende
        </div>

    </div>

</body>

</html>