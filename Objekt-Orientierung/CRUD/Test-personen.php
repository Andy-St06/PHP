<?php
require_once('Person.php');

$person = new Person();
$person->setNachname("found");
$person->setVorname("ABC");
echo $person->speichere();
echo "<br>";
echo $person->zaehle();
echo "<br>";
echo $person->__toString();
echo "<br>";
$a = Person::findeNachVorname("ABC");
var_dump($a);