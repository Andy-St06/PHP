<?php

class Addresse
{
    private String $plz = "";
    private String $ort = "";
    private String $straße = "";
    private String $straßenummer = "";
    private String $land = "";

    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    public function setStraße($straße)
    {
        $this->straße = $straße;
    }
    public function setStraßenummer($straßenummer)
    {
        $this->straßenummer = $straßenummer;
    }
    public function setLand($land)
    {
        $this->land = $land;
    }

    public function getLand()
    {
        return $this->land;
    }

    public function getStraßenummer()
    {
        return $this->straßenummer;
    }

    public function getPlz()
    {
        return $this->plz;
    }

    public function getOrt()
    {
        return $this->ort;
    }

    public function getStraße()
    {
        return $this->straße;
    }

    public function __toString()
    {
        return $this->getStraßenummer()." ".$this->getStraße()." ".$this->getOrt()." ".$this->getLand()." ".$this->getPlz();
    }
}
