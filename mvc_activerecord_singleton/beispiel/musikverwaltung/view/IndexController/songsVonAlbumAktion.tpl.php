<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Songs Im <?= $album->getAlbumTitle() ?></title>
</head>

<body>
    <h1><?= $album->getAlbumTitle() ?></h1>
    <table style="border: solid, 1px,">
        <tr>
            <th>Titel</th>
            <th>Dauer</th>
            <th>Lyrics</th>
        </tr>
        <?php foreach ($album->getSongs() as $song) { ?>
            <tr>
                <td><?= $song->getSongTitle() ?></td>
                <td><?= $song->getDuration() ?></td>
                <?php $text = substr($song->getLyrics(), 0, 50); ?>
                <td><?= $text ?></td>
            </tr>
        <?php } ?>
    </table>


    <a href="index.php?aktion=alleBand">Alle Bands</a>
</body>




</html>