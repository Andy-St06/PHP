<?php
class Buch
{
  private $nettopreis = 30;
  private $iva = 22;

  function getNettopreis()
  {
    return $this->nettopreis;
  }

  function getBruttoPreis()
  {
    return $this->getNettopreis() + ($this->getNettopreis() * $this->iva / 100);
  }

  function setBruttoPreis($bruttopreis)
  {
    $this->nettopreis = $bruttopreis * 100  / ($this->iva + 100);
  }
}
