<?php
require_once 'includes/ausstattung.functions.php';

$taskType = "new";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Unterkunft";
Core::setView("Unterkunft_new", "view1", "new");
Core::setViewScheme("view1", "new", "Unterkunft");
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "new";
Unterkunft::renderScript("new", "form_Unterkunft");

$Ausstattung_list = Ausstattung::findAll();
$selectedAusstattungIds = [];

if (count($_POST) > 0) {
    $selectedAusstattungIds = existingAusstattungIds(postedAusstattungIds(), $Ausstattung_list);
    $a = $Unterkunft->loadFormData();
    if ($a === true) {
        try {
            Core::$pdo->beginTransaction();
            if ($Unterkunft->create() == "0") {
                throw new RuntimeException('Unterkunft konnte nicht gespeichert werden');
            }
            saveUnterkunftAusstattung($Unterkunft->id, $selectedAusstattungIds);
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
        } catch (Throwable $error) {
            if (Core::$pdo->inTransaction()) {
                Core::$pdo->rollBack();
            }
            Core::addError("Unterkunft und Ausstattung konnten nicht vollständig gespeichert werden");
            Core::debug($error->getMessage());
        }
    } else {
        Core::addError("Die eingegebenen Daten waren nicht korrekt");
    }
}

// Fremdschlüssel laden
$_Adresse = Adresse::findAll();
Core::publish($_Adresse, "_Adresse");
$_Hotelier = Hotelier::findAll();
Core::publish($_Hotelier, "_Hotelier");
// Enumerationen
$UnterkunftsartT = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT, "UnterkunftsartT");
Core::publish($Ausstattung_list, "Ausstattung_list");
Core::publish($selectedAusstattungIds, "selectedAusstattungIds");
Core::publish($Unterkunft, "Unterkunft");
