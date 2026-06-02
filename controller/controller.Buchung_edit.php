<?php
$taskType = "edit";
$classSettings = Buchung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Buchung";
$id = $_GET["id"];
Core::setView("Buchung_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Buchung");
$Buchung = new Buchung();
Buchung::$activeViewport = "edit";
Buchung::renderScript("edit", "form_Buchung");
$Buchung->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Buchung->loadFormData();
    if ($a === true) {
        if ($Buchung->update() != "0") {
            Core::redirect("Buchung_detail&id=$id");
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}

$_Kunde = Kunde::findAll();
Core::publish($_Kunde, "_Kunde");
$_Zimmertyp = Zimmertyp::findAll();
Core::publish($_Zimmertyp, "_Zimmertyp");
$ZahlungsartT = ZahlungsartT::findAll();
Core::publish($ZahlungsartT, "ZahlungsartT");
$StatusT = StatusT::findAll();
Core::publish($StatusT, "StatusT");
Core::publish($Buchung, "Buchung");
