
<div id="title-white"><div id="title-white-div"><?php	print $title_of_screen; ?></div></div>
  
  <div class="block-white-container">
  
	<div class="field-name-field-agence-photo-img"> 
		<img class="agence-photo" src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/agence/<?php print_r($field_agence_photo_img[0]['filename']); ?>" >
	</div>
  
	<div class="agence-colonne"> 
		
		<div class="agence-colonne-gauche">
			<div class="agence-colonne-titre">Horaires</div>
			<div class="field-name-field-agence-horaires-text"><?php print_r($field_agence_horaires_text[0]['safe_value']); ?></div>
			<div class="field-name-field-agence-pertevol-text"><?php print_r($field_agence_pertevol_text[0]['safe_value']); ?></div>
		</div>
		
		<div class="agence-colonne-droite">
			<div class="agence-colonne-titre">Contactez Nous</div>
			<div class="field-name-field-agence-contact-text"><?php print_r($field_agence_contact_text[0]['safe_value']); ?></div>		
			
			<table class="qrcode-colonne">
				<tr>
					<td class="qrcode-colonne-gauche">
						<div class="field-name-field-agenc-txtqr-text"><?php print_r($field_agenc_txtqr_text[0]['safe_value']); ?></div>
					</td>
					<td class="qrcode-colonne-droite">
						<img src="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/agence/<?php print_r($field_agence_qrcode_img[0]['filename']); ?>">
					</td>
				</tr>
			</table>
			
		</div>
  
	</div>
	
	<div class="agence-mentions">
		<div class="field-name-field-agence-mention-text"><?php print_r($field_agence_mention_text[0]['safe_value']); ?></div>
	</div>
	
	</div>
	

