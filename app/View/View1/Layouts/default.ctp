<?php
/**
 * Default Theme for Croogo CMS
 *
 * @author Fahad Ibnay Heylaal <contact@fahad19.com>
 * @link http://www.croogo.org
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
	<?php
		echo $this->Layout->meta();
		echo $this->Layout->feed();
		echo $this->Html->css(array(
			//'reset',SpryAssets/SpryTabbedPanels.js
			//'960',
			'SpryTabbedPanels',
                    'jquery-ui',
                    'style',
		));
		echo $this->Layout->js();
		echo $this->Html->script(array(
			//'jquery/jquery.min',
			//'jquery/jquery.hoverIntent.minified',
			//'jquery/superfish',
			//'jquery/supersubs',
                    'front_js/jquery',
			'front_js/venue',
                        'front_js/SpryTabbedPanels',
                    //'front_js/search-options',
                    //'front_js/modernizr',
                    //'front_js/select2',
                    //'front_js/app',
                    'front_js/browse',
                    'front_js/pages',
                    'front_js/jquery-ui',
                    
                    
                    
		));
		//echo $this->Blocks->get('css');
		//echo $this->Blocks->get('script');
	?>
</head>
<body>
	<div id="wrapper">
		<?php echo $this->element('front/header'); ?>

		<div id="main" class="container_16">
			<div id="content" class="grid_11">
			<?php
				echo $this->Layout->sessionFlash();
				echo $content_for_layout;
			?>
			</div>

<!--			<div id="sidebar" class="grid_5">
			<?php //echo $this->Layout->blocks('right'); ?>
			</div>-->

			<div class="clear"></div>
		</div>

		<?php echo $this->element('front/footer'); ?>
	</div>
	<?php
		echo $this->Blocks->get('scriptBottom');
		echo $this->Js->writeBuffer();
	?>
	</body>
</html>