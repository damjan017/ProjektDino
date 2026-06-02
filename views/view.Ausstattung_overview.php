<?php
$Ausstattung_list = Core::$view->Ausstattung_list;
$Ausstattung      = Core::$view->Ausstattung;
$access           = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a"><h1>Übersicht: Ausstattung</h1></div>
<form><input id="filterTable-input" data-type="search" placeholder="Suchen..."></form>
<div class="overflowx">
<table data-role="table" id="tbl_Ausstattung" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead><tr>
    <?php $Ausstattung->renderHeader("id", "table"); ?>
    <?php $Ausstattung->renderHeader("Bezeichnung", "table"); ?>
    <?php $Ausstattung->renderHeader("Kategorie", "table"); ?>
    <th></th>
</tr></thead>
<tbody>
<?php foreach ($Ausstattung_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("Bezeichnung"); ?>
    <?php $klasse->render("Kategorie"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Ausstattung_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Ausstattung_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Ausstattung_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Ausstattung wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php if ($access["new"] == "true"): ?>
<a href="?task=Ausstattung_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neue Ausstattung anlegen
</a>
<?php endif; ?>
