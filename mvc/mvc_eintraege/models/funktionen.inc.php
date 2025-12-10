<?php
    
    function leerer_eintrag(){
        $eintrag = array('vorname' => '', 'nachname' => '', 'email' => '', 'id' => '');
     
        return $eintrag;
    }

    function hole_eintrag($id)
    {
        if (empty($id)) {
            $id = 0;
        }
        $eintraege = unserialize(file_get_contents('eintraege.txt'));
        $eintrag = $eintraege[$id];
        $eintrag['id'] = $id;
        return $eintrag;
    }

    function speichere_eintrag($post)
    {
        $id = 0;
        $eintraege = unserialize(file_get_contents('eintraege.txt'));
        $eintrag = array('vorname' => $post['vorname'], 'nachname' => $post['nachname'], 'email' => $post['email']);
        // wenn eine id mit übergeben wurde, gibt es den Eintrag schon, updaten
        if (!empty($post['id'])) {
            $id = $post['id'];
            $eintraege[$id] = $eintrag;
        } else {
            $eintraege[] = $eintrag;
            $id = sizeof($eintraege);
        }
        
        file_put_contents('eintraege.txt', serialize($eintraege));
        return $id;
    }
?>
