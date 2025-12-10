<!DOCTYPE html>
<html>
	<head>
		<title>Alle Einträge anzeigen</title>
	</head>
	<body>
		<ul>
            <?php
			foreach ($eintraege as $key => $value) { ?>
			<li>Vorname: <a href="index.php?aktion=zeige&id=<?=$key?>"><?= $value['vorname']; ?></a></li>
            <?php } ?>
		</ul>	
		<p><a href="index.php?aktion=neu">Eintrag machen</a></p>
	</body>
</html>