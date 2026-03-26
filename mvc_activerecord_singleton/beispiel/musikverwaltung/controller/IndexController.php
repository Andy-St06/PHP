<?php

class IndexController extends AbstractBase
{
  //Alle Anzeigen
  public function alleBandAktion()
  {
    $this->addContext("alleBand", Band::findeAlle());
  }
  public function songsVonAlbumAktion()
  {
    $album = Album::finde($_GET["id"]);
    $this->addContext("album", $album);
  }
  public function suchfeldAktion()
  {
    $this->addContext("allsong", Song::findeAlle());
  }
  public function songSuchenAktion()
  {
    $title = $_POST["songTitle"];
    $songs = Song::findeNach('songTitle', $title);
    if (empty($songs)) {
      redirect('index.php?aktion=suchfeld');
    }
    $this->addContext("songs", $songs);
  }
}
