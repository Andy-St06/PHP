<?php
require_once 'konfiguration.php';
require_once 'funktionen.inc.php';
$user = $_SESSION['eingeloggt'];
$username = $user['nickname'];    
?>

<ul>
    <li><a href="index.php">Hauptseite</a></li>
    <li><a href="zeige_eintrag_formular.php">Neuer Eintrag</a></li>
    <li><a href="ausloggen.php">Ausloggen</a></li>
    <li><a href="benutzer_anlegen.php">Benutzer Anlegen</a></li>
</ul>

<p>Eingeloggt als: <a href="benutzerdaten_aender.php"><?php echo $username; ?></a></p>