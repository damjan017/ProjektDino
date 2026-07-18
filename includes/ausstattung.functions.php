<?php

/**
 * Gemeinsame, handgeschriebene Ablauflogik für Leas Ausstattungsmodul.
 * Die generierten Modellklassen bleiben dadurch unverändert.
 */

function validateAusstattung(Ausstattung $ausstattung, $excludeId = null)
{
    $ausstattung->Bezeichnung = trim((string) $ausstattung->Bezeichnung);
    $ausstattung->Kategorie = filter_var($ausstattung->Kategorie, FILTER_VALIDATE_INT);

    if ($ausstattung->Bezeichnung === '') {
        Core::addError('Bitte eine Bezeichnung eingeben');
        return false;
    }

    if ($ausstattung->Kategorie === false) {
        Core::addError('Bitte eine gültige Kategorie auswählen');
        return false;
    }

    $kategorie = AusstattungskategorieT::query(
        'SELECT id FROM AusstattungskategorieT WHERE id = ?',
        [$ausstattung->Kategorie],
        true
    );
    if (count($kategorie) !== 1) {
        Core::addError('Die gewählte Kategorie existiert nicht');
        return false;
    }

    $sql = 'SELECT id FROM Ausstattung WHERE LOWER(TRIM(Bezeichnung)) = LOWER(?) AND Kategorie = ?';
    $params = [$ausstattung->Bezeichnung, $ausstattung->Kategorie];
    if ($excludeId !== null) {
        $sql .= ' AND id <> ?';
        $params[] = (int) $excludeId;
    }

    $duplicate = Ausstattung::query($sql, $params, true);
    if (count($duplicate) > 0) {
        Core::addError('Diese Ausstattung ist in der gewählten Kategorie bereits vorhanden');
        return false;
    }

    return true;
}

function postedAusstattungIds()
{
    $posted = filter_input(INPUT_POST, 'ausstattung', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    if (!is_array($posted)) {
        return [];
    }

    $ids = [];
    foreach ($posted as $id) {
        $validId = filter_var($id, FILTER_VALIDATE_INT);
        if ($validId !== false && $validId > 0) {
            $ids[] = (int) $validId;
        }
    }

    return array_values(array_unique($ids));
}

function existingAusstattungIds(array $requestedIds, array $ausstattungList)
{
    $available = [];
    foreach ($ausstattungList as $ausstattung) {
        $available[(int) $ausstattung->id] = true;
    }

    return array_values(array_filter($requestedIds, function ($id) use ($available) {
        return isset($available[(int) $id]);
    }));
}

function assignedAusstattungIds($unterkunftId)
{
    $links = Unterkunft_Ausstattung::query(
        'SELECT id, _Ausstattung_b FROM Unterkunft_Ausstattung WHERE _Unterkunft_a = ?',
        [(int) $unterkunftId],
        true
    );

    return array_map(function ($link) {
        return (int) $link->_Ausstattung_b;
    }, $links);
}

function saveUnterkunftAusstattung($unterkunftId, array $ausstattungIds)
{
    $links = Unterkunft_Ausstattung::query(
        'SELECT id FROM Unterkunft_Ausstattung WHERE _Unterkunft_a = ?',
        [(int) $unterkunftId],
        true
    );

    foreach ($links as $link) {
        if (!Unterkunft_Ausstattung::delete((int) $link->id)) {
            throw new RuntimeException('Bestehende Ausstattungszuordnung konnte nicht entfernt werden');
        }
    }

    foreach ($ausstattungIds as $ausstattungId) {
        $link = new Unterkunft_Ausstattung();
        $link->_Unterkunft_a = (int) $unterkunftId;
        $link->_Ausstattung_b = (int) $ausstattungId;
        if ($link->create() === '0' || (int) $link->id === 0) {
            throw new RuntimeException('Ausstattungszuordnung konnte nicht gespeichert werden');
        }
    }
}
