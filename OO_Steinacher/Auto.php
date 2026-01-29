<?php
require_once('Fahzeug.php');

class Auto extends Fahzeug
{
    private int $anzahlReserverschlüßel; //Anahme nicht alle Fahrzeuge haben einen Reserverschlüßel

    public function __construct(String $marke, int $anzahlSitzplatz, int $anzahlReserverschlüßel)
    {
        $this->setMarke($marke);
        $this->setAnzahlSitzplatz($anzahlSitzplatz);
        $this->setAnzahlRäder(4);
        $this->setAnzahlReserverschlüßel($anzahlReserverschlüßel);
    }

    public function gereusch()
    {
        echo "Brumm Brumm";         //Leiser
    }

    public function setAnzahlReserverschlüßel(int $anzahlReserverschlüßel)
    {
        $this->anzahlReserverschlüßel = $anzahlReserverschlüßel;
    }

    public function getAnzahlReserverschlüßel(): int
    {
        return $this->anzahlReserverschlüßel;
    }

    public function __toString(): String
    {
        return "Marke: " . $this->getMarke() . ", Räder: " . $this->getAnzahlRäder() . ", Sitzplatz: " . $this->getAnzahlSitzplatz() . ", Reserveschlüßel: " . $this->getAnzahlReserverschlüßel() . "<br>";
    }
}
