<?php
require_once('Säugetier.php');

class Mensch extends Säugetier
{
    private String $geschlecht; //Anahme nicht alle Säugetiere haben ein geschlecht

    public function __construct(String $name, int $alter, String $geschlecht)
    {
        $this->setAnzahlfüße(2);
        $this->setAlter($alter);
        $this->setName($name);
        $this->setGeschlecht($geschlecht);
    }

    public function gereusch()
    {
        echo "Hallo ich bin ein Mensch!";
    }

    public function setGeschlecht(String $geschlecht)
    {
        $this->geschlecht = $geschlecht;
    }

    public function getGeschlecht(): String
    {
        return $this->geschlecht;
    }

    public function __toString(): String
    {
        return "Name: " . $this->getName() . ", Alter: " . $this->getAlter() . ", Füße: " . $this->getAnzahlfüße() . ", Geschlecht: " . $this->getGeschlecht() . " <br>";
    }
}
