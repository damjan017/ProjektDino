<?php
$UnterkunftsartT = Core::$view->UnterkunftsartT;
$UnterkunftsartT_list = Core::$view->UnterkunftsartT_list;
?>
<a href="?task=UnterkunftsartT&id=<?=$UnterkunftsartT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_UnterkunftsartT" method="post" action="?task=UnterkunftsartT_edit&id=<?=$UnterkunftsartT->id?>" data-ajax="false" enctype="<?=$UnterkunftsartT::$enctype?>">
<div class="ui-field-contain">
<?php
$UnterkunftsartT->renderLabel("id");
$UnterkunftsartT->render("id");
$UnterkunftsartT->renderLabel("c_ts");
$UnterkunftsartT->render("c_ts");
$UnterkunftsartT->renderLabel("m_ts");
$UnterkunftsartT->render("m_ts");
$UnterkunftsartT->renderLabel("literal");
$UnterkunftsartT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
