<?php
require_once('Säugetier.php');

class Hund extends Säugetier
{
    private String $farbeVonHalsband; //Keine Andere Idee

    public function __construct(String $name, int $alter, String $farbeVonHalsband)
    {
        $this->setAnzahlfüße(4);
        $this->setAlter($alter);
        $this->setName($name);
        $this->setFarbeVonHalsband($farbeVonHalsband);
    }

    public function gereusch()
    {
        echo "Wuff Wuff";
    }

    public function setFarbeVonHalsband(String $farbeVonHalsband)
    {
        $this->farbeVonHalsband = $farbeVonHalsband;
    }

    public function getFarbeVonHalsband(): String
    {
        return $this->farbeVonHalsband;
    }

    public function __toString(): String
    {
        return "Name: " . $this->getName() . ", Alter: " . $this->getAlter() . ", Füße: " . $this->getAnzahlfüße() . ", Halsbandfarbe: " . $this->getFarbeVonHalsband() . " <br>";
    }
}
