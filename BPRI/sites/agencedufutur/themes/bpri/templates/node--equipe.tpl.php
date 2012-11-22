<?php
	drupal_add_js('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', 'external'); 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file'); 
?>

<div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>

<div id="wrapper">
	<div class="scroller">
		
	
		<?php
			print render($content);
		?>
	</div>
</div>

<script type="text/javascript">
	var myScroll;
	function loaded() {
		/* Initialize scrollable texts */
		myScroll = new iScroll('wrapper', {vScrollbar: false });
		
		//If there is content to scroll
		if (myScroll.scroller.offsetHeight <= myScroll.wrapper.offsetHeight) {
			myScroll.destroy();
		}
	}
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 300); }, false);

	
</script>