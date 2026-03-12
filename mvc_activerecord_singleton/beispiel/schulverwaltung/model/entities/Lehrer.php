<?php
class Lehrer
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $vorname = '';
    private string $nachname = '';

    protected static $table = 'lehrer';

    public function __toString()
    {
        return $this->getVorname() . ' ' . $this->getNachname();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getVorname()
    {
        return $this->vorname;
    }

    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    public function getNachname()
    {
        return $this->nachname;
    }

    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    public function getKlassen(): array
    {
        return Klasse::findeNachLehrer($this);
    }

     public function setLehrer(Klasse $klasse) {
        $klasse->addLehrer($this);
    }

    /*     * ** Statische-Methoden *** */
    public static function findeNachKlassen(Klasse $klasse)
    {
        $sql = 'SELECT lehrer.* FROM unterrichtet
            JOIN lehrer ON lehrer.id = unterrichtet.lehrer_id
            JOIN klasse ON klasse.id = unterrichtet.klasse_id
            WHERE klasse.id = ?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($klasse->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Lehrer');
        return $abfrage->fetchAll();
    }

    public function addKlasse(Klasse $klasse)
    {
        if ($klasse->getId() === 0) {
            $klasse->speichere();
        }

        $sql = 'INSERT INTO unterrichtet '
            . '(klasse_id, lehrer_id) VALUES (?, ?)';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($klasse->getId(), $this->getId()));
    }
}
