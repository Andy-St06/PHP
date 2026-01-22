<?php
enum FussballTyp: string
{
    case Plastik = 'Plastik';
    case Leder = 'Leder';
    case Stoff = 'Stoff';
    #public function __toString()
    #{
    #    return $this->value;
    #}
}
