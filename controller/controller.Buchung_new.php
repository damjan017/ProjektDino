<?php
// Buchungsworkflow: Schritt 1 - Kundendaten + Buchungsdetails erfassen
// Kein Berechtigungscheck: Gäste buchen laut Aufgabenstellung ohne Kundenkonto/Login.
Core::$title = "Zimmer buchen";
Core::setView("Buchung_new", "view1", "new");
Core::setViewScheme("view1", "new", "Buchung");

$Buchung = new Buchung();
Buchung::$activeViewport = "new";
Buchung::renderScript("new", "form_Buchung");

// Zimmertyp-ID aus der Suche übernehmen
if (isset($_GET["zimmertyp_id"])) {
    $Buchung->_Zimmertyp = $_GET["zimmertyp_id"];
    $Zimmertyp = new Zimmertyp();
    $Zimmertyp->loadDBData($_GET["zimmertyp_id"], [], true);
    Core::publish($Zimmertyp, "Zimmertyp");
    $Unterkunft = new Unterkunft();
    $Unterkunft->loadDBData($Zimmertyp->_Unterkunft, [], true);
    Core::publish($Unterkunft, "Unterkunft");
}

// Check-in/out aus der Suche übernehmen
if (isset($_GET["checkin"])) {
    $Buchung->checkin = $_GET["checkin"];
}
if (isset($_GET["checkout"])) {
    $Buchung->checkout = $_GET["checkout"];
}
if (isset($_GET["anzahl_gaeste"])) {
    $Buchung->AnzahlGaeste = $_GET["anzahl_gaeste"];
}

if (count($_POST) > 0 && isset($_POST["buchen"])) {
    $checkin     = filter_input(INPUT_POST, "checkin");
    $checkout    = filter_input(INPUT_POST, "checkout");
    $zimmertypId = filter_input(INPUT_POST, "_Zimmertyp", FILTER_SANITIZE_NUMBER_INT);

    $ZT = new Zimmertyp();
    $ZT->loadDBData($zimmertypId, [], true);

    if (!$ZT->berechneVerfuegbarkeit(true, $checkin, $checkout)) {
        Core::addError("Dieser Zimmertyp ist im gewählten Zeitraum leider nicht mehr verfügbar");
    } else {
        // Schritt 1: Kundendaten anlegen
        $Kunde = new Kunde();
        $Kunde->Vorname    = filter_input(INPUT_POST, "Vorname", FILTER_SANITIZE_STRING);
        $Kunde->Nachname   = filter_input(INPUT_POST, "Nachname", FILTER_SANITIZE_STRING);
        $Kunde->Email      = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_EMAIL);
        $Kunde->Geburtsdatum       = filter_input(INPUT_POST, "Geburtsdatum");
        $Kunde->Personalausweisnrummer = filter_input(INPUT_POST, "Personalausweisnrummer", FILTER_SANITIZE_STRING);

        if (!$Kunde->pruefeAlter(true)) {
            Core::addError("Für die Buchung muss der Hauptgast mindestens 18 Jahre alt sein");
        } elseif ($Kunde->create() != "0") {
            // Schritt 2: Buchung anlegen
            $Buchung->_Kunde       = $Kunde->id;
            $Buchung->checkin      = $checkin;
            $Buchung->checkout     = $checkout;
            $Buchung->AnzahlGaeste = filter_input(INPUT_POST, "AnzahlGaeste", FILTER_SANITIZE_NUMBER_INT);
            $Buchung->_Zimmertyp   = $zimmertypId;
            $Buchung->Zahlungsart  = filter_input(INPUT_POST, "Zahlungsart", FILTER_SANITIZE_NUMBER_INT);

            // Gesamtpreis ueber die Zimmertyp-Methode berechnen
            $Buchung->Gesamtpreis    = $ZT->berechnePreis(true, $checkin, $checkout);
            $Buchung->Zahlungsbetrag = $Buchung->Gesamtpreis;
            $Buchung->Status         = 1; // offen

            // Hotelier der Unterkunft ermitteln
            $UK = new Unterkunft();
            $UK->loadDBData($ZT->_Unterkunft, [], true);
            $Buchung->_Hotelier = $UK->_Hotelier;

            if ($Buchung->create() != "0") {
                // Mitgäste speichern
                $anzahl = $Buchung->AnzahlGaeste - 1; // Hauptgast zählt nicht als Mitgast
                for ($i = 1; $i <= $anzahl; $i++) {
                    if (isset($_POST["mg_Vorname_$i"]) && $_POST["mg_Vorname_$i"] != "") {
                        $MG = new Mitgast();
                        $MG->_Buchung          = $Buchung->id;
                        $MG->Vorname           = filter_input(INPUT_POST, "mg_Vorname_$i", FILTER_SANITIZE_STRING);
                        $MG->Nachname          = filter_input(INPUT_POST, "mg_Nachname_$i", FILTER_SANITIZE_STRING);
                        $MG->Geburtsdatum      = filter_input(INPUT_POST, "mg_Geburtsdatum_$i");
                        $MG->Personalausweisnr = filter_input(INPUT_POST, "mg_Personalausweisnr_$i", FILTER_SANITIZE_STRING);
                        $MG->create();
                    }
                }
                Core::redirect("Buchung_bestaetigung&id=" . $Buchung->id, ["message" => "Buchung erfolgreich!"]);
            } else {
                Core::addError("Die Buchung konnte nicht gespeichert werden");
            }
        } else {
            Core::addError("Die Kundendaten waren nicht korrekt");
        }
    }
}

// Enumerationen für das Formular
$ZahlungsartT = ZahlungsartT::findAll();
Core::publish($ZahlungsartT, "ZahlungsartT");
$_Zimmertyp = Zimmertyp::findAll();
Core::publish($_Zimmertyp, "_Zimmertyp");
Core::publish($Buchung, "Buchung");
