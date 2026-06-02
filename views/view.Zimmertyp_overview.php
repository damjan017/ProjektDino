<?php
$Zimmertyp_list = Core::$view->Zimmertyp_list;
$Zimmertyp      = Core::$view->Zimmertyp;
$access         = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a">
    <h1>Übersicht: Zimmertypen</h1>
</div>
<form><input id="filterTable-input" data-type="search" placeholder="Suchen..."></form>
<div class="overflowx">
<table data-role="table" id="tbl_Zimmertyp" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead>
<tr>
    <?php $Zimmertyp->renderHeader("id", "table"); ?>
    <?php $Zimmertyp->renderHeader("Bezeichnung", "table"); ?>
    <?php $Zimmertyp->renderHeader("Anzahltbett", "table"); ?>
    <?php $Zimmertyp->renderHeader("Preis", "table"); ?>
    <?php $Zimmertyp->renderHeader("AnzahlVerfuegbarkeit", "table"); ?>
    <?php $Zimmertyp->renderHeader("_Unterkunft", "table"); ?>
    <th></th>
</tr>
</thead>
<tbody>
<?php foreach ($Zimmertyp_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("Bezeichnung"); ?>
    <?php $klasse->render("Anzahltbett"); ?>
    <?php $klasse->render("Preis"); ?>
    <?php $klasse->render("AnzahlVerfuegbarkeit"); ?>
    <?php $klasse->render("_Unterkunft"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Zimmertyp_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Zimmertyp_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Zimmertyp_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Zimmertyp wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php if ($access["new"] == "true"): ?>
<a href="?task=Zimmertyp_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neuen Zimmertyp anlegen
</a>
<?php endif; ?>
