<?php
$datei = "liste.txt";
if (file_exists($datei)) {
    // Datei als ganze Zeichenkette einlesen
    $text_ganz = file_get_contents($datei);
    echo "Als Zeichenkette eingelesene Datei " . $datei . ": " . $text_ganz;
    // z.B. einen Text hinzufügen und wieder abspeichern
    $text_ganz .= " noch ein Text\n";
    file_put_contents($datei, $text_ganz);
}
