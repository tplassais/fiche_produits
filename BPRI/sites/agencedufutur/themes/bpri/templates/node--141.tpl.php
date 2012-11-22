<?php $img_directory = $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>
<div id="zone-agence-content-wrapper">
  
  <div id="img-zone-agence-fond">
    <a href="#"><img src="<?php print $img_directory ; ?>/images/all/1x1.png" height="580" width="1080"/></a>
  </div>
  
  <div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>

  <div id="img-zone-agence">
    <a href="#">
    <img id="img-plan-zone"
         src="<?php print $img_directory ; ?>/images/p1f_accueil/zone-front.png"
         usemap="#plan-zone-map"
         border="0" alt="" />
    </a>
    
    <map id="map-zone" name="plan-zone-map">
      <area id="area_1" shape="poly" coords="270,39,372,67,376,132,366,146,343,137,339,172,299,195,290,133,250,119,220,137,206,93,190,86,"
            href="#"/>
      <area id="area_2" shape="poly" coords="319,381,389,282,421,295,441,265,456,200,398,178,374,205,371,216,341,202,343,195,309,182,296,192,287,131,249,118,222,134,206,93,59,183,108,250,"
            href="#" />
      <area id="area_3" shape="poly" coords="318,381,512,499,558,457,698,136,504,82,488,122,493,129,477,200,467,211,457,207,442,268,424,296,392,281,"
            href="#" />
      <area id="area_4" shape="poly" coords="398,29,512,60,501,82,489,124,467,206,456,207,456,198,398,175,372,204,371,215,342,201,341,139,364,145,380,130,369,126,372,49,"
      		href="#" />
    </map>
  </div>


  <div id="content-zone-agence-wrapper">
  	<div id="content-zone-agence-header">
  	</div>
  	<div id="content-zone-agence-header-close">
  	  <a href="#"><img id="zone-agence-img-close" src="<?php print $img_directory ; ?>/images/p1f_accueil/btn_fermer_popup.png" /></a>
  	</div>
  	<div id="content-zone-agence-content">
	  <div id="field_zoneagence_desc_text"></div>
	  <div id="field_zoneagence_visuel_img"></div>
  	</div>
  </div>

  <div id="content-zone-agence-front-wrapper">
    <img src="<?php print $img_directory ; ?>/images/p1f_accueil/touch_me.png" />
  	  <div class="field-type-text field-item"><?php print $descriptif_front; ?></div>
  </div>

</div>

<script type="text/javascript">
	//Zone accueil
	document.querySelector("#area_1").onclick = function(){
		document.querySelector("#field_zoneagence_desc_text").innerHTML ="<?php print $zones[0]["descriptif"]; ?>";
		document.querySelector("#field_zoneagence_visuel_img").innerHTML ='<?php print $zones[0]["visuel"]; ?>';
		document.querySelector("#content-zone-agence-header").innerHTML ="<?php print $zones[0]["title"]; ?>";
		document.querySelector("#img-plan-zone").src ="<?php print $img_directory ; ?>/images/p1f_accueil/<?php print $zones[0]["img_zone"]; ?>.png";
		document.querySelector("#content-zone-agence-wrapper").style.display = "block";
		document.querySelector("#content-zone-agence-front-wrapper").style.display = "none";
	};
	//Zone banque au quotidien
	document.querySelector("#area_2").onclick = function(){
		document.querySelector("#field_zoneagence_desc_text").innerHTML ="<?php print $zones[1]["descriptif"]; ?>";
		document.querySelector("#field_zoneagence_visuel_img").innerHTML ='<?php print $zones[1]["visuel"]; ?>';
		document.querySelector("#content-zone-agence-header").innerHTML ="<?php print $zones[1]["title"]; ?>";
		document.querySelector("#img-plan-zone").src ="<?php print $img_directory ; ?>/images/p1f_accueil/<?php print $zones[1]["img_zone"]; ?>.png";
		document.querySelector("#content-zone-agence-wrapper").style.display = "block";
		document.querySelector("#content-zone-agence-front-wrapper").style.display = "none";
	};
	//Zone banque conseil
	document.querySelector("#area_3").onclick = function(){
		document.querySelector("#field_zoneagence_desc_text").innerHTML ="<?php print $zones[2]["descriptif"]; ?>";
		document.querySelector("#field_zoneagence_visuel_img").innerHTML ='<?php print $zones[2]["visuel"]; ?>';
		document.querySelector("#content-zone-agence-header").innerHTML ="<?php print $zones[2]["title"]; ?>";
		document.querySelector("#img-plan-zone").src ="<?php print $img_directory ; ?>/images/p1f_accueil/<?php print $zones[2]["img_zone"]; ?>.png";
		document.querySelector("#content-zone-agence-wrapper").style.display = "block";
		document.querySelector("#content-zone-agence-front-wrapper").style.display = "none";
	};
	//Zone banque projet
	document.querySelector("#area_4").onclick = function(){
		document.querySelector("#field_zoneagence_desc_text").innerHTML ="<?php print $zones[3]["descriptif"]; ?>";
		document.querySelector("#field_zoneagence_visuel_img").innerHTML ='<?php print $zones[3]["visuel"]; ?>';
		document.querySelector("#content-zone-agence-header").innerHTML ="<?php print $zones[3]["title"]; ?>";
		document.querySelector("#img-plan-zone").src ="<?php print $img_directory ; ?>/images/p1f_accueil/<?php print $zones[3]["img_zone"]; ?>.png";
		document.querySelector("#content-zone-agence-wrapper").style.display = "block";
		document.querySelector("#content-zone-agence-front-wrapper").style.display = "none";
	};
	//Zone front
	document.querySelector("#img-zone-agence a").onclick = function(){
		document.querySelector("#content-zone-agence-front-wrapper").style.display = "block";
		document.querySelector("#content-zone-agence-wrapper").style.display = "none";
		document.querySelector("#img-plan-zone").src ="<?php print $img_directory ; ?>/images/p1f_accueil/zone-front.png";
	};
	document.querySelector("#content-zone-agence-header-close").onclick = function(){
		jQuery("#img-zone-agence a").click();
	};
	
	//initialisation
	var currentZone = "<?php print $current_zone; ?>";
	switch(currentZone) {
		case "<?php print $zones[0]["img_zone"]; ?>"://zone accueil
			jQuery("#area_1").click();
			break;
		case "<?php print $zones[1]["img_zone"]; ?>"://zone banque au quotidien
			jQuery("#area_2").click();
			break;
		case "<?php print $zones[2]["img_zone"]; ?>"://zone banque conseil
			jQuery("#area_3").click();
			break;
		case "<?php print $zones[3]["img_zone"]; ?>"://zone banque projet
			jQuery("#area_4").click();
			break;
		default://zone front
			jQuery("#img-zone-agence a").click();
	}
</script>