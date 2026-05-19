<?php
$AusstattungskategorieT = Core::$view->AusstattungskategorieT;
$AusstattungskategorieT_list = Core::$view->AusstattungskategorieT_list;
?>
<a href="?task=AusstattungskategorieT&id=<?=$AusstattungskategorieT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_AusstattungskategorieT" method="post" action="?task=AusstattungskategorieT_edit&id=<?=$AusstattungskategorieT->id?>" data-ajax="false" enctype="<?=$AusstattungskategorieT::$enctype?>">
<div class="ui-field-contain">
<?php
$AusstattungskategorieT->renderLabel("id");
$AusstattungskategorieT->render("id");
$AusstattungskategorieT->renderLabel("c_ts");
$AusstattungskategorieT->render("c_ts");
$AusstattungskategorieT->renderLabel("m_ts");
$AusstattungskategorieT->render("m_ts");
$AusstattungskategorieT->renderLabel("literal");
$AusstattungskategorieT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
