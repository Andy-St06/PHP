<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nutzer Anlegen</title>
</head>

<body>
    <form action="index.php?aktion=anlegen" method="POST">
        <label name="anrede">Anrede</label><input type="text" name="anrede"><br>
        <label name="vorname">Vorame</label><input type="text" name="vorname"><br>
        <label name="name">Nachname</label><input type="text" name="name"><br>
        <label name="email">Email</label><input type="text" name="email"><br>
        <label name="passwort">Passwort</label><input type="text" name="passwort"><br>
        <input type="hidden" name="registriert_seit" value="2000-01-01">
        <input type="submit">
    </form>
    
</body>

</html>