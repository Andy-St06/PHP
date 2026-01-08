<?php
class Singelton
{

    private static $instance;

    //private da somit die klasse nicht von ausen aufgerufen werden kann
    private function __construct() {}

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
            echo "wurde aufgerufen";
        }
        return self::$instance;
    }

    public function __toString()
    {
        return "Singelton";
    }

}
