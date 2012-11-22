<?php
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file');
?>
<div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>

<div class="block-white-container">
	<div class="taux-scrollview-buttons" style="display:none; float: right; margin-top: 10px; margin-right: -20px;">
		<div>
			<input id="up_taux" class="up-arrow" type="image" value="Top" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/fleche_haut.png'; ?>" />
		</div>
		<div>
			<input id="down_taux" class="down-arrow" type="image" value="Bottom" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/fleche_bas.png'; ?>" style="position: absolute; bottom: 10px;"/>
		</div>
	</div>
	<div id="wrapper_scroll" class="block-white-inbox" style="width: 700px;">
		<div class="scroller" style="overflow: hidden;">
			<?php print $body; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper_scroll', {vScrollbar: false});

}
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 300); }, false);
</script>