<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();


$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$benutzer = $_POST['benutzername'];
$psw = $_POST['passwort'];

$db = getConnection();
$sql = "INSERT INTO autor (vorname, nachname, nickname, passwort) VALUES ('$vorname', '$nachname', '$benutzer' ,'$psw');";
$query = $db->query($sql);
header('Location: index.php');