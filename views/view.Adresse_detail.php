<?php
$Adresse          = Core::$view->Adresse;
$Unterkunft_b_list = Core::import("Unterkunft_b_list");
$access           = Core::import("access");
?>
<a href="?task=Adresse" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Adresse: <?=htmlspecialchars($Adresse->Straße)?> <?=htmlspecialchars($Adresse->Hausnummer)?></h2>
<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <p><?=htmlspecialchars($Adresse->Postleitzahl)?> <?=htmlspecialchars($Adresse->Ortschaft)?></p>
    <?php if ($Adresse->DistanzzurStadt): ?>
    <p><strong>Distanz zum Stadtzentrum:</strong> <?=(int)$Adresse->DistanzzurStadt?> km</p>
    <?php endif; ?>
    <?php if ($Adresse->Breitengrad && $Adresse->Laengengrad): ?>
    <p><strong>Geodaten:</strong> <?=$Adresse->Breitengrad?>, <?=$Adresse->Laengengrad?></p>
    <?php endif; ?>
</div>
<?php if ($access["edit"] == "true"): ?>
<a href="?task=Adresse_edit&id=<?=$Adresse->id?>"
   class="ui-btn ui-icon-pencil ui-btn-icon-left" data-ajax="false">Bearbeiten</a>
<?php endif; ?>
<?php if ($access["delete"] == "true"): ?>
<a href="?task=Adresse_delete&id=<?=$Adresse->id?>"
   class="ui-btn ui-icon-delete ui-btn-icon-left" data-ajax="false"
   onclick="return confirm('Adresse wirklich löschen?')">Löschen</a>
<?php endif; ?>
