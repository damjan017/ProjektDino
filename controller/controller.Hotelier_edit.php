<?php
$taskType = "edit";
$classSettings = Hotelier::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Hotelier";
$id = $_GET["id"];
Core::setView("Hotelier_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Hotelier");
$Hotelier = new Hotelier();
Hotelier::$activeViewport = "edit";
Hotelier::renderScript("edit", "form_Hotelier");
$Hotelier->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Hotelier->loadFormData();
    if ($a === true) {
        if ($Hotelier->update() != "0") {
            Core::redirect("Hotelier_detail&id=$id");
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}
Core::publish($Hotelier, "Hotelier");
