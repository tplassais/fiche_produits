<?php
	drupal_add_css(path_to_theme() . '/css/tarifs.css', array('group' => CSS_THEME));
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file');
?>

<div id="title-white"><?php	print $title_of_screen; ?></div>
 
 <div id="right_nav_part">
	<div>
		<input type="image" id="link_flipbook_part" style="opacity: 0.5;" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/<?php print $apercu_flipbook_part; ?>" alt=""/>
	</div>
	<div>
		<input type="image" id="link_flipbook_pro" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/<?php print $apercu_flipbook_pro; ?>" alt=""/>
	</div>
</div>

<div class="block-white-container">
	<div id="flipbook_frame">
		<div id="flipbook_part" >
			<iframe id="iframe_part" frameborder="0" scrolling="no" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_part; ?>/index.htm?page=1"></iframe>
		</div>
		<div id="flipbook_pro" style="display: none;">
			<iframe id="iframe_prof" frameborder="0" scrolling="no" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_pro; ?>/index.htm?page=1"></iframe>
		</div>
	</div>
</div>

<script type="text/javascript">

var link_part = document.querySelector("#link_flipbook_part");
var link_pro = document.querySelector("#link_flipbook_pro");
link_part.onclick = function(){
	link_part.style.opacity = '0.5';
	link_pro.style.opacity = '1';
	document.querySelector("#flipbook_part").style.display = 'block';
	document.querySelector("#flipbook_pro").style.display = 'none';
};

link_pro.onclick = function(){
	link_pro.style.opacity = '0.5';
	link_part.style.opacity = '1';
	document.querySelector("#flipbook_pro").style.display = 'block';
	document.querySelector("#flipbook_part").style.display = 'none';
};

function loadedComplete(){
	
	document.getElementById("iframe_part").contentWindow.document.body.style.background = 'white';
	document.getElementById("iframe_prof").contentWindow.document.body.style.background = 'white';

}

document.addEventListener('DOMContentLoaded', function () { setTimeout(loadedComplete, 1000); }, false);

</script>
