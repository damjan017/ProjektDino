<?php $klasse = Core::$view->Kunde; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Kunde_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Kunde_list_2 = Core::$view->Kunde_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Kunde" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Kunde_edit&id=<?=$klasse->id?>&task_source=Kunde_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Kunde_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php } ?>

 Kunde

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Kunde_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-field-contain">
<?php
$klasse->renderLabel("id");
$klasse->render("id");
$klasse->renderLabel("c_ts");
$klasse->render("c_ts");
$klasse->renderLabel("m_ts");
$klasse->render("m_ts");
$klasse->renderLabel("Nachname");
$klasse->render("Nachname");
$klasse->renderLabel("Vorname");
$klasse->render("Vorname");
$klasse->renderLabel("Email");
$klasse->render("Email");
$klasse->renderLabel("Geburtsdatum");
$klasse->render("Geburtsdatum");
$klasse->renderLabel("Personalausweisnrummer");
$klasse->render("Personalausweisnrummer");
$klasse->renderLabel("_User_uid");
$klasse->render("_User_uid");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Buchung</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="view_Buchung_b">
<?php
Core::$view->render("view_Buchung_b");
?>
<form method="post" action="?task=Kunde_handle_Buchung_b&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Buchung_new&Kunde=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
</div>
</div>
<?php } ?>
