<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();
$user = trim($_POST['benutzername']);
$psw = trim($_POST['passwort']);
$erg = login($user, $psw);
if ($erg != null) {
    // Wenn ja, logge den Benutzer ein
    logge_ein($erg);
}

header('Location: index.php');
