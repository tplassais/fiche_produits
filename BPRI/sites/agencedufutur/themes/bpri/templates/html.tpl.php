<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?> manifest="<?php print base_path(); ?>manifest.appcache"><![endif]-->
<!--[if (lte IE 6)&(!IEMobile)]><html class="ie6 ie6-7 ie6-8" <?php print $html_attributes; ?> manifest="<?php print base_path(); ?>manifest.appcache"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="ie7 ie6-7 ie6-8" <?php print $html_attributes; ?> manifest="<?php print base_path(); ?>manifest.appcache"><![endif]-->
<!--[if (IE 8)&(!IEMobile)]><html class="ie8 ie6-8" <?php print $html_attributes; ?> manifest="<?php print base_path(); ?>manifest.appcache"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?> manifest="<?php print base_path(); ?>manifest.appcache"><!--<![endif]-->

<head>
<?php print $head; ?>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<!-- pour ipad -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no">
<meta name = "viewport" content="initial-scale = 1.0, user-scalable = no, width=1024px">
<!-- fin pour ipad -->
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?> onunload="">
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>

<script type="text/javascript">
	(function($){
	$.fn.disableSelection = function() {
		return this.each(function() {           
			$(this).attr('unselectable', 'on')
				   .css({
					   '-moz-user-select':'none',
					   '-webkit-user-select':'none',
					   'user-select':'none',
					   '-ms-user-select':'none'
				   })
				   .each(function() {
					   this.onselectstart = function() { return false; };
				   });
		});
	};

	})(jQuery);
jQuery('body').disableSelection();
</script>