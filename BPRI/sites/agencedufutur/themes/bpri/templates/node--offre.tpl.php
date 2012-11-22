<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/jquery-ui.min.js', 'file');
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file'); 
?>

<?php 
	if((bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')){
		drupal_add_css(path_to_theme() . '/css/offres_ipad.css', array('group' => CSS_THEME)); 
	}else{
		drupal_add_css(path_to_theme() . '/css/offres_pilier.css', array('group' => CSS_THEME)); 
	}
	drupal_add_css(path_to_theme() . '/css/offres.css', array('group' => CSS_THEME)); 
 ?>
 
<section>
<?php print '<div id="offre_cloud_carousel_' . $id_node . '" class="cloudcarousel">'; ?>

	<!-- POPUP OFFRE DU MOMENT -->
	<div id="popup-offre-moment<?php echo $id_node; ?>" class="popup popup-offre-moment">
		<div class="titre-popup">
			Offre du moment
		</div>
		<div class="texte-popup">
			<?php print $texte_moment; ?>
			<div style="font-size: 12px;">
				<?php print $mention_moment; ?>
			</div>
		</div>
		<div id="bottom-popup-moment" class="bottom-popup">
			<img src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/bottom_popup.png'; ?>" alt="">
		</div>
	</div>
	
	<!-- POPUP ASTUCE -->
	<div id="popup-astuce<?php echo $id_node; ?>" class="popup popup-astuce">
		<div class="titre-popup">
			Astuce
		</div>
		<div class="texte-popup">
			<?php print $texte_astuce; ?>
		</div>
		<div id="bottom-popup-astuce" class="bottom-popup">
			<img src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/bottom_popup.png'; ?>" alt="">
		</div>
	</div>
	
	<!-- POPUP QRCODE -->
	<div id="popup-qrcode<?php echo $id_node; ?>" class="popup popup-qrcode">
		<div class="titre-popup">
			Flashcode
		</div>
		<div class="qrcode-popup">
			<?php print $qrcode; ?>
		</div>
		<div class="texte-qrcode-popup">
			Pour flasher l&acute;offre, t&eacute;l&eacute;chargez sur votre Smartphone une application permettant de lire les flashcodes.
		</div>
		<div id="bottom-popup-qrcode" class="bottom-popup">
			<img id="bottom-popup-qrcode-img" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/bottom_popup.png'; ?>" alt="">
		</div>
	</div>
	
	<!-- POPUP SIMULATEUR -->
	<div id="popup-simulateur<?php echo $id_node; ?>" class="popup popup-simulateur">
		<div class="titre-popup">
			Simulateur
		</div>
		<div class="texte-popup">
			<?php print $texte_simulateur; ?>
		</div>
		<div id="bottom-popup-simulateur" class="bottom-popup">
			<img src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/bottom_popup.png'; ?>" alt="">
		</div>
	</div>
	
	
	<div class="partie-droite">
		<div class="pub">
			<?php print $visuel; ?>
		</div>
		<div class="badges">
			<img id="offre_badge_offre_moment<?php echo $id_node; ?>" class="badge1" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/badge1.png'; ?>" alt="Offre du moment">
			<img id="offre_badge_astuce<?php echo $id_node; ?>" class="badge2" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/badge2.png'; ?>" alt="Astuce">
			<img id="offre_badge_qrcode<?php echo $id_node; ?>" class="badge4" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/badge4.png'; ?>" alt="QRCode">
			<img id="offre_badge_simulateur<?php echo $id_node; ?>" class="badge3" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1d_offres/badge3.png'; ?>" alt="Simulateur" >
		</div>
	</div>
	<div class="titre-offre"><div class="titre-offre-div"><?php print $titre; ?></div></div>
	
	<!-- Define up and down buttons. -->
	<div class="offre-scrollview-buttons">	
		<div>
			<input id="up<?php echo $id_node; ?>" style="display:none" class="up-arrow" type="image" value="Top" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/fleche_haut.png'; ?>" />
		</div>
		<div>
			<input id="down<?php echo $id_node; ?>" style="display:none" class="down-arrow" type="image" value="Bottom" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/all/fleche_bas.png'; ?>" />
		</div>
	</div>

	<div id="wrapper<?php print $id_node; ?>" class="details-offre">
		<div class="scroller">
			<p style="color: #2872ae;" class="accroche"><?php print $accroche; ?></p>
			<p></br></br></p>
			<p class="savoir_plus">En savoir plus<p>
			<div class="offre_description">
			<?php print $description; ?>
			
			</div>
			<br/>
			<div class="scroller-div">
			</div>
		</div>
	</div>
	
</div>


<script type="text/javascript">

	//Cache des popups
	document.getElementById('popup-offre-moment<?php echo $id_node; ?>').style.display = 'none';
	document.getElementById('popup-astuce<?php echo $id_node; ?>').style.display = 'none';
	document.getElementById('popup-qrcode<?php echo $id_node; ?>').style.display = 'none';
	document.getElementById('popup-simulateur<?php echo $id_node; ?>').style.display = 'none';
	
	//Affichage ou non du bouton simulateur
	if (<?php print $boolsimulateur; ?> == 1) {
		document.getElementById('offre_badge_simulateur<?php echo $id_node; ?>').style.display = 'block';
	}else{
		document.getElementById('offre_badge_simulateur<?php echo $id_node; ?>').style.display = 'none';
	}
	
	//Affichage ou non du bouton offre du moment
	if (<?php print $boolmoment; ?> == 1) {
		document.getElementById('offre_badge_offre_moment<?php echo $id_node; ?>').style.display = 'block';	
	}else{
		//Cache badge offre du moment
		document.getElementById('offre_badge_offre_moment<?php echo $id_node; ?>').style.display = 'none';
		//Adapte la marge gauche du badge astuce
		document.getElementById('offre_badge_astuce<?php echo $id_node; ?>').style.marginLeft = '70px';
	}
	
	//SI ON EST SUR L'IPAD
	if (((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)))) {
	
		//Popup offre du moment
		if (<?php print $boolmoment; ?> == 1) {			
			document.getElementById('offre_badge_offre_moment<?php echo $id_node; ?>').ontouchend = function() {
				document.getElementById('popup-offre-moment<?php echo $id_node; ?>').style.display = 'none';
			};			
			document.getElementById('offre_badge_offre_moment<?php echo $id_node; ?>').ontouchstart = function() {
				document.getElementById('popup-offre-moment<?php echo $id_node; ?>').style.display = 'block';
			};			
		}
		
		//PopUp Astuce
		document.getElementById('offre_badge_astuce<?php echo $id_node; ?>').ontouchend = function() {
			document.getElementById('popup-astuce<?php echo $id_node; ?>').style.display = 'none';
		};
		document.getElementById('offre_badge_astuce<?php echo $id_node; ?>').ontouchstart = function() {
			document.getElementById('popup-astuce<?php echo $id_node; ?>').style.display = 'block';
		};		
		
		//Simulateur		
		document.getElementById('offre_badge_simulateur<?php echo $id_node; ?>').ontouchstart = function(){
			self.location = '<?php print $simulateur; ?>';
		};
		
		//PopUp qrcode
		document.getElementById('offre_badge_qrcode<?php echo $id_node; ?>').style.display = 'none';
		
	//SI ON EST SUR LE PILIER	
	}else{
	
		//Popup offre du moment
		if (<?php print $boolmoment; ?> == 1) {			
			document.getElementById('offre_badge_offre_moment<?php echo $id_node; ?>').onmouseout = function() {
				document.getElementById('popup-offre-moment<?php echo $id_node; ?>').style.display = 'none';
			};			
			document.getElementById('offre_badge_offre_moment<?php echo $id_node; ?>').onmouseover = function() {
				document.getElementById('popup-offre-moment<?php echo $id_node; ?>').style.display = 'block';
			};
		}
		
		//PopUp Astuce
		document.getElementById('offre_badge_astuce<?php echo $id_node; ?>').onmouseout = function() {
			document.getElementById('popup-astuce<?php echo $id_node; ?>').style.display = 'none';
		};
		document.getElementById('offre_badge_astuce<?php echo $id_node; ?>').onmouseover = function() {
			document.getElementById('popup-astuce<?php echo $id_node; ?>').style.display = 'block';
		};
		
		//PopUp qrcode
		document.getElementById('offre_badge_qrcode<?php echo $id_node; ?>').onmouseout = function() {
			document.getElementById('popup-qrcode<?php echo $id_node; ?>').style.display = 'none';
		};
		document.getElementById('offre_badge_qrcode<?php echo $id_node; ?>').onmouseover = function() {
			document.getElementById('popup-qrcode<?php echo $id_node; ?>').style.display = 'block';
		};
		
		//Simulateur
		document.getElementById('offre_badge_simulateur<?php echo $id_node; ?>').onmouseout = function() {
			document.getElementById('popup-simulateur<?php echo $id_node; ?>').style.display = 'none';
		};
		document.getElementById('offre_badge_simulateur<?php echo $id_node; ?>').onmouseover = function() {
			document.getElementById('popup-simulateur<?php echo $id_node; ?>').style.display = 'block';
		};
	}
	
