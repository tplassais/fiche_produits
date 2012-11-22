<?php

/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "bpri" to match
 *    your subthemes name, e.g. if you name your theme "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "bpri".
 * 2. Uncomment the required function to use.
 */

/**
 * Override or insert variables into the html templates.
 */
function bpri_preprocess_html(&$vars) {
  // Load the media queries styles
  // Remember to rename these files to match the names used here - they are
  // in the CSS directory of your subtheme.
  $media_queries_css = array(
    'bpri.responsive.style.css',
    'bpri.responsive.gpanels.css'
  );
  
  $appleIcon = array('#tag' => 'link', '#attributes' => array('href' => path_to_theme() . '/images/all/icon-ios.png', 'rel' => 'apple-touch-icon'),);
  drupal_add_html_head($appleIcon, 'apple-touch-icon');
  
  //drupal_add_css(path_to_theme() . '/css/ie8.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
  
  if (isset($_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'], 'chrome')!==false) {
    drupal_add_css(path_to_theme() . '/css/chrome.css');
  }
 
  load_subtheme_media_queries($media_queries_css, 'bpri');

}

/* -- Delete this line if you want to use this function
function bpri_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */

function bpri_preprocess_page(&$vars) {


  
  $node_parametres = node_load(substr(drupal_get_normal_path('parametres',''), 5));	
  $vars['hauteur_contenu_pmr'] = $node_parametres->field_parametre_h_pmr['und'][0]['value'];
  $vars['hauteur_espace_du_h'] = $node_parametres->field_parametre_h_haut['und'][0]['value'];
  
  //Veille
  $vars['video_veille_1_face'] = $node_parametres->field_veille_1_face['und'][0]['nid'];
  $vars['video_veille_2_face'] = $node_parametres->field_veille_2_face['und'][0]['nid'];
  $vars['veille_temps_entree'] = $node_parametres->field_veille_temps_entree['und'][0]['value'];
  $vars['veille_temps_sortie'] = $node_parametres->field_veille_temps_sortie['und'][0]['value'];
  $vars['veille_temps_entree_video'] = $node_parametres->field_veille_temps_entree_video['und'][0]['value'];
  
  //Pictogramme
  $vars['picto_accueil'] = $node_parametres->field_picto_accueil['und'][0]['filename'];
  //print_r($vars);die;
}

/*
function bpri_process_page(&$vars) {
}
*/

/**
 * Override or insert variables into the node templates.
 */

function bpri_preprocess_node(&$vars) {

	$node = $vars['node'];	

	if ($node || (arg(0) == 'node' && arg(2) != 'edit')) {
		$system_path = 'node/'.arg(1);
		$current_path = drupal_get_path_alias($system_path);
	}
	
	$vars['current_path'] = $current_path;	
	
	$node_parametres = node_load(substr(drupal_get_normal_path('parametres',''), 5));
	$vars['id_node'] = $node->nid;
	
	if ($node->type == 'agence') {
		$vars['title_of_screen'] = $node_parametres->field_titreecran_agence['und'][0]['safe_value'];
	}
	
	if ($node->type == 'equipe') {
		$vars['title_of_screen'] = $node_parametres->field_titreecran_equipe['und'][0]['safe_value'];
		
		//print_r($vars);die;
		//$vars['field_equipe_textqr_text'][0]['safe_value'];
	
		variable_set('equipe_label_qrcode', $vars['field_equipe_textqr_text']['und'][0]['safe_value']);
		
		/*
		// Exemple de comment on r�cup�re un noeud r�f�renc�.
		$node_render = node_load(58);
		$build = node_view($node_render);
		$vars['monnoeud'] = drupal_render($build);
		*/
	}	
	
	
	if ($node->type == 'collaborateur') {
	    //print_r($vars);die;

		$vars['id_node'] = $node->nid;
	   
		$vars['nom'] = $vars['field_collab_nom_text'][0]['safe_value'];
		$vars['prenom'] = $vars['field_collab_prenom_text'][0]['safe_value'];
		
		$vars['fonction'] = $vars['field_collab_fonction_tax'][0]['taxonomy_term']->name;
		
		$tab_couleur = $vars['field_collab_fonction_tax'][0]['taxonomy_term']->field_fonction_collab_couleur;
		$vars['couleur_fonction'] = $tab_couleur['und'][0]['value'];
		
		$vars['text_qrcode'] = variable_get('equipe_label_qrcode', 'Touchez pour enregistrer le contact');		
		
		/*
		$id_fonction = $vars['field_collab_fonction_text'][0]['value'];
		if($id_fonction == 1) $fonction = "Directeur d'agence";
		else if ($id_fonction == 4) $fonction = "Conseiller professionnel";
		else if ($id_fonction == 5) $fonction = "Conseiller particulier";
		else if ($id_fonction == 6) $fonction = "Conseiller patrimonial";
		else if ($id_fonction == 9) $fonction = "Charg� d'accueil";
		else $fonction = "";
	    $vars['fonction'] = $fonction;
		*/
		
		$vars['verbatim'] = $vars['field_collab_verb_text'][0]['safe_value'];
	   	   
		$vars['qrcode_collaborateur'] = theme('image_style', array('style_name' => 'qrcode_collaborateur','path' => $vars['field_collab_qrcode'][0][uri]));
		$vars['photo_collaborateur'] = theme('image_style', array('style_name' => 'photo_collaborateur','path' => $vars['field_collab_photo'][0][uri]));
		
		//print_r($vars);die;
	}
	
	
	if ($node->type == 'valeur') {
	
		$vars['title_of_screen'] = $node_parametres->field_titreecran_valeurs['und'][0]['safe_value'];
	    //print_r($vars);die;
		$vars['id_node'] = $node->nid;
		$vars['nom'] = $vars['title'];
		$vars['description'] = $vars['body'][0]['safe_value'];	
		
		/*$vars['description_sans_object'] = $vars['body'][0]['safe_value'];*/		
		$vars['description_sans_object'] = preg_replace('@<object[^>]*?>.*?</object>@si', '', $vars['body'][0]['safe_value']);
		
		
	}
	
	if ($node->type == 'convention_aeras') {
	$vars['title_of_screen'] = $node_parametres->field_titreecran_aeras['und'][0]['safe_value'];
		$vars['body'] = $vars['body'][0]['safe_value'];
		//print_r($vars);die;
	}
	
	if ($node->type == 'taux') {
		$vars['title_of_screen'] = $node_parametres->field_titreecran_taux['und'][0]['safe_value'];
		$vars['body'] = $vars['body'][0]['safe_value'];
	}
	
	
	if ($node->type == 'offre') {
	
		//print_r($vars);die;
		$vars['id_node'] = $node->nid;
		$vars['titre'] = preg_replace('@//@si', '<br/>', $vars['title']);
		$vars['description'] = $vars['field_offre_description_text'][0]['safe_value'];
		
		//$vars['accroche'] = preg_replace('@((@si', '<sup>',preg_replace('@))@si', '</sup>',preg_replace('@//@si', '<br/>', $vars['field_offre_accroche_text'][0]['value'])));
		$vars['accroche1'] = preg_replace('@//@si', '<br/>', $vars['field_offre_accroche_text'][0]['value']);
		$vars['accroche2'] = preg_replace('@\(\(@si', '<sup>', $vars['accroche1']);
		$vars['accroche'] = preg_replace('@\)\)@si', '</sup>', $vars['accroche2']);
		
		$vars['texte_astuce'] = $vars['field_offre_astuce_text'][0]['safe_value'];
		$vars['texte_moment'] = preg_replace('@//@si', '<br/>', $vars['field_offre_texte_off_mom_text'][0]['safe_value']);
		$vars['texte_moment'] = preg_replace('@\(\(@si', '<sup>', $vars['texte_moment']);
		$vars['texte_moment'] = preg_replace('@\)\)@si', '</sup>', $vars['texte_moment']);
		$vars['mention_moment'] = preg_replace('@//@si', '<br/>', $vars['field_offre_mention_off_mom_text'][0]['safe_value']);
		$vars['mention_moment'] = preg_replace('@\(\(@si', '<sup>', $vars['mention_moment']);
		$vars['mention_moment'] = preg_replace('@\)\)@si', '</sup>', $vars['mention_moment']);
		$vars['texte_simulateur'] = $node_parametres->field_parametre_bulle_sim_pilier['und'][0]['safe_value'];
		
		$vars['visuel'] = theme_image(array('path' => $vars['field_offre_visuel_img'][0][uri]));
		$vars['qrcode'] = theme_image(array('path' => $vars['field_offre_qrcode'][0][uri]));
		
		$vars['boolmoment'] = $vars['field_offre_du_moment'][0]['value'];
		
		$vars['boolsimulateur'] = $vars['field_offre_simulateur_bool'][0]['value'];
		$vars['simulateur'] = $vars['field_offre_lien_simulateur_text'][0]['safe_value'];
	}

	if($node->type == 'univers') {
		$vars['id_node'] = $node->nid;
		$vars['title_of_screen'] = $node_parametres->field_titreecran_univers['und'][0]['safe_value'];
		$vars['title_of_screen_part'] = $node_parametres->field_titreecran_offres_part['und'][0]['safe_value'];
		$vars['title_of_screen_pro'] = $node_parametres->field_titreecran_offres_pro['und'][0]['safe_value'];
	}
	
	if ($node->type == 'categorie_video') {	

		/*$node_categorie1 = node_load(substr(drupal_get_normal_path('categorie1',''), 5));	
		$node_categorie2 = node_load(substr(drupal_get_normal_path('categorie2',''), 5));	
		$node_categorie3 = node_load(substr(drupal_get_normal_path('categorie3',''), 5));	
		$node_categorie4 = node_load(substr(drupal_get_normal_path('categorie4',''), 5));
		
		$vars['picto_categorie1'] = $node_categorie1->field_categorievideo_picto['und'][0][
		*/
		
		//print_r($vars);die;
		$vars['new_title'] = $node_parametres->field_titreecran_videos['und'][0]['safe_value'];
		$vars['id_node'] = $node->nid;
		
		$vars['empl_video_internet'] = $node_parametres->field_parametre_empl_videos['und'][0]['safe_value'];
		$vars['empl_video_local'] = $node_parametres->field_parametre_empl_vid_loc['und'][0]['safe_value'];
		
		$compteur = 0;
		$vars['miniature_videos'] = array();
		$vars['current_video'] = array();
		
		foreach ($vars['field_categorievideo_videos'] as $video) {
			$vars['miniature_videos'][$compteur] = theme('image_style', array('style_name' => 'miniature_video','path' => $video['node']->field_video_miniature_img['und'][0]['uri']));
			$vars['current_video'][$compteur] = $video['node'];
			$compteur++;
		}	
		
	}
	
	
	if ($node->type == 'video') {
		//print_r($vars);die;
		$vars['empl_video_internet'] = $node_parametres->field_parametre_empl_videos['und'][0]['safe_value'];
		$vars['empl_video_local'] = $node_parametres->field_parametre_empl_vid_loc['und'][0]['safe_value'];
		
		$vars['video_pilier_1_face'] = node_load($node_parametres->field_veille_1_face['und'][0]['nid']);
		$vars['video_pilier_2_face'] = node_load($node_parametres->field_veille_2_face['und'][0]['nid']);
		
		$vars['nom_video'] = $vars['field_video_file'][0]['filename'];
		//print_r($vars);die;
		
	}
	
	if (($node->type == 'zone_agence')&&($node->nid != 141)) {
	  $path = explode('/',$vars['node_url']);
	  $img_zone = $path[count($path)-1];
	  $vars['is_front_zone'] = ($img_zone == 'zone-front');
	  $vars['img_zone'] = $img_zone;
	  $vars['title_of_screen'] = $node_parametres->field_titreecran_decouverte['und'][0]['safe_value'];
	  $vars['descriptif'] = preg_replace('@//@si', '<br/>', $vars['field_zoneagence_desc_txt'][0]['value']);
	  $vars['visuel'] =  theme('image_style', array('style_name' => 'zone_agence_image','path' => $vars['field_zoneagence_visuel_img'][0][uri]));
	
	}
	
	if (($node->type == 'zone_agence')&&($node->nid == 141)) {
	  $path = explode('/',$vars['node_url']);
	  $vars['current_zone'] = $path[count($path)-1];
	  $vars['title_of_screen'] = $node_parametres->field_titreecran_decouverte['und'][0]['safe_value'];
	  $aliases = array('zone-accueil', 'zone-banque-au-quotidien', 'zone-banque-conseil', 'zone-banque-projet');
	  $nodes = array();
	  $vars['zones'] = array();
	  for($x=0; $x<count($aliases); $x++) {
		$source_path = explode('/', drupal_get_normal_path($aliases[$x]));
		$nodes[$x] = node_load($source_path[1]);
		//descriptif, visuel, title, img_zone
		$order = array("\r\n", "\n", "\r");
		$descriptif = preg_replace('@//@si', '<br/>', str_replace($order," ", $nodes[$x]->field_zoneagence_desc_txt['und'][0]['value']));
		
		$visuel = "";
		if(count($nodes[$x]->field_zoneagence_visuel_img)>0)
		{
			//$visuel = theme_image(array('path' => $nodes[$x]->field_zoneagence_visuel_img['und'][0]['uri']));
			$visuel = theme('image_style', array('style_name' => 'zone_agence_image','path' => $nodes[$x]->field_zoneagence_visuel_img['und'][0][uri]));
		}
		$vars['zones'][$x] = array("descriptif" => $descriptif, "visuel" => $visuel, "title" => $nodes[$x]->title, "img_zone" => $aliases[$x]);
		
	  }
	  $source_path_front = explode('/', drupal_get_normal_path('zone-front'));
	  $node_front = node_load($source_path_front[1]);
	  $order = array("\r\n", "\n", "\r");
	  $vars['descriptif_front'] = preg_replace('@//@si', '<br/>', str_replace($order," ", $node_front->field_zoneagence_desc_txt['und'][0]['value']));
	}	
	
	if ($node->type == 'service') {
		$path = explode('/',$vars['node_url']);
		$img_zone = $path[count($path)-1];
		//$vars['is_front_zone'] = ($img_zone == 'ou-aller-pour');
		$vars['img_zone'] = $img_zone;
		$vars['title_of_screen'] = $node_parametres->field_titreecran_oualler['und'][0]['safe_value'];
		for ($i = 0; $i < count($vars['field_action_localisation_list']); $i ++) {
			$vars['places_list'][$i] = $vars['field_action_localisation_list'][$i]['value'];
		}
		//$services = node_load(substr(drupal_get_normal_path('parametres',''), 5));
		
		$vars['services'] = views_get_view_result('tous_les_services');
		//print_r($vars);die;
	}
	
	if ($node->type == 'tarif') {
	//print_r($vars);die;
		$vars['title_of_screen'] = $node_parametres->field_titreecran_tarifs['und'][0]['safe_value'];
		$vars['directory_flipbook_part'] = $vars['field_tarifs_flipbook_part_text'][0]['safe_value'];
		$vars['apercu_flipbook_part'] = $vars['field_tarifs_apercu_part_img'][0]['filename'];
		$vars['nb_pages_flipbook_part'] = $vars['field_tarifs_nb_pages_part'][0]['value'];
		$vars['directory_flipbook_pro'] = $vars['field_tarifs_flipbook_pro_text'][0]['safe_value'];
		$vars['apercu_flipbook_pro'] = $vars['field_tarifs_apercu_pro_img'][0]['filename'];
		$vars['nb_pages_flipbook_pro'] = $vars['field_tarifs_nb_pages_pro'][0]['value'];
	}
	
	if ($node->type == 'liste_des_valeurs') {
		$vars['title_of_screen'] = $node_parametres->field_titreecran_valeurs['und'][0]['safe_value'];
	}
}


/*
function bpri_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function bpri_preprocess_comment(&$vars) {
}

function bpri_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function bpri_preprocess_block(&$vars) {
}

function bpri_process_block(&$vars) {
}
// */

/**
 * Add the Style Schemes if enabled.
 * NOTE: You MUST make changes in your subthemes theme-settings.php file
 * also to enable Style Schemes.
 */
/* -- Delete this line if you want to enable style schemes.
// DONT TOUCH THIS STUFF...
function get_at_styles() {
  $scheme = theme_get_setting('style_schemes');
  if (!$scheme) {
    $scheme = 'style-default.css';
  }
  if (isset($_COOKIE["atstyles"])) {
    $scheme = $_COOKIE["atstyles"];
  }
  return $scheme;
}
if (theme_get_setting('style_enable_schemes') == 'on') {
  $style = get_at_styles();
  if ($style != 'none') {
    drupal_add_css(path_to_theme() . '/css/schemes/' . $style, array(
      'group' => CSS_THEME,
      'preprocess' => TRUE,
      )
    );
  }
}
// */
