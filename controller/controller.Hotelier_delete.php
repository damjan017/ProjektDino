<?php
$taskType = "delete";
$classSettings = Hotelier::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Hotelier::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Hotelier", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
