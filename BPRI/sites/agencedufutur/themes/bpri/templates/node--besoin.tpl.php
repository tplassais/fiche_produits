
<?php 
	drupal_add_css(path_to_theme() . '/css/custom.reveal.css', array('group' => CSS_THEME)); 
 ?>

<div id="title-white"><div id="title-white-div"><?php	print $title; ?></div></div>

<div class="reveal" id="myreveal">
	<div class="slides">
		
		<!-- Liste des valeurs -->
		<?php
			print render($content);
		?>
	</div>
	<?php if($_SESSION['veille']=='false' && !strpos($_SERVER['HTTP_USER_AGENT'],'iPad')){ ?>
	<?php } ?>
</div>

	<script src=<?php print '"'.$GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri').'/scripts/custom.reveal.js"'; ?>></script>

	<script>
			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
					controls : true,
				progress : false,
				history : false,
				center : true,
				loop : false,
				keyboard : true,
				overview : false,

				// Transition style (see /css/theme)
				//theme: null,

				//theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
				transition : Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/none  // Linear/concave/default/cube

			});
	</script>