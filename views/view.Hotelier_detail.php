<?php
$Hotelier        = Core::$view->Hotelier;
$Unterkunft_a_list = Core::import("Unterkunft_a_list");
$access          = Core::import("access");
?>
<a href="?task=Hotelier" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2><?=htmlspecialchars($Hotelier->Vorname)?> <?=htmlspecialchars($Hotelier->Name)?></h2>
<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <p><strong>E-Mail:</strong> <?=htmlspecialchars($Hotelier->Email)?></p>
</div>
<h3>Unterkünfte</h3>
<?php if (!empty($Unterkunft_a_list)): ?>
<ul data-role="listview" data-inset="true">
    <?php foreach ($Unterkunft_a_list as $u): ?>
    <li>
        <a href="?task=Unterkunft_detail&id=<?=$u->id?>" data-ajax="false">
            <?=htmlspecialchars($u->Name)?>
            <span class="ui-li-count"><?=htmlspecialchars($u->Unterkunftsart_literal)?></span>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p>Keine Unterkünfte angelegt.</p>
<?php endif; ?>
<a href="?task=Unterkunft_new" class="ui-btn ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neue Unterkunft anlegen
</a>
<?php if ($access["edit"] == "true"): ?>
<a href="?task=Hotelier_edit&id=<?=$Hotelier->id?>"
   class="ui-btn ui-icon-pencil ui-btn-icon-left" data-ajax="false">Bearbeiten</a>
<?php endif; ?>
