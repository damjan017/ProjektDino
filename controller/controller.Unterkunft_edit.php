<?php
$taskType = "edit";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Edit: Unterkunft";
$id = $_GET["id"];
Core::setView("Unterkunft_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Unterkunft");
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "edit";
Unterkunft::renderScript("edit", "form_Unterkunft");
$Unterkunft->loadDBData($id);

if (count($_POST) > 0 && $_GET["task"] != "favoriten") {
    $a = $Unterkunft->loadFormData();
    if ($a === true) {
        if ($Unterkunft->update() != "0") {
            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Unterkunft_field = Unterkunft::$dataScheme[$filekey];
                    if ($Unterkunft_field["type"] == "picture") {
                        $Unterkunft->updateFile($filekey);
                    }
                }
            }
            Core::redirect("Unterkunft_detail&id=$id");
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}

$_Adresse = Adresse::findAll();
Core::publish($_Adresse, "_Adresse");
$_Hotelier = Hotelier::findAll();
Core::publish($_Hotelier, "_Hotelier");
$UnterkunftsartT = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT, "UnterkunftsartT");
Core::publish($Unterkunft, "Unterkunft");
