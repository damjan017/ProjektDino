<?php
$taskType = "edit";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Unterkunft";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
Core::setView("Unterkunft_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Unterkunft");

$Unterkunft = new Unterkunft();
$Adresse = new Adresse();
$hotelierId = (int) Core::$user->roleid;

Unterkunft::$activeViewport = "edit";
Unterkunft::renderScript("edit", "form_Unterkunft");

if (!$Unterkunft->loadDBData($id)) {
    Core::redirect("Unterkunft", ["errorMsg" => "Unterkunft wurde nicht gefunden"]);
    return;
}

if ($hotelierId <= 0 || (int) $Unterkunft->_Hotelier !== $hotelierId) {
    Core::redirect("Unterkunft", ["errorMsg" => "Diese Unterkunft gehört nicht zum angemeldeten Hotelier"]);
    return;
}

if (!$Adresse->loadDBData($Unterkunft->_Adresse)) {
    Core::redirect("Unterkunft", ["errorMsg" => "Die Adresse der Unterkunft wurde nicht gefunden"]);
    return;
}

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $Unterkunft->Name = trim((string) filter_input(INPUT_POST, "Name"));
    $Unterkunft->Beschreibung = trim((string) filter_input(INPUT_POST, "Beschreibung"));
    $bewertung = filter_input(INPUT_POST, "Bewertung", FILTER_SANITIZE_NUMBER_INT);
    $Unterkunft->Bewertung = ($bewertung === "" ? null : $bewertung);
    $Unterkunft->Unterkunftsart = filter_input(INPUT_POST, "Unterkunftsart", FILTER_SANITIZE_NUMBER_INT);
    $Unterkunft->_Hotelier = $hotelierId;

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

        $adresseGespeichert = $Adresse->update();
        $unterkunftGespeichert = false;
        if ($adresseGespeichert) {
            $Unterkunft->_Adresse = $Adresse->id;
            $unterkunftGespeichert = $Unterkunft->update();
        }

        if ($adresseGespeichert && $unterkunftGespeichert) {
            Core::$pdo->commit();

            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Unterkunft_field = Unterkunft::$dataScheme[$filekey];
                    if ($Unterkunft_field["type"] == "picture") {
                        $Unterkunft->updateFile($filekey);
                    }
                }
            }

            Core::redirect("Unterkunft_detail&id=$id", ["message" => "Unterkunft erfolgreich aktualisiert"]);
            return;
        }

        if (Core::$pdo->inTransaction()) {
            Core::$pdo->rollBack();
        }
        Core::addError("Unterkunft und Adresse konnten nicht aktualisiert werden");
    }
}

$UnterkunftsartT = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT, "UnterkunftsartT");
Core::publish($Adresse, "Adresse");
Core::publish($Unterkunft, "Unterkunft");
