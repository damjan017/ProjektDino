<?php
$Ausstattung         = Core::$view->Ausstattung;
$AusstattungskategorieT = Core::import("AusstattungskategorieT");
?>
<a href="?task=Ausstattung_detail&id=<?=$Ausstattung->id?>"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Ausstattung bearbeiten</h2>
<form id="form_Ausstattung" method="post" action="?task=Ausstattung_edit&id=<?=$Ausstattung->id?>" data-ajax="false">
<div class="ui-field-contain">
    <?php $Ausstattung->renderLabel("Bezeichnung"); $Ausstattung->render("Bezeichnung"); ?>
    <label for="Kategorie">Kategorie:</label>
    <select name="Kategorie" id="Kategorie">
        <?php if (is_array($AusstattungskategorieT)): ?>
            <?php foreach ($AusstattungskategorieT as $ak): ?>
            <option value="<?=$ak->id?>" <?=($Ausstattung->Kategorie == $ak->id ? 'selected' : '')?>>
                <?=htmlspecialchars($ak->literal)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
