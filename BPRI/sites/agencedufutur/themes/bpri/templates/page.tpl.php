<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/idle.js', 'file');
?>

<div id="page" class="container"> <?php print render($page['leaderboard']); ?>
  <header class="" role="banner"> </header>
  
  <?php 
  
	// Code PHP selection Pilier
	if(!isset($_SESSION['numero_pilier']))
	{
		$_SESSION['numero_pilier'] = '1';
		$numero_pilier = '1';
	}else{
		if(isset($_POST['num_pil'])){
			$_SESSION['numero_pilier'] = $_POST['num_pil'];
			$numero_pilier = $_POST['num_pil'];
		}else{
			$numero_pilier = $_SESSION['numero_pilier'];	
		}
	}	
	
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone')){
		$veille = 'false';	

	?>
	<!-- Pour Webapp Ipad -->
		<script type="text/javascript">
		
		var iWebkit;if(!iWebkit){
			iWebkit=window.onload=function(){
				function fullscreen(){
					var a=document.getElementsByTagName("a");
					for(var i=0;i<a.length;i++){
						if(a[i].getAttribute("href").match("#")){
						}else{a[i].onclick=function(){window.location=this.getAttribute("href");return false}}
					}
				}
				function hideURLbar(){
					window.scrollTo(0,0.9)
				}
				iWebkit.init=function(){
					fullscreen();
					hideURLbar()
				};
				iWebkit.init()
			}
		}
		
		/*$(document).ready(function() {
			$("a").click(function (event) {
				if (  (navigator.standalone) && ((navigator.userAgent.indexOf("iPhone") > -1) || (navigator.userAgent.indexOf("iPad") > -1)) ) {
					// On bloque les liens quand on est en mode web-app sur iPhone et iPad
					event.preventDefault();
					// On recâble le lien à la main grâce à window.location
					window.location = $(this).attr("href");
				}
			});
		});*/
		/*
		$(document).ready(function(){
			$('a').click(function(event){
				event.preventDefault();
				window.location.assign($(this).attr('href'));
			});
		});	
		*/		
		</script>
		
	<?php		
	}else{			
		if(!isset($_SESSION['veille']))
		{
			$_SESSION['veille'] = 'false';
			$veille = 'false';
		}else{
			if(isset($_POST['veille_bool'])){
				$_SESSION['veille'] = $_POST['veille_bool'];
				$veille = $_POST['veille_bool'];
			}else{
				$veille = $_SESSION['veille'];	
			}
		}		
	}

  ?>

  <!-- Code PMR Javascript --> 
  <script language="javascript">
        function submit_pmr_true(){
			document.getElementById('pmr_bas_bouton').style.display = 'none';	
			jQuery('#pmr_haut').animate({
				height : 'toggle'
			}, 1500, function() {
				localStorage['pmr'] = "true";
				document.getElementById('pmr_haut').style.display = 'block';
				document.getElementById('pmr_haut_bouton').style.display = 'inline-block';
				document.getElementById('pmr_bas').style.display = 'none';
			});
		
		}
		
        function submit_pmr_false(){
			document.getElementById('pmr_haut_bouton').style.display = 'none';	
			jQuery('#pmr_haut').animate({
				height : 'toggle'
			}, 1500, function() {
				localStorage['pmr'] = "false";	
				document.getElementById('pmr_bas').style.display = 'block';	
				document.getElementById('pmr_bas_bouton').style.display = 'inline-block';
				document.getElementById('pmr_haut').style.display = 'none';	
			});
		}
  </script>
    
  <?php if (!$user->uid) { ?>
  <!-- Espace du haut -->
  <div id="espace_du_haut" style="height: <?php print $hauteur_espace_du_h; ?>px">
  </div>
  <?php } ?>
  
  <!-- Bouton PMR du haut -->
  <div id="pmr_haut" style="display : none;">
	  <div class="pmr" style="height: <?php print $hauteur_contenu_pmr; ?>px;">
		  <img id="pmr_haut_bouton" class="pmr_bouton" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/btn_monter_ecran.png'; ?>" onClick="submit_pmr_false()"/>
	  </div>
  </div>
  
  <div id="columns">
    <div class="columns-inner clearfix">
      <div id="content-column">
        <div class="content-inner"> <?php print render($page['highlighted']); ?>
          <?php $tag = $title ? 'section' : 'div'; ?>
          <<?php print $tag; ?> id="main-content" role="main"> <?php print render($title_prefix); ?>
          <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
          <header>
            <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
            <div id="tasks">
              <?php if ($primary_local_tasks): ?>
              <ul class="tabs primary clearfix">
                <?php print render($primary_local_tasks); ?>
              </ul>
              <?php endif; ?>
              <?php if ($secondary_local_tasks): ?>
              <ul class="tabs secondary clearfix">
                <?php print render($secondary_local_tasks); ?>
              </ul>
              <?php endif; ?>
              <?php if ($action_links = render($action_links)): ?>
              <ul class="action-links clearfix">
                <?php print $action_links; ?>
              </ul>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          </header>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <div id="content"><?php print render($page['content']); ?></div>
          <?php print $feed_icons; ?> </<?php print $tag; ?>> <?php print render($page['content_aside']); ?> </div>
      </div>
      <?php print render($page['sidebar_first']); ?> <?php print render($page['sidebar_second']); ?> </div>
  </div>
  <?php print render($page['tertiary_content']); ?>
  <?php if ($page['footer']): ?>
  <footer role="contentinfo"><?php print render($page['footer']); ?></footer>
  <?php endif; ?>
  
  <!-- Bouton PMR du bas -->
  <div id="pmr_bas" style="display : none;">
	  <div class="pmr" >
		  <img id="pmr_bas_bouton" class="pmr_bouton" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/btn_descendre_ecran.png'; ?>" onClick="submit_pmr_true()"/>
	  </div>
  </div>
  
