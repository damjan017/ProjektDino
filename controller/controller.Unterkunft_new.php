<?php
$taskType = "new";
$classSettings = Unterkunft::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title = "Neu: Unterkunft";
Core::setView("Unterkunft_new", "view1", "new");
Core::setViewScheme("view1", "new", "Unterkunft");
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "new";
Unterkunft::renderScript("new", "form_Unterkunft");

if (count($_POST) > 0) {
    $a = $Unterkunft->loadFormData();
    if ($a === true) {
        if ($Unterkunft->create() != "0") {
            foreach ($_FILES as $filekey => $file) {
                if ($file["name"] != "") {
                    $Unterkunft_field = Unterkunft::$dataScheme[$filekey];
                    if ($Unterkunft_field["type"] == "picture") {
                        $Unterkunft->updateFile($filekey);
                    }
                }
            }
            Core::redirect("Unterkunft_detail&id=" . $Unterkunft->id, ["message" => "Unterkunft erfolgreich angelegt"]);
        } else {
            Core::addError("Der Datenbankeintrag war nicht erfolgreich");
        }
    } else {
        Core::addError("Die Eingegebenen Daten waren nicht korrekt");
    }
}

// Fremdschlüssel laden
$_Adresse = Adresse::findAll();
Core::publish($_Adresse, "_Adresse");
$_Hotelier = Hotelier::findAll();
Core::publish($_Hotelier, "_Hotelier");
// Enumerationen
$UnterkunftsartT = UnterkunftsartT::findAll();
Core::publish($UnterkunftsartT, "UnterkunftsartT");
Core::publish($Unterkunft, "Unterkunft");
