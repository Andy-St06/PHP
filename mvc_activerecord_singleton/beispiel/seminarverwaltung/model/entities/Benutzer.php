<?php

class Benutzer {
    use ActiveRecordable, Deletable, Findable, Persistable;
    
    private int $id = 0;
    private string $vorname = '';
    private string $name = '';
    private string $email = '';
    private string $passwort = '';
    private string $registriert_seit = '';
    private string $anrede = '';

    protected static $table = 'benutzer';

    public function __toString() {
        return $this->getVorname() . ' ' . $this->getName();
    }

    /*     * ** Getter und Setter *** */

      public function getId() {
        return $this->id;
    }

    public function getVorname() {
        return $this->vorname;
    }

    public function setVorname($vorname) {
        $this->vorname = $vorname;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPasswort() {
        return $this->passwort;
    }

    public function setPasswort($passwort) {
        $this->passwort = $passwort;
    }

    public function getRegistriertSeit() {
        return $this->registriert_seit;
    }

    public function getAnrede() {
        return $this->anrede;
    }

    public function setAnrede($anrede) {
        $this->anrede = $anrede;
    }
    
    /*     * ** Persistenz-Methoden *** */

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

}
