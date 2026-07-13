<?php
require_once 'includes/ausstattung.functions.php';

$taskType = "delete";
$classSettings = Ausstattung::$settings;
Core::checkAccessGui($classSettings, $taskType);
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id !== false && $id > 0) {
    $links = Unterkunft_Ausstattung::query(
        'SELECT id FROM Unterkunft_Ausstattung WHERE _Ausstattung_b = ?',
        [$id],
        true
    );

    if (count($links) > 0) {
        Core::redirect(
            "Ausstattung_detail&id=$id",
            ["errorMsg" => "Diese Ausstattung wird noch von mindestens einer Unterkunft verwendet und kann nicht gelöscht werden"]
        );
        return;
    }

    $result = Ausstattung::delete($id);
    if ($result) {
        Core::redirect("Ausstattung", ["message" => "Löschvorgang erfolgreich"]);
    } else {
        Core::addError("Der Datensatz konnte nicht gelöscht werden");
    }
} else {
    Core::redirect("Ausstattung", ["errorMsg" => "Ungültige Ausstattung ausgewählt"]);
}