<!-- Gestion de la veille -->
<?php
	if($veille=='true')
	{
		switch("" . $numero_pilier)
		{
			/*
			case "1"://1 face
				//zone-front
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/zone-front" name ="form_veille">';
				break;
			*/
			case "2"://1 dos
				//univers
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/univers" name ="form_veille">';
				break;
			/*
			case "3"://2 face
				//categorie1
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/categorie1" name ="form_veille">';
				break;
			*/	
			case "4"://2 dos
				//liste-valeurs
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/liste-valeurs" name ="form_veille">';
				break;
			default : break;
		}
		echo '<input type="hidden" name="veille_bool" value="false" /></form>';
	}
	else
	{
		switch("" . $numero_pilier)
		{
			/*
			case "1"://1 face
				//Lancement d'une video
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/node/' . $video_veille_1_face . '" name ="form_veille">';
				break;
			*/	
			case "2"://1 dos
				//Defilement des bons plans
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/bons-plans" name ="form_veille">';
				break;
			/*	
			case "3"://2 face
				//Lancement d'une video
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/node/' . $video_veille_2_face . '" name ="form_veille">';
				break;
			*/	
			case "4"://2 dos
				//Defilement des valeurs
				echo '<form method="post" action="' . $GLOBALS['base_url'] . '/liste-valeurs" name ="form_veille">';
				break;
			default : break;
		}
		echo '<input type="hidden" name="veille_bool" value="true" /></form>';
	}
	
	
?>
  
</div>
<script type="text/javascript">

	//video 1 : <?php print $video_veille_1_face; ?> et video 2 : <?php print $video_veille_2_face; ?>
	//entree en veille : <?php print $veille_temps_entree*1000; ?>ms et sortie de veille : <?php print $veille_temps_sortie*1000; ?>ms");
	//pilier <?php print $numero_pilier; ?>
	//<?php ($veille=='true') ? print 'en veille' : print 'pas en veille'; ?>
	
	// bouton retour 	
	var div_retour = document.getElementById('bouton_retour');
	if(div_retour){	
		div_retour.href = "#";
		div_retour.onclick = function() { localStorage['bouton_retour_click'] = 'oui'; history.back(); return false; }		
	}	
	
	//Screensaver
	function loadScreensaver() {
	//Evite de lancer la veille lors de l'édition de contenu
		<?php 
			if(!user_is_logged_in()) { 
				echo "setIdleTimeout(0);\n";
				if($veille=='true'){
					echo 'setAwayTimeout(' . $veille_temps_sortie*1000 . ");\n"; // sortie de veille
				} else{
					
					if($numero_pilier != '3'){
						echo 'setAwayTimeout(' . $veille_temps_entree*1000 . ");\n"; // temps pour se mettre en veille
					}else{
						echo 'setAwayTimeout(' . $veille_temps_entree_video*1000 . ");\n"; // temps pour se mettre en veille sur le pilier video
					}
				}
				//document.onIdle = function() {
					//do nothing
				//}
				echo "document.onAway = function() { form_veille.submit(); };\n";
				echo 'document.onBack = function(isIdle, isAway) {';
				if($veille == 'true'){
					echo 'form_veille.submit();';
				}
				echo '};';
			}
		?>
	}
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loadScreensaver, 300); }, false);
	
	
	// pmr
	if (localStorage['pmr'] == "true") {
		document.getElementById('pmr_bas').style.display = 'none';	
		document.getElementById('pmr_haut').style.display = 'block';
	} else {
		document.getElementById('pmr_bas').style.display = 'block';	
		document.getElementById('pmr_haut').style.display = 'none';
	}
		
</script>
