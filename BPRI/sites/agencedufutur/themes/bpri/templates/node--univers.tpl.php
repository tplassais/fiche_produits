<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file');
?>

<!-- Template univers : chargement des CSS -->

<?php 
	if((bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad')){
		drupal_add_css(path_to_theme() . '/css/univers_ipad.css', array('group' => CSS_THEME)); 
		drupal_add_css(path_to_theme() . '/css/univers_puzzle_ipad.css', array('group' => CSS_THEME)); 
	}else{
		drupal_add_css(path_to_theme() . '/css/univers_pilier.css', array('group' => CSS_THEME)); 
		drupal_add_css(path_to_theme() . '/css/univers_puzzle_pilier.css', array('group' => CSS_THEME)); 
	}
	drupal_add_css(path_to_theme() . '/css/univers.css', array('group' => CSS_THEME)); 
	drupal_add_css(path_to_theme() . '/css/univers_puzzle.css', array('group' => CSS_THEME)); 
 ?>
 
<!-- <div id="espace_du_haut_univers"></div> -->

<!-- Template univers :  titre de l'ecran -->
  
<div id="title-white"><div id="title-white-div">
<?php if($current_path == 'univers'){ ?>
<?php print $title_of_screen; ?>
<?php } ?>
<?php if($current_path == 'univers_pro'){ ?>	
<?php print $title_of_screen_pro; ?>
<?php } ?>
<?php if($current_path == 'univers_part'){ ?>	
<?php print $title_of_screen_part; ?>
<?php } ?>
</div></div>

<!-- Template univers :  univers -->
<div id="universe">

		<!-- UNIVERS GLOBAL -->

		<?php if($current_path == 'univers'){ ?>		
		<?php global $base_url;	?>		
		<a href="<?php print $base_url ?>/univers_pro">
		<img id="picto_pro" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_pro.png" alt=""/>
		</a>
		
		<a href="<?php print $base_url ?>/univers_part">
		<img id="picto_part" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_part.png" alt=""/>
		</a>
		
		<a href="<?php print $base_url ?>/bons-plans">
		<img id="picto_bon_plan" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_bon_plan.png" alt=""/>
		</a>	
		
		<?php } ?>
		
		<!-- UNIVERS PRO -->
		
		<?php if($current_path == 'univers_pro'){ ?>		
		<?php global $base_url;	?>

		<img id="area_pro" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/cercle_pro.png" alt=""/>	
		
		<img id="area_pro_me_develo" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_me_devellopper.png" alt=""/>
		<img id="area_pro_mon_aveni" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mon_avenir_pro.png" alt=""/>
		<img id="area_pro_me_lancer" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_me_lancer.png" alt=""/>
		<img id="area_pro_mes_encai" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mes_encaissements.png" alt=""/>
		<img id="area_pro_mes_salar" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mes_salaries.png" alt=""/>
		<img id="area_pro_proteger_" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_proteger_mon_activite.png" alt=""/>
		<img id="area_pro_mon_quoti" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mon_quotidien.png" alt=""/>
		<img id="area_pro_optimiser" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_optimiser_ma_fiscalite.png" alt=""/>
		
		<?php $besoins = array('pro_me_lancer','pro_me_develo','pro_proteger_','pro_optimiser','pro_mon_quoti','pro_mes_encai','pro_mes_salar','pro_mon_aveni');?>
		
		<div class="menu_popup" id="popup_pro_me_lancer">
			<div id="close_lancer" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_lancer')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_me_develo">
			<div id="close_developper" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_developper')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_proteger_">
			<div id="close_proteger" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_proteger')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_optimiser">
			<div id="close_optimiser" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_optimiser')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_mon_quoti">
			<div id="close_quotidien" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_quotidien')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_mes_encai">
			<div id="close_encaissements" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_encaissements')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_mes_salar">
			<div id="close_salaries" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_salaries')); ?>
		</div>
		<div class="menu_popup" id="popup_pro_mon_aveni">
			<div id="close_avenir_pro" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_avenir_pro')); ?>
		</div>
		
		
		<?php } ?>
		
		<!-- UNIVERS PART -->
		
		<?php if($current_path == 'univers_part'){ ?>	
		<?php global $base_url;	?>
		
		<img id="area_pro" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/cercle_part.png" alt=""/>	
						
		<img id="area_part_ma_famil" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_ma_famille.png" alt=""/>
		<img id="area_part_ma_maiso" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_ma_maison.png" alt=""/>
		<img id="area_part_ma_voitu" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_ma_voiture.png" alt=""/>
		<img id="area_part_mon_arge" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mon_argent.png" alt=""/>
		<img id="area_part_mon_aven" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mon_avenir.png" alt=""/>
		<img id="area_part_mon_patr" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_mon_patrimoine.png" alt=""/>
		<img id="area_part_moi_____" class="area_puzzle" src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>/images/p1d_univers/picto_moi.png" alt=""/>
		
		<?php $besoins = array('part_ma_famil','part_moi_____','part_ma_maiso','part_ma_voitu','part_mon_arge','part_mon_patr','part_mon_aven');?>
			
		<div class="menu_popup" id="popup_part_moi_____">
			<div id="close_moi" class="close_popup" >X</div>  
			<?php print render(block_get_blocks_by_region('univers_moi')); ?>
		</div>
		<div class="menu_popup" id="popup_part_ma_famil">
			<div id="close_famille" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_famille')); ?>
		</div>
		<div class="menu_popup" id="popup_part_ma_maiso">
			<div id="close_maison" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_maison')); ?>
		</div>
		<div class="menu_popup" id="popup_part_ma_voitu">
			<div id="close_voiture" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_voiture')); ?>
		</div>
		<div class="menu_popup" id="popup_part_mon_arge">
			<div id="close_argent" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_argent')); ?>
		</div>
		<div class="menu_popup" id="popup_part_mon_patr">
			<div id="close_patrimoine" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_patrimoine')); ?>
		</div>
		<div class="menu_popup" id="popup_part_mon_aven">
			<div id="close_avenir_part" class="close_popup" >X</div>
			<?php print render(block_get_blocks_by_region('univers_avenir_part')); ?>
		</div>
		
		<?php } ?>			
		
</div>		
		
<!-- <div id="espace_du_bas_univers"></div> -->

<!-- Template univers :  javascript -->

<script type="text/javascript">

	//Force le reload de la page sur ipad
	if ((/iphone|ipod|ipad.*os 5/gi).test(navigator.appVersion)) {
	  window.onpageshow = function(evt) {
		// If persisted then it is in the page cache, force a reload of the page.
		if (evt.persisted) {
		  document.body.style.display = "none";
		  location.reload();
		}
	  };
	}

	//On retire les touch par défaut ipad
	if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {			
		document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	}	
	
	//On charge les evenements des boutons	
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loadPopups, 300); }, false);
	function loadPopups() {	
	
		<?php if($current_path == 'univers'){ ?>
		
		localStorage['bouton_retour_click'] = 'non';
			
		<?php }else{ ?>
		
		if(localStorage['bouton_retour_click'] == 'oui'){	
		
			<?php foreach($besoins as $besoin){?>
				//si le local storage est 
				if(localStorage['menu_besoin'] == "<?php print_r($besoin); ?>"){
					document.querySelector('#popup_<?php print_r($besoin); ?>').style.display = 'block';
				}				
			<?php } ?>		
		
		}
		<?php } ?>
		localStorage['bouton_retour_click'] = 'non';		
	}		
		
	<?php if($current_path == 'univers'){ ?>
			
				
	<?php }else{ ?>
		
		//On masque toutes les popup au clic quelque part
		document.querySelector('#universe').addEventListener('click', function(){
			var allPopups = document.querySelectorAll('.menu_popup')
			for(var i=0; i < allPopups.length; i++) {			
				allPopups[i].style.display = 'none';			
			}
			localStorage['bouton_retour_click'] = 'non';
		}, true);	
	
		
		//Pour chaque besoin, on ajoute les fonctions
		<?php foreach($besoins as $besoin){?>
		
			//affiche toutes les popup (test uniquement)
			//document.querySelector('#popup_<?php print_r($besoin); ?>').style.display = 'block'; 
		
			//En cas de clic sur un besoin
			document.querySelector('#area_<?php print_r($besoin); ?>').addEventListener('click', function(){
				
				//Si la popup ne contient qu'un item, on louvre dans une nouvelle fenêtre
				if(document.querySelector('#popup_<?php print_r($besoin); ?>').querySelectorAll('.leaf').length == 1){
				localStorage['menu_besoin'] = 'null';
					window.open (document.querySelector('#popup_<?php print_r($besoin); ?>').querySelector('.leaf').querySelector('a').href,'_self',false);					
				//Sinon on affiche la popup	
				}else{
					document.querySelector('#popup_<?php print_r($besoin); ?>').style.display = 'block'; 
					localStorage['menu_besoin'] = '<?php print_r($besoin); ?>';
				}
				
			}, false);
			
								
			
		<?php } ?>
		
	<?php } ?>

	
</script>
