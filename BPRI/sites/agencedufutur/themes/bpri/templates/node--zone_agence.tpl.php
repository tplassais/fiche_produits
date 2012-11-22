<?php $img_directory = $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri'); ?>
<div id="zone-agence-content-wrapper">
  
  <div id="img-zone-agence-fond">
    <a href="<?php print $GLOBALS['base_url']?>/zone-front"><img src="<?php print $img_directory; ?>/images/all/1x1.png" height="580" width="1080"/></a>
  </div>
  
  <div id="title-white"><div id="title-white-div"><?php print $title_of_screen; ?></div></div>

  <div id="img-zone-agence">
    <a href="<?php print $GLOBALS['base_url']?>/zone-front">
    <img id="img-plan-zone"
         src="<?php print $img_directory; ?>/images/p1f_accueil/<?php print $img_zone; ?>.png"
         usemap="#plan-zone-map"
         border="0" alt="" />
    </a>
    
    <map id="map-zone" name="plan-zone-map">
      <area shape="poly" coords="270,39,372,67,376,132,366,146,343,137,339,172,299,195,290,133,250,119,220,137,206,93,190,86,"
            href="<?php print $GLOBALS['base_url']?>/zone-accueil"/>
      <area shape="poly" coords="319,381,389,282,421,295,441,265,456,200,398,178,374,205,371,216,341,202,343,195,309,182,296,192,287,131,249,118,222,134,206,93,59,183,108,250,"
            href="<?php print $GLOBALS['base_url']?>/zone-banque-au-quotidien" />
      <area shape="poly" coords="318,381,512,499,558,457,698,136,504,82,488,122,493,129,477,200,467,211,457,207,442,268,424,296,392,281,"
            href="<?php print $GLOBALS['base_url']?>/zone-banque-conseil" />
      <area shape="poly" coords="398,29,512,60,501,82,489,124,467,206,456,207,456,198,398,175,372,204,371,215,342,201,341,139,364,145,380,130,369,126,372,49,"
      		href="<?php print $GLOBALS['base_url']?>/zone-banque-projet" />
    </map>
  </div>

<?php if (!$is_front_zone) {?>
  <div id="content-zone-agence-wrapper">
  	<div id="content-zone-agence-header">
  	  <?php print $title; ?>
  	</div>
  	<div id="content-zone-agence-header-close">
  	  <a href="<?php print $GLOBALS['base_url']?>/zone-front"><img id="zone-agence-img-close" src="<?php print $img_directory; ?>/images/p1f_accueil/btn_fermer_popup.png" /></a>
  	</div>
  	<div id="content-zone-agence-content">
	  <div id="field_zoneagence_desc_text"> <?php print $descriptif; ?> </div>
	  <div id="field_zoneagence_visuel_img"> <?php print $visuel; ?> </div>
  	</div>
  </div>
<?php } else { ?>
  <div id="content-zone-agence-front-wrapper">
    <img src="<?php print $img_directory; ?>/images/p1f_accueil/touch_me.png" />
  	  <?php print render($content); ?>
  </div>
<?php } ?>
</div>