<?php
class Raum
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $bezeichnung = '';

    protected static $table = 'raum';

    public function __toString()
    {
        return $this->getBezeichnung();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;
    }

    public function setId($id)
    {
        $this->id = $id;
    }



    /*     * ** Statische-Methoden *** */
}
