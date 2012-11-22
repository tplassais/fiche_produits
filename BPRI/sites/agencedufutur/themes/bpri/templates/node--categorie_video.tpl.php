<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/jquery-ui.min.js', 'file');
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file'); 
	drupal_add_css(path_to_theme() . '/css/valeurs.css', array('group' => CSS_THEME));
?>


<div id="title-white"><div id="title-white-div"><?php	print $new_title; ?></div></div>
<div class="video_container">
<?php  
if (!$user->uid) { 
		$urlvideo = $empl_video_local;
		$urlvideo2 = $empl_video_internet;
	}
	else {
		$urlvideo = $empl_video_internet;
		$urlvideo2 = $empl_video_local;
	}
	for ($i = 0; $i < count($current_video); $i++) {
		print '<video style="display : none; " autobuffer controls class="video_player" id="video_player_' . $current_video[$i]->nid . '">		
		<source src="' . $urlvideo2 . $current_video[$i]->field_video_file['und'][0]['filename'] . '">
		<source src="' . $urlvideo . $current_video[$i]->field_video_file['und'][0]['filename'] . '">
		</video>';
	}
	?>
	<!--  -->
</div>
<div style="text-align : center;">

	<div id="video_browser">
		<div id="wrapper" style="width : 860px;">
			<div id="scroller" class="scroller" style="display : inline-block; overflow : visible;">
				<?php 
					for ($i = 0; $i < count($current_video); $i++) {
						print '<div class="video_inline" id="video_' . $current_video[$i]->nid . '" onmouseup="select_video(' . $current_video[$i]->nid . ')">'; //onmousedown="store_video(' . $current_video[$i]->nid . ')"
						print $miniature_videos[$i];
						print '<div class="video_label" id="label_' . $current_video[$i]->nid . '">' . $current_video[$i]->title . '</div>';
						print '</div>';
					}
				?>
			</div>
		</div>
	</div>
	<!--
		<input id="left-button" class="video-browser-left-arrow" type="image" value="Left" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/fleche_gauche.png'; ?>" />
		<input id="right-button" class="video-browser-right-arrow" type="image" value="Right" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/fleche_droite.png'; ?>" />
		-->
</div>

<script type="text/javascript">
/*var stored = 0;

function store_video(id) {
	stored = id;
}
*/
function launch_video(id) {
	document.getElementById('video_player_' + id).currentTime = 0.0;
	document.getElementById('video_player_' + id).style.display = 'block';
	document.getElementById('video_player_' + id).play();
}

function reset_video() {
	var players = document.getElementsByClassName('video_player');
	for(var i = 0; i < players.length; i++) // Reinitialisation des autres players
	{		
		players[i].style.display = 'none';
		players[i].pause();
	}
}

function set_selected(id) {
	var labels = document.getElementsByClassName('video_label');
	for(var i = 0; i < labels.length; i++) // Reinitialisation des autres players
	{		
		labels[i].style.color = 'white';
	}
	
	var vids = document.getElementsByClassName('video_inline');
	for(var i = 0; i < vids.length; i++) // Reinitialisation des autres players
	{		
		vids[i].style.opacity = 1;
	}

	document.getElementById('video_' + id).style.opacity = 0.5;
	document.getElementById('label_' + id).style.color = '#0987AF';
}

function select_video(id)
{
	//if (stored == id) {
	reset_video();
	set_selected(id);
	launch_video(id);
	//}
}

// selection de la première vidéo à l'ouverture
document.getElementById('video_player_' + <?php print $current_video[0]->nid; ?>).play();
document.getElementById('video_player_' + <?php print $current_video[0]->nid; ?>).style.display = 'block';
document.getElementById('video_' + <?php print $current_video[0]->nid; ?>).style.opacity = 0.5;
document.getElementById('label_' + <?php print $current_video[0]->nid; ?>).style.color = '#0987AF';
</script>


<script type="text/javascript">
	var myScroll;
	function loaded() {
		
		var nbvideo = document.getElementsByClassName('video_player').length;
		//alert(document.getElementById('scroller').style.width);
		document.getElementById('scroller').style.width = nbvideo * 180 + 'px';
	
	
		/* Initialize scrollable texts */
		myScroll = new iScroll('wrapper', {hScrollbar: false });
		
		
		/* Up and down arrows binding */
		/* Hide if iOS device */
		
		/*
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
				document.getElementById('left-button').style.display = "none";
				document.getElementById('right-button').style.display = "none";
		}
		else {
			//If there is content to scroll
			if (myScroll.scroller.offsetWidth > myScroll.wrapper.offsetWidth) {
			
				var timeout;
				document.querySelector("#left-button").onmousedown = function() {
					if(myScroll.x < 0) {
						myScroll.scrollTo(myScroll.x + 10, 0,100);
					}
					timeout = setInterval(function () {
						if(myScroll.x < 0) {
							myScroll.scrollTo(myScroll.x + 10, 0,100);
						}
					}, 25);
					return false;
				};

				document.querySelector("#right-button").onmousedown = function() {
					myScroll.scrollTo(myScroll.x -10, 0,100);
					timeout = setInterval(function () {
						myScroll.scrollTo(myScroll.x -10, 0,100);
					}, 25);
					return false;
				};
	
				document.querySelector("html").onmouseup = function () {
					clearInterval(timeout);
					return false;
				};
			}
			else {
				myScroll.destroy();
				document.getElementById('left-button').style.display = "none";
				document.getElementById('right-button').style.display = "none";
			}
		}
		*/
	}
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 300); }, false);

	
</script>
