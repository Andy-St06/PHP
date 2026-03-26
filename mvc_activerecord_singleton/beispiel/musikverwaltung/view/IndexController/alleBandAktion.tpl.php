<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bands</title>
</head>

<body>
    <h1>Alle Bands</h1>
    <table style="border: solid, 1px,">
        <tr>
            <th>Band</th>
            <th>Album</th>
        </tr>
        <?php foreach ($alleBand as $band) { ?>
            <tr>
                <td><?= $band->getBandName() ?></td>
                <?php foreach ($band->getAlbum() as $album) { ?>
                    <td><a href="index.php?aktion=songsVonAlbum&id=<?= $album->getId() ?>"><?= $album->getAlbumTitle() ?></a></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>


    <a href="index.php?aktion=suchfeld">Suchen</a>
</body>




</html>