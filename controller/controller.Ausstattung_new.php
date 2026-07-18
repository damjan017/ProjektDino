<?php
$taskType = "new";
$classSettings = Ausstattung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Ausstattung";
Core::setView("Ausstattung_new", "view1", "new");
Core::setViewScheme("view1", "new", "Ausstattung");
$Ausstattung = new Ausstattung();
Ausstattung::$activeViewport = "new";
Ausstattung::renderScript("new", "form_Ausstattung");

if (count($_POST) > 0) {
    $a = $Ausstattung->loadFormData();
    if ($a === true) {
        if ($Ausstattung->create() != "0") {
            Core::redirect("Ausstattung_detail&id=" . $Ausstattung->id, ["message" => "Ausstattung erfolgreich angelegt"]);
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}
$AusstattungskategorieT = AusstattungskategorieT::findAll();
Core::publish($AusstattungskategorieT, "AusstattungskategorieT");
Core::publish($Ausstattung, "Ausstattung");
