<?php
$Zimmertyp      = Core::$view->Zimmertyp;
$Unterkunft     = Core::$view->Unterkunft;
$Buchung_b_list = Core::import("Buchung_b_list");
$access         = Core::import("access");

/*
 * Zimmerbild bestimmen.
 * Wenn kein vorhandenes Bild gefunden wird,
 * verwenden wir das gemeinsame Platzhalterbild.
 */
$zimmerBild = "hotel_platzhalter.png";

if (!empty($Zimmertyp->Bild)) {
    $bildDatei = basename($Zimmertyp->Bild);

    if (file_exists(__DIR__ . "/../images/" . $bildDatei)) {
        $zimmerBild = $bildDatei;
    }
}
?>

<a href="?task=Zimmertyp"
   class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
   style="display:inline-block;"
   data-ajax="false">
    Zurück
</a>

<img src="images/<?=htmlspecialchars($zimmerBild)?>"
     alt="Zimmer"
     style="width:100%;
            max-height:220px;
            object-fit:cover;
            border-radius:6px;
            margin-bottom:10px;" />

<h2><?=htmlspecialchars($Zimmertyp->Bezeichnung_literal)?></h2>

<div class="ui-body ui-body-a"
     style="padding:10px; border-radius:6px; margin-bottom:10px;">

    <?php if ($Unterkunft): ?>

        <p>
            <strong>Unterkunft:</strong>

            <a href="?task=Unterkunft_detail&id=<?=$Unterkunft->id?>"
               data-ajax="false">
                <?=htmlspecialchars($Unterkunft->Name)?>
            </a>
        </p>

    <?php endif; ?>

    <p>
        <strong>Betten:</strong>

        <?=(int)$Zimmertyp->Anzahltbett?>
        &middot;
        <?=htmlspecialchars($Zimmertyp->ArtBett)?>
    </p>

    <p>
        <strong>Preis:</strong>

        <?php if (
            $Zimmertyp->Aktionaktiv &&
            $Zimmertyp->Aktionspreis > 0 &&
            $Zimmertyp->Aktionspreis < $Zimmertyp->Preis
        ): ?>

            <s style="color:#999;">
                <?=number_format($Zimmertyp->Preis, 2, ",", ".")?> €
            </s>

            <strong style="color:#c00;">
                <?=number_format($Zimmertyp->Aktionspreis, 2, ",", ".")?> €
            </strong>

            / Nacht (Aktion!)

        <?php else: ?>

            <?=number_format($Zimmertyp->Preis, 2, ",", ".")?> € / Nacht

        <?php endif; ?>
    </p>

    <p>
        <strong>Verfügbare Zimmer:</strong>
        <?=(int)$Zimmertyp->AnzahlVerfuegbarkeit?>
    </p>
</div>

<h3>Buchungen für diesen Zimmertyp</h3>

<?php if (!empty($Buchung_b_list)): ?>

    <ul data-role="listview" data-inset="true">

        <?php foreach ($Buchung_b_list as $b): ?>

            <li>
                <a href="?task=Buchung_detail&id=<?=$b->id?>"
                   data-ajax="false">

                    Buchung #<?=$b->id?>

                    &mdash;

                    <?=htmlspecialchars($b->checkin)?>
                    bis
                    <?=htmlspecialchars($b->checkout)?>

                    &mdash;

                    <?=htmlspecialchars($b->Status_literal)?>
                </a>
            </li>

        <?php endforeach; ?>

    </ul>

<?php else: ?>

    <p>Keine Buchungen vorhanden.</p>

<?php endif; ?>

<?php if ($access["edit"] == "true"): ?>

    <a href="?task=Zimmertyp_edit&id=<?=$Zimmertyp->id?>"
       class="ui-btn ui-icon-pencil ui-btn-icon-left"
       data-ajax="false">
        Bearbeiten
    </a>

<?php endif; ?>

<?php if ($access["delete"] == "true"): ?>

    <a href="?task=Zimmertyp_delete&id=<?=$Zimmertyp->id?>"
       class="ui-btn ui-icon-delete ui-btn-icon-left"
       data-ajax="false"
       onclick="return confirm('Zimmertyp wirklich löschen?')">
        Löschen
    </a>

<?php endif; ?>