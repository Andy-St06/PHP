<?php
    require_once 'includes/konfiguration.php';
    require_once 'includes/funktionen.inc.php';
    session_start();
    
    /*
     * Wenn der Benutzer nicht eingeloggt ist oder die Seite nicht
     * über POST aufgerufen, also das Formular nicht abgeschickt wurde, 
     * leite auf index.php um. 
     */
    if ( (! ist_eingeloggt()) || (empty($_POST)) ) {
        header('Location: index.php');
        exit;
    }

    $db = getConnection();
    $titel = trim($_POST['titel']);
    $inhalt = trim($_POST['inhalt']);
    $user = $_SESSION['eingeloggt'];
    $erstellt = time();
    $userid = $user['id'];
    // Erstelle einen neuen Eintrag im Format der anderen Einträge
    
    $sql = "INSERT INTO eintrag (titel, inhalt, autor_id, erstellt_am) VALUES ('$titel', '$inhalt', '$userid' ,'$erstellt');";
    $query = $db->query($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Eintrag speichern</title>
</head>

<body>
    
    <div id="gesamt">
    
        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        
        <div id="inhalt">
            
            <h3>Folgender Eintrag wurde erfolgreich gespeichert:</h3>
			<div class="zitat">
            	<h1><?php echo htmlspecialchars($eintrag['titel']); ?></h1>
                <p>
                    <?php echo nl2br(htmlspecialchars($eintrag['inhalt'])); ?>
                </p>
                <p>
	                <a href="index.php" class="backlink">Zurück zur Hauptseite</a>
	            </p>
			</div>
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