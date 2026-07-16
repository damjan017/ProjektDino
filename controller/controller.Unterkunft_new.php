<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Unterkünfte verwalten"]);
    return;
}

$taskType = "new";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Unterkunft";
Core::setView("Unterkunft_new", "view1", "new");
Core::setViewScheme("view1", "new", "Unterkunft");

$Unterkunft = new Unterkunft();
$Adresse = new Adresse();
$hotelierId = (int) Core::$user->roleid;

Unterkunft::$activeViewport = "new";
Unterkunft::renderScript("new", "form_Unterkunft");

if ($hotelierId <= 0) {
    Core::addError("Dem angemeldeten Benutzer ist kein Hotelier-Profil zugeordnet");
}

if (count($_POST) > 0) {
    // Unterkunftsdaten aus dem gemeinsamen Formular übernehmen.
    $Unterkunft->Name = trim((string) filter_input(INPUT_POST, "Name"));
    $Unterkunft->Beschreibung = trim((string) filter_input(INPUT_POST, "Beschreibung"));
    $bewertung = filter_input(INPUT_POST, "Bewertung", FILTER_SANITIZE_NUMBER_INT);
    $Unterkunft->Bewertung = ($bewertung === "" ? null : $bewertung);
    $Unterkunft->Unterkunftsart = filter_input(INPUT_POST, "Unterkunftsart", FILTER_SANITIZE_NUMBER_INT);
    $Unterkunft->_Hotelier = $hotelierId;

    // Die Adresse wird im selben Formular erfasst, aber als eigener Datensatz gespeichert.
    $Adresse->Straße = trim((string) filter_input(INPUT_POST, "Strasse"));
    $Adresse->Hausnummer = filter_input(INPUT_POST, "Hausnummer", FILTER_SANITIZE_NUMBER_INT);
    $Adresse->Postleitzahl = filter_input(INPUT_POST, "Postleitzahl", FILTER_SANITIZE_NUMBER_INT);
    $Adresse->Ortschaft = trim((string) filter_input(INPUT_POST, "Ortschaft"));
    $breitengrad = str_replace(",", ".", trim((string) filter_input(INPUT_POST, "Breitengrad")));
    $laengengrad = str_replace(",", ".", trim((string) filter_input(INPUT_POST, "Laengengrad")));
    $distanzzurStadt = filter_input(INPUT_POST, "DistanzzurStadt", FILTER_SANITIZE_NUMBER_INT);
    $Adresse->Breitengrad = ($breitengrad === "" ? null : $breitengrad);
    $Adresse->Laengengrad = ($laengengrad === "" ? null : $laengengrad);
    $Adresse->DistanzzurStadt = ($distanzzurStadt === "" ? null : $distanzzurStadt);

    $eingabenKorrekt = true;
    if ($hotelierId <= 0) {
        $eingabenKorrekt = false;
    }
    if ($Unterkunft->Name == "" || !$Unterkunft->Unterkunftsart) {
        Core::addError("Bitte Name und Unterkunftsart angeben");
        $eingabenKorrekt = false;
    }
    if ($Adresse->Straße == "" || !$Adresse->Hausnummer || !$Adresse->Postleitzahl || $Adresse->Ortschaft == "") {
        Core::addError("Bitte Straße, Hausnummer, Postleitzahl und Ort vollständig angeben");
        $eingabenKorrekt = false;
    }
    if ($Adresse->validate() !== true || $Unterkunft->validate() !== true) {
        $eingabenKorrekt = false;
    }

    if ($eingabenKorrekt) {
        Core::$pdo->beginTransaction();

        $adresseId = $Adresse->create();
        if ($adresseId != "0") {
            $Unterkunft->_Adresse = $adresseId;
            $unterkunftId = $Unterkunft->create();
            $gespeicherteUnterkunft = [];

            if ($unterkunftId != "0") {
                $gespeicherteUnterkunft = Unterkunft::query(
                    "SELECT id FROM Unterkunft WHERE id = ? AND _Adresse = ? AND _Hotelier = ?",
                    [$unterkunftId, $adresseId, $hotelierId],
                    true
                );
            }

            if (count($gespeicherteUnterkunft) === 1) {
                Core::$pdo->commit();

                foreach ($_FILES as $filekey => $file) {
                    if ($file["name"] != "") {
                        $Unterkunft_field = Unterkunft::$dataScheme[$filekey];
                        if ($Unterkunft_field["type"] == "picture") {
                            $Unterkunft->updateFile($filekey);
                        }
                    }
                }

                Core::redirect("Unterkunft_detail&id=" . $Unterkunft->id, ["message" => "Unterkunft erfolgreich angelegt"]);
                return;
            }
        }

        if (Core::$pdo->inTransaction()) {
            Core::$pdo->rollBack();
        }
        Core::addError("Unterkunft und Adresse konnten nicht gespeichert werden");
    }
}

$UnterkunftsartT = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT, "UnterkunftsartT");
Core::publish($Adresse, "Adresse");
Core::publish($Unterkunft, "Unterkunft");
