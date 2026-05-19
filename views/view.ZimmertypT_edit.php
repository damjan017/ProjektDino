<?php
$ZimmertypT = Core::$view->ZimmertypT;
$ZimmertypT_list = Core::$view->ZimmertypT_list;
?>
<a href="?task=ZimmertypT&id=<?=$ZimmertypT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_ZimmertypT" method="post" action="?task=ZimmertypT_edit&id=<?=$ZimmertypT->id?>" data-ajax="false" enctype="<?=$ZimmertypT::$enctype?>">
<div class="ui-field-contain">
<?php
$ZimmertypT->renderLabel("id");
$ZimmertypT->render("id");
$ZimmertypT->renderLabel("c_ts");
$ZimmertypT->render("c_ts");
$ZimmertypT->renderLabel("m_ts");
$ZimmertypT->render("m_ts");
$ZimmertypT->renderLabel("literal");
$ZimmertypT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
