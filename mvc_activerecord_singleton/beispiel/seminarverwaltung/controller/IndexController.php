<?php

class IndexController extends AbstractBase
{

  // Alle Seminartermine auslesen 
  public function alleSTAktion()
  {
    $this->addContext("seminartermine", Seminartermin::findeAlle());
    $this->addContext("allbenutzer", Benutzer::findeAlle());
  }

  // Seminarterminteilnehmer
  public function zeigeTeilnehmerAktion()
  {
    $st = Seminartermin::finde($_GET["id"]);
    $this->addContext("teilnehmer", $st->getTeilnehmer());
    $this->addContext("seminartermin", $st);
  }

  // Seminartemine eines Teilnehmers anzeigen
  public function zeigeSeminareAktion()
  {
    // übergebene Teilnehmer ID auslesen und Bemnutzerobjekt erstellen
    $benutzer = Benutzer::finde($_GET["id"]);
    // findeNachBenutzer aus Seminartermin aufrufen und unter seminartermine
    $this->addContext("seminartermine", Seminartermin::findeNachBenutzer($benutzer));
    $this->setTemplate("alleSTAktion");
  }

  public function entferneBenutzerAusSeminarAktion()
  {
    // übergebene Teilnehmer ID auslesen und Bemnutzerobjekt erstellen
    $benutzer = Benutzer::finde($_GET["id"]);
    $st = Seminartermin::finde($_GET["id2"]);
    $st->loescheTeilnehmer($benutzer);
    $this->addContext("seminartermine", Seminartermin::findeNachBenutzer($benutzer));
    #header("Location: index.php?aktion=zeigeTeilnehmer");
    $this->setTemplate("alleSTAktion");
  }

  public function alleBenutzerAktion()
  {
    $this->addContext("allbenutzer", Benutzer::findeAlle());
  }

  public function neuerBenutzerAktion() {}

  public function anlegenAktion()
  {
    $name = $_POST["name"];
    $nachname = $_POST["nachname"];
    $email = $_POST["email"];
    $passwort = $_POST["passwort"];
    $anrede = $_POST["anrede"];
    $erstellt = date("j-m-d");
    $benutzer = new Benutzer($_POST);
    $benutzer->speichere();
    $this->addContext("allbenutzer", Benutzer::findeAlle());
    $this->setTemplate("alleBenutzerAktion");
  }
}
