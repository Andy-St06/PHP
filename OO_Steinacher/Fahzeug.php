<?php
require_once('Laute.php');

abstract class Fahzeug implements Laute
{

    private int $anzahlRäder = 0;
    private String $marke = "";
    private int $anzahlSitzplatz = 0;

    public function setAnzahlSitzplatz(String $anzahlSitzplatz)
    {
        $this->anzahlSitzplatz = $anzahlSitzplatz;
    }

    public function setMarke(String $marke)
    {
        $this->marke = $marke;
    }

    public function setAnzahlRäder(int $anzahlRäder)
    {
        $this->anzahlRäder = $anzahlRäder;
    }

    public function getAnzahlRäder(): int
    {
        return $this->anzahlRäder;
    }

    public function getAnzahlSitzplatz(): int
    {
        return $this->anzahlSitzplatz;
    }

    public function getMarke(): String
    {
        return $this->marke;
    }
}
