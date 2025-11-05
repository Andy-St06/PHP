<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();
$user = trim($_POST['benutzername']);
$psw = trim($_POST['passwort']);

if (login($user, $psw)) {
    // Wenn ja, logge den Benutzer ein
    logge_ein($user);
}


/*
     * Leite zu index.php um. Der Besucher wird entweder das Login-Formular
     * sehen, wenn die Daten falsch waren, oder das Hauptmenu, wenn der Login
     * erfolgreich war. 
     */
header('Location: index.php');
