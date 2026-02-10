<?php

class Seminartermin {
    use ActiveRecordable, Deletable, Findable, Persistable;
    
    private int $id = 0;
    private string $beginn = '';
    private string $ende = '';
    private string $raum = '';
    private int $seminar_id = 0;

    protected static $table = 'seminartermine';
    
    public function __toString() {
        return 'Von: ' . $this->getBeginn() . ', Bis: ' . $this->getEnde();
    }

    /*     * ** Getter und Setter *** */

    public function getId() {
        return $this->id;
    }

    public function getBeginn() {
        return $this->beginn;
    }

    public function setBeginn($beginn) {
        $this->beginn = $beginn;
    }

    public function getEnde() {
        return $this->ende;
    }

    public function setEnde($ende) {
        $this->ende = $ende;
    }

    public function getRaum() {
        return $this->raum;
    }

    public function setRaum($raum) {
        $this->raum = $raum;
    }


    /*     * **** Statische Methoden ***** */

    public static function findeNachRaum($raum) {
        $sql = 'SELECT * FROM seminartermine WHERE raum=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($raum));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Seminartermin');
        return $abfrage->fetchAll();
    }

    public static function findeNachSeminar(Seminar $seminar) {
        $sql = 'SELECT * FROM seminartermine WHERE seminar_id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($seminar->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Seminartermin');
        return $abfrage->fetchAll();
    }

    // Beziehungen
    public static function findeNachBenutzer(Benutzer $benutzer) {
        $sql = 'SELECT st.* FROM seminartermine st '
                . 'JOIN nimmt_teil nt ON st.id=nt.seminartermine_id '
                . 'WHERE nt.benutzer_id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($benutzer->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Seminartermin');
        return $abfrage->fetchAll();
    }

    public function setSeminar(Seminar $seminar) {
        $this->seminar_id = $seminar->getId();
    }

    public function getSeminar() {
        return Seminar::finde($this->seminar_id);
    }

    public function getTeilnehmer() {
        return Benutzer::findeNachSeminartermin($this);
    }

    public function addTeilnehmer(Benutzer $teilnehmer) {
        if ($teilnehmer->getId() === 0) {
            // Der Benutzer muss gespeichert sein, damit die Zuordnung in
            // nimmt_teil vorgenommen werden kann.
            $teilnehmer->speichere();
        }

        $sql = 'INSERT INTO nimmt_teil '
                . '(benutzer_id, seminartermin_id) VALUES (?, ?)';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($teilnehmer->getId(), $this->getId()));
    }

    public function loescheTeilnehmer(Benutzer $teilnehmer) {
        $sql = 'DELETE FROM nimmt_teil '
                . 'WHERE benutzer_id=? AND seminartermine_id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array(
            $teilnehmer->getId(),
            $this->getId()
        ));
    }

}
