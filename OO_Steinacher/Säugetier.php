<?php
require_once('Laute.php');

abstract class Säugetier implements Laute
{

    private int $anzahlfüße = 0;
    private String $name = "";
    private int $alter = 0;

    public function setAlter(int $alter)
    {
        $this->alter = $alter;
    }

    public function setName(String $name)
    {
        $this->name = $name;
    }

    public function setAnzahlfüße(int $anzahlfüße)
    {
        $this->anzahlfüße = $anzahlfüße;
    }

    public function getAnzahlfüße(): int
    {
        return $this->anzahlfüße;
    }

    public function getAlter(): int
    {
        return $this->alter;
    }

    public function getName(): String
    {
        return $this->name;
    }
}
