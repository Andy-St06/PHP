<?php
class Song
{
    use ActiveRecordable, Deletable, Findable, Persistable;

    private int $id = 0;
    private string $songTitle = '';
    private string $duration = ''; //wird in Format 00:00:00 angegeben
    private string $lyrics = '';

    protected static $table = 'song';

    public function __toString()
    {
        return $this->getSongTitle();
    }

    /*     * ** Getter und Setter *** */

    public function getId()
    {
        return $this->id;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    public function getLyrics()
    {
        return $this->lyrics;
    }

    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;
    }
    public function getSongTitle()
    {
        return $this->songTitle;
    }

    public function setSongTitle($songTitle)
    {
        $this->songTitle = $songTitle;
    }

    public function getAlbum(){
        return Album::findeNachSong($this);
    }



    /*     * ** Statische-Methoden *** */
    public static function findeNachAlbum(Album $album)
    {
        $sql = 'SELECT song.* FROM albumsong
            JOIN album ON album.id = albumsong.album_id
            JOIN song ON song.id = albumsong.song_id
            WHERE album.id = ?';
        $abfrage = DB::getDB()->prepare($sql);
        $abfrage->execute(array($album->getId()));
        $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Song');
        return $abfrage->fetchAll();
    }
}
