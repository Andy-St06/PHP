<?php
require_once('Form2D.php');

class Kreis extends Form2D
{

    private float $radius = 0;

    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setRadius(float $radius)
    {
        $this->radius = $radius;
    }

    public function berechneUmfang()
    {
        return $this->radius * 2 * pi();
    }

    public function berechneFlaeche()
    {
        return $this->radius*$this->radius * pi();
    }

    public function draw(){
        throw new \Exception('Not implemented');
    }




}