<?php
$Buchung      = Core::$view->Buchung;
$_Kunde       = Core::import("_Kunde");
$_Zimmertyp   = Core::import("_Zimmertyp");
$ZahlungsartT = Core::import("ZahlungsartT");
$StatusT      = Core::import("StatusT");
?>
<a href="?task=Buchung_detail&id=<?=$Buchung->id?>"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Buchung bearbeiten</h2>

<form id="form_Buchung" method="post" action="?task=Buchung_edit&id=<?=$Buchung->id?>" data-ajax="false">
<div class="ui-field-contain">
    <?php $Buchung->renderLabel("checkin");   $Buchung->render("checkin"); ?>
    <?php $Buchung->renderLabel("checkout");  $Buchung->render("checkout"); ?>
    <?php $Buchung->renderLabel("AnzahlGaeste"); $Buchung->render("AnzahlGaeste"); ?>
    <?php $Buchung->renderLabel("Gesamtpreis");  $Buchung->render("Gesamtpreis"); ?>
    <?php $Buchung->renderLabel("Zahlungsbetrag"); $Buchung->render("Zahlungsbetrag"); ?>

    <label for="Zahlungsart">Zahlungsart:</label>
    <select name="Zahlungsart" id="Zahlungsart">
        <?php if (is_array($ZahlungsartT)): ?>
            <?php foreach ($ZahlungsartT as $za): ?>
            <option value="<?=$za->id?>" <?=($Buchung->Zahlungsart == $za->id ? 'selected' : '')?>>
                <?=htmlspecialchars($za->literal)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <label for="Status">Status:</label>
    <select name="Status" id="Status">
        <?php if (is_array($StatusT)): ?>
            <?php foreach ($StatusT as $st): ?>
            <option value="<?=$st->id?>" <?=($Buchung->Status == $st->id ? 'selected' : '')?>>
                <?=htmlspecialchars($st->literal)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
