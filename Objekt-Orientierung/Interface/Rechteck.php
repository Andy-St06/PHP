<?php
require_once('Form2D.php');

class Rechteck extends Form2D
{
    private float $laenge = 0;
    private float $breite = 0; 
    public function __construct($laenge, $breite)
    {
        $this->setLaenge($laenge);
        $this->setBreite($breite);
    }

    public function berechneUmfang()
    {
        return $this->getBreite() * 2 + $this->getLaenge() * 2;
    }

    public function berechneFlaeche()
    {
        return $this->getBreite() * $this->getLaenge();
    }

    public function getLaenge()
    {
        return $this->laenge;
    }

    public function getBreite()
    {
        return $this->breite;
    }

    public function setLaenge($laenge)
    {
        $this->laenge = $laenge;
    }

    public function setBreite($breite)
    {
        $this->breite = $breite;
    }

    public function draw()
    {
        throw new \Exception('Not implemented');
    }

}
