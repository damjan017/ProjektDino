<?php
require_once 'includes/ausstattung.functions.php';

$taskType = "edit";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Unterkunft";
$id = $_GET["id"];
Core::setView("Unterkunft_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Unterkunft");
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "edit";
Unterkunft::renderScript("edit", "form_Unterkunft");
$Unterkunft->loadDBData($id);

$Ausstattung_list = Ausstattung::findAll();
$selectedAusstattungIds = assignedAusstattungIds($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $selectedAusstattungIds = existingAusstattungIds(postedAusstattungIds(), $Ausstattung_list);
    $a = $Unterkunft->loadFormData();
    if ($a === true) {
        try {
            Core::$pdo->beginTransaction();
            if (!$Unterkunft->update()) {
                throw new RuntimeException('Unterkunft konnte nicht aktualisiert werden');
            }
            saveUnterkunftAusstattung($id, $selectedAusstattungIds);
            Core::$pdo->commit();

            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Unterkunft_field = Unterkunft::$dataScheme[$filekey];
                    if ($Unterkunft_field["type"] == "picture") {
                        $Unterkunft->updateFile($filekey);
                    }
                }
            }
            Core::redirect("Unterkunft_detail&id=$id", ["message" => "Unterkunft und Ausstattung erfolgreich aktualisiert"]);
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

$_Adresse = Adresse::findAll();
Core::publish($_Adresse, "_Adresse");
$_Hotelier = Hotelier::findAll();
Core::publish($_Hotelier, "_Hotelier");
$UnterkunftsartT = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT, "UnterkunftsartT");
Core::publish($Ausstattung_list, "Ausstattung_list");
Core::publish($selectedAusstattungIds, "selectedAusstattungIds");
Core::publish($Unterkunft, "Unterkunft");
