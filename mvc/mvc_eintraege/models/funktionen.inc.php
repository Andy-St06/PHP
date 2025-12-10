<?php

function leerer_eintrag()
{
    $eintrag = array('vorname' => '', 'nachname' => '', 'email' => '', 'id' => '');
    return $eintrag;
}

function hole_eintrag($id)
{
    $eintrag = [];
    if (file_exists('eintraege.txt')) {
        if (empty($id)) {
            $id = 0;
        }
        $eintraege = unserialize(file_get_contents('eintraege.txt'));
        $eintrag = $eintraege[$id];
        $eintrag['id'] = $id;
    }
    return $eintrag;
}

function hole_alle_eintrag()
{
    $eintraege = [];
    if (file_exists('eintraege.txt')) {
        $eintraege = unserialize(file_get_contents('eintraege.txt'));
    }
    return $eintraege;
}

function speichere_eintrag($post)
{
    $id = $post['id'];
    $eintraege = array();
    if (file_exists('eintraege.txt')) {
        $eintraege = unserialize(file_get_contents('eintraege.txt'));
    }else{
        curl_file_create('eintraege.txt'); //CREATES FILE
    }
    $eintrag = array('vorname' => $post['vorname'], 'nachname' => $post['nachname'], 'email' => $post['email']);
    if ($id != "") {
        $id = $post['id'];
        $eintraege[$id] = $eintrag;
    } else {
        $eintraege[] = $eintrag;
        $id = sizeof($eintraege);
    }
    file_put_contents('eintraege.txt', serialize($eintraege));
    return $id;
}
