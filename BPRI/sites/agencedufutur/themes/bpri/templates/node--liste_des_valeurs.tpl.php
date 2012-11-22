
<link rel="stylesheet" href="http://20.10.7.12/BPRI/sites/agencedufutur/themes/bpri/css/custom.reveal.css">

<div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>

<div class="reveal" id="myreveal">
	<div class="slides">
	
		<!-- Liste des valeurs -->
		<?php
			print render($content);
		?> 
	</div>
	<?php if($_SESSION['veille']=='false'){ ?>
	<?php } ?>
</div>

<script src="http://20.10.7.12/BPRI/sites/agencedufutur/themes/bpri/scripts/custom.reveal.js"></script>

	<script>
			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
					controls : false,
				progress : false,
				history : false,
				center : false,
				loop : true,
				keyboard : true,
				overview : false,

				// Transition style (see /css/theme)
				//theme: null,

				//theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
				transition : Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/none  // Linear/concave/default/cube

			});
	</script>