<?php
require_once("Mensch.php");
require_once("Hund.php");
require_once("Auto.php");
require_once("LKW.php");
$lauteInRomstraße[] = new Mensch("Andy", 19, "Mann");
$lauteInRomstraße[] = new Hund("Bello", 4, "Rot");
$lauteInRomstraße[] = new Auto("BMW", 5, 1);
$lauteInRomstraße[] = new LKW("Ford", 0);
foreach ($lauteInRomstraße as $value) {
    echo $value->gereusch();
    echo "<br>";
    echo $value;
    echo "<br>";
}
