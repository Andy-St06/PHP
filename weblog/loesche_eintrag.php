<?php
session_start();
//einbinden von Funktionen und Konfiguration aus anderern Datein 
require_once 'includes/funktionen.inc.php';
require_once 'includes/konfiguration.php';

//sicherheitscheck
if( ! ist_eingeloggt()){
    header("Location: index.php");
    exit;
}

//holen der eintrage in absteigender Reihenfolge
$eintraege = hole_eintraege(true);
//Gewünschte id herholen
$i = $_GET['id'];

//löschen des Eintrages an Stelle $i
unset($eintraege[$i]);

//zurück speichern
$eintraege = array_reverse($eintraege);
file_put_contents(PFAD_EINTRAEGE, serialize($eintraege));

//um auf die Startseite zurückzukommen
header("Location: index.php");




?>