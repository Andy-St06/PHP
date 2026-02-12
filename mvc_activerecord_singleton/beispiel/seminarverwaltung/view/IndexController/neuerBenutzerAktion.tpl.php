<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nutzer Anlegen</title>
</head>

<body>
    <form action="index.php?aktion=anlegen" method="_POST">
        <label name="anrede">Anrede</label><input type="text" name="anrede"><br>
        <label name="name">Vorame</label><input type="text" name="name"><br>
        <label name="nachname">Nachname</label><input type="text" name="nachname"><br>
        <label name="email">Email</label><input type="text" name="email"><br>
        <label name="passwort">Passwort</label><input type="text" name="passwort">
        <input type="submit">
    </form>
    
</body>

</html>