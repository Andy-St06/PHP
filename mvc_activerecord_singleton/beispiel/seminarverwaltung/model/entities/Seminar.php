<?php

class Seminar {
    use ActiveRecordable, Deletable, Findable, Persistable;
    
    private int $id = 0;
    private string $titel = '';
    private string $beschreibung = '';
    private string $preis = '';
    private string $kategorie = '';

    protected static $table = 'seminare';
  
    public function __toString() {
        return $this->getTitel();
    }

    /*     * ** Getter und Setter *** */

    public function getId() {
        return $this->id;
    }

    public function getTitel() {
        return $this->titel;
    }

    public function setTitel($titel) {
        $this->titel = $titel;
    }

    public function getBeschreibung() {
        return $this->beschreibung;
    }

    public function setBeschreibung($beschreibung) {
        $this->beschreibung = $beschreibung;
    }

    public function getPreis() {
        return $this->preis;
    }

    public function setPreis($preis) {
        $this->preis = $preis;
    }

    public function getKategorie() {
        return $this->kategorie;
    }

    public function setKategorie($kategorie) {
        $this->kategorie = $kategorie;
    }
   

    /*     * **** Statische Methoden ***** */

    public static function findeNachTitel($titel) {
        $sql = 'SELECT * FROM seminare WHERE titel=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($titel));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Seminar');
        return $abfrage->fetchAll();
    }

    public static function findeNachPreis($vonPreis, $bisPreis) {
        $sql = 'SELECT * FROM seminare WHERE preis>=? AND preis<=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($vonPreis, $bisPreis));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Seminar');
        return $abfrage->fetchAll();
    }

    public function getSeminartermine() {
        return Seminartermin::findeNachSeminar($this);
    }

}
