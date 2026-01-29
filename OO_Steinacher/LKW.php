<?php
require_once('Fahzeug.php');

class LKW extends Fahzeug
{
    private int $anzahlAnWahre;

    public function __construct(String $marke, int $anzahlAnWahre)
    {
        $this->setMarke($marke);
        $this->setAnzahlRäder(6);
        $this->setAnzahlSitzplatz(3);
        $this->setAnzahlAnWahre($anzahlAnWahre);
    }

    public function gereusch()
    {
        echo "BRUUUMM BRUMMM";      //Lauter
    }

    public function setAnzahlAnWahre(int $anzahlAnWahre)
    {
        $this->anzahlAnWahre = $anzahlAnWahre;
    }

    public function getAnzahlAnWahre(): int
    {
        return $this->anzahlAnWahre;
    }

    public function __toString(): String
    {
        return "Marke: " . $this->getMarke() . ", Räder: " . $this->getAnzahlRäder() . ", Sitzplatz: " . $this->getAnzahlSitzplatz() . ", Wahre: " . $this->getAnzahlAnWahre() . "<br>";
    }
}
