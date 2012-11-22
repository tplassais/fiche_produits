<?php 
	drupal_add_js($GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/scripts/iscroll.js', 'file'); 
?>


<script type="text/javascript">
var state<?php echo $id_node; ?> = 0;
function turn_card<?php echo $id_node; ?>(reinit)
{
	// Mode réinitialisation : remet la carte de face et remet State à 0;
	if (reinit) {
		(document.getElementById('collab_info_frame_<?php echo $id_node; ?>')).style.display = 'block'; 
		(document.getElementById('collab_QRCode_frame_<?php echo $id_node; ?>')).style.display = 'none'; 
		state<?php echo $id_node; ?> = 0;
	}
	else { // Mode normal
		if (state<?php echo $id_node; ?> == 0) // On retourne une carte
		{
			(document.getElementById('collab_info_frame_' + '<?php echo $id_node; ?>')).style.display = 'none'; 
			(document.getElementById('collab_QRCode_frame_' + '<?php echo $id_node; ?>')).style.display = 'block'; 
			state<?php echo $id_node; ?> = 1;
			
			var backs<?php echo $id_node; ?> = document.getElementsByClassName('collab_card_back');
			var faces<?php echo $id_node; ?> = document.getElementsByClassName('collab_card_face');
			
			for(var i= 0; i < backs<?php echo $id_node; ?>.length; i++) // Reinitialisation des autres cartes (au cas où l'une est déjà retournée)
			{
				var temp_id = backs<?php echo $id_node; ?>[i].id.substring(20);
				
				if (temp_id != <?php echo $id_node; ?>) { // on reinitilise tous sauf la carte qu'on veut effectivement retourner
					// appelle de la fonction Turn Card en mode réinitialisation
					window['turn_card' + temp_id](1);
				}
			}
		}
		else // Si on reclique pour revenir à la face de la carte.
		{
			(document.getElementById('collab_info_frame_' + '<?php echo $id_node; ?>')).style.display = 'block'; 
			(document.getElementById('collab_QRCode_frame_' + '<?php echo $id_node; ?>')).style.display = 'none'; 
			state<?php echo $id_node; ?> = 0;
		}
	}
}



var myScroll<?php echo $id_node; ?>;
function loaded() {
	/* Initialize scrollable texts */
	myScroll<?php echo $id_node; ?> = new iScroll('wrapper<?php echo $id_node; ?>', {vScrollbar: false });
}
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 300); }, false);

</script>



<?php print '<div id="collab_whole_container_' . $id_node . '" class="collab_whole_container">'; ?>
	<!-- This one -->
	<div id="collab_info_frame_<?php echo $id_node; ?>" class="collab_business_card_frame collab_card_face" onclick="javascript:turn_card<?php echo $id_node; ?>()">
		<div class="collab_right_part">
			<div class="collab_info_container">
				<div class="collab_business_card_name"><?php print mb_strtoupper($prenom); ?></div>
				<div class="collab_business_card_name"><?php print mb_strtoupper($nom); ?></div>
				<div class="collab_business_card_fonction" style="color : <?php print $couleur_fonction; ?>"><?php print $fonction; ?></div>
				<div class="collab_business_card_verbatim"><?php print $verbatim; ?></div>
			</div>
			<div class="collab_qrcode_button">
				<table class="collab_qrcode_button_table">
					<tr>
						<td class="collab_mini_qrcode"><img src="<?php print $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bpri') . '/images/p1f_equipe/mini-qrcode.png'; ?>" /></td>
						<td class="collab_qrcode_button_label"><?php print $text_qrcode; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="collab_photo_container">
			<?php print $photo_collaborateur; ?>		
			<div class="collab_ornement_photo">
			</div>
		</div>

	</div>

	<!-- or this one -->
	<div id="collab_QRCode_frame_<?php echo $id_node; ?>" class="collab_business_card_frame collab_card_back" onclick="javascript:turn_card<?php echo $id_node; ?>()" style="display : none">
		<div class="collab_qrcode_right_part">
			Pour flasher la carte virtuelle de votre conseiller, téléchargez sur votre Smartphone une application permettant de lire les flashcodes.
		</div>
		<div class="collab_qrcode">
			<?php print $qrcode_collaborateur; ?>
		</div>
	</div>
</div>

