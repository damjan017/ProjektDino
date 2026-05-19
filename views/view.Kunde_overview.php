<?php
$Kunde_list=Core::$view->Kunde_list;
$Kunde=Core::$view->Kunde;
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Kunde",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite Kunde

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Kunde&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Kunde" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Kunde->renderHeader("id", "table"); ?>
<?php $Kunde->renderHeader("c_ts", "table"); ?>
<?php $Kunde->renderHeader("m_ts", "table"); ?>
<?php $Kunde->renderHeader("Nachname", "table"); ?>
<?php $Kunde->renderHeader("Vorname", "table"); ?>
<?php $Kunde->renderHeader("Email", "table"); ?>
<?php $Kunde->renderHeader("Geburtsdatum", "table"); ?>
<?php $Kunde->renderHeader("Personalausweisnrummer", "table"); ?>
<?php $Kunde->renderHeader("_User_uid", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Kunde_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Nachname"); ?>
<?php $klasse->render("Vorname"); ?>
<?php $klasse->render("Email"); ?>
<?php $klasse->render("Geburtsdatum"); ?>
<?php $klasse->render("Personalausweisnrummer"); ?>
<?php $klasse->render("_User_uid"); ?>
<td>
<?php if($access["detail"] == "true"){ ?>
<a href="?task=Kunde_detail&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">show</a>
<?php } ?>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Kunde_edit&id=<?=$klasse->id?>&task_source=Kunde" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Kunde_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$Klasse->id." wirklich gelöscht werden?"?>")">delete</a>
<?php } ?>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<?php if($access["new"] == "true"){ ?>
<a href="?task=Kunde_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<?php } ?>
<br>
