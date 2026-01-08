
<?php
require_once("Stadt.php");
$meran = new Stadt("Meran", '39012',5000,"Bozen");
echo $meran;
$bruneck = new Stadt("Bruneck", '39012',5000,"Bozen");
echo $bruneck;
$bozen = new Stadt("Bozen", '39012',5000,"Bozen");
echo $bozen;
unset($bozen);
echo Stadt::getAnzahl();
echo "<br>";
echo $bruneck->getStadtProvinz();
?>