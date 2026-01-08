<?php
class Stadt
{
    private string $name;
    private string $plz;
    private int $einwohner;
    private string $provinz = "Bozen";
    private static int $anzahl = 0;

    public function __construct(string $n, string $plz, int $e, string $p)
    {
        $this->setName($n);
        $this->setPlz($plz);
        $this->setEinwohner($e);
        $this->setProvinz($p);
        self::$anzahl++;
    }

    public function __destruct()
    {
        self::$anzahl--;
    }

    //ToString
    public function __toString()
    {
        return "Die Stadt " . $this->getName()
            . " hat " . $this->getEinwohner()
            . " Einwohner, mit der PLZ "
            . $this->getPlz()
            . " und liegt in der Provinz "
            . $this->getProvinz()
            . ". Die Anzahl ist: "
            . self::$anzahl
            . "<br>";
    }
    

    //GETTER
    function getName()
    {
        return $this->name;
    }
    
    function getStadtProvinz(){
        return $this->getName() . " (".$this->getProvinz().")";
    }

    function getPlz()
    {
        return  $this->plz;
    }

    function getEinwohner()
    {
        return  $this->einwohner;
    }

    function getProvinz()
    {
        return  $this->provinz;
    }

    public static function getAnzahl()
    {
        return  self::$anzahl;
    }

    //SETTER
    function setName(string $name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    function setPlz(string $plz)
    {
        if (is_string($plz)) {
            $this->plz = $plz;
        }
    }

    function setEinwohner(int $einwohner)
    {
        if (is_int($einwohner)) {
            $this->einwohner = $einwohner;
        }
    }

    function setProvinz(string $provinz)
    {
        if (is_string($provinz)) {
            $this->provinz = $provinz;
        }
    }
}
