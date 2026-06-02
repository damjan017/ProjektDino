<?php
$Adresse = Core::$view->Adresse;
?>
<a href="?task=Adresse_detail&id=<?=$Adresse->id?>"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Adresse bearbeiten</h2>
<form id="form_Adresse" method="post" action="?task=Adresse_edit&id=<?=$Adresse->id?>" data-ajax="false">
<div class="ui-field-contain">
    <?php $Adresse->renderLabel("Straße");          $Adresse->render("Straße"); ?>
    <?php $Adresse->renderLabel("Hausnummer");       $Adresse->render("Hausnummer"); ?>
    <?php $Adresse->renderLabel("Postleitzahl");     $Adresse->render("Postleitzahl"); ?>
    <?php $Adresse->renderLabel("Ortschaft");        $Adresse->render("Ortschaft"); ?>
    <?php $Adresse->renderLabel("Breitengrad");      $Adresse->render("Breitengrad"); ?>
    <?php $Adresse->renderLabel("Laengengrad");      $Adresse->render("Laengengrad"); ?>
    <?php $Adresse->renderLabel("DistanzzurStadt");  $Adresse->render("DistanzzurStadt"); ?>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
