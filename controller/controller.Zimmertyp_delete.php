<?php
$taskType = "delete";
$classSettings = Zimmertyp::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Zimmertyp::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Zimmertyp", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
