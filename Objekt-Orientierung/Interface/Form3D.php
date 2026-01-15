<?php
require_once('Form.php');

abstract class From3D extends Form
{
    private int $z = 0;

    public abstract function berechneVolumen();

    public function setZ($z)
    {
        $this->z = $z;
    }

    public function getZ()
    {
        return $this->z;
    }
}
