<?php
$Zimmertyp_list = Core::$view->Zimmertyp_list;
$suchbegriff    = Core::import("suchbegriff");
$anzahl_gaeste  = Core::import("anzahl_gaeste");
$checkin        = Core::import("checkin");
$checkout       = Core::import("checkout");
$Ausstattung_list = Core::import("Ausstattung_list");
$selectedAusstattungIds = Core::import("selectedAusstattungIds");
$selectedAusstattungLabels = Core::import("selectedAusstattungLabels");
$sucheAusgefuehrt = Core::import("sucheAusgefuehrt");
?>

<div class="wb-hero" style="padding:24px 16px;">
    <h1 class="wb-hero-title" style="font-size:1.6em; margin-bottom:16px;">Zimmer suchen</h1>

    <form method="post" action="?task=Zimmersuche" data-ajax="false" style="text-align:left;">
        <div class="ui-field-contain">
            <label for="suchbegriff">Ort oder Hotelname:</label>
            <input type="text" id="suchbegriff" name="suchbegriff"
                   value="<?=htmlspecialchars($suchbegriff)?>"
                   maxlength="100"
                   placeholder="z.B. Konstanz, Karlsruher Schlosshotel..." />

            <label for="checkin">Check-in:</label>
            <input type="date" id="checkin" name="checkin"
                   value="<?=htmlspecialchars($checkin)?>" required />

            <label for="checkout">Check-out:</label>
            <input type="date" id="checkout" name="checkout"
                   value="<?=htmlspecialchars($checkout)?>" required />

            <label for="anzahl_gaeste">Anzahl Gäste:</label>
            <input type="number" id="anzahl_gaeste" name="anzahl_gaeste"
                   value="<?=htmlspecialchars((string) $anzahl_gaeste)?>"
                   min="1" max="20" required />

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
</div>

<?php if (!empty($Zimmertyp_list)): ?>

    <h3><?=count($Zimmertyp_list)?> Ergebnis(se) gefunden</h3>

    <div class="wb-result-grid">
        <?php foreach ($Zimmertyp_list as $zimmer): ?>
            <?php
            $ergebnisBild = "hotel_platzhalter.png";
            if (!empty($zimmer->Unterkunft_Bild)) {
                $bildDatei = basename($zimmer->Unterkunft_Bild);
                if (file_exists(__DIR__ . "/../images/" . $bildDatei)) {
                    $ergebnisBild = $bildDatei;
                }
            }
            ?>
            <div class="wb-result-card">
                <img src="images/<?=htmlspecialchars($ergebnisBild)?>" alt="<?=htmlspecialchars($zimmer->Unterkunft_Name)?>" />

                <div class="wb-result-card-body">
                    <h4 style="margin:0 0 4px;"><?=htmlspecialchars($zimmer->Unterkunft_Name)?></h4>

                    <p style="margin:0; color:#8a8a78; font-size:0.9em;">
                        <?=htmlspecialchars($zimmer->Ortschaft)?>
                        <?php if ($zimmer->DistanzzurStadt): ?>
                            &middot; <?=(int)$zimmer->DistanzzurStadt?> km zum Zentrum
                        <?php endif; ?>
                    </p>

                    <p style="margin:6px 0; font-size:0.9em;">
                        <strong><?=htmlspecialchars($zimmer->Bezeichnung_literal)?></strong>
                        &middot; <?=(int)$zimmer->Anzahltbett?> Bett(en)
                    </p>

                    <?php if ($zimmer->Bewertung): ?>
                        <p style="margin:0 0 6px; color:#C9950F;">
                            <?php for ($i = 0; $i < (int)$zimmer->Bewertung; $i++): ?>&#9733;<?php endfor; ?>
                        </p>
                    <?php endif; ?>

                    <?php if (count($selectedAusstattungLabels) > 0): ?>
                        <p style="margin:0 0 6px; color:#626254; font-size:0.85em;">
                            <?=htmlspecialchars(implode(', ', $selectedAusstattungLabels))?>
                        </p>
                    <?php endif; ?>

                    <p style="margin:4px 0 10px; font-size:1.15em;">
                        <?php if ($zimmer->Aktionaktiv && $zimmer->Aktionspreis > 0 && $zimmer->Aktionspreis < $zimmer->Preis): ?>
                            <span style="text-decoration:line-through; color:#999; font-size:0.8em;">
                                <?=number_format($zimmer->Preis, 2, ",", ".")?> €
                            </span>
                            <strong style="color:#C9950F;">
                                <?=number_format($zimmer->Aktionspreis, 2, ",", ".")?> € / Nacht
                            </strong>
                        <?php else: ?>
                            <strong><?=number_format($zimmer->Preis, 2, ",", ".")?> € / Nacht</strong>
                        <?php endif; ?>
                    </p>

                    <div class="wb-result-card-actions">
                        <a href="?task=Unterkunft_detail&id=<?=$zimmer->_Unterkunft?>"
                           class="ui-btn ui-icon-eye ui-btn-icon-left" data-ajax="false">
                            Details
                        </a>
                        <a href="?task=Buchung_new&zimmertyp_id=<?=$zimmer->id?>&checkin=<?=urlencode($checkin)?>&checkout=<?=urlencode($checkout)?>&anzahl_gaeste=<?=(int)$anzahl_gaeste?>"
                           class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left" data-ajax="false">
                            Buchen
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php elseif ($sucheAusgefuehrt): ?>

    <div class="wb-section" style="text-align:center;">
        <p>Keine verfügbaren Zimmer für Ihre Suche gefunden.</p>
        <p>Bitte passen Sie Ihre Suchkriterien an.</p>
    </div>

<?php endif; ?>
