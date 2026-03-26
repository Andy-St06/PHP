<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Suchfeld</title>
</head>

<body>
    <h1>Song Suchen</h1>
    <form method="post" action="index.php?aktion=songSuchen">
        <label>
            SongTitel:<br>
            <input type="text" name="songTitle" >
        </label>
        <button type="submit">Suchen</button>
    </form>

    <a href="index.php?aktion=alleBand">Alle Bands</a>
</body>




</html>