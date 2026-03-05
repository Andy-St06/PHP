<?php

require_once 'model/funktionen.inc.php';
spl_autoload_register('autoloadControllers');
spl_autoload_register('autoloadEntities');
spl_autoload_register('autoloadTraits');

#var_dump(Lehrer::findeAlle());
#var_dump(Klasse::findeAlle());
#var_dump(Schueler::findeAlle());
#var_dump(Raum::findeAlle());
#var_dump(Klasse::finde(1)->getKlassenlehrer());
#var_dump(Klasse::finde(1)->getRaum());
#var_dump(Schueler::finde(1)->getKlasse());
var_dump(Klasse::finde(1)->getLehrer());
var_dump(Lehrer::finde(1)->getKlassen());