<?php
$taskType = "new";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Zimmertyp";
Core::setView("Zimmertyp_new", "view1", "new");
Core::setViewScheme("view1", "new", "Zimmertyp");
$Zimmertyp = new Zimmertyp();
Zimmertyp::$activeViewport = "new";
Zimmertyp::renderScript("new", "form_Zimmertyp");

if (count($_POST) > 0) {
    $a = $Zimmertyp->loadFormData();
    if ($a === true) {
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
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}

// Fremdschlüssel
$_Unterkunft = Unterkunft::findAll();
Core::publish($_Unterkunft, "_Unterkunft");
// Enumerationen
$ZimmertypT = ZimmertypT::findAll();
Core::publish($ZimmertypT, "ZimmertypT");
Core::publish($Zimmertyp, "Zimmertyp");
