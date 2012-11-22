<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/jquery-ui.min.js', 'file');
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file'); 
?>

<?php 
	drupal_add_css(path_to_theme() . '/css/valeurs.css', array('group' => CSS_THEME)); 
 ?>

 <section>
<?php print '<div id="offre_cloud_carousel_' . $id_node . '" class="cloudcarousel">'; ?>
	<div class="titre-valeur"><?php print $nom; ?></div>
	
	<!-- up and down buttons -->
	<div class="valeur-scrollview-buttons" style="display:none">
		<input id="up<?php echo $id_node; ?>" class="up-arrow" type="image" value="Top" />
		<input id="down<?php echo $id_node; ?>" class="down-arrow" type="image" value="Bottom" />
	</div>

	
	<div id="wrapper<?php echo $id_node; ?>" class="details-valeur">
		<div class="scroller">
			<?php print $description_sans_object; ?>
			<br/>
			<div style="scroller-div ;">
			<br>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var myScroll<?php echo $id_node; ?>;
	var timeout<?php echo $id_node; ?>;
	
	function loaded<?php echo $id_node; ?>() {
		/* Initialize scrollable texts */
		myScroll<?php echo $id_node; ?> = new iScroll('wrapper<?php echo $id_node; ?>', {vScrollbar: false });
		
		jQuery(document).mouseup(function () {
			clearInterval(timeout<?php echo $id_node; ?>);
			return false;
		});
	
	}
	
	function refresh<?php echo $id_node; ?>() {
	
		setTimeout(function(){
			myScroll<?php echo $id_node; ?>.refresh();
		}, 0);		
	}	
	
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded<?php echo $id_node; ?>, 300); }, false);
	
	document.addEventListener('DOMContentLoaded', function () { setTimeout(refresh<?php echo $id_node; ?>, 600); }, false);
	
</script>
</section>