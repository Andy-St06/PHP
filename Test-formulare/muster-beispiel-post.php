<?php
$user = "";
$password = "";
$fehler = false;
$info = array();

if (filter_has_var(INPUT_POST, 'user')) { // Formular wurde gepostet
    $user = filter_input(INPUT_POST, 'user');

    if (!$user) {
        $info[] = "Es wurden keine User-Daten übertragen!";
        $fehler = true;
    } else{
        $info[] = "Folgende User-Daten wurden übertragen: " . $user;
    }
    $password = filter_input(INPUT_POST, 'password');


    if (!$password) {
        $info[] = "Es wurden kein Password übertragen!";
        $fehler = true;
    } else{
        $info[] = "Folgendes Password wurde übertragen: " . $password;
    }
}
 else {
    $fehler = true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <title> Feedback auf eine einfaches POST </title>
    </head>
    <body>
<?php
foreach ($info as $value) { ?>
        <p><?= $value ?></p>
<?php }

// Falls jemand einen Fehler gemacht hat, wird das Forumlar erneut angezeigt
if ($fehler) {
    ?>
            <form action="beispiel_post1.php" method="post" name="login">
                <table>
                    <tr>
                        <td>User:</td>
                        <td> <input type="text" name="user" value="<?= $user ?>"> </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td> <input  type="password" name="password"> </td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Abschicken">
            </form>

<?php } ?>

    </body>
</html>