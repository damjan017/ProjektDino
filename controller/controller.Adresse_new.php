<?php
$taskType = "new";
$classSettings = Adresse::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Adresse";
Core::setView("Adresse_new", "view1", "new");
Core::setViewScheme("view1", "new", "Adresse");
$Adresse = new Adresse();
Adresse::$activeViewport = "new";
Adresse::renderScript("new", "form_Adresse");

if (count($_POST) > 0) {
    $a = $Adresse->loadFormData();
    if ($a === true) {
        if ($Adresse->create() != "0") {
            Core::redirect("Adresse_detail&id=" . $Adresse->id, ["message" => "Adresse erfolgreich angelegt"]);
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}
Core::publish($Adresse, "Adresse");
