<?php
$Adresse_list = Core::$view->Adresse_list;
$Adresse      = Core::$view->Adresse;
$access       = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a"><h1>Übersicht: Adressen</h1></div>
<form><input id="filterTable-input" data-type="search" placeholder="Suchen..."></form>
<div class="overflowx">
<table data-role="table" id="tbl_Adresse" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead><tr>
    <?php $Adresse->renderHeader("id", "table"); ?>
    <?php $Adresse->renderHeader("Straße", "table"); ?>
    <?php $Adresse->renderHeader("Hausnummer", "table"); ?>
    <?php $Adresse->renderHeader("Postleitzahl", "table"); ?>
    <?php $Adresse->renderHeader("Ortschaft", "table"); ?>
    <?php $Adresse->renderHeader("DistanzzurStadt", "table"); ?>
    <th></th>
</tr></thead>
<tbody>
<?php foreach ($Adresse_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("Straße"); ?>
    <?php $klasse->render("Hausnummer"); ?>
    <?php $klasse->render("Postleitzahl"); ?>
    <?php $klasse->render("Ortschaft"); ?>
    <?php $klasse->render("DistanzzurStadt"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Adresse_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Adresse_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Adresse_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Adresse wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php if ($access["new"] == "true"): ?>
<a href="?task=Adresse_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neue Adresse anlegen
</a>
<?php endif; ?>
