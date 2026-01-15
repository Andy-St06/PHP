<?php
require_once('Form3D.php');

class Würfel extends From3D
{
    private float $laenge = 0;
    public function __construct($laenge)
    {
        $this->setLaenge($laenge);
    }

    public function berechneFlaeche()
    {
        return $this->getLaenge() * $this->getLaenge() * 6;
    }

    public function berechneVolumen()
    {
        return $this->getLaenge() * $this->getLaenge() * $this->getLaenge();
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
