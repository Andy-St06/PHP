<?php 
$text = "Hallo";
$bool = true;
$zahl = 14;
$kommazahl = 14.5;
$array = array("a","u");            //indiziertes Array
$array[] = "z";
$person["vorname"] = "Hugo";        //asoziatives Array
$person["nachname"] = "Patschugo";

echo $zahl++.'<br>'; //ausgabe 14 postfix
echo ++$zahl; //ausgabe 16 prefix
?>
