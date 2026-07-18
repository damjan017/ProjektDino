<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Unterkünfte verwalten"]);
    return;
}

$taskType = "delete";
$classSettings = Unterkunft::$settings;
Core::checkAccessGui($classSettings, $taskType);

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$hotelierId = (int) Core::$user->roleid;

if (!$id || $hotelierId <= 0) {
    Core::redirect("Unterkunft", ["errorMsg" => "Ungültige Unterkunft"]);
    return;
}

$eigeneUnterkunft = DB::query(
    "SELECT id, _Adresse FROM Unterkunft WHERE id = ? AND _Hotelier = ?",
    [$id, $hotelierId],
    true
);

if (count($eigeneUnterkunft) !== 1) {
    Core::redirect("Unterkunft", ["errorMsg" => "Diese Unterkunft gehört nicht zu Ihrem Konto"]);
    return;
}

$zimmertypen = DB::query(
    "SELECT COUNT(*) AS Anzahl FROM Zimmertyp WHERE _Unterkunft = ?",
    [$id],
    true
);

if ((int) $zimmertypen[0]->Anzahl > 0) {
    Core::redirect(
        "Unterkunft",
        ["errorMsg" => "Die Unterkunft kann nicht gelöscht werden, solange Zimmertypen oder Buchungen vorhanden sind"]
    );
    return;
}

$adresseId = (int) $eigeneUnterkunft[0]->_Adresse;

try {
    Core::$pdo->beginTransaction();

    // Reine Zuordnungen dürfen beim Löschen der Unterkunft entfernt werden.
    $stmtAusstattung = Core::$pdo->prepare(
        "DELETE FROM Unterkunft_Ausstattung WHERE _Unterkunft_a = ?"
    );
    if (!$stmtAusstattung->execute([$id])) {
        throw new RuntimeException("Ausstattungszuordnungen konnten nicht gelöscht werden");
    }

    $stmtUnterkunft = Core::$pdo->prepare(
        "DELETE FROM Unterkunft WHERE id = ? AND _Hotelier = ?"
    );
    if (!$stmtUnterkunft->execute([$id, $hotelierId]) || $stmtUnterkunft->rowCount() !== 1) {
        throw new RuntimeException("Unterkunft konnte nicht gelöscht werden");
    }

    $stmtAdresse = Core::$pdo->prepare("DELETE FROM Adresse WHERE id = ?");
    if (!$stmtAdresse->execute([$adresseId]) || $stmtAdresse->rowCount() !== 1) {
        throw new RuntimeException("Adresse konnte nicht gelöscht werden");
    }

    Core::$pdo->commit();
    Core::redirect("Unterkunft", ["message" => "Unterkunft und Adresse wurden erfolgreich gelöscht"]);
    return;
} catch (Throwable $error) {
    if (Core::$pdo->inTransaction()) {
        Core::$pdo->rollBack();
    }
    Core::debug($error->getMessage());
    Core::redirect("Unterkunft", ["errorMsg" => "Die Unterkunft konnte nicht gelöscht werden"]);
    return;
}
