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

  public function loeschenAktion() {}

  public function neuerBenutzerAktion()
  {
    $anrede = "";
    $vorname = "";
    $name = "";
    $email = "";
    $fehler = "";
    if ($_POST) {
      if (isset($_POST['anrede']) && isset($_POST['vorname']) && isset($_POST['name']) && isset($_POST['email'])) {
        $benutzer = new Benutzer($_POST);
        $benutzer->setRegistriert_seit(date('y-m-d'));
        try {
          $benutzer->speichere();
          $this->addContext("allbenutzer", Benutzer::findeAlle());
          redirect("index.php?aktion=alleBenutzer");
        } catch (PDOException $ex) {
          if ($ex->getCode() === '23000') {
            $anrede = $_POST['anrede'];
            $vorname = $_POST['vorname'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $fehler = "Email-Adresse beriets vorhanden";
          } else {
            redirect("index.php?aktion=alleBenutzer");
          }
        }
      }
    }
    $this->addContext("anrede", $anrede);
    $this->addContext("vorname", $vorname);
    $this->addContext("name", $name);
    $this->addContext("email", $email);
    $this->addContext("fehler", $fehler);
  }

  public function editAktion() {}
}
