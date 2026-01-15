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
echo "<br>";
echo "<hr>";
$person->setLand("land");
$person->setOrt("Ort");
$person->setStraße("straße");
$person->setStraßenummer("nummer");
$person->setPlz("1579");
$a = Person::findeAlle();
echo $person;   