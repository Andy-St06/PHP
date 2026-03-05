<?php

class Klasse
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $name = '';
    private string $raum_id = 0;
    private string $klassenlehrer = 0;

    protected static $table = 'klasse';

    public function __toString()
    {
        return $this->getName();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRaum():Raum
    {
        return Raum::finde($this->raum_id);
    }

    public function setRaum_Id($raum_id)
    {
        $raum = $this->getRaum();
        $raum->setId($raum_id);
    }

    public function getKlassenlehrer():Lehrer
    {
        return Lehrer::finde($this->klassenlehrer);
    }

    public function getLehrer(){
        
    }

    /*     * **** Statische Methoden ***** */
    public static function findeNachSeminartermin(Seminartermin $seminartermin) {
        $sql = 'SELECT benutzer.* FROM benutzer '
                . 'JOIN nimmt_teil ON benutzer.id=nimmt_teil.benutzer_id '
                . 'WHERE nimmt_teil.seminartermine_id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($seminartermin->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Benutzer');
        return $abfrage->fetchAll();
    }



    /*
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
    
    */
}
