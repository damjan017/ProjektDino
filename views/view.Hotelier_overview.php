<?php
$Hotelier_list = Core::$view->Hotelier_list;
$Hotelier      = Core::$view->Hotelier;
$access        = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a"><h1>Übersicht: Hoteliers</h1></div>
<form><input id="filterTable-input" data-type="search" placeholder="Suchen..."></form>
<div class="overflowx">
<table data-role="table" id="tbl_Hotelier" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead><tr>
    <?php $Hotelier->renderHeader("id", "table"); ?>
    <?php $Hotelier->renderHeader("Name", "table"); ?>
    <?php $Hotelier->renderHeader("Vorname", "table"); ?>
    <?php $Hotelier->renderHeader("Email", "table"); ?>
    <th></th>
</tr></thead>
<tbody>
<?php foreach ($Hotelier_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("Name"); ?>
    <?php $klasse->render("Vorname"); ?>
    <?php $klasse->render("Email"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Hotelier_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Hotelier_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Hotelier_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Hotelier wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php if ($access["new"] == "true"): ?>
<a href="?task=Hotelier_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neuen Hotelier anlegen
</a>
<?php endif; ?>
