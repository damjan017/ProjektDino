<?php
$Ausstattung         = Core::$view->Ausstattung;
$AusstattungskategorieT = Core::import("AusstattungskategorieT");
?>
<a href="?task=Ausstattung" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Neue Ausstattung anlegen</h2>
<form id="form_Ausstattung" method="post" action="?task=Ausstattung_new" data-ajax="false">
<div class="ui-field-contain">
    <?php $Ausstattung->renderLabel("Bezeichnung"); $Ausstattung->render("Bezeichnung"); ?>
    <label for="Kategorie">Kategorie:</label>
    <select name="Kategorie" id="Kategorie" required>
        <option value="">– bitte wählen –</option>
        <?php if (is_array($AusstattungskategorieT)): ?>
            <?php foreach ($AusstattungskategorieT as $ak): ?>
            <option value="<?=(int)$ak->id?>" <?=((int)$Ausstattung->Kategorie === (int)$ak->id ? 'selected' : '')?>>
                <?=htmlspecialchars($ak->literal)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
