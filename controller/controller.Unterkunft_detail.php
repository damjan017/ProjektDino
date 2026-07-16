<?php
$taskType = "detail";
$classSettings = Unterkunft::$settings;
$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
if ($istHotelier) {
    $access = Core::checkAccessGui($classSettings, $taskType);
} else {
    // Gäste dürfen Details sehen, aber keine Verwaltungsaktionen ausführen.
    $access = [
        "delete" => "false",
        "detail" => "true",
        "new" => "false",
        "list" => "false",
        "edit" => "false",
        "relations" => "false"
    ];
}
Core::publish($access, "access");
Core::$title = "Detail: Unterkunft";
Core::setView("Unterkunft_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Unterkunft");

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$hotelierId = isset(Core::$user->roleid) ? (int) Core::$user->roleid : 0;
$Unterkunft = new Unterkunft();
Unterkunft::$activeViewport = "detail";

$unterkunftDatensatz = $id ? Unterkunft::find($id, [], true) : false;
if (!$unterkunftDatensatz) {
    Core::redirect("Unterkunft", ["errorMsg" => "Unterkunft wurde nicht gefunden"]);
    return;
}
$Unterkunft->import($unterkunftDatensatz);
if ($istHotelier && ($hotelierId <= 0 || (int) $Unterkunft->_Hotelier !== $hotelierId)) {
    Core::redirect("Unterkunft", ["errorMsg" => "Diese Unterkunft gehört nicht zu Ihrem Konto"]);
    return;
}
$darfVerwalten = $istHotelier && (int) $Unterkunft->_Hotelier === $hotelierId;

$Adresse = new Adresse();
$adresseDatensatz = Adresse::find($Unterkunft->_Adresse, [], true);
if (!$adresseDatensatz) {
    Core::redirect("Unterkunft", ["errorMsg" => "Die Adresse der Unterkunft wurde nicht gefunden"]);
    return;
}
$Adresse->import($adresseDatensatz);

// Öffentliche Detaildaten werden bewusst ohne Verwaltungsrechte geladen.
$Zimmertyp_b_list = DB::query(
    "SELECT z.id,
            zt.literal AS Bezeichnung_literal,
            z.Anzahltbett,
            z.ArtBett,
            z.Preis,
            z.Aktionspreis,
            z.Aktionaktiv,
            z.Bild,
            z.AnzahlVerfuegbarkeit
     FROM Zimmertyp z
     LEFT JOIN ZimmertypT zt ON z.Bezeichnung = zt.id
     WHERE z._Unterkunft = ?
     ORDER BY zt.literal",
    [$Unterkunft->id],
    true
);

$Ausstattung_a_list = DB::query(
    "SELECT a.id,
            a.Bezeichnung,
            ak.literal AS Kategorie_literal
     FROM Ausstattung a
     INNER JOIN Unterkunft_Ausstattung ua ON a.id = ua._Ausstattung_b
     LEFT JOIN AusstattungskategorieT ak ON a.Kategorie = ak.id
     WHERE ua._Unterkunft_a = ?
     ORDER BY ak.literal, a.Bezeichnung",
    [$Unterkunft->id],
    true
);

Core::publish($Unterkunft, "Unterkunft");
Core::publish($Adresse, "Adresse");
Core::publish($darfVerwalten, "darfVerwalten");
Core::publish($Zimmertyp_b_list, "Zimmertyp_b_list");
Core::publish($Ausstattung_a_list, "Ausstattung_a_list");
