<?php

class Person
{
    private $vorname = '';
    private $nachname = '';

    private static $dateiname = 'personen.txt';

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
        return $this->getVorname() . " " . $this->getNachname();
    }
}
