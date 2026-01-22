<?php
require_once("model/Fussball.php");
require_once("model/FussballTyp.php");
$balle = array();
$balle[] = new Fussball();
$balle[] = new Fussball('rot');
$balle[] = new Fussball('gelb', 40);
$balle[] = new Fussball('blau', 50, FussballTyp::Leder);

require_once './view/mvc.tpl.php';
