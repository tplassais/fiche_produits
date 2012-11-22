<div id="title-white"><?php	print $title; ?></div>
<div class="video_container">
<?php  
if (!$user->uid) { 
	$urlvideo = $empl_video_local;
} else {
	$urlvideo = $empl_video_internet;
}
	print '<video style="display : block; max-height : 400px;" autoplay controls class="video_player" src="' . $urlvideo . $nom_video . '"></video>';

/*
// Veille !!!!!!!!!!!!!!!!
if () {
	print '<video style="display : none; max-height : 400px;" autoplay controls class="video_player" src="' . $urlvideo . $video_pilier_1_face->field_video_url_text['und'][0]['safe_value'] . '"></video>';
} else {
	print '<video style="display : none; max-height : 400px;" autoplay controls class="video_player" src="' . $urlvideo . $video_pilier_2_face->field_video_url_text['und'][0]['safe_value'] . '"></video>';
}
*/ 
?>
</div>