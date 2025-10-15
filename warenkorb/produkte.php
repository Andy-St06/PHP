 <?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Registrierung eines Arrays in einer Sitzung</title>
</head>
<body>
<h1>Produktauswahlseite</h1>
<?php
if(isset($_POST['produkte']))
{
    $_SESSION['produkte'] = $_POST['produkte'];
    echo "Ihre ausgewählten Produkte wurden registriert!<br />";
}
?>
<form method="post" action="">
<select name="produkte[]" multiple="multiple" size="3">
<option>Enterprise</option>
<option>Hal 9000</option>
<option>ASUS-A7V</option>
<option>SB Live Platinum 5.1</option>
<option>Beamer</option>
</select>
<input type="submit" value="Fertig" />
</form>
<a href="warenkorb.php">Zur Überblicksseite</a>
</body>
</html>
