<?php
class Raum
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $bezeichnung = '';

    protected static $table = 'raum';

    public function __toString()
    {
        return $this->getBezeichnung();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;
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
