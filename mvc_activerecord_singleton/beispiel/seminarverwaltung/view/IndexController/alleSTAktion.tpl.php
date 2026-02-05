<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seminartermine</title>
    </head>
    <body>
        <table>
            <tr><th>Beginn</th><th>Ende</th><th>Raum</th><th>Titel</th><th>Aktionen</th></tr>
            <?php foreach ($seminartermine as $seminartermin) { ?>
            <tr>
                <td><?= $seminartermin->getBeginn()?></td>
                <td><?= $seminartermin->getEnde()?></td>
                <td><?= $seminartermin->getRaum()?></td>
                <td><?= bereinige($seminartermin->getSeminar()->getTitel())?></td>
                <td><a href="index.php?aktion=zeigeTeilnehmer&id=<?= $seminartermin->getId()?>">Teilnehmer</a></td>
            </tr>
            <?php } ?>
        </table>
            
    </body>
</html>
