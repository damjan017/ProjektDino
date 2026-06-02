<?php
$taskType = "delete";
$classSettings = Mitgast::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Mitgast::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Mitgast", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
