<?php
$groupedAusstattung = [];
if (is_array($Ausstattung_list)) {
    foreach ($Ausstattung_list as $ausstattungItem) {
        $category = $ausstattungItem->Kategorie_literal ?: 'Ohne Kategorie';
        $groupedAusstattung[$category][] = $ausstattungItem;
    }
}
?>

<h3>Ausstattung</h3>
<p>Wählen Sie alle Merkmale aus, die für die gesamte Unterkunft beziehungsweise alle Zimmer gelten.</p>

<?php if (count($groupedAusstattung) === 0): ?>
    <p>Noch keine Ausstattungsmerkmale angelegt.</p>
<?php else: ?>
    <?php foreach ($groupedAusstattung as $category => $items): ?>
    <fieldset data-role="controlgroup">
        <legend><?=htmlspecialchars($category)?></legend>
        <?php foreach ($items as $item): ?>
            <?php $fieldId = 'ausstattung_' . (int)$item->id; ?>
            <input type="checkbox"
                   name="ausstattung[]"
                   id="<?=$fieldId?>"
                   value="<?=(int)$item->id?>"
                   <?=in_array((int)$item->id, $selectedAusstattungIds, true) ? 'checked' : ''?> />
            <label for="<?=$fieldId?>"><?=htmlspecialchars($item->Bezeichnung)?></label>
        <?php endforeach; ?>
    </fieldset>
    <?php endforeach; ?>
<?php endif; ?>
