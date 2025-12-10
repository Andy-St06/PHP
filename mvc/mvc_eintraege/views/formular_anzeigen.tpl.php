<!DOCTYPE html>
<html>
	<head>
		<title>Eintrag editieren</title>
	</head>
	<body>
		<form action="index.php" method="post">
                    <input type="text" name="vorname" placeholder="Vorname" id="vorname" value="<?= $eintrag['vorname']; ?>" /><br />
                    <input type="text" name="nachname" placeholder="Nachname" id="nachname" value="<?= $eintrag['nachname']; ?>" /><br />
			<input type="text" name="email" placeholder="Email" id="email" value="<?= $eintrag['email']; ?>" />
			<input type="hidden" name="id" id="id" value="<?= $eintrag['id']; ?>" />
			<input type="hidden" name="aktion" id="aktion" value="speichere" />
			<input type="submit" value="speichern" />
		</form>	
    </body>
</html>