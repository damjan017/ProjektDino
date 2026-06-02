<?php
$taskType = "edit";
$classSettings = Mitgast::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Mitgast";
$id = $_GET["id"];
Core::setView("Mitgast_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Mitgast");
$Mitgast = new Mitgast();
Mitgast::$activeViewport = "edit";
Mitgast::renderScript("edit", "form_Mitgast");
$Mitgast->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Mitgast->loadFormData();
    if ($a === true) {
        if ($Mitgast->update() != "0") {
            Core::redirect("Mitgast_detail&id=$id");
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}
$_Buchung = Buchung::findAll();
Core::publish($_Buchung, "_Buchung");
Core::publish($Mitgast, "Mitgast");
