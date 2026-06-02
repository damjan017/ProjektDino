<?php
$Hotelier = Core::$view->Hotelier;
?>
<a href="?task=Hotelier_detail&id=<?=$Hotelier->id?>"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Hotelier bearbeiten</h2>
<form id="form_Hotelier" method="post" action="?task=Hotelier_edit&id=<?=$Hotelier->id?>" data-ajax="false">
<div class="ui-field-contain">
    <?php $Hotelier->renderLabel("Name");    $Hotelier->render("Name"); ?>
    <?php $Hotelier->renderLabel("Vorname"); $Hotelier->render("Vorname"); ?>
    <?php $Hotelier->renderLabel("Email");   $Hotelier->render("Email"); ?>
    <?php $Hotelier->renderLabel("Passwort"); $Hotelier->render("Passwort"); ?>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
