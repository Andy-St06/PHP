<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();

$vorname = "";
$nachname = "";
$benutzer = "";
$psw = "";
$error = "";

if ($_POST) {
    if (isset($_POST['vorname']) && isset($_POST['vorname']) && isset($_POST['benutzername']) && isset($_POST['passwort'])) {
        $vorname = $_POST['vorname'];
        $nachname = $_POST['vorname'];
        $benutzer = $_POST['benutzername'];
        $psw = $_POST['passwort'];
        $error = registriren($vorname, $nachname, $benutzer, $psw);
        if ($error) {
            header('Location: index.php');
        } else {
            $error = "Benutzername bereits verwendet";
        }
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Benutzeranlegen</title>
</head>

<body>

    <div id="gesamt">

        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        <div id="inhalt">
            <form action="benutzer_anlegen" method="post">
                <p><?= $error ?></p>
                <p><label id="benutzername">Benutzername: </label><br><input type="text" name="benutzername" id="benutzername" value="<?= $benutzer ?>" /></p>
                <p><label id="vorname">Vorname: </label><br><input type="text" name="vorname" id="vorname" value="<?= $vorname ?>" /></p>
                <p><label id="nachname">Nachname: </label><br><input type="text" name="nachname" id="nachname" value="<?= $nachname ?>" /></p>
                <p><label id="passwort">Passwort: </label><br><input type="password" name="passwort" id="passwort" value="<?= $psw ?>" /></p>
                <p><input type="submit" value="Registrieren" class="button" /></p>
            </form>
        </div>

        <div id="menu">
            <?php
            require 'includes/loginformular.php';
            ?>
        </div>

        <div id="fuss">
            Das ist das Ende
        </div>

    </div>

</body>

</html>