<?php
require_once("Buch.php");

$buch = new Buch();
$buch->setBruttoPreis(30);
echo $buch->getNettopreis();