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
//Titel und Inhalt herausholen
$titel = $eintraege[$i]['titel'];
$inhalt = $eintraege[$i]['inhalt'];


?>
<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Eintrag Editieren</title>
</head>

<body>
    
    <div id="gesamt">
    
        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        
        <div id="inhalt">
            
            <h1>Editieren Sie hier einen Eintrag:</h1>
            
            <form action="speichere_bestehenden_eintrag.php?id=<?=$i?>" method="post">
                <p><input type="text" name="titel" id="titel" value="<?= $titel ?>" /></p>
                <p><textarea name="inhalt" id="eintrag" cols="50" rows="10"><?= $inhalt ?></textarea></p>
                <p><input type="submit" value="Eintragen" /></p>
            </form>
            
        </div>
        
        <div id="menu">
            <?php require 'includes/hauptmenu.php'; ?>
        </div>
        
        <div id="fuss">
            Das ist das Ende
        </div>
            
    </div>

</body>

</html>