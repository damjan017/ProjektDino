<?php
$Mitgast  = Core::$view->Mitgast;
$_Buchung = Core::import("_Buchung");
?>
<a href="?task=Mitgast" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Neuen Mitgast anlegen</h2>
<form id="form_Mitgast" method="post" action="?task=Mitgast_new" data-ajax="false">
<div class="ui-field-contain">
    <?php $Mitgast->renderLabel("Vorname");          $Mitgast->render("Vorname"); ?>
    <?php $Mitgast->renderLabel("Nachname");          $Mitgast->render("Nachname"); ?>
    <?php $Mitgast->renderLabel("Geburtsdatum");      $Mitgast->render("Geburtsdatum"); ?>
    <?php $Mitgast->renderLabel("Personalausweisnr"); $Mitgast->render("Personalausweisnr"); ?>
    <label for="_Buchung">Buchung:</label>
    <select name="_Buchung" id="_Buchung" required>
        <option value="">– bitte wählen –</option>
        <?php if (is_array($_Buchung)): ?>
            <?php foreach ($_Buchung as $b): ?>
            <option value="<?=$b->id?>">
                #<?=$b->id?> (<?=htmlspecialchars($b->checkin)?> – <?=htmlspecialchars($b->checkout)?>)
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
