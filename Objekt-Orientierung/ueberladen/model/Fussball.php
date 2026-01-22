<?php
class Fussball
{
    private string $farbe = "weiss"; //besser
    private string $durchmesser = "30";
    private FussballTyp $typ = FussballTyp::Plastik;

    public function __construct(...$a)
    {
        $i = count($a);
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }
    public function __construct1($farbe)
    {
        $this->setFarbe($farbe);
    }

    public function __construct2($farbe, $durchmesser)
    {
        $this->setFarbe($farbe);
        $this->setDurchmesser($durchmesser);
    }

    public function __construct3($farbe, $durchmesser, FussballTyp $typ)
    {
        $this->setFarbe($farbe);
        $this->setDurchmesser($durchmesser);
        $this->setTyp($typ);
    }

    public function setFarbe($farbe)
    {
        $this->farbe = $farbe;
    }

    public function setDurchmesser($durchmesser)
    {
        $this->durchmesser = $durchmesser;
    }

    public function setTyp(FussballTyp $typ)
    {
        $this->typ = $typ;
    }

    public function getTyp() :string
    {
        return $this->typ->value;
    }

    public function getFarbe()
    {
        return $this->farbe;
    }

    public function getDurchmesser()
    {
        return $this->durchmesser;
    }

    public function __toString()
    {
        return "Der Fußball hat die Farbe " . $this->getFarbe() . " und hat einen Durchmesser von " . $this->getDurchmesser()." und von Typ ".$this->getTyp();
    }
}
