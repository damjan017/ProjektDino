<?php
$taskType = "delete";
$classSettings = Buchung::$settings;
Core::checkAccessGui($classSettings, $taskType);
if (isset($_GET['id'])) {
    $result = Buchung::delete(filter_input(INPUT_GET, "id"));
    if ($result) {
        Core::redirect("Buchung", ["message" => "Buchung erfolgreich storniert"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::addError("Der Datensatz konnte nicht gelöscht werden");
}
