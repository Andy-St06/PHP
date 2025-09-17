
    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personen Ausgabe</title>
    </head>

    <body>
        <table border="bold">
            <tr>
                <th>Number</th>
                <th>Personen</th>
            </tr>
            <?php foreach ($vornamearray as $key => $value) { ?>
                <tr>
                    <td>
                        <?= $key; ?>
                    </td>
                    <td>
                        <?= $value; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>

    </html>