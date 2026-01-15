<?php
require_once('Addresse.php');

class Person
{
    private String $vorname = "";
    private String $nachname = "";
    private ?Addresse $addresse = null;

    private static $dateiname = 'personen.txt';

    public function __construct()
    {
        $this->addresse = new Addresse();
    }

    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    public function getVorname()
    {
        return $this->vorname;
    }

    public function getNachname()
    {
        return $this->nachname;
    }

    public function setPlz($plz)
    {
        $this->addresse->setPlz($plz);
    }

    public function setOrt($ort)
    {
        $this->addresse->setOrt($ort);
    }

    public function setStraße($straße)
    {
        $this->addresse->setStraße($straße);
    }

    public function setStraßenummer($straßenummer)
    {
        $this->addresse->setStraßenummer($straßenummer);
    }

    public function setLand($land)
    {
        $this->addresse->setLand($land);
    }

    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }

    public function getLand()
    {
        return $this->addresse->getLand();
    }

    public function getStraßenummer()
    {
        return $this->addresse->getStraßenummer();
    }

    public function getPlz()
    {
        return $this->addresse->getPlz();
    }

    public function getOrt()
    {
        return $this->addresse->getOrt();
    }

    public function getStraße()
    {
        return $this->addresse->getStraße();
    }

    public function getAddresse()
    {
        return $this->addresse;
    }

    public function speichere()
    {
        $datensaetze = self::findeAlle();
        $datensaetze[] = $this;
        file_put_contents(self::$dateiname, serialize($datensaetze));
    }

    public static function findeAlle()
    {
        return unserialize(file_get_contents(self::$dateiname));
    }

    public static function zaehle()
    {
        return count(self::findeAlle());
    }

    public static function findeNachVorname($vorname): array
    {
        $datensaetze = self::findeAlle();
        $person = [];
        foreach ($datensaetze as $value) {
            if ($value->getVorname() == $vorname) {
                $person[] = $value;
            }
        }
        return $person;
    }

    #löschen

    #update

    public function __toString()
    {
        return $this->getVorname() . " " . $this->getNachname()." ".$this->getAddresse();
    }
}
