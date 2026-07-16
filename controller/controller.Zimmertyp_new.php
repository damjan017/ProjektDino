<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Zimmertypen verwalten"]);
    return;
}

$taskType = "new";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Zimmertyp";
Core::setView("Zimmertyp_new", "view1", "new");
Core::setViewScheme("view1", "new", "Zimmertyp");

$Zimmertyp = new Zimmertyp();
$hotelierId = (int) Core::$user->roleid;
$eigeneUnterkuenfte = [];

Zimmertyp::$activeViewport = "new";
Zimmertyp::renderScript("new", "form_Zimmertyp");

if ($hotelierId > 0) {
    $eigeneUnterkuenfte = Unterkunft::query(
        "SELECT id, Name FROM Unterkunft WHERE _Hotelier = ? ORDER BY Name",
        [$hotelierId],
        true
    );
} else {
    Core::addError("Dem angemeldeten Benutzer ist kein Hotelier-Profil zugeordnet");
}

if (count($_POST) > 0) {
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
        if ($Zimmertyp->create() != "0") {
            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Zimmertyp_field = Zimmertyp::$dataScheme[$filekey];
                    if ($Zimmertyp_field["type"] == "picture") {
                        $Zimmertyp->updateFile($filekey);
                    }
                }
            }
            Core::redirect("Zimmertyp_detail&id=" . $Zimmertyp->id, ["message" => "Zimmertyp erfolgreich angelegt"]);
            return;
        }
        Core::addError("Der Datenbankeintrag war nicht erfolgreich");
    }
}

$ZimmertypT = ZimmertypT::findAll();
Core::publish($eigeneUnterkuenfte, "_Unterkunft");
Core::publish($ZimmertypT, "ZimmertypT");
Core::publish($Zimmertyp, "Zimmertyp");
