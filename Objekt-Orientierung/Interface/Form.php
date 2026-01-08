<?php
require_once('Drawable.php');

abstract class Form implements Drawable
{

    private int $x = 0;
    private int $y = 0;

    public function setX($x)
    {
        $this->x = $x;
    }


    public function setY($y)
    {
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public abstract function berechneUmfang();
    public abstract function berechneFlaeche();
}
