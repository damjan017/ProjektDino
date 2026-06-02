<?php
$Unterkunft_list = Core::$view->Unterkunft_list;
$Unterkunft      = Core::$view->Unterkunft;
$access          = Core::import("access");
?>
<div data-role="ui-bar ui-bar-a">
    <h1>Übersicht: Unterkünfte</h1>
</div>
<form>
    <input id="filterTable-input" data-type="search" placeholder="Suchen...">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Unterkunft" data-filter="true" data-input="#filterTable-input"
       class="ui-responsive" data-mode="columntoggle"
       data-column-btn-theme="b" data-column-btn-text="Spalten">
<thead>
<tr>
    <?php $Unterkunft->renderHeader("id", "table"); ?>
    <?php $Unterkunft->renderHeader("Name", "table"); ?>
    <?php $Unterkunft->renderHeader("Unterkunftsart", "table"); ?>
    <?php $Unterkunft->renderHeader("Bewertung", "table"); ?>
    <?php $Unterkunft->renderHeader("_Hotelier", "table"); ?>
    <th></th>
</tr>
</thead>
<tbody>
<?php foreach ($Unterkunft_list as $klasse): ?>
<tr>
    <?php $klasse->render("id"); ?>
    <?php $klasse->render("Name"); ?>
    <?php $klasse->render("Unterkunftsart"); ?>
    <?php $klasse->render("Bewertung"); ?>
    <?php $klasse->render("_Hotelier"); ?>
    <td>
        <?php if ($access["detail"] == "true"): ?>
        <a href="?task=Unterkunft_detail&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">Detail</a>
        <?php endif; ?>
        <?php if ($access["edit"] == "true"): ?>
        <a href="?task=Unterkunft_edit&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">Edit</a>
        <?php endif; ?>
        <?php if ($access["delete"] == "true"): ?>
        <a href="?task=Unterkunft_delete&id=<?=$klasse->id?>" data-ajax="false"
           class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline"
           onclick="return confirm('Unterkunft wirklich löschen?')">Löschen</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php if ($access["new"] == "true"): ?>
<a href="?task=Unterkunft_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">
    Neue Unterkunft anlegen
</a>
<?php endif; ?>
