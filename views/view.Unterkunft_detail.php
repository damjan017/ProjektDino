<?php
$Unterkunft        = Core::$view->Unterkunft;
$Adresse            = Core::$view->Adresse;
$Zimmertyp_b_list   = Core::import("Zimmertyp_b_list");
$Ausstattung_a_list = Core::import("Ausstattung_a_list");
$access          = Core::import("access");
$darfVerwalten   = Core::import("darfVerwalten");

/*
 * Ausstattungen nach Kategorien gruppieren.
 */
$groupedAusstattung = [];

if (is_array($Ausstattung_a_list)) {
    foreach ($Ausstattung_a_list as $ausstattungItem) {
        $category = $ausstattungItem->Kategorie_literal
            ? $ausstattungItem->Kategorie_literal
            : "Ohne Kategorie";

        $groupedAusstattung[$category][] = $ausstattungItem;
    }
}

/*
 * Unterkunftsbild bestimmen.
 */
$unterkunftBild = "hotel_platzhalter.png";

if (!empty($Unterkunft->Bild)) {
    $bildDatei = basename($Unterkunft->Bild);

    if (file_exists(__DIR__ . "/../images/" . $bildDatei)) {
        $unterkunftBild = $bildDatei;
    }
}

/*
 * Bildergalerie vorbereiten.
 * Das erste Bild ist immer das Unterkunftsbild.
 */
$galerieBilder = [];

$galerieBilder[] = [
    "datei" => $unterkunftBild,
    "alt"   => $Unterkunft->Name
];

/*
 * Danach folgen die Bilder der Zimmertypen.
 */
if (!empty($Zimmertyp_b_list)) {
    foreach ($Zimmertyp_b_list as $galerieZimmer) {
        $galerieZimmerBild = "hotel_platzhalter.png";

        if (!empty($galerieZimmer->Bild)) {
            $bildDatei = basename($galerieZimmer->Bild);

            if (file_exists(__DIR__ . "/../images/" . $bildDatei)) {
                $galerieZimmerBild = $bildDatei;
            }
        }

        $galerieBilder[] = [
            "datei" => $galerieZimmerBild,
            "alt"   => $galerieZimmer->Bezeichnung_literal
        ];
    }
}
?>

<a href="?task=Unterkunft"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;"
   data-ajax="false">
    Zurück
</a>

<h2><?=htmlspecialchars($Unterkunft->Name)?></h2>

<!-- Bildergalerie -->
<div class="ui-body ui-body-a"
     style="padding:10px; border-radius:6px; margin-bottom:10px;">

    <h3 style="margin-top:0;">Bildergalerie</h3>

    <img id="galerieHauptbild"
         src="images/<?=htmlspecialchars($galerieBilder[0]["datei"])?>"
         alt="<?=htmlspecialchars($galerieBilder[0]["alt"])?>"
         style="width:100%;
                height:350px;
                object-fit:cover;
                border-radius:6px;
                margin-bottom:10px;" />

    <div style="display:flex;
                flex-wrap:wrap;
                gap:8px;">

        <?php foreach ($galerieBilder as $galerieBild): ?>

            <img src="images/<?=htmlspecialchars($galerieBild["datei"])?>"
                 alt="<?=htmlspecialchars($galerieBild["alt"])?>"
                 title="<?=htmlspecialchars($galerieBild["alt"])?>"
                 onclick="
                    document.getElementById('galerieHauptbild').src = this.src;
                    document.getElementById('galerieHauptbild').alt = this.alt;
                 "
                 style="width:110px;
                        height:80px;
                        object-fit:cover;
                        border-radius:4px;
                        border:2px solid #dddddd;
                        cursor:pointer;" />

        <?php endforeach; ?>

    </div>
</div>

<!-- Informationen zur Unterkunft -->
<div class="ui-body ui-body-a"
     style="padding:10px; border-radius:6px; margin-bottom:10px;">

    <p>
        <strong>Unterkunftsart:</strong>
        <?=htmlspecialchars($Unterkunft->Unterkunftsart_literal)?>
    </p>

    <p>
        <strong>Sterne:</strong>

        <?php for ($i = 0; $i < (int)$Unterkunft->Bewertung; $i++): ?>
            &#9733;
        <?php endfor; ?>
    </p>

    <p>
        <?=nl2br(htmlspecialchars($Unterkunft->Beschreibung))?>
    </p>

    <?php if ($Adresse): ?>

        <p>
            <strong>Adresse:</strong>

            <?=htmlspecialchars($Adresse->Straße)?>
            <?=htmlspecialchars($Adresse->Hausnummer)?>,

            <?=htmlspecialchars($Adresse->Postleitzahl)?>
            <?=htmlspecialchars($Adresse->Ortschaft)?>

            <?php if ($Adresse->DistanzzurStadt): ?>
                (<?=(int)$Adresse->DistanzzurStadt?> km zum Zentrum)
            <?php endif; ?>
        </p>

        <p>
            <strong>Breitengrad:</strong>
            <?=$Adresse->Breitengrad !== null && $Adresse->Breitengrad !== ""
                ? htmlspecialchars((string) $Adresse->Breitengrad)
                : "Keine Angabe"?>
        </p>

        <p>
            <strong>Längengrad:</strong>
            <?=$Adresse->Laengengrad !== null && $Adresse->Laengengrad !== ""
                ? htmlspecialchars((string) $Adresse->Laengengrad)
                : "Keine Angabe"?>
        </p>

    <?php endif; ?>

