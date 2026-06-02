<?php
$Buchung       = Core::$view->Buchung;
$Kunde         = Core::$view->Kunde;
$Zimmertyp     = Core::$view->Zimmertyp;
$Unterkunft    = Core::$view->Unterkunft;
$Mitgast_a_list = Core::import("Mitgast_a_list");
$access        = Core::import("access");
?>
<a href="?task=Buchung" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Buchung #<?=$Buchung->id?></h2>

<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <h3>Unterkunft & Zimmer</h3>
    <?php if ($Unterkunft): ?>
    <p><strong><?=htmlspecialchars($Unterkunft->Name)?></strong></p>
    <?php endif; ?>
    <?php if ($Zimmertyp): ?>
    <p><?=htmlspecialchars($Zimmertyp->Bezeichnung_literal)?> &middot;
       <?=(int)$Zimmertyp->Anzahltbett?> Bett(en)</p>
    <?php endif; ?>
</div>

<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <h3>Buchungsdetails</h3>
    <table style="width:100%; border-collapse:collapse;">
        <tr><td><strong>Check-in:</strong></td><td><?=htmlspecialchars($Buchung->checkin)?></td></tr>
        <tr><td><strong>Check-out:</strong></td><td><?=htmlspecialchars($Buchung->checkout)?></td></tr>
        <tr><td><strong>Anzahl Gäste:</strong></td><td><?=(int)$Buchung->AnzahlGaeste?></td></tr>
        <tr><td><strong>Zahlungsart:</strong></td><td><?=htmlspecialchars($Buchung->Zahlungsart_literal)?></td></tr>
        <tr><td><strong>Gesamtpreis:</strong></td>
            <td><strong><?=number_format($Buchung->Gesamtpreis, 2, ',', '.')?> €</strong></td></tr>
        <tr><td><strong>Status:</strong></td><td><?=htmlspecialchars($Buchung->Status_literal)?></td></tr>
    </table>
</div>

<?php if ($Kunde): ?>
<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <h3>Gast</h3>
    <p><?=htmlspecialchars($Kunde->Vorname)?> <?=htmlspecialchars($Kunde->Nachname)?></p>
    <p><?=htmlspecialchars($Kunde->Email)?></p>
</div>
<?php endif; ?>

<?php if (!empty($Mitgast_a_list)): ?>
<div class="ui-body ui-body-a" style="padding:10px; border-radius:6px; margin-bottom:10px;">
    <h3>Mitgäste</h3>
    <ul data-role="listview" data-inset="true">
        <?php foreach ($Mitgast_a_list as $mg): ?>
        <li>
            <a href="?task=Mitgast_detail&id=<?=$mg->id?>" data-ajax="false">
                <?=htmlspecialchars($mg->Vorname)?> <?=htmlspecialchars($mg->Nachname)?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php if ($access["edit"] == "true"): ?>
<a href="?task=Buchung_edit&id=<?=$Buchung->id?>"
   class="ui-btn ui-icon-pencil ui-btn-icon-left" data-ajax="false">Bearbeiten</a>
<?php endif; ?>
<?php if ($access["delete"] == "true"): ?>
<a href="?task=Buchung_delete&id=<?=$Buchung->id?>"
   class="ui-btn ui-icon-delete ui-btn-icon-left" data-ajax="false"
   onclick="return confirm('Buchung wirklich stornieren?')">Stornieren</a>
<?php endif; ?>
