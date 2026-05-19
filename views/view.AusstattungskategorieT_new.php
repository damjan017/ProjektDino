<?php
$AusstattungskategorieT = Core::$view->AusstattungskategorieT;
$AusstattungskategorieT_list = Core::$view->AusstattungskategorieT_list ;
?>
<a href="?task=AusstattungskategorieT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_AusstattungskategorieT" method="post" action="?task=AusstattungskategorieT_new" data-ajax="false" enctype="<?=$AusstattungskategorieT::$enctype?>">
<div class="ui-field-contain">
<?php
$AusstattungskategorieT = Core::$view->AusstattungskategorieT;
$AusstattungskategorieT->renderLabel("id");
$AusstattungskategorieT->render("id");
$AusstattungskategorieT->renderLabel("c_ts");
$AusstattungskategorieT->render("c_ts");
$AusstattungskategorieT->renderLabel("m_ts");
$AusstattungskategorieT->render("m_ts");
$AusstattungskategorieT->renderLabel("literal");
$AusstattungskategorieT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
