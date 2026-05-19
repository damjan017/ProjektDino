<?php
$ZahlungsartT = Core::$view->ZahlungsartT;
$ZahlungsartT_list = Core::$view->ZahlungsartT_list;
?>
<a href="?task=ZahlungsartT&id=<?=$ZahlungsartT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_ZahlungsartT" method="post" action="?task=ZahlungsartT_edit&id=<?=$ZahlungsartT->id?>" data-ajax="false" enctype="<?=$ZahlungsartT::$enctype?>">
<div class="ui-field-contain">
<?php
$ZahlungsartT->renderLabel("id");
$ZahlungsartT->render("id");
$ZahlungsartT->renderLabel("c_ts");
$ZahlungsartT->render("c_ts");
$ZahlungsartT->renderLabel("m_ts");
$ZahlungsartT->render("m_ts");
$ZahlungsartT->renderLabel("literal");
$ZahlungsartT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
