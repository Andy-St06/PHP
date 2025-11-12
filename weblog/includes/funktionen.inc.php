<?php

function getConnection()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=weblog', "root",);
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
 * true if login sucsesfull.
 * false if login failed.
 */
function login($usr, $psw)
{
    $erg = false;
    $db = getConnection();
    $sql = "SELECT * FROM autor WHERE nickname = '$usr' and passwort = '$psw'";
    $result = $db->query($sql);
    $user = $result->fetch();
    #var_dump($user);
    if ($user != false && $user["passwort"] == $psw) {
        $erg = true;
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

function logge_ein($benutzername)
{
    $_SESSION['eingeloggt'] = $benutzername;
}

function logge_aus()
{
    unset($_SESSION['eingeloggt']);
}

function darf_tun($autor)
{
    $erg = false;
    if (ist_eingeloggt()) { //checkt ob eingelogt ist
        if ($autor == $_SESSION['eingeloggt']) { // checkt ob autor und eingelogter benutzer gleich ist
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
