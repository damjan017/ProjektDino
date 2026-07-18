<?php
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if (!$istHotelier) {
    Core::redirect("error", ["errorMsg" => "Nur Hotelier dürfen Zimmertypen verwalten"]);
    return;
}

$taskType = "delete";
$classSettings = Zimmertyp::$settings;
Core::checkAccessGui($classSettings, $taskType);

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$hotelierId = (int) Core::$user->roleid;

if (!$id || $hotelierId <= 0) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Ungültiger Zimmertyp"]);
    return;
}

$eigenerZimmertyp = DB::query(
    "SELECT z.id
     FROM Zimmertyp z
     INNER JOIN Unterkunft u ON z._Unterkunft = u.id
     WHERE z.id = ? AND u._Hotelier = ?",
    [$id, $hotelierId],
    true
);

if (count($eigenerZimmertyp) !== 1) {
    Core::redirect("Zimmertyp", ["errorMsg" => "Dieser Zimmertyp gehört nicht zu Ihrem Konto"]);
    return;
}

$buchungen = DB::query(
    "SELECT COUNT(*) AS Anzahl FROM Buchung WHERE _Zimmertyp = ?",
    [$id],
    true
);

if ((int) $buchungen[0]->Anzahl > 0) {
    Core::redirect(
        "Zimmertyp",
        ["errorMsg" => "Der Zimmertyp kann nicht gelöscht werden, solange Buchungen vorhanden sind"]
    );
    return;
}

$stmt = Core::$pdo->prepare("DELETE FROM Zimmertyp WHERE id = ?");
if ($stmt->execute([$id]) && $stmt->rowCount() === 1) {
    Core::redirect("Zimmertyp", ["message" => "Zimmertyp erfolgreich gelöscht"]);
    return;
}

Core::redirect("Zimmertyp", ["errorMsg" => "Der Zimmertyp konnte nicht gelöscht werden"]);
return;
