<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();
//Schauen ob eingelogt ansosten zurück auf index.php
if ((! ist_eingeloggt())) {
    header('Location: index.php');
    exit;
}
//Variblen inizialisieren
$vorname = "";
$nachname = "";
$benutzer = "";
$psw = "";
$message = "";
//Daten aus der Session holen
$daten = $_SESSION["eingeloggt"];
if (!$_POST) { //wenn noch nicht geposted wurde   
    //Variblen befüllen sodas etwas angezeigt wird
    $vorname = $daten["vorname"];
    $nachname = $daten["nachname"];
    $benutzer = $daten["nickname"];
} else { //wenn geposted wurde
    if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['benutzername']) && isset($_POST['passwort'])) {
        //Eingabe in Variablen schreiben
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $benutzer = $_POST['benutzername'];
        $psw = $_POST['passwort'];
        if ($vorname != "" && $nachname != "" && $benutzer != "") { //schauen ob eingabe nicht leer ist
            $message = benutzerandern($daten, $vorname, $nachname, $benutzer, $psw);
        } else {
            $message = "Bitte keine Leer Felder zurücklassen!";
        }
    } else {
        $message = "Sie müssen alle Felder ausfüllen!";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Benutzerdaten Ändern</title>
</head>

<body>

    <div id="gesamt">

        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        <div id="inhalt">
            <form action="benutzerdaten_aender.php" method="post">
                <p><?= $message ?></p>
                <p><label id="benutzername">Benutzername: </label><br><input type="text" name="benutzername" id="benutzername" value="<?= $benutzer ?>" /></p>
                <p><label id="vorname">Vorname: </label><br><input type="text" name="vorname" id="vorname" value="<?= $vorname ?>" /></p>
                <p><label id="nachname">Nachname: </label><br><input type="text" name="nachname" id="nachname" value="<?= $nachname ?>" /></p>
                <p><label id="passwort">Passwort: </label><br><input type="password" name="passwort" id="passwort" value="<?= $psw ?>" /></p>
                <p><input type="submit" value="Ändern" class="button" /></p>
            </form>
        </div>

        <div id="menu">
            <?php
            require 'includes/hauptmenu.php';
            ?>
        </div>

        <div id="fuss">
            Das ist das Ende
        </div>

    </div>

</body>

</html>