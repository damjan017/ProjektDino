<?php
$Unterkunft = Core::$view->Unterkunft;
$Adresse = Core::import("Adresse");
$UnterkunftsartT = Core::import("UnterkunftsartT");
?>
<a href="?task=Unterkunft" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;" data-ajax="false">Zurück</a>
<h2>Neue Unterkunft anlegen</h2>

<form id="form_Unterkunft" method="post" action="?task=Unterkunft_new"
      data-ajax="false" enctype="<?=$Unterkunft::$enctype?>">
<div class="ui-field-contain">
    <h3>Unterkunft</h3>
    <?php $Unterkunft->renderLabel("Name"); $Unterkunft->render("Name"); ?>
    <?php $Unterkunft->renderLabel("Beschreibung"); $Unterkunft->render("Beschreibung"); ?>
    <?php $Unterkunft->renderLabel("Bewertung"); $Unterkunft->render("Bewertung"); ?>
    <?php $Unterkunft->renderLabel("Bild"); $Unterkunft->render("Bild"); ?>

    <label for="Unterkunftsart">Unterkunftsart:</label>
    <select name="Unterkunftsart" id="Unterkunftsart" required>
        <option value="">– bitte wählen –</option>
        <?php if (is_array($UnterkunftsartT)): ?>
            <?php foreach ($UnterkunftsartT as $ua): ?>
            <option value="<?=$ua->id?>" <?=((int) $Unterkunft->Unterkunftsart === (int) $ua->id ? 'selected' : '')?>>
                <?=htmlspecialchars($ua->literal)?>
            </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <p>Die Unterkunft wird automatisch dem angemeldeten Hotelier zugeordnet.</p>

    <h3>Adresse und Lage</h3>
    <label for="Strasse">Straße:</label>
    <input type="text" name="Strasse" id="Strasse" value="<?=htmlspecialchars((string) $Adresse->Straße)?>" required />

    <label for="Hausnummer">Hausnummer:</label>
    <input type="number" name="Hausnummer" id="Hausnummer" value="<?=htmlspecialchars((string) $Adresse->Hausnummer)?>" min="1" required />

    <label for="Postleitzahl">Postleitzahl:</label>
    <input type="number" name="Postleitzahl" id="Postleitzahl" value="<?=htmlspecialchars((string) $Adresse->Postleitzahl)?>" min="1" required />

    <label for="Ortschaft">Ortschaft:</label>
    <input type="text" name="Ortschaft" id="Ortschaft" value="<?=htmlspecialchars((string) $Adresse->Ortschaft)?>" required />

    <label for="Breitengrad">Breitengrad:</label>
    <input type="number" name="Breitengrad" id="Breitengrad" value="<?=htmlspecialchars((string) $Adresse->Breitengrad)?>" step="any" />

    <label for="Laengengrad">Längengrad:</label>
    <input type="number" name="Laengengrad" id="Laengengrad" value="<?=htmlspecialchars((string) $Adresse->Laengengrad)?>" step="any" />

    <label for="DistanzzurStadt">Distanz zum Stadtzentrum in km:</label>
    <input type="number" name="DistanzzurStadt" id="DistanzzurStadt" value="<?=htmlspecialchars((string) $Adresse->DistanzzurStadt)?>" min="0" />
</div>
<button type="submit" name="update" value="1"
        class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left">Speichern</button>
</form>
