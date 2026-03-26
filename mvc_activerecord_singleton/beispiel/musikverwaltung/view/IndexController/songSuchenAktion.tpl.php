<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Suchergebniss</title>
</head>

<body>
    <h1> Suchergebniss </h1>
    <table style="border: solid, 1px,">
        <tr>
            <th>Titel</th>
            <th>Album</th>
        </tr>
        <!-- Annahme, ein Song kann in meheren Alben sein -->
        <?php foreach ($songs as $song) { ?>
            <tr>
                <td><?= $song->getSongTitle() ?></td>
                <?php foreach ($song->getAlbum() as $album) { ?>
                    <td><a href="index.php?aktion=songsVonAlbum&id=<?= $album->getId() ?>"><?= $album->getAlbumTitle() ?></a></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>


    <a href="index.php?aktion=suchfeld">zurück</a>
</body>




</html>