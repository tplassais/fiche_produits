<?php 
	drupal_add_css(path_to_theme() . '/css/agence.css', array('group' => CSS_THEME));
?>
<style type="text/css">
.selection-button {
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background-color:#f7f7f7;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#666666;
	font-family:GIL;
	font-size:22px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
	margin-top: 15px;
	width: 250px;
}
.selection-button:active {
	position:relative;
	top:1px;
}
</style>

<script language="javascript">
	localStorage['retour'] = 0;
</script>

<div id="content" style="width: 1080px; margin: auto; text-align: center;">
	<div id="title-white">S&eacute;lection du pilier</div>
	<form method="post" action="<?php print $GLOBALS['base_url']; ?>/zone-front" name ="form_pilier_1_f">
		<input type="hidden" name="num_pil" value="1"/>
		<div id="button-1-face" class="selection-button" onClick="form_pilier_1_f.submit();">Pilier 1 face</div>
	</form>
	<form method="post" action="<?php print $GLOBALS['base_url']; ?>/univers" name ="form_pilier_1_d">
		<input type="hidden" name="num_pil" value="2"/>
		<div id="button-1-dos" class="selection-button" onClick="form_pilier_1_d.submit();">Pilier 1 dos</div>
	</form>
	<form method="post" action="<?php print $GLOBALS['base_url']; ?>/categorie1" name ="form_pilier_2_f">
		<input type="hidden" name="num_pil" value="3"/>
		<div id="button-2-face" class="selection-button" onClick="form_pilier_2_f.submit();">Pilier 2 face</div>
	</form>
	<form method="post" action="<?php print $GLOBALS['base_url']; ?>/liste-valeurs" name ="form_pilier_2_d">
		<input type="hidden" name="num_pil" value="4"/>
		<div id="button-2-dos" class="selection-button" onClick="form_pilier_2_d.submit();">Pilier 2 dos</div>
    </form>
</div>