</script>


<![if !IE]>
<script type="text/javascript">
	var myScroll<?php echo $id_node; ?>;
	var timeout<?php echo $id_node; ?>;
	function loaded<?php echo $id_node; ?>() {
		/* Initialize scrollable texts */
		myScroll<?php echo $id_node; ?> = new iScroll('wrapper<?php echo $id_node; ?>', {vScrollbar: false });
		
		/* Up and down arrows binding */
		/* Hide if iOS device */
		
		if ((navigator.userAgent.match(/iPad/i))) {
				document.getElementById('down<?php echo $id_node; ?>').style.display = "none";
				document.getElementById('up<?php echo $id_node; ?>').style.display = "none";
		}
		else {
			//If there is content to scroll
			if (myScroll<?php echo $id_node; ?>.scroller.offsetHeight > myScroll<?php echo $id_node; ?>.wrapper.offsetHeight) {
			
				//Bouton UP
				document.getElementById('up<?php echo $id_node; ?>').onmousedown = function() {
					if(myScroll<?php echo $id_node; ?>.y < 0) {
						myScroll<?php echo $id_node; ?>.scrollTo(0,myScroll<?php echo $id_node; ?>.y +10,300);
					}
					timeout<?php echo $id_node; ?> = setInterval(function () {
						if(myScroll<?php echo $id_node; ?>.y < 0) {
						myScroll<?php echo $id_node; ?>.scrollTo(0,myScroll<?php echo $id_node; ?>.y +10,300);
						}
					}, 25);
					return false;	
				};
				
				//Bouton DOWN
				document.getElementById('down<?php echo $id_node; ?>').onmousedown = function() {
				
					timeout<?php echo $id_node; ?> = setInterval(function () {					
						if( myScroll<?php echo $id_node; ?>.y + myScroll<?php echo $id_node; ?>.scroller.offsetHeight > myScroll<?php echo $id_node; ?>.wrapper.offsetHeight){
							myScroll<?php echo $id_node; ?>.scrollTo(0,myScroll<?php echo $id_node; ?>.y -10,300);
						}else{
							clearInterval(timeout<?php echo $id_node; ?>);
						}
					}, 25);
					return false;				
				};
				

			}
			else {
				myScroll<?php echo $id_node; ?>.destroy();
				document.getElementById('down<?php echo $id_node; ?>').style.display = "none";
				document.getElementById('up<?php echo $id_node; ?>').style.display = "none";
			}
		}
		
		
		jQuery(document).mouseup(function () {
			clearInterval(timeout<?php echo $id_node; ?>);
			return false;
		});
	}
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded<?php echo $id_node; ?>, 300); }, false);	
	
	/*
	document.getElementById('down<?php echo $id_node; ?>').onmousedown = downStart();
	document.getElementById('down<?php echo $id_node; ?>').onmouseup = downStop();
	
	function downAction(){
		myScroll<?php echo $id_node; ?>.scrollTo(0,myScroll<?php echo $id_node; ?>.y -5,300);
	}
	
	function downStart(){
		downAction();
		downAction_timeout = setInterval("downAction()",10);
	}
	
	function downStop(){
		if (typeof(downAction_timeout) != "undefined") clearTimeout(downAction_timeout);
	}
	*/
	
</script>
<![endif]>
</section>
