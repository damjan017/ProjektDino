<?php
$Mitgast_list = Core::$view->Mitgast_list;
$Mitgast      = Core::$view->Mitgast;
$access       = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a"><h1>Übersicht: Mitgäste</h1></div>
<form><input id="filterTable-input" data-type="search" placeholder="Suchen..."></form>
<div class="overflowx">
<table data-role="table" id="tbl_Mitgast" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead><tr>
    <?php $Mitgast->renderHeader("id", "table"); ?>
    <?php $Mitgast->renderHeader("Vorname", "table"); ?>
    <?php $Mitgast->renderHeader("Nachname", "table"); ?>
    <?php $Mitgast->renderHeader("Geburtsdatum", "table"); ?>
    <?php $Mitgast->renderHeader("_Buchung", "table"); ?>
    <th></th>
</tr></thead>
<tbody>
<?php foreach ($Mitgast_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("Vorname"); ?>
    <?php $klasse->render("Nachname"); ?>
    <?php $klasse->render("Geburtsdatum"); ?>
    <?php $klasse->render("_Buchung"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Mitgast_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Mitgast_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Mitgast_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Mitgast wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
