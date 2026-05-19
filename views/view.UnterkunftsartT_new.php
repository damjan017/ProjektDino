<?php
$UnterkunftsartT = Core::$view->UnterkunftsartT;
$UnterkunftsartT_list = Core::$view->UnterkunftsartT_list ;
?>
<a href="?task=UnterkunftsartT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_UnterkunftsartT" method="post" action="?task=UnterkunftsartT_new" data-ajax="false" enctype="<?=$UnterkunftsartT::$enctype?>">
<div class="ui-field-contain">
<?php
$UnterkunftsartT = Core::$view->UnterkunftsartT;
$UnterkunftsartT->renderLabel("id");
$UnterkunftsartT->render("id");
$UnterkunftsartT->renderLabel("c_ts");
$UnterkunftsartT->render("c_ts");
$UnterkunftsartT->renderLabel("m_ts");
$UnterkunftsartT->render("m_ts");
$UnterkunftsartT->renderLabel("literal");
$UnterkunftsartT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
