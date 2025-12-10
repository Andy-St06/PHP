 <?php
    require_once 'models/funktionen.inc.php';
    
    // Aktion bestimmen
    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'neu';
    
    // LOGIK
    switch($aktion) {
    	case "zeige":
        	$eintrag = hole_eintrag($_REQUEST['id']);
    		break;
    	case "neu":
                $eintrag = leerer_eintrag();
        	$aktion = 'formular_anzeigen';
    		break;
    	case "speichere":
                speichere_eintrag($_POST);
    		break;
    	case "editiere":
        	$eintrag = hole_eintrag($_REQUEST['id']);
        	$aktion = 'formular_anzeigen';
    		break;	
        	
    }
    
    // SICHT
    require_once 'views/' . $aktion . '.tpl.html';  
?>