<?php
$Mitgast = Core::$view->Mitgast;
$Buchung = Core::$view->Buchung;
$access  = Core::import("access");
?>
<a href="?task=Mitgast" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Mitgast: <?=htmlspecialchars($Mitgast->Vorname)?> <?=htmlspecialchars($Mitgast->Nachname)?></h2>
<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <p><strong>Geburtsdatum:</strong> <?=htmlspecialchars($Mitgast->Geburtsdatum)?></p>
    <p><strong>Personalausweisnr.:</strong> <?=htmlspecialchars($Mitgast->Personalausweisnr)?></p>
    <?php if ($Buchung): ?>
    <p><strong>Buchung:</strong>
        <a href="?task=Buchung_detail&id=<?=$Buchung->id?>" data-ajax="false">
            #<?=$Buchung->id?> (<?=htmlspecialchars($Buchung->checkin)?> – <?=htmlspecialchars($Buchung->checkout)?>)
        </a>
    </p>
    <?php endif; ?>
</div>
<?php if ($access["edit"] == "true"): ?>
<a href="?task=Mitgast_edit&id=<?=$Mitgast->id?>"
   class="ui-btn ui-icon-pencil ui-btn-icon-left" data-ajax="false">Bearbeiten</a>
<?php endif; ?>
