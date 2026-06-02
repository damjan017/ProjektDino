<?php
$taskType = "edit";
$classSettings = Zimmertyp::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Zimmertyp";
$id = $_GET["id"];
Core::setView("Zimmertyp_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Zimmertyp");
$Zimmertyp = new Zimmertyp();
Zimmertyp::$activeViewport = "edit";
Zimmertyp::renderScript("edit", "form_Zimmertyp");
$Zimmertyp->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Zimmertyp->loadFormData();
    if ($a === true) {
        if ($Zimmertyp->update() != "0") {
            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Zimmertyp_field = Zimmertyp::$dataScheme[$filekey];
                    if ($Zimmertyp_field["type"] == "picture") {
                        $Zimmertyp->updateFile($filekey);
                    }
                }
            }
            Core::redirect("Zimmertyp_detail&id=$id");
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}

$_Unterkunft = Unterkunft::findAll();
Core::publish($_Unterkunft, "_Unterkunft");
$ZimmertypT = ZimmertypT::findAll();
Core::publish($ZimmertypT, "ZimmertypT");
Core::publish($Zimmertyp, "Zimmertyp");
