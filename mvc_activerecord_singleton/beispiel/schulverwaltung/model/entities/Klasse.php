<?php

use bz\berufsschule\uebung\Klasse as UebungKlasse;

class Klasse
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $name = '';
    private int $raum_id = 0;
    private int $klassenlehrer = 0;

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

    public function getRaum(): Raum
    {
        return Raum::finde($this->raum_id);
    }

    public function setRaum_id($raum_id)
    {
        $raum = $this->getRaum();
        $raum->setId($raum_id);
    }

    public function getKlassenlehrer(): Lehrer
    {
        return Lehrer::finde($this->klassenlehrer);
    }

    public function getLehrer(): array
    {
        return Lehrer::findeNachKlassen($this);
    }

    public function getSchueler(): array
    {
        return Schueler::findeNach("klasse_id", $this->getId());
    }

    public function addSchueler(Schueler $schueler)
    {
        if ($schueler->getId() === 0) {
            $schueler->speichere();
        }
        $schueler->setKlasse($this);
        $schueler->speichere();
    }

    public function removeSchueler(Schueler $schueler)
    {
        if ($schueler->getId() === 0) {
            return;
        }
        $schueler->setKlasse_id(0);
        $schueler->speichere();
    }

    /*     * **** Statische Methoden ***** */
    public static function findeNachLehrer(Lehrer $lehrer)
    {
        $sql = 'SELECT klasse.* FROM unterrichtet
            JOIN lehrer ON lehrer.id = unterrichtet.lehrer_id
            JOIN klasse ON klasse.id = unterrichtet.klasse_id
            WHERE lehrer.id = ?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($lehrer->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Klasse');
        return $abfrage->fetchAll();
    }
}
