<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file');
	drupal_add_css(path_to_theme() . '/css/services.css', array('group' => CSS_THEME));
	$img_directory = $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri');
	$layers = array('accueil', 'bank-in-box', 'banque-au-quotidien', 'banque-conseil', 'banque-projet', 'bar', 'bibliotheque', 'libre-service', 'pilier-1-dos', 'pilier-2-dos', 'pilier-2-face');
?>

<div>
	<div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>

	<div id="ou-aller-wrapper">
		<div id="ou-aller-images">
		
			<div id="ou-aller-background">
				<img src="<?php print $img_directory; ?>/images/p1f_ou_aller_pour/ou-aller-pour.png" alt="" />
			</div>
			
			<div id="ou-aller-background-noir">
				<img src="<?php print $img_directory; ?>/images/p1f_ou_aller_pour/noir.png" alt="" />
			</div>
			
			<div id="wrapper-layers">
				<div class="layer" id="accueil" >			
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone2.png" alt="" />
				</div>		
				<div class="layer" id="banque-au-quotidien" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone1.png" alt="" />
				</div>
				<div class="layer" id="banque-conseil" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone3.png" alt="" />
				</div>
				<div class="layer" id="banque-projet" >				
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone4.png" alt="" />
				</div>
				<div class="layer" id="bar" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone2.png" alt="" />
				</div>
				<div class="layer" id="bibliotheque" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone4.png" alt="" />
				</div>
				<div class="layer" id="libre-service" >					
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone1.png" alt="" />
				</div>
				<div class="layer" id="pilier-1-dos" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone5.png" alt="" />					
				</div>
				<div class="layer" id="pilier-1-cote" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone5.png" alt="" />					
				</div>
				<div class="layer" id="pilier-2-dos" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone5.png" alt="" />					
				</div>
				<div class="layer" id="pilier-2-face" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone5.png" alt="" />					
				</div>	
				<div class="layer" id="bank-in-box" >
					<img src="<?php echo $img_directory ?>/images/p1f_ou_aller_pour/zone5.png" alt="" />
				</div>		

				<div class="layer" id="accueil2" >
					<div style="position:absolute; left: -410px; top: 80px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>					
				</div>		
				<div class="layer" id="banque-au-quotidien2" >
					<div style="position:absolute; left: -400px; top: 250px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
					<div style="position:absolute; left: -490px; top: 205px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>
				<div class="layer" id="banque-conseil2" >
					<div style="position:absolute; left: -150px; top: 120px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
					<div style="position:absolute; left: -180px; top: 205px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
					<div style="position:absolute; left: -240px; top: 310px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>
				<div class="layer" id="banque-projet2" >				
					<div style="position:absolute; left: -315px; top: 90px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>
				<div class="layer" id="bar2" >
					<div style="position:absolute; left: -380px; top: 65px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>
				<div class="layer" id="bibliotheque2" >
					<div style="position:absolute; left: -263px; top: 70px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>
				<div class="layer" id="libre-service2" >					
					<div style="position:absolute; left: -540px; top: 100px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>
				<div class="layer" id="pilier-1-dos2" >
					<div style="position:absolute; left: -450px; top: 72px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>				
				</div>
				<div class="layer" id="pilier-1-cote2" >
					<div style="position:absolute; left: -485px; top: 73px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>				
				</div>
				<div class="layer" id="pilier-2-dos2" >
					<div style="position:absolute; left: -292px; top: 136px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>					
				</div>
				<div class="layer" id="pilier-2-face2" >
					<div style="position:absolute; left: -320px; top: 200px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>	
				</div>	
				<div class="layer" id="bank-in-box2" >
					<div style="position:absolute; left: -393px; top: 164px;">
						<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="40" height="60" id="fleche_gif" align="middle">
							<object type="application/x-shockwave-flash" data="<?php echo $img_directory ?>/images/p1f_flash/fleche_gif.swf" width="40" height="60">
								<param name="movie" value="fleche_gif.swf" />
								<param name="quality" value="high" />
								<param name="wmode" value="transparent" />
							</object>
						</object>
					</div>
				</div>	
			</div>
		</div>
		
		<div id="ou-aller-pour-menu" style="display:none">
			<?php 
			print render(block_get_blocks_by_region('ou_aller_pour')); 
			?>
			<div id="down-arrow">
				<input type="image" src="<?php print $img_directory; ?>/images/all/fleche_bas.png" alt=""/>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">

	var allLayersImg = document.querySelectorAll("#wrapper-layers .layer");
	var allMenuLinks = document.querySelectorAll("#ou-aller-pour-menu .block-content .menu a");
	var allLocations = {<?php
			foreach($services as $service_item)
			{
				$output .= '"nid' . $service_item->nid . '":[';
				$service_locations = node_load($service_item->nid)->field_action_localisation_list['und'];
				
				for($i = 0; $i< count($service_locations); $i++)
				{
					$output .= '"' . $service_locations[$i]['value'] . '",' . '"' . $service_locations[$i]['value'] . '2",';
				}
				$output = rtrim($output, ",") .'],';
			}
			$output = rtrim($output, ",");
			print $output;
		?>};	
	
	var nid;
	var layerImg;
	var aucuneZone;
	
	for (var i=0; i<allMenuLinks.length; i++) {
		
		nid = "nid" + allMenuLinks[i].href.split("/").reverse()[0];
		allMenuLinks[i].id = nid;
		allMenuLinks[i].onclick = function(e) {
		
			aucuneZone = true;
		
			// Reinitilisation HIGHLIGHT
			var allMenuLinks = document.querySelectorAll("#ou-aller-pour-menu .block-content .menu a");
			for (var i=0; i<allMenuLinks.length; i++) {
				allMenuLinks[i].style.color = 'inherit';
				allMenuLinks[i].style.fontWeight = 'inherit';
			}
		
			// Coloration HIGHLIGHT
			e.target.style.color = 'black';
			e.target.style.fontWeight = 'bold';
							
			//display only corresponding layers
			for(var j=0; j<allLayersImg.length; j++) {
			
				var showBlock = false;

				if (allLocations[e.target.id].indexOf(allLayersImg[j].id)>=0){
					showBlock = true;					
				}

				if(showBlock){
					allLayersImg[j].style.display = "block";
					aucuneZone = false;
				}
				else{
					allLayersImg[j].style.display = "none";				
				}
				
				
			}
			//alert(e.target.id + "\nnode locations : " + allLocations[e.target.id]);
			
			//if there a no zones display
			if(aucuneZone){
				document.getElementById('ou-aller-background-noir').style.display = "none";
			}else{
				document.getElementById('ou-aller-background-noir').style.display = "block";
			}
			
		};
		allMenuLinks[i].href = "#";
	}
	
	//Fleche du haut
	var divUpArrow = document.createElement("div");
	divUpArrow.id = "up-arrow";
	var imgUpArrow = document.createElement("input");
	imgUpArrow.src = "<?php print $img_directory; ?>/images/all/fleche_haut.png";
	imgUpArrow.type = "image";
	divUpArrow.appendChild(imgUpArrow);
	var menuOuAllerPour = document.querySelectorAll("#block-menu-menu-choisissez-une-rubrique .block-inner .block-content")[0];
	document.querySelector("#block-menu-menu-choisissez-une-rubrique .block-inner").insertBefore(divUpArrow, menuOuAllerPour);
	
	//iScroll
	var myScroll;
	function loadedOuAllerPour() {
		document.querySelector("#block-menu-menu-choisissez-une-rubrique .block-inner .block-content").id = "scroll-wrapper";
		myScroll = new iScroll('scroll-wrapper', {vScrollbar: false});
		
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
				document.getElementById('down-arrow').style.display = "none";
				document.getElementById('up-arrow').style.display = "none";
		}
		else {
			
			document.getElementById('up-arrow').onclick = function() {
				if(myScroll.y < 0) {
					myScroll.scrollTo(0,myScroll.y +39,300);
				}
			};
			document.getElementById('down-arrow').onclick = function() {
				myScroll.scrollTo(0,myScroll.y -39,300);
			};
			document.getElementById('ou-aller-pour-menu').style.display = "block";	
		}
		
		
	}
	//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loadedOuAllerPour, 300); }, false);
	
	//Accordeon
	jQuery(document).ready( function () {
		// On cache les sous-menus :
		jQuery(".menu .expanded ul.menu").hide();
		// On modifie l'évènement "click" sur les liens dans les items de liste
		// qui portent la classe "toggleSubMenu" :
		jQuery(".menu li.expanded > a").click( function () {
			// Si le sous-menu était déjà ouvert, on le referme :
			if (jQuery(this).next(".menu .expanded ul.menu:visible").length != 0) {
				jQuery(this).next("ul.menu").slideUp("normal");
				jQuery(this).css("color","inherit");
			}
			// Si le sous-menu est caché, on ferme les autres et on l'affiche :
			else {
				
				//jQuery(this).next("ul.menu").style.color = '#2E9AFE';
				jQuery(".menu .expanded ul.menu").slideUp("normal");
				jQuery(this).next("ul.menu").slideDown("normal");
			}
			//On recalcule la taille de la liste pour le scroll
			setTimeout(function () {
				myScroll.refresh();				
			}, 500);
			// On empêche le navigateur de suivre le lien :			
			return false;
		});
		
		// On masque tous les layers au début
		for(var j=0; j<allLayersImg.length; j++) {
			allLayersImg[j].style.display = "none";
		}
		
		
		document.getElementById('ou-aller-background-noir').style.display = "none";		
		
	});
	
</script>