<?php
require_once("quadrat.php");
require_once("rechteck.php");
$quadrat = new Quadrat(10);
echo "Umfang: ".$quadrat->berechneUmfang();
echo "<br>";
echo "Fläche: ".$quadrat->berechneFlaeche();
echo "<br>";
$quadrat = new Rechteck(10,5);
echo "Umfang: ".$quadrat->berechneUmfang();
echo "<br>";
echo "Fläche: ".$quadrat->berechneFlaeche();
echo "<br>";