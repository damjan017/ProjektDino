<?php
$taskType = "new";
$classSettings = Mitgast::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Mitgast";
Core::setView("Mitgast_new", "view1", "new");
Core::setViewScheme("view1", "new", "Mitgast");
$Mitgast = new Mitgast();
Mitgast::$activeViewport = "new";
Mitgast::renderScript("new", "form_Mitgast");

if (count($_POST) > 0) {
    $a = $Mitgast->loadFormData();
    if ($a === true) {
        if ($Mitgast->create() != "0") {
            Core::redirect("Mitgast_detail&id=" . $Mitgast->id, ["message" => "Mitgast erfolgreich angelegt"]);
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
