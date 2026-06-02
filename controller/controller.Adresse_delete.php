<?php
$taskType = "delete";
$classSettings = Adresse::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Adresse::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Adresse", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
