<?php
$Unterkunft_list = Core::$view->Unterkunft_list;
$access = Core::import("access");
$istAdmin = Core::import("istAdmin");
?>
<div data-role="ui-bar ui-bar-a">
    <h1><?=$istAdmin ? "Alle Unterkünfte" : "Meine Unterkünfte"?></h1>
</div>

<form>
    <input id="filterTable-input" data-type="search" placeholder="Unterkünfte durchsuchen...">
</form>

<div class="overflowx">
<table data-role="table" id="tbl_Unterkunft" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle"
       data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead>
<tr>
    <th>Name</th>
    <?php if ($istAdmin): ?><th>Hotelier</th><?php endif; ?>
    <th>Unterkunftsart</th>
    <th>Bewertung</th>
    <th>Ort</th>
    <th>Distanz zum Zentrum</th>
    <th>Aktionen</th>
</tr>
</thead>
<tbody>
<?php foreach ($Unterkunft_list as $unterkunft): ?>
<tr>
    <td><?=htmlspecialchars((string) $unterkunft->Name)?></td>
    <?php if ($istAdmin): ?>
    <td><?=htmlspecialchars((string) $unterkunft->HotelierName)?></td>
    <?php endif; ?>
    <td><?=htmlspecialchars((string) $unterkunft->Unterkunftsart_literal)?></td>
    <td>
        <?php if ($unterkunft->Bewertung !== null && $unterkunft->Bewertung !== ""): ?>
            <?=(int) $unterkunft->Bewertung?> Stern(e)
        <?php else: ?>
            Keine Bewertung
        <?php endif; ?>
    </td>
    <td><?=htmlspecialchars((string) $unterkunft->Ortschaft)?></td>
    <td>
        <?php if ($unterkunft->DistanzzurStadt !== null && $unterkunft->DistanzzurStadt !== ""): ?>
            <?=(int) $unterkunft->DistanzzurStadt?> km
        <?php else: ?>
            Keine Angabe
        <?php endif; ?>
    </td>
    <td>
        <a href="?task=Unterkunft_detail&amp;id=<?=(int) $unterkunft->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Details</a>
        <?php if (!$istAdmin && $access["edit"] == "true"): ?>
        <a href="?task=Unterkunft_edit&amp;id=<?=(int) $unterkunft->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Bearbeiten</a>
        <?php endif; ?>
        <?php if (!$istAdmin && $access["delete"] == "true"): ?>
        <a href="?task=Unterkunft_delete&amp;id=<?=(int) $unterkunft->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Unterkunft wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<?php if (count($Unterkunft_list) === 0): ?>
<p><?=$istAdmin ? "Es sind noch keine Unterkünfte angelegt." : "Sie haben noch keine Unterkunft angelegt."?></p>
<?php endif; ?>

<?php if (!$istAdmin && $access["new"] == "true"): ?>
<a href="?task=Unterkunft_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neue Unterkunft anlegen
</a>
<?php endif; ?>
