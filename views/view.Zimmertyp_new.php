<?php
$Zimmertyp   = Core::$view->Zimmertyp;
$_Unterkunft = Core::import("_Unterkunft");
$ZimmertypT  = Core::import("ZimmertypT");
?>
<a href="?task=Zimmertyp" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Neuen Zimmertyp anlegen</h2>

<form id="form_Zimmertyp" method="post" action="?task=Zimmertyp_new"
      data-ajax="false" enctype="<?=$Zimmertyp::$enctype?>">
<div class="ui-field-contain">
    <label for="Bezeichnung">Bezeichnung:</label>
    <select name="Bezeichnung" id="Bezeichnung" required>
        <option value="">– bitte wählen –</option>
        <?php if (is_array($ZimmertypT)): ?>
            <?php foreach ($ZimmertypT as $zt): ?>
            <option value="<?=$zt->id?>"><?=htmlspecialchars($zt->literal)?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <label for="_Unterkunft">Unterkunft:</label>
    <select name="_Unterkunft" id="_Unterkunft" required>
        <option value="">– bitte wählen –</option>
        <?php if (is_array($_Unterkunft)): ?>
            <?php foreach ($_Unterkunft as $u): ?>
            <option value="<?=$u->id?>"><?=htmlspecialchars($u->Name)?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <?php if (empty($_Unterkunft)): ?>
        <p>Für den angemeldeten Hotelier wurde noch keine Unterkunft angelegt.</p>
    <?php endif; ?>

    <?php $Zimmertyp->renderLabel("Anzahltbett"); $Zimmertyp->render("Anzahltbett"); ?>
    <?php $Zimmertyp->renderLabel("ArtBett"); $Zimmertyp->render("ArtBett"); ?>
    <?php $Zimmertyp->renderLabel("Preis"); $Zimmertyp->render("Preis"); ?>
    <?php $Zimmertyp->renderLabel("Aktionspreis"); $Zimmertyp->render("Aktionspreis"); ?>
    <?php $Zimmertyp->renderLabel("Aktionaktiv"); $Zimmertyp->render("Aktionaktiv"); ?>
    <?php $Zimmertyp->renderLabel("AnzahlVerfuegbarkeit"); $Zimmertyp->render("AnzahlVerfuegbarkeit"); ?>
    <?php $Zimmertyp->renderLabel("Bild"); $Zimmertyp->render("Bild"); ?>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
