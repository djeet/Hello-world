<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Venue</title>
<!--  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- CSS Starts-->
    <?php echo $html->css('css/style'); ?>
      
    <?php //echo $html->css('styleSheet'); ?>	
 
<!-- CSS Ends -->
</head>

<body>
	<div class="main_container">
		 <?php echo $this->element('front/header'); ?>
		<div class="middle_main">
			   <?php echo $content_for_layout; ?>
	
		</div>
	
	
	</div>
	      <?php echo $this->element('front/footer'); ?>

</body>
</html>
