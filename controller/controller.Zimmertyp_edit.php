<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Zimmertypen verwalten"]);
    return;
}

$taskType = "edit";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Zimmertyp";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
Core::setView("Zimmertyp_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Zimmertyp");

$Zimmertyp = new Zimmertyp();
$hotelierId = (int) Core::$user->roleid;
$eigeneUnterkuenfte = [];

Zimmertyp::$activeViewport = "edit";
Zimmertyp::renderScript("edit", "form_Zimmertyp");

if ($hotelierId > 0) {
    $eigeneUnterkuenfte = Unterkunft::query(
        "SELECT id, Name FROM Unterkunft WHERE _Hotelier = ? ORDER BY Name",
        [$hotelierId],
        true
    );
} else {
    Core::redirect("Zimmertyp", ["errorMsg" => "Dem Benutzer ist kein Hotelier-Profil zugeordnet"]);
    return;
}

if (!$Zimmertyp->loadDBData($id)) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Zimmertyp wurde nicht gefunden"]);
    return;
}

$zimmertypGehoertZumHotelier = false;
foreach ($eigeneUnterkuenfte as $Unterkunft) {
    if ((int) $Unterkunft->id === (int) $Zimmertyp->_Unterkunft) {
        $zimmertypGehoertZumHotelier = true;
    }
}

if (!$zimmertypGehoertZumHotelier) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Dieser Zimmertyp gehört nicht zum angemeldeten Hotelier"]);
    return;
}

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $formulardatenKorrekt = $Zimmertyp->loadFormData();
    $ausgewaehlteUnterkunftIstEigen = false;

    foreach ($eigeneUnterkuenfte as $Unterkunft) {
        if ((int) $Unterkunft->id === (int) $Zimmertyp->_Unterkunft) {
            $ausgewaehlteUnterkunftIstEigen = true;
        }
    }

    if (!$ausgewaehlteUnterkunftIstEigen) {
        Core::addError("Bitte eine eigene Unterkunft auswählen");
        $formulardatenKorrekt = false;
    }

    if ((int) $Zimmertyp->Aktionaktiv > 0
        && ((float) $Zimmertyp->Aktionspreis <= 0 || (float) $Zimmertyp->Aktionspreis >= (float) $Zimmertyp->Preis)) {
        Core::addError("Der Aktionspreis muss größer als 0 und kleiner als der reguläre Preis sein");
        $formulardatenKorrekt = false;
    }

    if ($formulardatenKorrekt === true) {
        if ($Zimmertyp->update()) {
            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Zimmertyp_field = Zimmertyp::$dataScheme[$filekey];
                    if ($Zimmertyp_field["type"] == "picture") {
                        $Zimmertyp->updateFile($filekey);
                    }
                }
            }
            Core::redirect("Zimmertyp_detail&id=$id", ["message" => "Zimmertyp erfolgreich aktualisiert"]);
            return;
        }
        Core::addError("Der Datenbankeintrag war nicht erfolgreich");
    }
}

$ZimmertypT = ZimmertypT::findAll();
Core::publish($eigeneUnterkuenfte, "_Unterkunft");
Core::publish($ZimmertypT, "ZimmertypT");
Core::publish($Zimmertyp, "Zimmertyp");
