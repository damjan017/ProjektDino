<?php
$groupedAusstattung = [];
if (is_array($Ausstattung_list)) {
    foreach ($Ausstattung_list as $ausstattungItem) {
        $category = $ausstattungItem->Kategorie_literal ?: 'Ohne Kategorie';
        $groupedAusstattung[$category][] = $ausstattungItem;
    }
}
?>

<?php if (count($groupedAusstattung) === 0): ?>
    <p>Momentan stehen keine Ausstattungsfilter zur Verfügung.</p>
<?php else: ?>
    <p>Alle ausgewählten Merkmale müssen vorhanden sein.</p>
    <?php foreach ($groupedAusstattung as $category => $items): ?>
    <fieldset data-role="controlgroup">
        <legend><?=htmlspecialchars($category)?></legend>
        <?php foreach ($items as $item): ?>
            <?php $fieldId = 'filter_ausstattung_' . (int)$item->id; ?>
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
