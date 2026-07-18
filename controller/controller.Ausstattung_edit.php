<?php
$taskType = "edit";
$classSettings = Ausstattung::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Ausstattung";
$id = $_GET["id"];
Core::setView("Ausstattung_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Ausstattung");
$Ausstattung = new Ausstattung();
Ausstattung::$activeViewport = "edit";
Ausstattung::renderScript("edit", "form_Ausstattung");
$Ausstattung->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Ausstattung->loadFormData();
    if ($a === true) {
        if ($Ausstattung->update() != "0") {
            Core::redirect("Ausstattung_detail&id=$id");
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
