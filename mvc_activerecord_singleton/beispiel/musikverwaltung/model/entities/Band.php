<?php

class Band
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $bandName = '';

    protected static $table = 'band';

    public function __toString()
    {
        return $this->getBandName();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getBandName()
    {
        return $this->bandName;
    }

    public function setBandName($bandName)
    {
        $this->bandName = $bandName;
    }

    public function getAlbum(): array
    {
        return Album::findeNachBand($this);
    }

    /*     * ** Statische-Methoden *** */
    public static function findeNachAlbum(Album $album)
    {
        $sql = 'SELECT band.* FROM bandalbum
            JOIN album ON album.id = bandalbum.album_id
            JOIN band ON band.id = bandalbum.band_id
            WHERE album.id = ?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($album->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Band');
        return $abfrage->fetchAll();
    }
}
