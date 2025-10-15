<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Zugriff auf Sitzungsvariablen</title>
</head>
<body>
<h1>&Uuml;bersichtsseite</h1>
<?php
if(isset($_SESSION['produkte']))
{
	print "<em>Ihr Einkaufswagen:</em><ol>\n";
	foreach($_SESSION['produkte'] as $p){ 
		print "<li>$p</li>"; 
	}
	print "</ol>";
}
?>
<a href="produkte.php">Zur&uuml;ck zur Produktauswahl</a>
</body>
</html>