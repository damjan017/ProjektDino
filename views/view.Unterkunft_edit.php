<?php
$Unterkunft      = Core::$view->Unterkunft;
$_Adresse        = Core::import("_Adresse");
$_Hotelier       = Core::import("_Hotelier");
$UnterkunftsartT = Core::import("UnterkunftsartT");
?>
<a href="?task=Unterkunft_detail&id=<?=$Unterkunft->id?>"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Unterkunft bearbeiten</h2>

<form id="form_Unterkunft" method="post" action="?task=Unterkunft_edit&id=<?=$Unterkunft->id?>"
      data-ajax="false" enctype="<?=$Unterkunft::$enctype?>">
<div class="ui-field-contain">
    <?php $Unterkunft->renderLabel("Name"); $Unterkunft->render("Name"); ?>
    <?php $Unterkunft->renderLabel("Beschreibung"); $Unterkunft->render("Beschreibung"); ?>
    <?php $Unterkunft->renderLabel("Bewertung"); $Unterkunft->render("Bewertung"); ?>
    <?php $Unterkunft->renderLabel("Bild"); $Unterkunft->render("Bild"); ?>

    <label for="_Hotelier">Hotelier:</label>
    <select name="_Hotelier" id="_Hotelier">
        <?php if (is_array($_Hotelier)): ?>
            <?php foreach ($_Hotelier as $h): ?>
            <option value="<?=$h->id?>" <?=($Unterkunft->_Hotelier == $h->id ? 'selected' : '')?>>
                <?=htmlspecialchars($h->Vorname . ' ' . $h->Name)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <label for="_Adresse">Adresse:</label>
    <select name="_Adresse" id="_Adresse">
        <?php if (is_array($_Adresse)): ?>
            <?php foreach ($_Adresse as $a): ?>
            <option value="<?=$a->id?>" <?=($Unterkunft->_Adresse == $a->id ? 'selected' : '')?>>
                <?=htmlspecialchars($a->Straße . ' ' . $a->Hausnummer . ', ' . $a->Postleitzahl . ' ' . $a->Ortschaft)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <label for="Unterkunftsart">Unterkunftsart:</label>
    <select name="Unterkunftsart" id="Unterkunftsart">
        <?php if (is_array($UnterkunftsartT)): ?>
            <?php foreach ($UnterkunftsartT as $ua): ?>
            <option value="<?=$ua->id?>" <?=($Unterkunft->Unterkunftsart == $ua->id ? 'selected' : '')?>>
                <?=htmlspecialchars($ua->literal)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
