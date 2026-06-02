<?php
$Buchung_list = Core::$view->Buchung_list;
$Buchung      = Core::$view->Buchung;
$access       = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a">
    <h1>Übersicht: Buchungen</h1>
</div>
<form><input id="filterTable-input" data-type="search" placeholder="Suchen..."></form>
<div class="overflowx">
<table data-role="table" id="tbl_Buchung" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead>
<tr>
    <?php $Buchung->renderHeader("id", "table"); ?>
    <?php $Buchung->renderHeader("checkin", "table"); ?>
    <?php $Buchung->renderHeader("checkout", "table"); ?>
    <?php $Buchung->renderHeader("AnzahlGaeste", "table"); ?>
    <?php $Buchung->renderHeader("Gesamtpreis", "table"); ?>
    <?php $Buchung->renderHeader("Zahlungsart", "table"); ?>
    <?php $Buchung->renderHeader("Status", "table"); ?>
    <th></th>
</tr>
</thead>
<tbody>
<?php foreach ($Buchung_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("checkin"); ?>
    <?php $klasse->render("checkout"); ?>
    <?php $klasse->render("AnzahlGaeste"); ?>
    <?php $klasse->render("Gesamtpreis"); ?>
    <?php $klasse->render("Zahlungsart"); ?>
    <?php $klasse->render("Status"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Buchung_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Buchung_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Buchung_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Buchung stornieren?')">Stornieren</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php if ($access["new"] == "true"): ?>
<a href="?task=Zimmersuche" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neue Buchung (Zimmersuche)
</a>
<?php endif; ?>
