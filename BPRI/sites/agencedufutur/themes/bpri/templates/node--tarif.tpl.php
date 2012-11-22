<?php
	drupal_add_css(path_to_theme() . '/css/tarifs.css', array('group' => CSS_THEME));
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file');
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/archive-min.js', 'file');
?>

<?php
/*
	//Recherche du nombre de pages
	$num_pages_flipbook_part = 0; 
	
	$dir = $GLOBALS['base_url'] . '/sites/agencedufutur/files/flipbooks/' . $directory_flipbook_part;
	
    $dir_handle = opendir($dir);

   	while($file = readdir($dir_handle)){
		$num_pages_flipbook_part++;
		if($file != '.' && $file != '..' && !is_dir($dir.$file)){
   			$num_pages_flipbook_part++;
		}
		
	}
<script type="text/javascript">
 alert("Repertoire : <?php print $dir ?> nombre de pages trouves: <?php print $num_pages_flipbook_part ?>");
</script>
    closedir($dir_handle);
*/
?>		
	


<div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>
 
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
		<div id="flipbook_part">
			<div id="wrapper_part">
				<div id="scroller_part">	
					<?php if($nb_pages_flipbook_part >= 10){ ?>
					<?php for( $i = 1; $i < 10; $i++ ) { ?> 
					<img class = "page_tarifs" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_part; ?>/00<?php echo $i ?>.jpg" alt="asd" id="page_part<?php echo $i ?>" />	
					<?php }?>
					<?php for( $i = 10; $i <= $nb_pages_flipbook_part; $i++ ) { ?> 
					<img class = "page_tarifs" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_part; ?>/0<?php echo $i ?>.jpg" alt="asd" id="page_part<?php echo $i ?>" />	
					<?php }}else{?> 
					<?php for( $i = 1; $i <= $nb_pages_flipbook_part; $i++ ) { ?> 
					<img class = "page_tarifs" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_part; ?>/00<?php echo $i ?>.jpg" alt="asd" id="page_part<?php echo $i ?>" />	
					<?php }} ?>	
				</div>
			</div>
		</div>	
		<div id="flipbook_pro">
			<div id="wrapper_pro">
				<div id="scroller_pro">	
					<?php if($nb_pages_flipbook_pro >= 10){ ?>
					<?php for( $i = 1; $i < 10; $i++ ) { ?> 
					<img class = "page_tarifs" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_pro; ?>/00<?php echo $i ?>.jpg" alt="asd" id="page_pro<?php echo $i ?>" />	
					<?php }?>
					<?php for( $i = 10; $i <= $nb_pages_flipbook_pro; $i++ ) { ?> 
					<img class = "page_tarifs" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_pro; ?>/0<?php echo $i ?>.jpg" alt="asd" id="page_pro<?php echo $i ?>" />	
					<?php }}else{?> 
					<?php for( $i = 1; $i <= $nb_pages_flipbook_pro; $i++ ) { ?> 
					<img class = "page_tarifs" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/flipbooks/<?php print $directory_flipbook_pro; ?>/00<?php echo $i ?>.jpg" alt="asd" id="page_pro<?php echo $i ?>" />	
					<?php }} ?>	
				</div>
			</div>			
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

var myScroll_pro;
var myScroll_part;

function loadedComplete(){	
	myScroll_pro = new iScroll('wrapper_pro');
	myScroll_part = new iScroll('wrapper_part');
}

function loadedComplete2(){	
	document.querySelector("#flipbook_pro").style.display = 'hidden';
}

document.addEventListener('DOMContentLoaded', function () { setTimeout(loadedComplete, 500); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loadedComplete2, 3000); }, false);

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

</script>
