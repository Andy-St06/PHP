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
function foo ($a, $b = "ohne b"){
echo "$a $b\n";
}

?><hr><?php

foo("test", "mit b"); // Ergebnis: “test mit b”
foo("test"); // Ergebnis: “test ohne b”

?><hr><?php

function test(&$parameter){ //mit & wird von call by value zu call by referenz
    $parameter++;
}
$value = 5;
test($value);
echo $value;
?><hr><?php
function foo2(){
    static $done = false;
    if(!$done){
        $done = true;
        echo "Aufruf";
    }
}

foo2();
foo2();
?>