</div>

<!-- Ausstattung -->
<div class="ui-body ui-body-a"
     style="padding:10px; border-radius:6px; margin-bottom:10px;">

    <h3>Ausstattung</h3>

    <?php if (count($groupedAusstattung) === 0): ?>

        <p>
            Für diese Unterkunft wurden noch keine
            Ausstattungsmerkmale hinterlegt.
        </p>

    <?php else: ?>

        <?php foreach ($groupedAusstattung as $category => $items): ?>

            <h4><?=htmlspecialchars($category)?></h4>

            <ul style="list-style:none;
                       padding:0;
                       display:flex;
                       flex-wrap:wrap;
                       gap:8px;">

                <?php foreach ($items as $item): ?>

                    <li style="background:#e8f5e9;
                               border-radius:20px;
                               padding:4px 12px;
                               font-size:0.9em;">

                        ✓ <?=htmlspecialchars($item->Bezeichnung)?>

                    </li>

                <?php endforeach; ?>

            </ul>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<!-- Zimmer -->
<h3>Verfügbare Zimmer</h3>

<?php if (!empty($Zimmertyp_b_list)): ?>

    <?php foreach ($Zimmertyp_b_list as $zim): ?>

        <?php
        /*
         * Zimmerbild bestimmen.
         */
        $zimmerBild = "hotel_platzhalter.png";

        if (!empty($zim->Bild)) {
            $bildDatei = basename($zim->Bild);

            if (file_exists(__DIR__ . "/../images/" . $bildDatei)) {
                $zimmerBild = $bildDatei;
            }
        }
        ?>

        <div class="ui-body ui-body-a"
             style="padding:10px;
                    border-radius:6px;
                    margin-bottom:8px;">

            <img src="images/<?=htmlspecialchars($zimmerBild)?>"
                 alt="<?=htmlspecialchars($zim->Bezeichnung_literal)?>"
                 style="width:100%;
                        max-height:150px;
                        object-fit:cover;
                        border-radius:4px;
                        margin-bottom:6px;" />

            <h4 style="margin:0 0 5px;">
                <?=htmlspecialchars($zim->Bezeichnung_literal)?>
            </h4>

            <p style="margin:0;">
                <?=(int)$zim->Anzahltbett?> Bett(en)
                &middot;
                <?=htmlspecialchars($zim->ArtBett)?>
            </p>

            <p style="color:#626254; font-size:1.1em;">

                <?php if (
                    $zim->Aktionaktiv &&
                    $zim->Aktionspreis > 0 &&
                    $zim->Aktionspreis < $zim->Preis
                ): ?>

                    <s style="color:#999;">
                        <?=number_format($zim->Preis, 2, ",", ".")?> €
                    </s>

                    <strong style="color:#C9950F;">
                        <?=number_format($zim->Aktionspreis, 2, ",", ".")?> €
                    </strong>

                    / Nacht

                <?php else: ?>

                    <strong>
                        <?=number_format($zim->Preis, 2, ",", ".")?> €
                    </strong>

                    / Nacht

                <?php endif; ?>

            </p>

            <a href="?task=Buchung_new&zimmertyp_id=<?=$zim->id?>"
               class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left"
               data-ajax="false">
                Jetzt buchen
            </a>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p>Keine Zimmer für diese Unterkunft angelegt.</p>

<?php endif; ?>

<!-- Bearbeiten und Löschen -->
<?php if ($darfVerwalten && $access["edit"] == "true"): ?>

    <a href="?task=Unterkunft_edit&id=<?=$Unterkunft->id?>"
       class="ui-btn ui-icon-pencil ui-btn-icon-left"
       data-ajax="false">
        Bearbeiten
    </a>

<?php endif; ?>

<?php if ($darfVerwalten && $access["delete"] == "true"): ?>

    <a href="?task=Unterkunft_delete&id=<?=$Unterkunft->id?>"
       class="ui-btn ui-icon-delete ui-btn-icon-left"
       data-ajax="false"
       onclick="return confirm('Unterkunft wirklich löschen?')">
        Löschen
    </a>

<?php endif; ?>