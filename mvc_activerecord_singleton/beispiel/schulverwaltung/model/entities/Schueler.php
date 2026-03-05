<?php
class Schueler
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $vorname = '';
    private string $nachname = '';
    private string $geburtsdatum = '';
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
    public function setGebutsdatum($geburtsdatum)
    {
        $this->geburtsdatum = $geburtsdatum;
    }

    public function getGebutsdatum()
    {
        return $this->geburtsdatum;
    }

    public function getKlasse(): Klasse
    {
        return Klasse::finde($this->klasse_id);
    }


    /*     * ** Statische-Methoden *** */
}
