<?php
$Zimmertyp_list = Core::$view->Zimmertyp_list;
$access = Core::import("access");
$istAdmin = Core::import("istAdmin");
?>
<div data-role="ui-bar ui-bar-a">
    <h1><?=$istAdmin ? "Alle Zimmertypen" : "Meine Zimmertypen"?></h1>
</div>

<form>
    <input id="filterTable-input" data-type="search" placeholder="Zimmertypen durchsuchen...">
</form>

<div class="overflowx">
<table data-role="table" id="tbl_Zimmertyp" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle"
       data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead>
<tr>
    <th>Bezeichnung</th>
    <th>Unterkunft</th>
    <?php if ($istAdmin): ?><th>Hotelier</th><?php endif; ?>
    <th>Betten</th>
    <th>Bettart</th>
    <th>Preis pro Nacht</th>
    <th>Verfügbare Zimmer</th>
    <th>Aktionen</th>
</tr>
</thead>
<tbody>
<?php foreach ($Zimmertyp_list as $zimmertyp): ?>
<tr>
    <td><?=htmlspecialchars((string) $zimmertyp->Bezeichnung_literal)?></td>
    <td><?=htmlspecialchars((string) $zimmertyp->Unterkunft_Name)?></td>
    <?php if ($istAdmin): ?>
    <td><?=htmlspecialchars((string) $zimmertyp->HotelierName)?></td>
    <?php endif; ?>
    <td><?=(int) $zimmertyp->Anzahltbett?></td>
    <td><?=htmlspecialchars((string) $zimmertyp->ArtBett)?></td>
    <td>
        <?php if ($zimmertyp->Aktionaktiv && (float) $zimmertyp->Aktionspreis > 0): ?>
            <s><?=number_format((float) $zimmertyp->Preis, 2, ',', '.')?> €</s><br>
            <strong><?=number_format((float) $zimmertyp->Aktionspreis, 2, ',', '.')?> € (Aktion)</strong>
        <?php else: ?>
            <?=number_format((float) $zimmertyp->Preis, 2, ',', '.')?> €
        <?php endif; ?>
    </td>
    <td><?=(int) $zimmertyp->AnzahlVerfuegbarkeit?></td>
    <td>
        <a href="?task=Zimmertyp_detail&amp;id=<?=(int) $zimmertyp->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Details</a>
        <?php if (!$istAdmin && $access["edit"] == "true"): ?>
        <a href="?task=Zimmertyp_edit&amp;id=<?=(int) $zimmertyp->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Bearbeiten</a>
        <?php endif; ?>
        <?php if (!$istAdmin && $access["delete"] == "true"): ?>
        <a href="?task=Zimmertyp_delete&amp;id=<?=(int) $zimmertyp->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Zimmertyp wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<?php if (count($Zimmertyp_list) === 0): ?>
<p><?=$istAdmin ? "Es sind noch keine Zimmertypen angelegt." : "Für Ihre Unterkünfte wurden noch keine Zimmertypen angelegt."?></p>
<?php endif; ?>

<?php if (!$istAdmin && $access["new"] == "true"): ?>
<a href="?task=Zimmertyp_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neuen Zimmertyp anlegen
</a>
<?php endif; ?>
