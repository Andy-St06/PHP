<?php

function getConnection()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=weblog_steinacher', "root",);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        print $e->getMessage();
    }
    return $db;
}

function get_autor()
{
    $autor = array();
    $db = getConnection();
    $sql = "SELECT * FROM autor";
    $query = $db->query($sql);
    $autor = $query->fetchAll();
}

function hole_eintraege($umgedreht = false)
{
    $eintraege = array();
    $db = getConnection(); //Datenbank Verbindung herstellen, $db ist eine PDO Instanz
    $sql = "SELECT e.id, e.titel, e.inhalt, e.erstellt_am, a.vorname, a.nachname, a.nickname 
    FROM eintrag e JOIN autor a ON e.autor_id = a.id";
    $query = $db->query($sql); //Abfrage ausführen, Ergebnis ist von Typ PDOStatement
    $eintraege = $query->fetchAll();
    return $eintraege;
}

/**
 * user if login sucsesfull.
 * NULL if login failed.
 */
function login($usr, $psw)
{
    $erg = NULL;
    $db = getConnection();
    $sql = "SELECT * FROM autor WHERE nickname = '$usr'";
    try {
        $result = $db->query($sql);
        $user = $result->fetch();
        if ($user != false && password_verify($psw, $user["passwort"])) {
            $erg = $user;
        }
    } catch (Exception $e) {
        echo "login fehlgeschlagen \n";
        var_dump($db->errorInfo());
        echo $e->getMessage();
    }
    return $erg;
}

function ist_eingeloggt()
{
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
    }
    return $erg;
}

function logge_ein($user)
{
    $_SESSION['eingeloggt'] = $user;
}

function logge_aus()
{
    unset($_SESSION['eingeloggt']);
}

function darf_tun($autor)
{
    $erg = false;
    if (ist_eingeloggt()) { //checkt ob eingelogt ist
        $name = $_SESSION['eingeloggt'];
        if ($autor == $name['nickname']) { // checkt ob autor und eingelogter benutzer gleich ist
            $erg = true;
        }
    }
    return $erg;
}

function get_Time($timstamp)
{
    return date("H:i", $timstamp);
}

function get_Date($timstamp)
{
    return date("d.m.Y", $timstamp);
}

function registriren($vorname, $nachname, $benutzer, $psw)
{
    $erg = NULL;
    $db = getConnection();
    $psw = password_hash($psw, PASSWORD_DEFAULT);
    $sqlCKECK = "SELECT * FROM autor WHERE nickname = '$benutzer'";
    $query1 = $db->query($sqlCKECK);
    $res1 = $query1->fetch();
    if ($res1 == NULL) {
        try {
            $sqlINSERT = "INSERT INTO autor (vorname, nachname, nickname, passwort) VALUES ('$vorname', '$nachname', '$benutzer' ,'$psw');";
            $query = $db->query($sqlINSERT);
            $erg = true;
        } catch (\Throwable $th) {
        }
    } else {
        $erg = false;
    }

    return $erg;
}

function benutzerandern($daten, $vorname, $nachname, $nickname, $psw)
{
    $id = $daten["id"];
    //Daten aus DB nehmen
    $db = getConnection();
    $sqlCKECK = "SELECT * FROM autor WHERE nickname = '$nickname' and id != $id";
    //Schaut ob es den eingegebenen Nutzername schon gib, ignoriert aber den von
    //dem Nutzer welche gerade ändert, da wenn er nicht seinen NickName ändern will 
    //nicht geht.
    $query1 = $db->query($sqlCKECK);
    $res1 = $query1->fetch();
    if ($res1 == NULL) {
        //Hollt den USER heraus
        $sql = "SELECT * FROM autor WHERE id = $id";
        $result = $db->query($sql);
        $user = $result->fetch();
        //schaut ob das PSW geändert wurde
        if ($user != false && !password_verify($psw, $user["passwort"]) && $psw != "") {
            $psw = password_hash($psw, PASSWORD_DEFAULT); //psw hashen
            //Updatet in DB
            $sql = "UPDATE autor 
            SET vorname = :vorname, nachname = :nachname,
                nickname = :nickname, passwort = :passwort
             WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':vorname' => $vorname,
                ':nachname' => $nachname,
                ':nickname' => $nickname,
                ':passwort' => $psw,
                ':id' => $id
            ]);
            return "Password erfolgreich geändert!";
        } elseif ($user != false) {
            $erg = "";
            if ($vorname == $user["vorname"] && $vorname == $user["vorname"] &&  $vorname == $user["vorname"]) { //schaut ob ander dinge geändert wurden
                $erg = "Keine Änderungen gemacht!";
            } else {
                $psw = password_hash($psw, PASSWORD_DEFAULT); //psw hashen
                //Updatet in DB
                $sql = "UPDATE autor 
                SET vorname = :vorname, nachname = :nachname,
                    nickname = :nickname, passwort = :passwort
                WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->execute([
                    ':vorname' => $vorname,
                    ':nachname' => $nachname,
                    ':nickname' => $nickname,
                    ':passwort' => $psw,
                    ':id' => $id
                ]);
                $erg = "Änderungen erfolgreich gespeichert!";
            }
            return $erg;
        } else { //wenn Password das Selbe ist
            return "Password muss geändert werden";
        }
    } else {
        return "Benutzername bereits Vergeben, wählen Sie bitte einen anderen!";
    }
}
