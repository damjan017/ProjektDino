<?php
$Zimmertyp_list  = Core::$view->Zimmertyp_list;
$suchbegriff     = Core::import("suchbegriff");
$anzahl_gaeste   = Core::import("anzahl_gaeste");
$checkin         = Core::import("checkin");
$checkout        = Core::import("checkout");
$Ausstattung_list = Core::import("Ausstattung_list");
$selectedAusstattungIds = Core::import("selectedAusstattungIds");
$selectedAusstattungLabels = Core::import("selectedAusstattungLabels");
?>

<div data-role="ui-bar ui-bar-a">
    <h1>Zimmer suchen</h1>
</div>

<form method="post" action="?task=Zimmersuche" data-ajax="false">
    <div class="ui-field-contain">
        <label for="suchbegriff">Ort oder Hotelname:</label>
        <input type="text" id="suchbegriff" name="suchbegriff"
               value="<?=htmlspecialchars($suchbegriff)?>"
               maxlength="100"
               placeholder="z.B. München, Strandhotel..." />

        <label for="checkin">Check-in:</label>
        <input type="date" id="checkin" name="checkin"
               value="<?=htmlspecialchars($checkin)?>" required />

        <label for="checkout">Check-out:</label>
        <input type="date" id="checkout" name="checkout"
               value="<?=htmlspecialchars($checkout)?>" required />

        <label for="anzahl_gaeste">Anzahl Gäste:</label>
        <input type="number" id="anzahl_gaeste" name="anzahl_gaeste"
               value="<?=htmlspecialchars((string) $anzahl_gaeste)?>" min="1" max="20" required />

        <div data-role="collapsible" data-collapsed="<?=count($selectedAusstattungIds) > 0 ? 'false' : 'true'?>">
            <h3>Ausstattung filtern<?=count($selectedAusstattungIds) > 0 ? ' (' . count($selectedAusstattungIds) . ')' : ''?></h3>
            <?php require 'views/view.Ausstattung_filter_fields.php'; ?>
        </div>
    </div>

    <button type="submit" name="suchen" value="1"
            class="ui-btn ui-btn-b ui-icon-search ui-btn-icon-left">
        Suchen
    </button>
</form>

<hr>

<?php if (!empty($Zimmertyp_list)): ?>
    <h3><?=count($Zimmertyp_list)?> Ergebnis(se) gefunden</h3>

    <?php foreach ($Zimmertyp_list as $zimmer): ?>
    <div class="ui-body ui-body-a" style="margin-bottom:10px; padding:10px; border-radius:6px;">
        <div style="display:flex; gap:10px; align-items:flex-start; flex-wrap:wrap;">

            <?php if ($zimmer->Unterkunft_Bild): ?>
            <img src="images/<?=htmlspecialchars($zimmer->Unterkunft_Bild)?>"
                 alt="Unterkunft" style="width:120px; height:90px; object-fit:cover; border-radius:4px;" />
            <?php endif; ?>

            <div style="flex:1; min-width:200px;">
                <h4 style="margin:0 0 4px;"><?=htmlspecialchars($zimmer->Unterkunft_Name)?></h4>
                <p style="margin:0; color:#555;">
                    <?=htmlspecialchars($zimmer->Ortschaft)?>
                    <?php if ($zimmer->DistanzzurStadt): ?>
                        &middot; <?=(int)$zimmer->DistanzzurStadt?> km zum Zentrum
                    <?php endif; ?>
                </p>
                <p style="margin:4px 0;">
                    <strong><?=htmlspecialchars($zimmer->Bezeichnung_literal)?></strong>
                    &middot; <?=(int)$zimmer->Anzahltbett?> Bett(en) &middot; <?=htmlspecialchars($zimmer->ArtBett)?>
                </p>
                <?php
                $anzeige_preis = ($zimmer->Aktionaktiv && $zimmer->Aktionspreis > 0)
                    ? $zimmer->Aktionspreis : $zimmer->Preis;
                ?>
                <p style="margin:4px 0; font-size:1.1em; color:#007;">
                    <?php if ($zimmer->Aktionaktiv && $zimmer->Aktionspreis > 0): ?>
                        <span style="text-decoration:line-through; color:#999;">
                            <?=number_format($zimmer->Preis, 2, ',', '.')?> €
                        </span>
                        &nbsp;<strong style="color:#c00;"><?=number_format($zimmer->Aktionspreis, 2, ',', '.')?> € / Nacht</strong>
                        &nbsp;<span class="ui-btn ui-btn-b" style="font-size:0.75em; padding:2px 6px;">Aktion!</span>
                    <?php else: ?>
                        <strong><?=number_format($zimmer->Preis, 2, ',', '.')?> € / Nacht</strong>
                    <?php endif; ?>
                </p>
                <?php if ($zimmer->Bewertung): ?>
                <p style="margin:4px 0;">
                    <?php for ($i = 0; $i < (int)$zimmer->Bewertung; $i++): ?>&#9733;<?php endfor; ?>
                </p>
                <?php endif; ?>
                <?php if (count($selectedAusstattungLabels) > 0): ?>
                <p style="margin:6px 0; color:#285943;">
                    <strong>Gewählte Ausstattung:</strong>
                    <?=htmlspecialchars(implode(', ', $selectedAusstattungLabels))?>
                </p>
                <?php endif; ?>
            </div>

            <div style="text-align:right; min-width:130px;">
                <a href="?task=Buchung_new&zimmertyp_id=<?=$zimmer->id?>&checkin=<?=urlencode($checkin)?>&checkout=<?=urlencode($checkout)?>&anzahl_gaeste=<?=(int)$anzahl_gaeste?>"
                   class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left"
                   data-ajax="false">
                    Jetzt buchen
                </a>
                <a href="?task=Unterkunft_detail&id=<?=$zimmer->_Unterkunft?>"
                   class="ui-btn ui-icon-eye ui-btn-icon-left"
                   data-ajax="false">
                    Details
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

<?php elseif (isset($_POST["suchen"])): ?>
    <div class="ui-body ui-body-a" style="padding:15px; text-align:center;">
        <p>Keine verfügbaren Zimmer für Ihre Suche gefunden.</p>
        <p>Bitte passen Sie Ihre Suchkriterien an.</p>
    </div>
<?php endif; ?>
