<html>

<head>
    <title> Feedback auf eine einfaches POST </title>
</head>

<body>
    <?php
    if (isset($_POST['user'])) {
        if (!$_POST['user'])
            echo "Es wurden keine User-Daten übertragen!";
        else
            echo "Folgende User-Daten wurden übertragen: " . $_POST['user'];
    }
    echo "<br />";
    if (isset($_POST['password'])) {
        if (!$_POST['password'])
            echo "Es wurden kein Password übertragen!";
        else
            echo "Folgendes Password wurde übertragen: " . $_POST['password'];
    }
    ?>
</body>

</html>