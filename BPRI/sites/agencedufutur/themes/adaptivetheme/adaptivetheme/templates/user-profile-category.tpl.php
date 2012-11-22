<section class="<?php print drupal_html_class($title); ?>">
  <?php if ($title) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <dl<?php print $attributes; ?>>
    <?php print $profile_items; ?>
  </dl>
	<br/>
	<a href="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/capgemini/guide_utilisateur.zip">Telecharger le guide utilisateur</a>
	<br/>
	<a href="<?php print $GLOBALS['base_url'];?>/sites/agencedufutur/files/capgemini/guide_installation.zip">Telecharger le guide d'installation</a>
</section>
