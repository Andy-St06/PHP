<?php
class Album
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $albumTitle = '';
    private string $liveRecording = '';

    protected static $table = 'album';

    public function __toString()
    {
        return $this->getAlbumTitle();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getAlbumTitle()
    {
        return $this->albumTitle;
    }

    public function setAlbumTitle($albumTitle)
    {
        $this->albumTitle = $albumTitle;
    }

    public function getLiveRecording()
    {
        return $this->liveRecording;
    }

    public function setLiveRecording($liveRecording)
    {
        $this->liveRecording = $liveRecording;
    }

    public function getSongs(): array
    {
        return Song::findeNachAlbum($this);
    }

    public function getBand(): array
    {
        return Band::findeNachAlbum($this);
    }

    /*     * ** Statische-Methoden *** */
    public static function findeNachSong(Song $song)
    {
        $sql = 'SELECT album.* FROM albumsong
            JOIN album ON album.id = albumsong.album_id
            JOIN song ON song.id = albumsong.song_id
            WHERE song.id = ?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($song->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Album');
        return $abfrage->fetchAll();
    }

    public static function findeNachBand(Band $band)
    {
        $sql = 'SELECT album.* FROM bandalbum
            JOIN album ON album.id = bandalbum.album_id
            JOIN band ON band.id = bandalbum.band_id
            WHERE band.id = ?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($band->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Album');
        return $abfrage->fetchAll();
    }
}
