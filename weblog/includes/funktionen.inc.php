<?php

function hole_eintraege($umgedreht = false)
{
    $eintraege = array();
    if (file_exists(PFAD_EINTRAEGE)) {
        $eintraege = unserialize(file_get_contents(PFAD_EINTRAEGE));
        if ($umgedreht === true) {
            $eintraege = array_reverse($eintraege);
        }
    }
    return $eintraege;
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
