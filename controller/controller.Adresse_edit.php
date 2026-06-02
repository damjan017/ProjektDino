<?php
$taskType = "edit";
$classSettings = Adresse::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Adresse";
$id = $_GET["id"];
Core::setView("Adresse_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Adresse");
$Adresse = new Adresse();
Adresse::$activeViewport = "edit";
Adresse::renderScript("edit", "form_Adresse");
$Adresse->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Adresse->loadFormData();
    if ($a === true) {
        if ($Adresse->update() != "0") {
            Core::redirect("Adresse_detail&id=$id");
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}
Core::publish($Adresse, "Adresse");
