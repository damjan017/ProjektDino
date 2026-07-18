<?php
$taskType = "delete";
$classSettings = Ausstattung::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Ausstattung::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Ausstattung", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
