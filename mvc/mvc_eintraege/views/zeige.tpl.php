<!DOCTYPE html>
<html>
	<head>
		<title>Eintrag anzeigen</title>
	</head>
	<body>
		<ul>
			<li>Vorname: <?= $eintrag['vorname']; ?></li>
			<li>Nachname: <?= $eintrag['nachname']; ?></li>
			<li>Email: <?= $eintrag['email']; ?></li>
		</ul>
		<ul>
			<li><a href="index.php?aktion=editiere&id=<?=$_REQUEST['id']?>">EDIT</a></li>
			<li><a href="index.php">HOME</a></li>
		</ul>
	</body>
</html>