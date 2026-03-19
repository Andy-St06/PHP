<?php

class IndexController extends AbstractBase
{
  //alle Anzeigen Funktionen
  public function alleKlassenAktion()
  {
    $this->addContext("allklasse", Klasse::findeAlle());
  }
  public function alleRaumAktion()
  {
    $this->addContext("allraum", Raum::findeAlle());
  }
  public function alleLehrerAktion()
  {
    $this->addContext("alllehrer", Lehrer::findeAlle());
  }
  public function alleSchuelerAktion()
  {
    $this->addContext("allschueler", Schueler::findeAlle());
  }

  //Speziele Funktionnen
  public function schuelerAktion()
  {
    $klasse = Klasse::finde($_GET["id"]);
    $this->addContext("schuelerinklasse", $klasse->getSchueler());
  }

  public function lehrerAktion()
  {
    $klasse = Klasse::finde($_GET["id"]);
    $this->addContext('klasse', $klasse);
    $this->addContext("lehrerinklasse", $klasse->getLehrer());
  }

  public function schuelerEntfernenAktion()
  {
    $schueler = Schueler::finde($_GET['id']);
    $klasseId = $_GET['id2'] ?? null;
    if ($schueler && $klasseId) {
      $schueler->setKlasse_id(0);
      $schueler->speichere();
      redirect('index.php?aktion=schueler&id=' . $klasseId);
    }
  }


  //Hinzufügen Zu
  public function lehrerZuKlasseHinzufuegenAktion()
  {
    $klasseid = $_GET['id'];
    $fehler = '';
    if ($_POST) {
      $lehrer = Lehrer::finde($_POST["lehrer"]);
      $klasse = Klasse::finde($_POST["klasseid"]);
      try {
        $klasse->addLehrer($lehrer);
        redirect('index.php?aktion=lehrer&id=' . $klasse->getId());
      } catch (PDOException $e) {
        $fehler = "Lehrer wurde schon hizugefügt";
      }
    }
    $this->addContext('fehler', $fehler);
    $this->addContext('klasseid', $klasseid);
    $this->addContext('alllehrer', Lehrer::findeAlle());
  }

  public function newSchuelerAktion()
  {
    $klassen = Klasse::findeAlle();
    $vorname = '';
    $nachname = '';
    $geburtsdatum = '';
    $fehler = '';

    if ($_POST) {
      if (isset($_POST['vorname'], $_POST['nachname'], $_POST['geburtsdatum'])) {
        $vorname = trim($_POST['vorname']);
        $nachname = trim($_POST['nachname']);
        $geburtsdatum = trim($_POST['geburtsdatum']);
        if ($vorname === '' || $nachname === '' || $geburtsdatum === '') {
          $fehler = 'Bitte alle Felder ausfüllen.';
        } else {
          $schueler = new Schueler();
          $schueler->setVorname($vorname);
          $schueler->setNachname($nachname);
          $schueler->setGebutsdatum($geburtsdatum);
          try {
            $schueler->speichere();
            redirect('index.php?aktion=alleSchueler');
          } catch (PDOException $ex) {
            $fehler = $ex->getMessage();
          }
        }
      }
    }
    $this->addContext('allKlasse', $klassen);
    $this->addContext('vorname', $vorname);
    $this->addContext('nachname', $nachname);
    $this->addContext('geburtsdatum', $geburtsdatum);
    $this->addContext('fehler', $fehler);
  }

  //NEW
  public function schuelerHinzufuegenAktion()
  {
    $schueler1 = Schueler::findeAlle();
    $klasse1 = Klasse::finde($_GET['id']);
    $fehler = '';
    if ($_POST) {
      $schueler = Schueler::finde($_POST['schuelerid']);
      $klasse = Klasse::finde($_POST['klasseid']);
      try {
        $schueler->setKlasse($klasse);
        $schueler->speichere();
        redirect('index.php?aktion=alleKlassen');
        $this->addContext('klasse', $klasse);
      } catch (PDOException $ex) {
        $fehler = $ex->getMessage();
        $this->addContext('klasse', $klasse);
        $this->addContext('allschueler', $schueler);
        $this->addContext('fehler', $fehler);
      }
    }
    $this->addContext('klasse', $klasse1);
    $this->addContext('allschueler', $schueler1);
    $this->addContext('fehler', $fehler);
  }

  public function raumHinzufuegenAktion()
  {
    $bezeichnung = '';
    $fehler = '';
    if ($_POST) {
      if (isset($_POST['bezeichnung'])) {
        $bezeichnung = trim($_POST['bezeichnung']);
        if ($bezeichnung === '') {
          $fehler = 'Bitte alle Felder ausfüllen.';
        } else {
          $raum = new Raum();
          $raum->setBezeichnung($bezeichnung);
          try {
            $raum->speichere();
            redirect('index.php?aktion=alleRaum');
            return;
          } catch (PDOException $ex) {
            $fehler = 'Beim Speichern ist ein Fehler aufgetreten.';
          }
        }
      }
    }
    $this->addContext('bezeichnung', $bezeichnung);
    $this->addContext('fehler', $fehler);
  }

  public function klasseHinzufuegenAktion()
  {
    $allraum = Raum::findeAlle();
    $alllehrer = Lehrer::findeAlle();
    $name = '';
    $fehler = '';

    if ($_POST) {
      if (isset($_POST['name'], $_POST['raum_id'], $_POST['klassenlehrer'])) {
        $name = trim($_POST['name']);
        $raum = $_POST['raum_id'];
        $lehrer = $_POST['klassenlehrer'];
        if ($name === '' || $raum === '' || $lehrer === '') {
          $fehler = 'Bitte alle Felder ausfüllen.';
        } else {
          $klasse = new Klasse($_POST);
          $klasse->addLehrer($lehrer);
          try {
            $klasse->speichere();
            redirect('index.php?aktion=alleKlassen');
            return;
          } catch (PDOException $ex) {
            $fehler = 'Beim Speichern ist ein Fehler aufgetreten.';
          }
        }
      }
    }

    $this->addContext('allraum', $allraum);
    $this->addContext('alllehrer', $alllehrer);
    $this->addContext('name', $name);
    $this->addContext('fehler', $fehler);
  }

  public function lehrerHinzufuegenAktion()
  {
    $vorname = '';
    $nachname = '';
    $fehler = '';

    if ($_POST) {
      if (isset($_POST['vorname'], $_POST['nachname'])) {
        $vorname = trim($_POST['vorname']);
        $nachname = trim($_POST['nachname']);

        if ($vorname === '' || $nachname === '') {
          $fehler = 'Bitte alle Felder ausfüllen.';
        } else {
          $lehrer = new Lehrer();
          $lehrer->setVorname($vorname);
          $lehrer->setNachname($nachname);
          try {
            $lehrer->speichere();
            redirect('index.php?aktion=alleLehrer');
            return;
          } catch (PDOException $ex) {
            $fehler = 'Beim Speichern ist ein Fehler aufgetreten.';
          }
        }
      }
    }
    $this->addContext('vorname', $vorname);
    $this->addContext('nachname', $nachname);
    $this->addContext('fehler', $fehler);
  }



  /*
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
  */
}
