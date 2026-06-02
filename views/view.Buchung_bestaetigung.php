<?php
$Buchung     = Core::$view->Buchung;
$Kunde       = Core::$view->Kunde;
$Zimmertyp   = Core::$view->Zimmertyp;
$Unterkunft  = Core::$view->Unterkunft;
$Adresse     = Core::$view->Adresse;
$Mitgast_list = Core::import("Mitgast_list");
?>

<div style="text-align:center; padding:20px;">
    <div style="font-size:3em; color:#4caf50;">&#10003;</div>
    <h2 style="color:#4caf50;">Buchung erfolgreich!</h2>
    <p>Vielen Dank für Ihre Buchung. Ihre Buchungsnummer: <strong>#<?=$Buchung->id?></strong></p>
</div>

<div class="ui-body ui-body-a" style="padding:15px; border-radius:6px; margin-bottom:10px;">
    <h3>Unterkunft</h3>
    <?php if ($Unterkunft->Bild): ?>
    <img src="images/<?=htmlspecialchars($Unterkunft->Bild)?>"
         alt="<?=htmlspecialchars($Unterkunft->Name)?>"
         style="width:100%; max-height:200px; object-fit:cover; border-radius:4px; margin-bottom:8px;" />
    <?php endif; ?>
    <p><strong><?=htmlspecialchars($Unterkunft->Name)?></strong></p>
    <?php if ($Adresse): ?>
    <p>
        <?=htmlspecialchars($Adresse->Straße)?> <?=htmlspecialchars($Adresse->Hausnummer)?>,
        <?=htmlspecialchars($Adresse->Postleitzahl)?> <?=htmlspecialchars($Adresse->Ortschaft)?>
    </p>
    <?php endif; ?>
    <p><strong>Zimmertyp:</strong> <?=htmlspecialchars($Zimmertyp->Bezeichnung_literal)?></p>
</div>

<div class="ui-body ui-body-a" style="padding:15px; border-radius:6px; margin-bottom:10px;">
    <h3>Buchungsdetails</h3>
    <table style="width:100%; border-collapse:collapse;">
        <tr><td style="padding:4px 0;"><strong>Check-in:</strong></td>
            <td><?=htmlspecialchars($Buchung->checkin)?></td></tr>
        <tr><td style="padding:4px 0;"><strong>Check-out:</strong></td>
            <td><?=htmlspecialchars($Buchung->checkout)?></td></tr>
        <tr><td style="padding:4px 0;"><strong>Anzahl Gäste:</strong></td>
            <td><?=(int)$Buchung->AnzahlGaeste?></td></tr>
        <tr><td style="padding:4px 0;"><strong>Zahlungsart:</strong></td>
            <td><?=htmlspecialchars($Buchung->Zahlungsart_literal)?></td></tr>
        <tr><td style="padding:4px 0;"><strong>Gesamtpreis:</strong></td>
            <td><strong style="color:#007; font-size:1.2em;">
                <?=number_format($Buchung->Gesamtpreis, 2, ',', '.')?> €
            </strong></td></tr>
    </table>
</div>

<div class="ui-body ui-body-a" style="padding:15px; border-radius:6px; margin-bottom:10px;">
    <h3>Ihre Daten</h3>
    <p><?=htmlspecialchars($Kunde->Vorname)?> <?=htmlspecialchars($Kunde->Nachname)?></p>
    <p><?=htmlspecialchars($Kunde->Email)?></p>
</div>

<?php if (!empty($Mitgast_list)): ?>
<div class="ui-body ui-body-a" style="padding:15px; border-radius:6px; margin-bottom:10px;">
    <h3>Mitgäste</h3>
    <?php foreach ($Mitgast_list as $mg): ?>
    <p><?=htmlspecialchars($mg->Vorname)?> <?=htmlspecialchars($mg->Nachname)?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div style="background:#fffde7; border:1px solid #f9a825; padding:10px; border-radius:4px; margin:10px 0;">
    <strong>Hinweis:</strong> Normalerweise würde eine Bestätigungs-E-Mail versendet werden.
    Die Zahlung ist eine Simulation – keine reale Transaktion.
</div>

<a href="?task=Zimmersuche" class="ui-btn ui-btn-b ui-icon-home ui-btn-icon-left" data-ajax="false">
    Neue Suche
</a>
<a href="?task=Buchung_detail&id=<?=$Buchung->id?>" class="ui-btn ui-icon-eye ui-btn-icon-left" data-ajax="false">
    Buchung anzeigen
</a>
