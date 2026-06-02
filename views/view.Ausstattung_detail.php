<?php
$Ausstattung = Core::$view->Ausstattung;
$access      = Core::import("access");
?>
<a href="?task=Ausstattung" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2><?=htmlspecialchars($Ausstattung->Bezeichnung)?></h2>
<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <p><strong>Kategorie:</strong> <?=htmlspecialchars($Ausstattung->Kategorie_literal)?></p>
</div>
<?php if ($access["edit"] == "true"): ?>
<a href="?task=Ausstattung_edit&id=<?=$Ausstattung->id?>"
   class="ui-btn ui-icon-pencil ui-btn-icon-left" data-ajax="false">Bearbeiten</a>
<?php endif; ?>
<?php if ($access["delete"] == "true"): ?>
<a href="?task=Ausstattung_delete&id=<?=$Ausstattung->id?>"
   class="ui-btn ui-icon-delete ui-btn-icon-left" data-ajax="false"
   onclick="return confirm('Ausstattung wirklich löschen?')">Löschen</a>
<?php endif; ?>
