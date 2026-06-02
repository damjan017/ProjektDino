<?php
$taskType = "new";
$classSettings = Hotelier::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Hotelier";
Core::setView("Hotelier_new", "view1", "new");
Core::setViewScheme("view1", "new", "Hotelier");
$Hotelier = new Hotelier();
Hotelier::$activeViewport = "new";
Hotelier::renderScript("new", "form_Hotelier");

if (count($_POST) > 0) {
    $a = $Hotelier->loadFormData();
    if ($a === true) {
        // Passwort hashen vor dem Speichern
        if (isset($_POST["Passwort"]) && $_POST["Passwort"] != "") {
            $Hotelier->Passwort = password_hash($_POST["Passwort"], PASSWORD_DEFAULT);
        }
        if ($Hotelier->create() != "0") {
            Core::redirect("Hotelier_detail&id=" . $Hotelier->id, ["message" => "Hotelier erfolgreich angelegt"]);
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}
Core::publish($Hotelier, "Hotelier");
