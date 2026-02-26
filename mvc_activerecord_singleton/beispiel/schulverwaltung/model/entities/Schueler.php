<?php
class Schueler
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $vorname = '';
    private string $nachname = '';
    private string $gebutsdatum = '';
    private int $klasse_id = 0;

    protected static $table = 'schueler';

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
    public function setGebutsdatum($gebutsdatum)
    {
        $this->gebutsdatum = $gebutsdatum;
    }

    public function getGebutsdatum()
    {
        return $this->gebutsdatum;
    }

     public function getKlasse()
    {
        return Klasse::finde($this->klasse_id);
    }


    /*     * ** Persistenz-Methoden *** */
    /*
    public static function findeNachVorname($vorname) {
        $sql = 'SELECT * FROM benutzer WHERE vorname=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($vorname));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Benutzer');
        return $abfrage->fetchAll();
    }

    // Beziehungen
    public static function findeNachSeminartermin(Seminartermin $seminartermin) {
        $sql = 'SELECT benutzer.* FROM benutzer '
                . 'JOIN nimmt_teil ON benutzer.id=nimmt_teil.benutzer_id '
                . 'WHERE nimmt_teil.seminartermine_id=?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($seminartermin->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Benutzer');
        return $abfrage->fetchAll();
    }

    public function getTermine() {
        return Seminartermin::findeNachBenutzer($this);
    }
*/
}
