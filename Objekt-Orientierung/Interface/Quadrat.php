<?php
require_once('Form2D.php');

class Quadrat extends Form2D
{
    private float $laenge = 0;
    public function __construct($laenge)
    {
        $this->setLaenge($laenge);
    }

    public function berechneUmfang()
    {
        return $this->getLaenge() * 4;
    }

    public function berechneFlaeche()
    {
        return $this->getLaenge() * $this->getLaenge();
    }

    public function getLaenge()
    {
        return $this->laenge;
    }

    public function setLaenge($laenge)
    {
        $this->laenge = $laenge;
    }

    public function draw()
    {
        throw new \Exception('Not implemented');
    }
}
