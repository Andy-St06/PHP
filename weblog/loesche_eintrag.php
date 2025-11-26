<?php
session_start();
//einbinden von Funktionen und Konfiguration aus anderern Datein 
require_once 'includes/funktionen.inc.php';
require_once 'includes/konfiguration.php';

//sicherheitscheck
if (! ist_eingeloggt()) {
    header("Location: index.php");
    exit;
}

//Gewünschte id herholen
$i = $_GET['id'];

//löschen des Eintrages an Stelle $i
$db = getConnection();
$sql = "DELETE FROM eintrag WHERE id='$i'";
$query = $db->query($sql);
if ($query->rowCount() === 1) {
    //um auf die Startseite zurückzukommen
    header("Location: index.php");
}else{
    echo "Datensatz wurde nicht gelöscht";
}

