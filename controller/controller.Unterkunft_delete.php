<?php
$taskType = "delete";
$classSettings = Unterkunft::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Unterkunft::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Unterkunft", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
